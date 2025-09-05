@extends('admin.layout')
@section('title', 'Категории')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="mb-0">Категории</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Добавить категорию</a>
    </div>

    {{-- Оберните таблицу в контейнер с классом table-responsive --}}
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Подкатегории</th>
                    <th>Изображение</th>
                    <th>Дата создания</th>
                    <th>Дата редактирования</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Подкатегории
                                </button>
                                <ul class="dropdown-menu">
                                    @forelse ($category->children as $subcategory)
                                        <li><span class="dropdown-item">{{$subcategory->name}}</span></li>
                                    @empty
                                        <li><span class="dropdown-item">Нет подкатегорий</span></li>
                                    @endforelse
                                </ul>
                            </div>
                        </td>
                        <td>{{$category->image_url}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
                        <td class="text-end text-nowrap">
                        <div class="d-flex flex-column gap-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm w-100">Изменить</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Вы уверены?')" class="w-100">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm w-100">Удалить</button>
                            </form>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection