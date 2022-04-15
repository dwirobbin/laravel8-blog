<?php

use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\User;
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

Route::get('/', [PostController::class, 'index']);

Route::get('/home', [PostController::class, 'index']);
Route::get('/home/{post:slug}', [PostController::class, 'show']);

Route::get('/about', function () {
    return view('layouts.front.about', [
        'title' => 'About'
    ]);
});

Route::get('/categories', function () {
    return view('layouts.front.categories', [
        'title' => 'All Category',
        'categories' => Category::all()
    ]);
});

// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('layouts.front.posts', [
//         'title' => "Post By Category : $category->name",
//         'posts' => $category->posts->load('category', 'author'),
//         // 'category' => $category->name
//     ]);
// });

// Route::get('/authors/{author:username}', function (User $author) {
//     return view('layouts.front.posts', [
//         'title' => "Post By Author : $author->name",
//         'posts' => $author->posts->load('category', 'author')
//     ]);
// });

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('layouts.back.index');
})->middleware('auth');


Route::prefix('/dashboard/posts/')->group(function () {
    Route::get('checkSlug', [DashboardPostController::class, 'checkSlug']);
    Route::post('uploadimage', [DashboardPostController::class, 'imageUpload'])->name('imageUpload');
    Route::post('deleteimage', [DashboardPostController::class, 'imageDelete'])->name('imageDelete');
});

Route::resource('/dashboard/posts', DashboardPostController::class);
