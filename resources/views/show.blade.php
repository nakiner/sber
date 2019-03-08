<!-- show.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="card" style="margin-top: 50px;">
        <div class="card-header">Просмотр вакансии</div>
        <div class="card-body">
                <div class="form-group">
                    <label for="name">Название вакансии:</label>
                    <input type="text" class="form-control" name="name" value="{{$vacancy->name}}" disabled/>
                </div>
                <div class="form-group">
                    <label for="description">Описание вакансии:</label>
                    <textarea type="text" class="form-control" name="description" disabled>{{$vacancy->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="description">Счетчик просмотров:</label>
                    <input type="text" class="form-control" name="name" value="{{$vacancy->counter}}" disabled/>
                </div>
        </div>
    </div>
@endsection