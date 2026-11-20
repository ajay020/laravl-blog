<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel Blog')</title>
</head>
<body>
    <header>
        <h1>My Laravel Blog</h1>

        <nav>
            <a href="{{ route('home') }}">Home</a>
        </nav>
    </header>

    <main>
        {{--  placeholder for the content of the page, which will be filled by the child views --}}
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2026 My Laravel Blog</p>
    </footer>
</body>
</html>