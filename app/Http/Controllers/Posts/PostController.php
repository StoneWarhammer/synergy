<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostFiles;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $posts = Post::all();
        return view('welcome', ['posts' => $posts]);
    }

    public function create(Post $post)
    {
        return view('posts.create');
    }

    public function store(Request $request, Post $post)
    {
        $data = $request->validate([
           'title' => 'required|string',
           'content' => 'required|string',
        ]);

        $request->validate([
            'file' => 'max:20480',
        ]);


        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

//        Сохранение файлов
        $paths = [];

        if ($request->file == true)
        {
            foreach ($request->file('file') as $file)
            {
                $paths[] = $file->store('posts/files', 'public');
            }

            foreach ($paths as $path)
            {
                PostFiles::create([
                    'file' => $path,
                    'post_id' => $post->max('id'),
                ]);
            }
        }

        return redirect()->route('welcome');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
