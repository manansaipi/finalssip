


@extends('layouts.main')

@section('container')
<h1>{{ $title }}</h1>
    @foreach ($posts as $post)
    <article class="mb-5 border-bottom pb-4">
        <h2>
            <a class="text-decoration-none" href="/posts/{{ $post->slug }}"> {{ $post->title }}</a>
        </h2>
        <h5><a class="text-decoration-none"  href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
        
        <h5>by: <a href="/authors/{{ $post->author->username }}"> {{ $post->author->name }}</a></h5>
        <p>{{ $post->excerpt }}</p>
        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read More</a>
    </article>
    @endforeach

@endsection