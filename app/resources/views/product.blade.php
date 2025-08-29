<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <h1>Product</h1>
    <!-- @php
        dump($products);
    @endphp -->
    @if(count($products) > 0)
        <div class="product-list">
            @foreach($products as $product)
                <div class="product">
                    <h2>{{$product->name}}</h2>
                </div>
            @endforeach
        </div>
    @endif
</body>
</html>