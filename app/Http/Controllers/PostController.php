<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        return view('blog', [
            'title' => 'All Posts',
            // 'posts' => Post::all()
            'posts' => Post::latest()->get()
        ]);
    }
    public function show(Post $post)
    {
        return view('post', [
            'title' => 'Single Post',
            'post' => $post
        ]);
    }
    public function showListCategories()
    {
        return view('categories', [
            'title' => 'Post Categories',
            'categories' => Category::all()
        ]);
    }
    public function showPostBaseOnCategory(Category $category)
    {
        return view('blog', [
            'title' => "Post By Category :  $category->name",
            'posts' => $category->posts,

        ]);
    }
    public function showPostBaseOnUser(User $author)
    {
        return view('blog', [
            'title' => "Post By Author :  $author->name",
            'posts' => $author->posts,
        ]);
    }
}
