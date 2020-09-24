@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5 article-add"><span>Все типы</span><span><a href="/mpadmin/skills/add" class="btn btn-success">Добавить тип</a></span></h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Название</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($types as $key => $type)
                            <tr>
                                <td>#{{ $type->id }}</td>
                                <td>{{ $type->name }}</td>
                                <td class="status-item">@if($type->status == 0) <span>Не проверена</span>@endif @if($type->status == 1) <span class="green-back">Одобрена</span> @endif</td>
                                <td><a href="/mpadmin/skills/{{ $type->id }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                    <div class="btn-group">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-trash-alt"></i></button>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <li>
                                                <a class="dropdown-item" href="/mpadmin/skills/{{ $type->id }}/delete">Удалить тип</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1 class="pt-5 article-add"><span>Все жанры</span><span><a href="/mpadmin/genres/add" class="btn btn-success">Добавить жанр</a></span></h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Название</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($genres as $key => $genre)
                                <tr>
                                    <td>#{{ $genre->id }}</td>
                                    <td>{{ $genre->name }}</td>
                                    <td class="status-item">@if($genre->status == 0) <span>Не проверена</span>@endif @if($genre->status == 1) <span class="green-back">Одобрена</span> @endif</td>
                                    <td><a href="/mpadmin/genres/{{ $genre->id }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                        <div class="btn-group">
                                            <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-trash-alt"></i></button>
                                            <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <li>
                                                    <a class="dropdown-item" href="/mpadmin/genres/{{ $genre->id }}/delete">Удалить жанр</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
