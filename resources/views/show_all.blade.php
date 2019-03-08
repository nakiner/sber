<!-- show_all.blade.php -->

@extends('layouts.admin')

@section('content')
    <div style="margin-top: 50px;">
        @if(!count($vacancies))
            <div class="alert alert-danger">Вакансий сейчас нет</div>
            <br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Название</td>
                <td>Описание</td>
                <td>Счетчик</td>
                <td>Действие</td>
            </tr>
            </thead>
            <tbody>
            @foreach($vacancies as $vacancy)
                <tr>
                    <td>{{$vacancy->id}}</td>
                    <td>{{$vacancy->name}}</td>
                    <td>{{$vacancy->description}}</td>
                    <td>{{$vacancy->counter}}</td>
                    <td>
                        <a href="{{ route('vacancies.show',$vacancy->id)}}" class="btn btn-primary">Просмотр</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection