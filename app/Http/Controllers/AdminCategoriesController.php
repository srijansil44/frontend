<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoriesCreateRequest;
use App\Http\Requests\CategoriesEditRequest;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesCreateRequest $request)
    {
        //
        $input = $request->all();
        Category::create($input);

        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::findorfail($id);

        return view('admin.categories.edit', compact('category'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesEditRequest $request, $id)
    {
        //
        $category = Category::findOrFail($id);

        $input = $request->all();
        $category->update($input);
        return redirect('/admin/categories');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::findorfail($id);
        $posts = Post::all();

        foreach($posts as $post)
        {
            if($post->category_id == $category->id)
            {
                 $post->update(['category_id'=>null]);
            }

        }

        Session::flash('deleted_category' ,'The category '.$category->name. ' has been removed');
        $category->delete();
        return redirect('/admin/categories');



    }
    }

