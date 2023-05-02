<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function index(){
        return view('posts', [
            "title" => "Semua Postingan",
            // "posts" => Post::all()
            "posts" => Post::with(['user', 'category'])->latest()->get()
        ]);
    }

    public function show(Post $post){
        return view('post', [
            "title" => "Postingan oleh " . $post->user->username,
            "post" => $post
        ]);
    }
}
