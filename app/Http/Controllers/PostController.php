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
            "active" => "posts",
            // "posts" => Post::all()
            // Method with (N+1 Problem Eager Loading)
            "posts" => Post::latest()->get()
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
