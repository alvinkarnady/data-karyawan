<?php

// use App\Models\Post;
// use App\Models\User;

use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProfilController;
use App\Http\Controllers\CommentController;
use App\Models\Profil;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home', [
//         "title" => "Home",
//         "active" => 'home'
//     ]);
// });

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        'active' => 'about',
        "name" => "Alvin Karnady",
        "email" => "alvin.karnady@gmail.com",
        "image" => "alvin.png"
    ]);
});



Route::get('/', [PostController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);


//halaman single post
Route::get('posts/{post:slug_posts}', [PostController::class, 'show']);


Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});


// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('posts', [
//         'title' => "Post by Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category', 'author')
//     ]);
// });


// Route::get('/authors/{author:username}',function(User $author){
//     return view('posts', [
//         'title' => "Post by Author : $author->name",
//         'active' => 'posts',
//         'posts' => $author->posts->load('category', 'author')

//     ]);
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/about', function () {
    return view('dashboard.about.index');
})->middleware('auth');


//auto slug
Route::get('dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::get('dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// pakai middleware
Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('admin');
Route::resource('/dashboard/profil', AdminProfilController::class)->middleware('admin');
// Route::get('/dashboard/profil/{id_user}/edit', [AdminProfilController::class, 'update'])->name('profil.edit');
Route::put('/dashboard/user/{user}', [AdminProfilController::class, 'update']);



//pakai gate lebih fleksibel
// Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');


Route::resource('comments', CommentController::class);
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
