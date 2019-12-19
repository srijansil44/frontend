<?php

namespace App\Http\Controllers;

use App\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $logo =   Logo::first();

        return view('admin.logos.index', compact('logo'));



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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'site_logo'     => 'nullable|image|mimes:png',
            'site_favicon'  => 'nullable|image|mimes:png',
        ]);

        $logo = new Logo();
        if($file = $request->file('site_logo'))
        {
            $site_logo = time() . $file->getClientOriginalExtension();
            $file->move('images',$site_logo);
        }

        elseif($request->site_logo) {
            $site_logo = $request->site_logo;
        }

        else{
            $site_favicon = 'site.ico';
        }

        if($file = $request->file('site_favicon'))
        {
            $site_favicon = time() . $file->getClientOriginalExtension();
            $file->move('images',$site_favicon);


        }

        elseif($request->site_favicon) {
            $site_logo = $request->site_favicon;
        }


        else  {

            $site_favicon = 'favicon.ico';

        }


        $logo->updateOrCreate(['id' => 1],
            [
                'site_logo'     => $site_logo,
                'site_favicon'  => $site_favicon,

            ]
        );

        return redirect()->back();





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
    }
}
