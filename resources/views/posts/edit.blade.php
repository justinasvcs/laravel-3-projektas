@extends('layout')

@section('title')
    Redaguojamas įrašas
@endsection

@section('content')
    <form action="{{ url('posts/' . $post->id) }}" method="POST">
        @method('PUT')

        @include('posts.form')
    </form>
@endsection