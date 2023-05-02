<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

// Route Home
Route::get('/', function () {
    $title = "Home";
    return view('home', [
        "title" => $title
    ]);
});

// Route Posts
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// Route About
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Izuchii",
        "email" => "luthfiramadhan.lr55@gmail.com",
        "image" => "Izuchii.png",
        "body" => "This is a long paragraph written to show how the line-height of an element is affected by our utilities. Classes are applied to the element itself or sometimes the parent element. These classes can be customized as needed with our utility API."
    ]);
});

// Route Category
Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts', [
        "title" => "Category : " . $category->name,
        "posts" => $category->posts->load('category', 'user')
    ]);
});

// Route Author
Route::get('/authors/{user:username}', function(User $user){
    return view('posts', [
        "title" => "Semua Postingan oleh " . $user->username,
        "username" => $user->username,
        "posts" => $user->posts->load('category', 'user')
    ]);
});