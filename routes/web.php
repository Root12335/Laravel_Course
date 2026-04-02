<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\PostController;


// Route::get('/posts', function () {
//     $posts = [
//     1 => ['id' => 1, 'title' => 'Introductions to Laravel', 'content' => 'Laravel is a PHP web application framework with expressive, elegant syntax.', 'author' => 'Amr'],
//     2 => ['id' => 2, 'title' => 'Understanding Blade', 'content' => 'Blade is the simple, yet powerful templating engine provided with Laravel.', 'author' => 'Ahmad'],
//     3 => ['id' => 3, 'title' => 'Routing Mastery', 'content' => 'The most basic Laravel routes accept a URI and a closure.', 'author' => 'Hassan'],
//     4 => ['id' => 4, 'title' => 'Database Migrations', 'content' => 'Migrations are like version control for your database.', 'author' => 'Omar'],
//     5 => ['id' => 5, 'title' => 'Building Awesome UIs', 'content' => 'Tailwind makes building unique user interfaces super fast and easy.', 'author' => 'Sara'],
// ];
//     return view('posts.index', compact('posts'));
// });

// Route::get('/posts/{id}', function ($id) {
//     $posts = [
//         1 => ['id' => 1, 'title' => 'Introductions to Laravel', 'content' => 'Laravel is a PHP web application framework with expressive, elegant syntax.', 'author' => 'Amr'],
//         2 => ['id' => 2, 'title' => 'Understanding Blade', 'content' => 'Blade is the simple, yet powerful templating engine provided with Laravel.', 'author' => 'Ahmad'],
//         3 => ['id' => 3, 'title' => 'Routing Mastery', 'content' => 'The most basic Laravel routes accept a URI and a closure.', 'author' => 'Hassan'],
//         4 => ['id' => 4, 'title' => 'Database Migrations', 'content' => 'Migrations are like version control for your database.', 'author' => 'Omar'],
//         5 => ['id' => 5, 'title' => 'Building Awesome UIs', 'content' => 'Tailwind makes building unique user interfaces super fast and easy.', 'author' => 'Sara'],
//     ];
//         return view('posts.show', ['post' => $posts[$id]]);
// })->where('id', '[0-9]+');

Route::get('/posts', [PostController::class , 'index']);
Route::get('/posts/create', [PostController::class , 'create']);
Route::post('/posts', [PostController::class , 'store']);
Route::get('/posts/{id}/edit', [PostController::class , 'edit']);
Route::put('/posts/{id}', [PostController::class , 'update']);
Route::delete('/posts/{id}', [PostController::class , 'destroy']);
Route::get('/posts/{id}', [PostController::class , 'show'])->where('id', '[0-9]+');
