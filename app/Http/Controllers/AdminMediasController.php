<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
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
        Photo::create(['photo_path' => $name]);
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        unlink(public_path() . $photo->photo_path);
        $photo->delete();
        Session::flash('delete-media', 'Photo has been DELETED Successfully!');
    }

    public function deleteMedia(Request $request)
    {
        if(isset($request->deleteSingle)){
            $this->destroy($request->photo);
            return redirect()->back();
        }

        if(isset($request->deleteAll) && !empty($request->checkBoxArray)){
            $photos = Photo::findOrFail($request->checkBoxArray);
            foreach ($photos as $photo) {
                $photo->delete();
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
