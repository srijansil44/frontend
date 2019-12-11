<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
    //
    public function index()
    {

        $photos = Photo::all();
        $photos = Photo::paginate(10);


        return view('admin.medias.index', compact('photos'));
    }


    public function create()
    {


        return view('admin.medias.create');
    }

    public function store(Request $request)
    {

        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);
        Photo::create(['path' => $name]);


    }

    public function destroy($id)
    {
        $photo = Photo::findorfail($id);
        unlink(public_path() . $photo->path);
        $photo->delete();
        Session::flash('deleted_photo', 'The photo has been deleted');
//        return redirect('admin/medias');
    }


    public function deleteMedia(Request $request)
    {

        // if there is a button with the name delete_single
//        if (isset($request->delete_single)) {
//            $photoId = array_search('Delete', $request->delete_single);
//            $this->destroy($photoId);
//            return redirect()->back();
//        }

        if($request->delete_all && !empty($request->checkBoxArray)){

           $photos = Photo::findorfail($request->checkBoxArray);
            foreach($photos as $photo)
               {
                          $photo->delete();
               }
            return redirect()->back();


        }
        else return redirect()->back();

    }

}

