<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function index(){
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' dengan kategori ' . $category->name;
        }
        if(request('authors')){
            $authors = User::firstWhere('username', request('authors'));
            $title = ' oleh ' . $authors->name;
        }

        return view('posts', [
            "title" => "Semua postingan" .  $title,
            "active" => "posts",
            // Kalo ga ada data maka langsung menampilkan semuanya saja
            // filter diambil di dalma modelnya, apapun yang ada di dalam filter lakukan
            "posts" => Post::latest()->filter(request(['search', 'category', 'authors']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('post', [
            "active" => "posts",
            "title" => "Postingan oleh " . $post->user->username,
            "post" => $post
        ]);
    }
}
