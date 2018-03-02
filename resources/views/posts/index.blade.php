{{-- resources/views/posts/index.blade.php --}}
@extends('layout')

@section('title')
   Visi įrašai
@endsection

@section('content')
    cia bus visi įrašai<br><br>

    siandien yra {{ $todayDate }}

    @foreach ($posts as $post)
        <h1>
            <a href="{{ url('posts/' . $post->id) }}">
                {{ $post->title }}
            </a>
        </h1>

        <p>
            {{ $post->content }}
        </p>
    @endforeach
@endsection

{{-- tokia yra blade komentaru sintakse --}}