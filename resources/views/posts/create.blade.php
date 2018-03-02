@extends('layout')

@section('title')
    Naujas įrašas
@endsection

@section('content')
    <form action="{{ url('posts') }}" method="POST">
        @include('posts.form')
    </form>
@endsection