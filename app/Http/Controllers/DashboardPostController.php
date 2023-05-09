<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // akan menampilkan post yang dimiliki oleh usernya
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menambahkan model category
        return view('dashboard.posts.create', [
            'categories' =>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            // unix dari tabel post
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ]);

        if($request->file('image')){
            // jika ada gambarnya maka upload gambarnya
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        // user id mengambil dari user yang telah login
        $validatedData['user_id'] = auth()->user()->id;
        // excerpt akan mengambil data dari body Laravel.com/string helpers
        // akan melakukan limit string yang mengambil dari body dan masih berupa html / dengan menggunakan strip_tags akan menghilangkan format htmlnya 
        // panggil use Illuminate\Support\Str;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100 ); 

        // Insert
        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'New Post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            // datanya akan diisi dengan mengambil data dari $post 
            'post' => $post,
            'categories' =>Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // $request data baru
    // $post data lama yang sudah ada di tabel 
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:50',
            // melakukan validasi lagi pada slug, slugnya harus diisi dan juga uniq
            // kita akan menggunakan slug yang sama tanpa merubahnya.
            // 'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required'
        ];

        // Melakukan pengecekan pada slug (jika slug yg baru itu sama dengan slug yang lama maka itu akan lolos) tapi (jika slug yang baru itu beda dengan slug yang lama maka lakukan validasi)
        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        } 

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100 ); 

        // Update
        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    // akan mengambil data dari controller dashboard
    // sebuah method baru yang tugasnya menangani ketika ada permintaan slug
    // Request itu akan terjadi ketika berpindah tab, akan mengambil inputan $title
    public function checkSlug(Request $request)
    {
        // gunakan slug service nya yang ada di github eloquent-sluggable
        // slug akan berisi $request yang ada di titlenya (dia juga akan mengecek apakah ada slug yang sama di databasenya, karena menggunakan library ini)
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
