<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Post $post){
        $posts = $post->where('status',1)->orderBy('created_at','desc')->paginate(6);
        $categories = Category::orderby('name')->get();
        $tags = Tag::orderBy('name')->get();
        return view('blog.index',compact('posts','categories','tags'));
    }
    public function pos($slug){
        $post = Post::where('slug',$slug)->first();
        $categories = Category::orderby('name')->get();
        $tags = Tag::orderBy('name')->get();
        return view('blog.pos',compact('post','categories','tags'));
    }
    public function listcategory(category $category){
        $posts = $category->posts()->paginate(8);
        $categories = Category::orderby('name')->get();
        $tags = Tag::orderBy('name')->get();
        return view('blog.listpost',compact('posts','categories','tags'));
    }
    public function listtag(tag $tag){
        $posts = $tag->posts()->paginate(8);
        $categories = Category::orderby('name')->get();
        $tags = Tag::orderBy('name')->get();
        return view('blog.listpost',compact('posts','categories','tags'));
    }
}
