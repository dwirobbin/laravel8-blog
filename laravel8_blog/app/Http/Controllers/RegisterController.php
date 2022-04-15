<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['store']);
    }

    public function index()
    {
        return view('layouts.auth.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:255',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:5|max:255'
        ];

        $messages = [
            'name.required' => 'nama tidak boleh kosong',
            'name.min' => 'nama harus minimal 3 karakter',
            'name.max' => 'nama harus maksimal 255 karakter',
            'email.required' => 'email tidak boleh kosong',
            'email.unique' => 'email sudah digunakan',
            'email.email' => 'format email salah',
            'password.required' => 'password tidak boleh kosong',
            'password.min' => 'password harus minimal 5 karakter',
            'password.max' => 'password harus maksimal 255 karakter'
        ];

        $this->validate($request, $rules, $messages);

        User::create([
            'name' => Str::title($request->name),
            'username' => Str::slug($request->name),
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Registration successull!, Please login');
    }
}
