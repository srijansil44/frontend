<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Image;

class AdminAdvertisementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $advertisements = Advertisement::all();
        return view('admin.advertisements.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.advertisements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $this->validate($request, [
//            'ad_title' => 'required',
//            'ad_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'ad_size' => 'required',
//            'ad_link' =>  'required',
//        ]);

        $advertisement = new   Advertisement;
        $advertisement->ad_title = $request->ad_title;
        $advertisement->ad_link = $request->ad_link;
        $advertisement->is_active = $request->is_active;
        //if it has the advertisment image or gif
        if ($request->hasFile('ad_image')) {
            $image = $request->file('ad_image');
            //making name for the file  , with extension
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //setting a location for the image
            $location = public_path('images/' . $filename);
            // '1' =>  728 * 90
            if ($request->ad_size == '1') {
                // resizing the image  and saving the image in the public :/images.$filename
                Image::make($image)->resize(728, 90)->save($location);
            } else {
                // resizing the image  and saving the image in the public :/images.$filename
                Image::make($image)->resize(340, 340)->save($location);
            }

            $advertisement->ad_image = $filename;   //saving the image name
            $advertisement->save();
            return redirect('/admin/advertisements');
        }


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
        $advertisement = Advertisement::findorfail($id);

        return view('admin.advertisements.edit', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $advertisement = Advertisement::findorfail($id);
        $advertisement->ad_title = $request->ad_title;
        $advertisement->ad_link = $request->ad_link;
        $advertisement->is_active = $request->is_active;

        if ($file = $request->file('ad_image')) {
            unlink(public_path('images/') . $advertisement->ad_image);
            $image = $request->file('ad_image');
            //making name for the file  , with extension
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //setting a location for the image
            $location = public_path('images/' . $filename);
            // '1' =>  728 * 90
            if ($request->ad_size == '1') {
                // resizing the image  and saving the image in the public :/images.$filename
                Image::make($image)->resize(728, 90)->save($location);
            } else {
                // resizing the image  and saving the image in the public :/images.$filename
                Image::make($image)->resize(340, 340)->save($location);
            }

        }


        $advertisement->ad_image = $filename;
        $advertisement->save();

//        $input['ad_image'] = $filename;
//                        $advertisement->update($input);

        return redirect('/admin/advertisements');


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
        $advertisement = Advertisement::findorfail($id);

        unlink(public_path('images/') . $advertisement->ad_image);

        $advertisement->delete();
        return redirect()->back();


    }

}