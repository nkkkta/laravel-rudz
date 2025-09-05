@vite(['resources/scss/admin.scss', 'resources/js/admin.js'])

<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Администратор')</title>
</head>
<body>
    <div class="main-container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Администратор</a>
            <a class="btn btn-outline-light me-2" href="/">На сайт</a>
        </div>
    </nav>
    </div>
        <div class="container mt-4">
            @yield('content')
        </div>
    </div>
</body>
</html>