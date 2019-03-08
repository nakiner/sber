<!-- index.blade.php -->

@extends('layouts.admin')

@section('content')
    <div style="margin-top: 50px;">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            <br />
        @endif
        @if(!count($vacancies))
            <div class="alert alert-danger">Вакансий сейчас нет, добавьте новую</div>
            <br />
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Название</td>
                    <td>Описание</td>
                    <td>Счетчик</td>
                    <td colspan="2">Действие</td>
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
                            <a href="{{ route('vacancies.edit',$vacancy->id)}}" class="btn btn-primary">Изменить</a>
                        </td>
                        <td>
                            <form action="{{ route('vacancies.destroy', $vacancy->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            @if(!count($vacancies))
                <a href="{{ route('vacancies.create')}}" class="btn btn-primary">Добавить вакансию</a>
            @endif
        </table>
    </div>
@endsection