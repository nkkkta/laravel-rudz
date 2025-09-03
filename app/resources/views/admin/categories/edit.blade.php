@extends('admin.layout')

@section('title', 'Изменить категорию')

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

    <h1 class="mb-4">Изменить категорию</h1>
    //Забыл enctype - ебался час
    <form action="{{route('admin.categories.update', $category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Название категории</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{$category->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="parent_id" class="form-label">Родительская категория</label>
            <select class="form-select" id="parent_id" name="parent_id">
                <option value="">Нет родительской категории</option>
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}" @if($category->parent_id == $cat->id) selected @endif>{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            @if ($category->image_url)
                <div class="mb-2">
                    <p>Текущее изображение:</p>
                    <img src="{{ Storage::url($category->image_url) }}" alt="{{ $category->name }}" style="max-width: 150px; height: auto; border: 1px solid #ccc;">
                </div>
            @else
                <p>Изображение отсутствует.</p>
            @endif
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-success">Обновить</button>
        <a href="{{route('admin.categories.index')}}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection