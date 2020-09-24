@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5 article-add"><span>Все страницы</span><span><a href="/mpadmin/pages/add" class="btn btn-success">Добавить страницу</a></span></h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Заголовок</th>
                                <th scope="col">URL</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $key => $page)
                            <tr>
                                <td>#{{ $page->id }}</td>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->url }}</td>
                                <td class="status-item">@if($page->status == 0) <span>Не проверена</span>@endif @if($page->status == 1) <span class="green-back">Одобрена</span> @endif</td>
                                <td><a href="/mpadmin/pages/{{ $page->id }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                    <div class="btn-group">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-trash-alt"></i></button>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <li>
                                                <a class="dropdown-item" href="/mpadmin/pages/{{ $page->id }}/delete">Удалить статью</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-unlock-alt"></i></button>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <li>
                                                <a class="dropdown-item" href="/mpadmin/pages/{{ $page->id }}/status/1">Одобрить</a>
                                                <a class="dropdown-item" href="/mpadmin/pages/{{ $page->id }}/status/0">Не проверен</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$pages->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
