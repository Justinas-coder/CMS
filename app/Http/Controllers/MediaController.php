<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $images = [];


        foreach(Storage::allFiles('images') as $image){
            $images[$image] = [
                'public_path' => asset("storage/". $image),
                'storage_path' => $image,
                'created_at' => gmdate("Y-m-d H:i:s", Storage::lastModified($image))
            ];
        }

        // gmdate("Y-m-d H:i:s", Storage::lastModified($image));
        return view('admin.media.index', ['images' => $images]);

      
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)  
    {  
    
        $imageName = time() .'.'. $request->image->extension();
        request('image')->storeAs('images', $imageName);

        // return response()->json(['success'=>$imageName]);

        session()->flash('message', 'Image was Created');

        return redirect()->route('media.index');
    }

    public function destroy(Request $request)
    {
        Storage::delete($request->input('path'));     

        // dd($image->path);

        // session()->flash('image-deleted', 'Image has been deleted');

        return redirect()->route('media.index');
    }
}
