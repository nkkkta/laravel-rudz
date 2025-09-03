@extends('admin.layout')

@section('title', 'Добавить товар')

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


    <h1 class="mb-4">Добавить товар</h1>
    <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название товара</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="is_available" class="form-label">Доступен?</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="is_available" id="is_available" value="1">
                <label class="form-check-label" for="is_available">Да / Нет</label> 
            </div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="number" class="form-control" id="price" name="price" step="1" min="0" required>
        </div>
        <div class="mb-3">
            <label for="categories" class="form-label">Категории</label>
            <select class="form-control" id="categories" name="categories[]" multiple>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="{{route('admin.products.index')}}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection