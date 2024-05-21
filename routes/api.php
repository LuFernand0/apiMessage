<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return response()->json(['message' => 'Hello World!']);
});


// Rotas de Usuários
Route::get('/users', [UsuarioController::class, 'listAllUsers'])->name('users.listAllUsers');
Route::get('/users/{id}', [UsuarioController::class, 'listUser'])->name('users.listUser');

Route::post('/users', [UsuarioController::class, 'createUser'])->name('users.createUser');
Route::put('/users/{id}', [UsuarioController::class, 'updateUser'])->name('users.updateUser');


Route::delete('/users/{id}', [UsuarioController::class, 'deleteUser'])->name('users.deleteUser');

// Rotas de Posts
Route::get('/posts', [PostController::class, 'listAllPosts'])->name('posts.listAllPosts');
Route::get('/posts/{id}', [PostController::class, 'listPost'])->name('posts.listPost');

Route::post('/posts', [PostController::class, 'createPost'])->name('posts.createPost');
Route::put('/posts/{id}', [PostController::class, 'updatePost'])->name('posts.updatePost');

Route::delete('/posts/{id}', [PostController::class, 'deletePost'])->name('posts.deletePost');

// Rotas de Comentários
Route::get('/comentarios', [ComentarioController::class, 'listAllComments'])->name('comments.listAllComments');

Route::post('/comentarios', [ComentarioController::class, 'createComment'])->name('comments.createComment');
Route::put('/comentarios/{id}', [ComentarioController::class, 'updateComment'])->name('comments.updateComment');

Route::delete('/comentarios/{id}', [ComentarioController::class, 'deleteComment'])->name('comments.deleteComment');