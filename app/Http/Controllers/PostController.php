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
            'active' => 'blog',
            // 'posts' => Post::all()
            'posts' => Post::latest()->get()
        ]);
    }
    public function show(Post $post)
    {
        return view('post', [
            'title' => 'Single Post',
            'active' => 'blog',
            'post' => $post
        ]);
    }
    public function showListCategories()
    {
        return view('categories', [
            'title' => 'Post Categories',
            'active' => 'categories',
            'categories' => Category::all()
        ]);
    }
    public function showPostBaseOnCategory(Category $category)
    {
        return view('blog', [
            'title' => "Post By Category :  $category->name",
            'active' => 'blog',
            'posts' => $category->posts->load('author', 'category'),

        ]);
    }
    public function showPostBaseOnUser(User $author)
    {
        return view('blog', [
            'title' => "Post By Author :  $author->name",
            'active' => 'blog',
            'posts' => $author->posts->load('category', 'author'),
        ]);
    }
}
