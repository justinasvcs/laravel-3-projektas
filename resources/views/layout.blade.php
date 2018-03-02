{{-- resources/views/layout.blade.php --}}

<html>
    <head>
        <title>CRM - @yield('title')</title>
        <meta charset="UTF-8">
    </head>
    <body>
        @include('navigation')

        @if(session('message'))
            <div class="alert  alert-success">
                {{ session('message') }}
            </div>
        @endif

        @yield('content')
    </body>
</html>