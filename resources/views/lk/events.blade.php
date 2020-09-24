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
                    @if (Auth::user()->status  == "organizator")
                        @if ($my_events != null && count($my_events) > 0)
                            <div class="lk-list__header">
                                <p>Дата</p>
                                <p>Название</p>
                                <p>Начало</p>
                                <p>Окончание</p>
                                <p>Статус</p>
                                @if (Auth::user()->status  == "organizator")<p>Заявок</p> @elseif (Auth::user()->status  == "artist") <p>Аудитория</p> @endif
                            </div>
                            @foreach ($my_events as $item => $key)
                                <div class="lk-list__item @if (strtotime(date($my_events_data[$item][0][0])) == strtotime(date("d.m.Y"))) active-evente @elseif (strtotime(date($my_events_data[$item][0][0])) < strtotime(date("d.m.Y"))) ended-event @endif">
                                    <p>{{$my_events_data[$item][0][0]}}</p>
                                    <p><a href="/lk-event/{{$key->id}}/proposal/">{{$key->name}}</a></p>
                                    <p>{{$my_events_data[$item][0][1]}}</p>
                                    <p>{{$my_events_data[$item][0][2]}}</p>
                                    <p>@if($key->status == "accept")Одобрен@endif @if($key->status == "check")На проверке@endif @if($key->status == "decline")Отклонен@endif</p>
                                    <p class="count-proposal"><a href="/lk-event/{{$key->id}}/proposal/">{{$proposals_count[$item]}}</a></p>
                                    <p class="event-logo"><img src="/uploads/images/{{$key->cover}}" alt=""></p>
                                    <p class='lk-events__edit edit-event'><a href="/edit-event/{{$key->id}}"></a></p>
                                    <p class='lk-events__edit delete-event'><a class="del-event" data-del-href="/delete-event/{{$key->id}}"></a></p>
                                </div>
                            @endforeach
                        @else
                            <div class="no-events"><span class="icon-warning">!</span>Вы еще не создали ни одного мероприятия
                                <div class="no-event-btn"><a href="/create-event">Создать мероприятие</a></div></div>
                        @endif
                    @elseif (Auth::user()->status  == "artist")
                        @if ($my_proposals_check)
                            <div class="lk-list__header">
                                <p>Дата</p>
                                <p>Название</p>
                                <p>Начало</p>
                                <p>Окончание</p>
                                <p>Статус</p>
                                @if (Auth::user()->status  == "organizator")<p>Заявок</p> @elseif (Auth::user()->status  == "artist") <p>Аудитория</p> @endif
                            </div>
                            @foreach ($my_proposals_check as $item => $key)
                                <div class="lk-list__item @if ($key[1][0] == 'decline' || strtotime($proposals_check_date[$item][0][0])  < strtotime(date("d.m.Y"))) ended-event @endif">
                                    <p>{{$proposals_check_date[$item][0][0]}}</p>
                                    <p><a href="/event/{{$key[0][0]->id}}">{{$key[0][0]->name}}</a></p>
                                    <p>{{$proposals_check_date[$item][0][1]}}</p>
                                    <p>{{$proposals_check_date[$item][0][2]}}</p>
                                    <p>@if($key[0][0]->status == "open")Открыто@endif @if($key[1][0] == "check")На проверке@endif @if($key[1][0] == "decline")Отказано@endif</p>
                                    <p><img src="img/{{$key[0][0]->people}}people.png" alt=""></p>
                                    <p class="event-logo"><img src="/uploads/images/{{$key[0][0]->cover}}" alt=""></p>
                                    <p class='lk-events__edit delete-event once' style="padding: 0px 10px;"><a class="del-proposal" data-del-href="/delete-proposal/{{$item}}"></a></p>
                                </div>
                            @endforeach
                        @else
                            <div class="no-events"><span class="icon-warning">!</span>У Вас нет заявок ожидающих проверки организатором</div>
                        @endif
                    @endif
                </div>
                @if (Auth::user()->status  == "artist")
                        <div class="lk-list" id="my-party">
                            @if($my_proposals_accept)
                                <div class="lk-list__header">
                                    <p>Дата</p>
                                    <p>Название</p>
                                    <p>Начало</p>
                                    <p>Окончание</p>
                                    <p>Статус</p>
                                    <p>Аудитория</p>
                                </div>
                                @foreach ($my_proposals_accept as $item => $key)
                                    <div class="lk-list__item @if (strtotime($proposals_accept_date[$item][0][0]) == strtotime(date("d.m.Y"))) active-evente @endif @if (strtotime($proposals_accept_date[$item][0][0]) < strtotime(date("d.m.Y"))) ended-event @endif">
                                        <p>{{$proposals_accept_date[$item][0][0]}}</p>
                                        <p><a href="/event/{{$key[0][0]->id}}">{{$key[0][0]->name}}</a></p>
                                        <p>{{$proposals_accept_date[$item][0][1]}}</p>
                                        <p>{{$proposals_accept_date[$item][0][2]}}</p>
                                        <p>Участник</p>
                                        <p><img src="img/{{$key[0][0]->people}}people.png" alt=""></p>
                                        <p class="event-logo"><img src="/uploads/images/{{$key[0][0]->cover}}" alt=""></p>
                                       @if(date($proposals_accept_date[$item][0][0]) < date("d.m.Y")) <p class='lk-events__edit edit-event review-event'><a href="/add_review/{{$item}}"></a></p> @endif
                                        <p class='lk-events__edit delete-event'><a class="del-proposal" data-del-href="/delete-proposal/{{$item}}"></a></p>
                                    </div>
                                @endforeach
                            @else
                                <div class="no-events"><span class="icon-warning">!</span>У Вас нет заявок которые были приняты к участию в мероприятиях</div>
                            @endif
                        </div>
                @endif
                <div class="datepicker-here"></div>
            </div>
            @if (count($owner_events) > 0)
                <section class="event-slider">
                    <h2 class='simple-sub-title simple-sub-title--link'>Ближайшие мероприятия <a href="{{ route('events') }}">показать все</a></h2>
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($owner_events as $id => $event)
                                <div class="swiper-slide">
                                    <div class="event-item">
                                        <div class="event-item__img">
                                            <a href="/event/{{$event->id}}"><img src="/uploads/images/{{$event->cover}}" alt=""></a>
                                        </div>
                                        <div class="event-item__content">
                                            <div class="event-item__date">
                                                <span>{{ mb_strimwidth(Date::parse($event_data[$id][0][0])->format('D'), 0, 2, "") }}</span>
                                                <p>{{ Date::parse($event_data[$id][0][0])->format('j') }}</p>
                                                <span>{{ Date::parse($event_data[$id][0][0])->format('M') }}</span>
                                            </div>
                                            <div class="event-item__info">
                                                <span class="event-item__type">{{$type_events[$id][0]}}</span>
                                                <h3 class="event-item__title"><a href="/event/{{$event->id}}">{{$event->name}}</a></h3>
                                                <p class="event-item__time">с {{$event_data[$id][0][1]}} до {{$event_data[$id][0][2]}}</p>
                                                <p class="event-item__place">{{$owner_login[$id][0]}}</p>
                                            </div>
                                        </div>
                                        <div class="event-item__bot">
                                            <div class="event-item__who">
                                                {{--<span>гитаристы</span>
                                                <span>рэперы</span>
                                                <span>ведущие</span>--}}
                                            </div>
                                            <div class="event-item__places">{{$places[$id][0]}}@if ($places[$id][0] == 1) место @elseif($places[$id][0] == 2 || $places[$id][0] == 3 || $places[$id][0] == 4) места @else мест @endif</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </section>
@endsection

@section('custom_scripts')
    <script>
        var reserved_days = new Array();
        @foreach ($reserved_calendar as $num => $date)
        reserved_days.push('{{$date[0]}} 00:00:00');
        @endforeach

        $('.lk-events .datepicker-here').datepicker({
            onRenderCell: function(date, cellType) {
                var i;
                for (i = 0; i < reserved_days.length; i++) {
                    var pattern = /(\d{2})\.(\d{2})\.(\d{4})/;
                    var dates = new Date(reserved_days[i].replace(pattern,'$3-$2-$1'));
                    if (cellType == 'day' && date.getDate() == dates.getDate() && date.getMonth() == dates.getMonth()) {
                        return {
                            classes: 'accepted-date'
                        }
                    }
                }
            }
        });
    </script>
@endsection
