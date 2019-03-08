<!-- edit.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="card" style="margin-top: 50px;">
        <div class="card-header">Редактирование вакансии</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('vacancies.update', $vacancy->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Название вакансии:</label>
                    <input type="text" class="form-control" name="name" value="{{$vacancy->name}}"/>
                </div>
                <div class="form-group">
                    <label for="description">Описание вакансии:</label>
                    <textarea type="text" class="form-control" name="description">{{$vacancy->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="counter">Счетчик:</label>
                    <input type="text" class="form-control" name="counter" value="{{$vacancy->counter}}"/>
                </div>
                <button type="submit" class="btn btn-primary">Обновить вакансию</button>
            </form>
        </div>
    </div>
@endsection