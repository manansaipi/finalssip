@extends('layouts.main')

@section('container')
    <article>
    <h2>{{ $post->title }}</h2>
    <p>by: <a href="/authors/{{ $post->author->username }}"> {{ $post->author->name }}</a></p>
    <p><a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
    {!! $post->body !!}
    </article>

    <a href="/blog">Back</a>
@endsection