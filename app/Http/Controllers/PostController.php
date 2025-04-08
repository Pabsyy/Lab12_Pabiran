<?php

// app/Http/Controllers/PostController.php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display a listing of the posts.
    public function index()
    {
        // Retrieve posts, ordering by creation date (most recent first) and paginate them.
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index', compact('posts'));
    }
    
    // Show the form for creating a new post.
    public function create()
    {
        return view('posts.create');
    }
    
    // Store a newly created post in storage.
    public function store(Request $request)
    {
        // Validate the incoming request using the built-in validation mechanism.
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required',
        ]);
        
        // Create the post with the validated data.
        Post::create($validatedData);
        
        // Redirect to the posts list with a success message.
        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully.');
    }
    
    // Display the specified post.
    public function show($id)
    {
        // Find post by ID or return 404 if not found.
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
    
    // Show the form for editing the specified post.
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }
    
    // Update the specified post in storage.
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required',
        ]);
        
        $post = Post::findOrFail($id);
        $post->update($validatedData);
        
        return redirect()->route('posts.index')
                         ->with('success', 'Post updated successfully.');
    }
    
    // Remove the specified post from storage.
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        
        return redirect()->route('posts.index')
                         ->with('success', 'Post deleted successfully.');
    }
}
