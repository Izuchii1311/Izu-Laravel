<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
        "title" => $title,
        "active" => "home"
    ]);
});

// Route Posts
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// Route About
Route::get('/about', function () {
    return view('about', [
        "active" => "about",
        "title" => "About",
        "name" => "Izuchii",
        "email" => "luthfiramadhan.lr55@gmail.com",
        "image" => "Izuchii.png",
        "body" => "This is a long paragraph written to show how the line-height of an element is affected by our utilities. Classes are applied to the element itself or sometimes the parent element. These classes can be customized as needed with our utility API."
    ]);
});

// Route Category
Route::get('/categories', function(){
    return view('categories', [
        "title" => "Kategori",
        "active" => "categories",
        "categories" => Category::All(),
    ]);
});

// Route Login
Route::get('/login', [LoginController::class, 'index']);

// Route Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);