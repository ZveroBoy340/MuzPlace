@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5 article-add"><span>Все вопросы</span><span><a href="/mpadmin/faq/add" class="btn btn-success">Добавить вопрос</a></span></h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Вопрос</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faq as $key => $item)
                            <tr>
                                <td>#{{ $item->id }}</td>
                                <td>{{ $item->question }}</td>
                                <td class="status-item">@if($item->status == 0) <span>Не проверена</span>@endif @if($item->status == 1) <span class="green-back">Одобрена</span> @endif</td>
                                <td><a href="/mpadmin/faq/{{ $item->id }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                    <div class="btn-group">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-trash-alt"></i></button>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <li>
                                                <a class="dropdown-item" href="/mpadmin/faq/{{ $item->id }}/delete">Удалить вопрос</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-unlock-alt"></i></button>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <li>
                                                <a class="dropdown-item" href="/mpadmin/faq/{{ $item->id }}/status/1">Одобрить</a>
                                                <a class="dropdown-item" href="/mpadmin/faq/{{ $item->id }}/status/0">Не проверен</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$faq->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
