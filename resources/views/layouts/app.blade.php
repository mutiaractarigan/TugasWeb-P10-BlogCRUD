<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog') — TugasWeb P10</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar">
        <a href="{{ route('posts.index') }}" class="brand">Blog CRUD</a>
        <a href="{{ route('posts.create') }}">+ Tulis Post</a>
    </nav>

    <main class="container">
        @if (session('success'))
            <x-alert type="success">{{ session('success') }}</x-alert>
        @endif

        @if (session('error'))
            <x-alert type="error">{{ session('error') }}</x-alert>
        @endif

        @yield('content')
    </main>

    <footer>&copy; {{ date('Y') }} TugasWeb-P10-BlogCRUD</footer>
</body>
</html>
