{{-- resources/views/posts/single.blade.php --}}
@extends('layout')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <h1>{{ $post->title }} {{ $post->id }}</h1>
    <p>
        {{ $post->content }}
    </p>

    <a href="{{ url('posts/edit/' . $post->id) }}">Redaguoti</a>

    <form action="{{ url('posts/' . $post->id) }}" method="POST">
        @csrf()
        @method('DELETE')

        <button type="submit">Ištrinti</button>
    </form>
@endsection