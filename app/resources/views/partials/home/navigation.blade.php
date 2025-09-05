<div class="navigation">
    <ul class="navigation__inner">
        @foreach($root_categories as $category)
            <li class="navigation__item">
                {{$category->name}}
            </li>
        @endforeach
    </ul>
</div>
