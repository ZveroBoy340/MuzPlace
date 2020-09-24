@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5 article-add"><span>Все статьи</span><span><a href="/mpadmin/articles/add" class="btn btn-success">Добавить статью</a></span></h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Миниатюра</th>
                                <th scope="col">Заголовок</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $key => $article)
                            <tr>
                                <td>#{{ $article->id }}</td>
                                <td class="ava-user"><img @if($article->image) src="/uploads/images/{{ $article->image }}" @else src="/images/artist.png" @endif alt=""></td>
                                <td>{{ $article->title }}</td>
                                <td>{{ date('d.m.Y', strtotime($article->date)) }}</td>
                                <td class="status-item">@if($article->status == 0) <span>Не проверена</span>@endif @if($article->status == 1) <span class="green-back">Одобрена</span> @endif</td>
                                <td><a href="/mpadmin/articles/{{ $article->id }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                    <div class="btn-group">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-trash-alt"></i></button>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <li>
                                                <a class="dropdown-item" href="/mpadmin/articles/{{ $article->id }}/delete">Удалить статью</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-unlock-alt"></i></button>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <li>
                                                <a class="dropdown-item" href="/mpadmin/articles/{{ $article->id }}/status/1">Одобрить</a>
                                                <a class="dropdown-item" href="/mpadmin/articles/{{ $article->id }}/status/0">Не проверен</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$articles->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
