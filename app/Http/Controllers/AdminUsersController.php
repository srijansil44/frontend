<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersEditRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
                $users = User::all();


        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        $roles = Role::lists('name','id')->all();
               //using pluck insteads of lists
        $roles = Role::pluck('name','id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersCreateRequest $request)
    {
        //
        if ( trim($request->password)  == '') {

            $input = $request->except('password');
        }
        else {

            $input = $request->all();
            $input['password'] = bcrypt( trim($request->password) );
        }

        //if photo exist
        if($file = $request->file('photo_id'))
        {
             $name =  time() . $file->getClientOriginalName(); // giving the files original name
             $file->move('images', $name);  //moving the file in image directory with the name
             $photo = Photo::create(['path'=>$name]);// persisting the photo in the database
             $input['photo_id']  = $photo->id;  // giving the photo_id to the photos
        }

        User::create($input);
        Session::flash('created_user','The user has been created');

        return redirect('/admin/users');
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

          $user = User::findorfail($id);
//        $role =  Role::lists('name', 'id')->all();
            //  using pluck instead of lists

        $role =  Role::pluck('name', 'id')->all();

          return view('admin.users.edit', compact('user' , 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //
        $user = User::findorfail($id);

        if ( trim($request->password)  == '') {

            $input = $request->except('password');
        }
        else {

            $input = $request->all();
            $input['password'] = bcrypt( trim($request->password) );
        }

        //if photo exists ---->>>>
        if($file = $request->file('photo_id'))
        {

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }
          //updating to the database
        $user->update($input);
        Session::flash('updated_user','The user has been updated');



        return redirect('admin/users');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);


        if ($user->photo()->exists()) {
            $hello = $user->photo->path;
            unlink(public_path() . $user->photo->path);
        }

        $user->delete();

        Session::flash('deleted_user','The user has been deleted');

        return redirect('/admin/users');


    }
}
