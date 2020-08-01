<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use App\Tag;

class DashboardController extends Controller
{
    public function view(){
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        return view('dashboards.dashboard',compact('posts','categories','tags','users'));
    }
}
