<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

$posts = [
    1 => ['id' => 1, 'title' => 'Introductions to Laravel', 'content' => 'Laravel is a PHP web application framework with expressive, elegant syntax.', 'author' => 'Amr'],
    2 => ['id' => 2, 'title' => 'Understanding Blade', 'content' => 'Blade is the simple, yet powerful templating engine provided with Laravel.', 'author' => 'Ahmad'],
    3 => ['id' => 3, 'title' => 'Routing Mastery', 'content' => 'The most basic Laravel routes accept a URI and a closure.', 'author' => 'Hassan'],
    4 => ['id' => 4, 'title' => 'Database Migrations', 'content' => 'Migrations are like version control for your database.', 'author' => 'Omar'],
    5 => ['id' => 5, 'title' => 'Building Awesome UIs', 'content' => 'Tailwind makes building unique user interfaces super fast and easy.', 'author' => 'Sara'],
];

Route::get('/posts', function () use ($posts) {
    return view('posts.index', ['posts' => $posts]);
});

Route::get('/posts/{id}', function ($id) use ($posts) {
    if (!isset($posts[$id])) abort(404);
    return view('posts.show', ['post' => $posts[$id]]);
})->where('id', '[0-9]+');
