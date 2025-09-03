@extends('admin.layout')

@section('title', 'Панель управления')

@section('content')
    <h1 class="mb-4">Панель управления</h1>
    <div class="row">
        @foreach($models as $model)
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <a href="{{route($model['route'])}}">
                            <h4>{{$model['name']}}</h4>
                        </a>
                    </div>
                    <div class="card-body">
                        <!-- <a href="" class="btn btn-primary">Добавить</a>
                        <a href="" class="btn btn-primary">Изменить</a> -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection