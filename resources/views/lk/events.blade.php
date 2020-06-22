@extends('layouts.app')

@section('content')
    <section class="lk-events">
        <div class="center-wrap">
            @auth
                @if (Auth::user()->status  == "artist")
                    <div class="change-list-event">
                        <button class="btn active" id="btn_my_response">Мои отклики</button>
                        <button class="btn no-active" id="btn_my_party">Я участник</button>
                    </div>
                @endif
            @endauth
            <div class="list-event-flex">
                <div class="lk-list active" id="my-response">
                    <div class="lk-list__header">
                        <p>Дата</p>
                        <p>Название</p>
                        <p>Начало</p>
                        <p>Окончание</p>
                        <p>Статус</p>
                        @if (Auth::user()->status  == "organizator")<p>Заявок</p> @elseif (Auth::user()->status  == "artist") <p>Аудитория</p> @endif
                    </div>
                    @if (Auth::user()->status  == "organizator")
                        @if ($my_events)
                            @foreach ($my_events as $item => $key)
                                <div class="lk-list__item @if (DateTime::createFromFormat('Y-m-d', $my_events_data[$item][0][0])->format('d.m.Y') == date("d.m.Y")) active-event @endif @if (DateTime::createFromFormat('Y-m-d', $my_events_data[$item][0][0])->format('d.m.Y') < date("d.m.Y")) ended-event @endif">
                                    <p>{{DateTime::createFromFormat('Y-m-d', $my_events_data[$item][0][0])->format('d.m.Y')}}</p>
                                    <p><a href="/lk-event/{{$key->id}}/proposal/">{{$key->name}}</a></p>
                                    <p>{{DateTime::createFromFormat('Y-m-d', $my_events_data[$item][0][0])->format('d.m.Y')}}</p>
                                    <p>{{ DateTime::createFromFormat('Y-m-d', $my_events_data[$item][count($my_events_data[$item])-1][0])->format('d.m.Y') }}</p>
                                    <p>@if($key->status == "open")Открыто@endif @if($key->status == "check")На проверке@endif @if($key->status == "closed")Закрыто@endif</p>
                                    <p>{{$proposals_count[$item]}}</p>
                                    <p class="event-logo"><img src="/uploads/images/{{$key->cover}}" alt=""></p>
                                    <p class='lk-events__edit edit-event'><a href="/edit-event/{{$key->id}}"></a></p>
                                    <p class='lk-events__edit delete-event'><a href="/delete-event/{{$key->id}}"></a></p>
                                </div>
                            @endforeach
                        @endif
                    @elseif (Auth::user()->status  == "artist")
                        @foreach ($my_proposals_check as $item => $key)
                            <div class="lk-list__item @if (DateTime::createFromFormat('Y-m-d', $proposals_check_date[$item][0][0][0])->format('d.m.Y') == date("d.m.Y")) active-event @endif @if (DateTime::createFromFormat('Y-m-d', $proposals_check_date[$item][0][0][0])->format('d.m.Y') < date("d.m.Y")) ended-event @endif">
                                <p>{{DateTime::createFromFormat('Y-m-d', $proposals_check_date[$item][0][0][0])->format('d.m.Y')}}</p>
                                <p><a href="/event/{{$key[0][0]->id}}">{{$key[0][0]->name}}</a></p>
                                <p>{{DateTime::createFromFormat('Y-m-d', $proposals_check_date[$item][0][0][0])->format('d.m.Y')}}</p>
                                <p>{{ DateTime::createFromFormat('Y-m-d', $proposals_check_date[$item][0][count($proposals_check_date[$item][0])-1][0])->format('d.m.Y') }}</p>
                                <p>@if($key[0][0]->status == "open")Открыто@endif @if($key[0][0]->status == "check")На проверке@endif @if($key[0][0]->status == "closed")Закрыто@endif</p>
                                <p><img src="img/{{$key[0][0]->people}}people.png" alt=""></p>
                                <p class="event-logo"><img src="/uploads/images/{{$key[0][0]->cover}}" alt=""></p>
                                <p class='lk-events__edit delete-event once' style="padding: 0px 10px;"><a href="/delete-proposal/{{$item}}"></a></p>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="lk-list" id="my-party">
                    <div class="lk-list__header">
                        <p>Дата</p>
                        <p>Название</p>
                        <p>Начало</p>
                        <p>Окончание</p>
                        <p>Статус</p>
                        <p>Аудитория</p>
                    </div>
                    @if (Auth::user()->status  == "artist")
                        @foreach ($my_proposals_accept as $item => $key)
                            <div class="lk-list__item @if (DateTime::createFromFormat('Y-m-d', $proposals_accept_date[$item][0][0][0])->format('d.m.Y') == date("d.m.Y")) active-event @endif @if (DateTime::createFromFormat('Y-m-d', $proposals_accept_date[$item][0][0][0])->format('d.m.Y') < date("d.m.Y")) ended-event @endif">
                                <p>{{DateTime::createFromFormat('Y-m-d', $proposals_accept_date[$item][0][0][0])->format('d.m.Y')}}</p>
                                <p><a href="/event/{{$key[0][0]->id}}">{{$key[0][0]->name}}</a></p>
                                <p>{{DateTime::createFromFormat('Y-m-d', $proposals_accept_date[$item][0][0][0])->format('d.m.Y')}}</p>
                                <p>{{ DateTime::createFromFormat('Y-m-d', $proposals_accept_date[$item][0][count($proposals_accept_date[$item][0])-1][0])->format('d.m.Y') }}</p>
                                <p>@if($key[0][0]->status == "open")Открыто@endif @if($key[0][0]->status == "check")На проверке@endif @if($key[0][0]->status == "closed")Закрыто@endif</p>
                                <p><img src="img/{{$key[0][0]->people}}people.png" alt=""></p>
                                <p class="event-logo"><img src="/uploads/images/{{$key[0][0]->cover}}" alt=""></p>
                                <p class='lk-events__edit edit-event review-event'><a href="/edit-event/{{$key[0][0]->id}}"></a></p>
                                <p class='lk-events__edit delete-event'><a href="/delete-proposal/{{$item}}"></a></p>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div id="calendar"></div>
            </div>
        </div>
    </section>
@endsection
