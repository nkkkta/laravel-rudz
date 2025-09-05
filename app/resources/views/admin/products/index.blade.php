@extends('admin.layout')
@section('title', 'Товары')
@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="mb-0">Товары</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">Добавить товар</a>
    </div>
    
    {{-- Оберните таблицу в контейнер с классом table-responsive --}}
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Название</th>
                    <th>Категории</th>
                    <th>Наличие</th>
                    <th>Изображение</th>
                    <th>Рейтинг</th>
                    <th>Дата создания</th>
                    <th>Дата редактирования</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Категории
                                </button>
                                <ul class="dropdown-menu">
                                    @forelse ($product->categories as $category)
                                        <li><span class="dropdown-item">{{$category->name}}</span></li>
                                    @empty
                                        <li><span class="dropdown-item">Нет категорий</span></li>
                                    @endforelse
                                </ul>
                            </div>
                        </td>
                        <td>
                            @if ($product->is_available)
                                <span class="badge bg-success">Доступен</span>
                            @else
                                <span class="badge bg-danger">Нет в наличии</span>
                            @endif
                        </td>
                        <td>{{$product->image_url}}</td>
                        <td>{{$product->rating}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>{{$product->updated_at}}</td>
                        <td class="text-end text-nowrap">
                            <div class="d-flex flex-column gap-2">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm w-100">Изменить</a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Вы уверены?')" class="w-100">
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