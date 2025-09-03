@extends('admin.layout')

@section('title', 'Изменить товар')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 class="mb-4">Изменить товар</h1>
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Название товара</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="is_available" class="form-label">Доступен?</label>
            <div class="form-check form-switch">
                <input type="hidden" name="is_available" value="0">
                <input class="form-check-input" type="checkbox" role="switch" name="is_available" id="is_available" value="1" @checked($product->is_available)>
                <label class="form-check-label" for="is_available">Да / Нет</label> 
            </div>
        </div>
        
        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" value="{{ $product->price }}" required>
        </div>
        
        <div class="mb-3">
            <label for="rating" class="form-label">Рейтинг</label>
            <input type="number" class="form-control" id="rating" name="rating" step="0.1" min="0" max="5" value="{{ $product->rating }}">
        </div>

        <div class="mb-3">
            <label for="categories" class="form-label">Категории</label>
            <select class="form-control" id="categories" name="categories[]" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(in_array($category->id, $productCategories)) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            @if ($product->image_url)
                <div class="mb-2">
                    <p>Текущее изображение:</p>
                    <img src="{{ Storage::url($product->image_url) }}" alt="{{ $product->name }}" style="max-width: 150px; height: auto; border: 1px solid #ccc;">
                </div>
            @else
                <p>Изображение отсутствует.</p>
            @endif
            <input type="file" class="form-control" id="image" name="image">
        </div>
        
        <button type="submit" class="btn btn-success">Обновить</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection