<div class="product-slider">
    <h2 class="product-slider__header">Популярные товары</h2>
    <div class="owl-carousel">
        @foreach($products as $product)
            @include('components.product-card')
        @endforeach
    </div>
</div>