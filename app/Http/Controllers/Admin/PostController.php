<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Admin\PostRequest;
use Illuminate\Support\Facades\Http;
use App\Services\Unsplash\Service;

class PostController extends Controller
{
    public $service;

    public function __construct(Service $service){
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Post::query();
        $query->where('status', '=', 1);
        $posts = $query->paginate(10);
        
        return view('admin.posts.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $record = $request->validate();
        
        $post = new Post();
        $post->title = $record->title;
        $post->content = $record->content;
        $post->image = $this->service->data();
        $post->status = 1;

        $post->save();


        return redirect('admin/posts')->with('success', 'Post created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if ($post->status == 0) {
            return redirect('admin/posts')->with('error', 'Post does not exists');
        }

        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $record = $request->validate();

        $post = Post::find($id);
        if ($post->status == 0) {
            return redirect('admin/posts')->with('error', 'Post does not exists');
        }
      
        $post->title = $record->title;
        $post->content = $record->content;
        $post->image = $post->image;
        $post->status = 1;

        $post->save();
        return redirect('admin/posts')->with('success', 'Post updated successfully');
    }

    /**
     * Hide the specified resource from storage.
     */
    public function dell(string $id)
    {
        $post = Post::find($id);
        $post->status = 0;
        $post->save();

        return redirect('admin/posts')->with('success', 'Post deleted successfully');
    }

    public function newImage(string $id) {
        $post = Post::find($id);
        $post->image = $this->service->data();
        $post->save();
        return redirect('admin/posts')->with('success', 'Image updated successfully');
    }
}
