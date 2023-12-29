<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
{
    $posts = Blog::all();
    return view('blog.index', compact('posts'));
}

public function create()
{
    return view('blog.create');
}

public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'date' => 'required|date',
        'author' => 'required',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads', 'public');
        $data['image'] = $imagePath;
    }

    Blog::create($data);

    return redirect()->route('blog.index')->with('success', 'Post created successfully');
}

public function edit($id)
    {
        $post = Blog::findOrFail($id);
        return view('blog.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'author' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image file
            if ($post->image) {
                unlink(public_path('storage/' . $post->image));
            }

            // Store the new image file
            $imagePath = $request->file('image')->store('uploads', 'public');
            $data['image'] = $imagePath;
        }

        $post->update($data);

        return redirect()->route('blog.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $post = Blog::findOrFail($id);
        
        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully');
        
    }

    public function search(Request $request)
{
    if ($request->ajax()) {
        $search = $request->get('search');
        $posts = Blog::where('name', 'like', '%' . $search . '%')->get();
        return view('blog.search', compact('posts'));
    }

    return redirect()->route('blog.index');
}

    
}

