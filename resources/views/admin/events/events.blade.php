@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5">Все мероприятия</h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Обложка</th>
                                <th scope="col">Название</th>
                                <th scope="col">Тип мероприятия</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $key => $event)
                            <tr>
                                <td>#{{ $event->id }}</td>
                                <td class="ava-user"><img @if($event->cover) src="/uploads/images/{{ $event->cover }}" @else src="/images/event.png" @endif alt=""></td>
                                <td>{{ $event->name }}</td>
                                <td>{{ $types[$event->type - 1]->name }}</td>
                                <td class="status-item">@if($event->status == 'check') <span>Не проверен</span> @elseif($event->status == 'accept') <span class="green-back">Одобрен</span> @else <span class="red-back">Отклонен</span> @endif</td>
                                <td><a href="/mpadmin/events/{{ $event->id }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                    <div class="btn-group">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-trash-alt"></i></button>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <li>
                                                <a class="dropdown-item" href="/mpadmin/events/{{ $event->id }}/delete">Удалить мероприятие</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-unlock-alt"></i></button>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <li>
                                                <a class="dropdown-item" href="/mpadmin/events/{{ $event->id }}/status/accept">Одобрить</a>
                                                <a class="dropdown-item" href="/mpadmin/events/{{ $event->id }}/status/decline">Отклонить</a>
                                                <a class="dropdown-item" href="/mpadmin/events/{{ $event->id }}/status/check">Не проверен</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$events->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
