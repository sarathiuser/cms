<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            $posts = Post::all();
        }else{
            $posts=Auth::user()->pages()->get();
        }
        return view('admin.blog.index', ['model'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create', ['model'=> new Post()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        Auth::user()->posts()->save(new Post($request->only(['title','slug','published_at','excerpt','body'])));
        return redirect()->route('blog.index')->with('status','Post Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $blog)
    {
        return view('admin.blog.edit')->with('model', $blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Post $blog)
    {
       if (Auth::user()->cant('update', $blog)){
            return redirect()->route('blog.index')->with('status','You donot have permission');
       }
       $blog->fill($request->only(['title','slug','published_at','excerpt','body']))->save();
       return redirect()->route('blog.index')->with('status','Post Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (Auth::user()->cant('update', $post)){
            return redirect()->route('blog.index')->with('status','You donot have permission');
       }
       $post->delete();
       return redirect()->route('blog.index')->with('status','Post Successfully Deleted');
    }
}
