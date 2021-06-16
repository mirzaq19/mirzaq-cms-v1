<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use File;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('dashboards.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboards.post.create',compact('categories','tags'));
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
            'judul' => 'required',
            'excerpt' => 'required',
            'kategori' => 'required',
            'content' => 'required',
            'gambar' => 'required'
        ]);
        // dd($request->all());
        $gambar = $request->gambar;
        $namagambar = time().".".$gambar->getClientOriginalExtension();
        $direktori = '../../../public/uploads/posts/gambar/';
        $gambar->move($direktori,$namagambar);
        $post = Post::create([
            'judul' => $request->judul,
            'excerpt' => $request->excerpt,
            'category_id' => $request->kategori,
            'content' => $request->content,
            'gambar' => $direktori.$namagambar,
            'slug' => Str::slug($request->judul),
            'user_id' => Auth::id(),
            'status' => $request->status
        ]);
        $post->tags()->attach($request->tags);
        return redirect()->route('post.index')->with('status','Post berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboards.post.edit',compact('categories','tags','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'judul' => 'required',
            'excerpt' => 'required',
            'kategori' => 'required',
            'content' => 'required',
        ]);
        $old_data = Post::findorfail($post->id);
        if($request->has('gambar')){
            File::delete($old_data->gambar);
            $gambar = $request->gambar;
            $namagambar = time().".".$gambar->getClientOriginalExtension();
            $direktori = 'uploads/posts/gambar/';
            $gambar->move($direktori,$namagambar);
            Post::where('id',$post->id)->update([
                'judul' => $request->judul,
                'excerpt' => $request->excerpt,
                'category_id' => $request->kategori,
                'content' => $request->content,
                'gambar' => $direktori.$namagambar,
                'slug' => Str::slug($request->judul),
                'status' => $request->status
            ]);
        }else{
            Post::where('id',$post->id)->update([
                'judul' => $request->judul,
                'excerpt' => $request->excerpt,
                'category_id' => $request->kategori,
                'content' => $request->content,
                'slug' => Str::slug($request->judul),
                'status' => $request->status
            ]);
        }
        $old_data->tags()->sync($request->tags);
        return redirect()->route('post.index')->with('status','Post berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect()->route('post.index')->with('status','Post berhasil dihapus, silahkan cek ke trashed post jika ingin merestore');
    }
    public function trashed(){
        $posts = Post::onlyTrashed()->paginate(10);
        return view('dashboards.post.trashed',compact('posts'));
    }
    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->back()->with('status','Post berhasil direstore, silahkan cek list post');
    }
    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        File::delete($post->gambar);
        $post->forceDelete();
        return redirect()->back()->with('status','Post berhasil dihapus secara permanen');
    }
}
