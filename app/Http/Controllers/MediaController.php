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
                'path' => asset("storage/". $image),
                'created_at' => gmdate("Y-m-d H:i:s", Storage::lastModified($image))
            ];
        }
        // gmdate("Y-m-d H:i:s", Storage::lastModified($image));
        return view('admin.media.index', ['images' => $images]);
    }
}
