<div class="category-slider">
    <div class="owl-carousel">
        @foreach($root_categories as $category)
            <div class="category-slider__item" style="background-image: linear-gradient(90deg,#242424, transparent), url('{{ asset('storage/' . $category->image_url)}}');">
                <div class="category-slider__item__content">
                    <h2 class="category-slider__item__header">{{$category->name}}</h2>
                    <p class="category-slider__item__description">{{$category->description}}</p>
                    <button class="category-slider__item__button">
                        Перейти в каталог
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>