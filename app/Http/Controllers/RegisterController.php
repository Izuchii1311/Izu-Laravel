<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => "Register",
            'active' => "register"
        ]);
    }

    public function store(Request $request){
        # Tangkap Data dan jalankan validasi
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'username' => 'required|min:3|max:8|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:20'
        ]);

        // $validateData['password'] = bcrypt($validatedData['password']);
        // hashing password
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        // $request->session()->flash('success', 'Registration successfull! Please login.');
        return redirect('/login')->with('success', 'Registration successfull! Please login.');
    }
}
