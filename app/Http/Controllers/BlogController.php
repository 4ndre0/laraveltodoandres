<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function create()
    {
    $blogs = Blog::orderBy('created_at', 'desc')->get();
    return view('blog.create', compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = Auth::user()->id; 
        $blog->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $blog = Blog::findOrFail($id);
    return view('blog.update', compact('blog'));
}

public function update(Request $request, string $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $blog = Blog::findOrFail($id);
    $blog->title = $request->title;
    $blog->content = $request->content;
    $blog->save();

    return redirect()->route('posts.create')->with('success', 'Blog actualizado correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->back()->with('success', 'Post deleted successfully.');
    }
    
    public function buscar(Request $request)
{
    $id = $request->input('id');
    $blog = null;

    if ($id) {
        $blog = \App\Models\Blog::with('user')->find($id);
    }

    return view('blog.buscar', compact('blog'));
}






}
