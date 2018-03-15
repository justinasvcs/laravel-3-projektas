{{-- resources/views/posts/single.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        <h1>{{ $post->title }} {{ $post->id }}</h1>
                        <p>
                            {{ $post->content }}
                        </p>

                        <p>
                            Vartotojas: {{ $post->user->email }}
                        </p>

                        <p>
                            Susiję produktai:

                            <ul>
                            @foreach($post->products as $product)
                                <li>{{ $product->title }}</li>
                            @endforeach
                            </ul>
                        </p>

                        <a href="{{ url('posts/edit/' . $post->id) }}">Redaguoti</a>

                        <form action="{{ url('posts/' . $post->id) }}" method="POST">
                            @csrf()
                            @method('DELETE')

                            <button type="submit">Ištrinti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection