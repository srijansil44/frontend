<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\CommentReply;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $posts = Post::all();
//             using pagination man

        $posts = Post::paginate(2);
        return view('admin.posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::lists('name', 'id')->all();
        return view('admin.posts.create', compact('categories'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();

        if($file = $request->file('photo_id'))
        {
            $name =  time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }


        $user->posts()->create($input);



        return redirect('/admin/posts');





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post =  Post::findorfail($id);
        $categories = Category::lists('name','id')->all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
      $input =  $request->all();

      if($file = $request->file('photo_id'))
      {
          $name = time() . $file->getClientOriginalName();
          $file->move('images',$name);
          $photo = Photo::create(['path'=>$name]);
          $input['photo_id'] = $photo->id;
      }

        $post = Post::findorfail($id);
         $post_user =   $post->user->name;
        if (is_null(Auth::user()->posts()->whereId($id)->first())) {
                        Session::flash('cannot_updated','Sorry you cannot update the post of  '.strtoupper($post_user));
                        return  redirect('/admin/posts');

        } else {
            // It's not null, update the post
            Auth::user()->posts()->whereId($id)->first()->update($input);
            return redirect('/admin/posts');

        }





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post_user =   $post->user->name;

             //checking if the post of the current authnticated user
            if (is_null(Auth::user()->posts()->whereId($id)->first())) {
                    Session::flash('cannot_delete','Sorry you cannot delete the post of  '.strtoupper($post_user));
                    return  redirect('/admin/posts');

                }
            else {

                    // It's not null, deleted the post
                  $posts =   Auth::user()->posts()->whereId($id)->first();

                 //if the post has photo
                if ($posts->photo()->exists()) {
                    unlink(public_path() . $posts->photo->path);
                }

                    $posts->delete();
                    Session::flash('deleted_post','The post has been deleted');

                    return redirect('/admin/posts');

                }




    }


    public function post($slug)
    {

        $post = Post::findBySlug($slug);

        $comments = $post->comments()->whereIsActive(1)->get();

        return view('post',compact('post','comments'));

    }

}
