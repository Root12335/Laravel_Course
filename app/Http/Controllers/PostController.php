<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private array $posts = [
        1 => ['id' => 1, 'title' => 'First Post', 'content' => 'This is the first simple post.'],
        2 => ['id' => 2, 'title' => 'Second Post', 'content' => 'This is another short post content.'],
        3 => ['id' => 3, 'title' => 'Third Post', 'content' => 'This is the third post content.'],
    ];

    public function index()
    {
        return view('posts.index', ['posts' => $this->posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        return redirect('/posts');
    }

    public function show($id)
    {
        if (!isset($this->posts[$id])) {
            abort(404);
        }

        return view('posts.show', ['post' => $this->posts[$id]]);
    }

    public function edit($id)
    {
        if (!isset($this->posts[$id])) {
            abort(404);
        }

        return view('posts.edit', ['post' => $this->posts[$id]]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
            
        return redirect("/posts/{$id}");
    }

    public function destroy($id)
    {
        return redirect('/posts');
    }
}