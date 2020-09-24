<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
    $users = User::get();
    $posts = Post::latest()->get();
    return view('app')->with('posts',$posts)->with('users',$users);
    }

}
