<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main-container">
        <div class="pre-header">
            <div class="left">
                <a href="{{ url('/about') }}">О компании</a>
                <a href="{{url('/qa')}}">Вопрос-Ответ</a>
                <a href="{{url('/news')}}">Новости</a>
            </div>
            <div class="left">
                <a href="{{ url('/login')}}">Войти</a>
                <a href="{{ url('/register')}}">Регистрация</a>
            </div>
        </div>
    </div>
</body>
</html>