{{-- resources/views/posts/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

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

                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- tokia yra blade komentaru sintakse --}}