<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class AdminsController extends Controller
{
    //

    public function index(){

        $postsCount = Post::count();
        $userCount = User::count();
        $commentsCount = Comment::count();

        return view('admin.index', [
            'postsCount'=>$postsCount,
            'userCount'=>$userCount,
            'commentsCount'=>$commentsCount
        ]);

    }

}
