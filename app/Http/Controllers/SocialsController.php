<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;

class SocialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $socials   =    Social::all();

    return view('admin.socials.index',compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.socials.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                    'name'     => 'required|max:250',
                    'icon'  => 'required',
                    'link'      => 'nullable|url',

                ]);

              Social::create($request->all());

            return redirect('admin/socials');

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
        $social  =    Social::findorfail($id);

        return view('admin.socials.edit',compact('social'));
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
        $request->validate([
            'name'     => 'required|max:250',
            'icon'  => 'required',
            'link'      => 'nullable|url',
        ]);

        Social::findorfail($id)->update($request->all());

        return redirect('/admin/socials');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Social::findorfail($id)->delete();
        return redirect('/admin/socials');
    }
}
