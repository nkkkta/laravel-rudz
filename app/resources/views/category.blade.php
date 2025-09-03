<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
    <h1>Categories</h1>
    <!-- @php
        dump($categories);
    @endphp -->
    @if(count($categories) > 0)
        <div class="category-list">
            @foreach($categories as $category)
                <div class="category">
                    <h2>{{$category->name}}</h2>
                </div>
            @endforeach
        </div>
    @endif
</body>
</html>