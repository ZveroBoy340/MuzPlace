<div class="events-liste">
    <section class="events">
        <div class="center-wrap">
            <h2 class='simple-sub-title'>На этой неделе</h2>
            <div class="events__list">
                @if(count($week_events) > 0)
                    @foreach ($week_events as $id => $event)
                        <div class="event-item">
                            <div class="event-item__img">
                                <a href="/event/{{$event->id}}"><img src="/uploads/images/{{$event->cover}}" alt=""></a>
                            </div>
                            <div class="event-item__content">
                                <div class="event-item__date">
                                    <span>{{ mb_strimwidth(Date::parse($event_data[$id][0])->format('D'), 0, 2, "") }}</span>
                                    <p>{{ Date::parse($event_data[$id][0])->format('j') }}</p>
                                    <span>{{ Date::parse($event_data[$id][0])->format('M') }}</span>
                                </div>
                                <div class="event-item__info">
                                    <span class="event-item__type">{{$type_events[$id]}}</span>
                                    <h3 class="event-item__title"><a href="/event/{{$event->id}}">{{$event->name}}</a></h3>
                                    <p class="event-item__time">с {{$event_data[$id][1]}} до {{$event_data[$id][2]}}</p>
                                    <p class="event-item__place">{{$owner_login[$id]}}</p>
                                </div>
                            </div>
                            <div class="event-item__bot">
                                <div class="event-item__who">
                                    <span>гитаристы</span>
                                    <span>рэперы</span>
                                    <span>ведущие</span>
                                </div>
                                <div class="event-item__places">{{$places[$id]}}@if ($places[$id] == 1) место @elseif($places[$id] == 2 || $places[$id] == 3 || $places[$id] == 4) места @else мест @endif</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="no-week-events">Не найдено ближайших мероприятий на этой неделе</div>
                @endif
                <div class="event-item event-item--hide"></div>
                <div class="event-item event-item--hide"></div>
            </div>
        </div>
    </section>
    <section class="events">
        <div class="center-wrap">
            <h2 class='simple-sub-title'>Через 1 неделю</h2>
            <div class="events__list">
                @if(count($week_events_two) > 0)
                    @foreach ($week_events_two as $id => $event)
                        <div class="event-item">
                            <div class="event-item__img">
                                <a href="/event/{{$event->id}}"><img src="/uploads/images/{{$event->cover}}" alt=""></a>
                            </div>
                            <div class="event-item__content">
                                <div class="event-item__date">
                                    <span>{{ mb_strimwidth(Date::parse($event_data_two[$id][0])->format('D'), 0, 2, "") }}</span>
                                    <p>{{ Date::parse($event_data_two[$id][0])->format('j') }}</p>
                                    <span>{{ Date::parse($event_data_two[$id][0])->format('M') }}</span>
                                </div>
                                <div class="event-item__info">
                                    <span class="event-item__type">{{$type_events_two[$id]}}</span>
                                    <h3 class="event-item__title"><a href="/event/{{$event->id}}">{{$event->name}}</a></h3>
                                    <p class="event-item__time">с {{$event_data_two[$id][1]}} до {{$event_data_two[$id][2]}}</p>
                                    <p class="event-item__place">{{$owner_login_two[$id]}}</p>
                                </div>
                            </div>
                            <div class="event-item__bot">
                                <div class="event-item__who">
                                    <span>гитаристы</span>
                                    <span>рэперы</span>
                                    <span>ведущие</span>
                                </div>
                                <div class="event-item__places">{{$places_two[$id]}}@if ($places_two[$id] == 1) место @elseif($places_two[$id] == 2 || $places_two[$id] == 3 || $places_two[$id] == 4) места @else мест @endif</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="no-week-events">Не найдено ближайших мероприятий через 1 неделю</div>
                @endif
                <div class="event-item event-item--hide"></div>
                <div class="event-item event-item--hide"></div>
            </div>
        </div>
    </section>
    <section class="events">
        <div class="center-wrap">
            <h2 class='simple-sub-title'>Через 2 недели</h2>
            <div class="events__list">
                @if(count($week_events_three) > 0)
                    @foreach ($week_events_three as $id => $event)
                        <div class="event-item">
                            <div class="event-item__img">
                                <a href="/event/{{$event->id}}"><img src="/uploads/images/{{$event->cover}}" alt=""></a>
                            </div>
                            <div class="event-item__content">
                                <div class="event-item__date">
                                    <span>{{ mb_strimwidth(Date::parse($event_data_three[$id][0])->format('D'), 0, 2, "") }}</span>
                                    <p>{{ Date::parse($event_data_three[$id][0])->format('j') }}</p>
                                    <span>{{ Date::parse($event_data_three[$id][0])->format('M') }}</span>
                                </div>
                                <div class="event-item__info">
                                    <span class="event-item__type">{{$type_events_three[$id]}}</span>
                                    <h3 class="event-item__title"><a href="/event/{{$event->id}}">{{$event->name}}</a></h3>
                                    <p class="event-item__time">с {{$event_data_three[$id][1]}} до {{$event_data_three[$id][2]}}</p>
                                    <p class="event-item__place">{{$owner_login_three[$id]}}</p>
                                </div>
                            </div>
                            <div class="event-item__bot">
                                <div class="event-item__who">
                                    <span>гитаристы</span>
                                    <span>рэперы</span>
                                    <span>ведущие</span>
                                </div>
                                <div class="event-item__places">{{$places_three[$id]}}@if ($places_three[$id] == 1) место @elseif($places_three[$id] == 2 || $places_three[$id] == 3 || $places_three[$id] == 4) места @else мест @endif</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="no-week-events">Не найдено ближайших мероприятий через 2 недели</div>
                @endif
                <div class="event-item event-item--hide"></div>
                <div class="event-item event-item--hide"></div>
            </div>
        </div>
    </section>
</div>
