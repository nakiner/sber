<!-- add.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="card" style="margin-top: 50px;">
        <div class="card-header">Добавить вакансию</div>
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
            <form method="post" action="{{ route('vacancies.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Название вакансии:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="desctiption">Описание ванасии:</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="counter">Счетчик:</label>
                    <input type="text" class="form-control" name="counter"/>
                </div>
                <button type="submit" class="btn btn-primary">Создать вакансию</button>
            </form>
        </div>
    </div>
@endsection