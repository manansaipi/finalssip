@extends('layouts.main')

@section('container')

<div class="continer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $post->title }}</h2>
            
            <p>by: <a href="/authors/{{ $post->author->username }}"> {{ $post->author->name }}</a></p>
            <p><a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
            
            <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
            
            <article class="my-3 fs-5">
            
                {!! $post->body !!}
            
            </article>
            <br>
            <a href="/blog">Back</a>
        </div>
    </div>
</div>


    
    
@endsection