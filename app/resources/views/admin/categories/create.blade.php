@extends('admin.layout')

@section('title', 'Добавить категорию')

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


    <h1 class="mb-4">Добавить категорию</h1>
    <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Название категории</label>
            <input type="text"class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="parent_id" class="form-label">Родительская категория</label>
            <select class="form-select" id="parent_id" name="parent_id">
                <option value="">Нет родительской категории</option>
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
        <a href="{{route('admin.categories.index')}}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection