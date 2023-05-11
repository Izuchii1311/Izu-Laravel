<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cara 1
        // // Mengecek sudah login atau belum
        // if(auth()->guest()) {
        //     // Jika dia guest kasih pesan abort 403 : Forbidden
        //     abort(403);
        // }

        // // Jika dia sudah login tapi bukan Izuchii
        // // Memanggil user yang sudah terauthenticate
        // if(auth()->user()->username !== 'izuchii3') {
        //     abort(403); 
        // }

        // Cara 2
        // if(auth()->guest() || auth()->user()->username !== 'izuchii3'){
        //     abort(403);
        // }

        // guest() mengecek seorang user sudah login atau belum, belum login true. Jika check kebalikan dari guest
        // check() mengecek seorang user sudah login atau belum, menghasilkan true jika sudah login

        // Cara 3
        // if(!auth()->check() || auth()->user()->username !== 'izuchii3'){
        //     abort(403);
        // }
        // Maka dengan begini user selain Izuchii tidak akan bisa melihat category

        // Pengecekan Gate 
        // $this->authorize('admin');
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
