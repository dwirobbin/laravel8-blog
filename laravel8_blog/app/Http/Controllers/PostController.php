<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = '';

        if (request(['category'])) {
            $category = Category::firstWhere('slug', request('category'));
            $title = " in " . $category->name;
        }

        if (request(['author'])) {
            $author = User::firstWhere('username', request('author'));
            $title = " by " . $author->name;
        }

        return view('layouts.front.posts', [
            'title' => "All Post $title",
            'posts' => Post::with(['author', 'category'])->latest()->filter(request([
                'search',
                'category',
                'author'
            ]))->paginate(4)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('layouts.front.post', [
            'title' => 'Single Post',
            'post' => $post
        ]);
    }
}
