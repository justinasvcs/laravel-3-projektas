{{-- resources/views/navigation.blade.php --}}

<nav>
    <ul>
        <li><a href="/">Pradinis</a></li>
        <li><a href="{{ url('/posts') }}">Visi įrašai</a></li>
        <li><a href="{{ url('/posts/create') }}">Naujas įrašas</a></li>
    </ul>
</nav>