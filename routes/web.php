<?php

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMediasController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\CommentRepliesController;
use App\Http\Controllers\PostCommentsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

Route::get('/post/{id}', [AdminPostsController::class, 'post'])->name('home.post');

Route::group(['middleware' => 'admin'], function () {
    Route::resource('/admin/users', AdminUsersController::class);
    Route::resource('/admin/posts', AdminPostsController::class);
    Route::resource('/admin/categories', AdminCategoriesController::class);
    Route::resource('/admin/medias', AdminMediasController::class);
    Route::resource('/admin/comments', PostCommentsController::class);
    Route::resource('/admin/comment/replies', CommentRepliesController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/comment/reply', [CommentRepliesController::class, 'createReply']);
});
