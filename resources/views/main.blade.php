@extends('layouts.app')

@section('content')
    @include('blocks.top_search')
        <div class="main-artists">
            <section class="artists artists--slider">
                <h2 class="simple-sub-title simple-sub-title--link">Популярные артисты
                    <a href="{{ route('artists') }}">показать всех</a></h2>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @if(count($popular_artists) > 0)
                            @foreach ($popular_artists as $id => $artist)
                                <div class="swiper-slide">
                                    <div class="artist-item artist-item--slider">
                                        <div class="artist-item__img">
                                            <div><a href="/artist/{{$artist->id}}"><img @if ($artist->avatar) src="/uploads/avatars/{{$artist->avatar}}" @else src="/images/artist.png" @endif alt=""></a></div>
                                        </div>
                                        <div class="artist-item__info">
                                            <div class="artist-item__type">музыкальная группа</div>
                                            <h2 class="artist-item__title"><a href="/artist/{{$artist->id}}">{{$artist->login}}</a></h2>
                                            <div class="artist-item__bot">
                                                <div class="artist-item__stat">
                                                    <p><span>Рейтинг</span>9 183</p>
                                                    <p><span>Фанатов</span> 762</p>
                                                </div>
                                                <p class="artist-item__fans">Рейтинг: </p>
                                                <div class="artist-item__reviews">
                                                    <div class="rate-num">{{number_format($rating_popular_users[$id][0], 2, '.', '')}}</div>
                                                    <div class="rate2">
                                                        @if($rating_popular_users[$id][0] > 0 && $rating_popular_users[$id][0] < 1) <img alt="5" src="/img/star-half.png"> @elseif($rating_popular_users[$id][0] >= 1 || $rating_popular_users[$id][0] == 1) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                                        @if($rating_popular_users[$id][0] > 1 && $rating_popular_users[$id][0] < 2) <img alt="5" src="/img/star-half.png"> @elseif($rating_popular_users[$id][0] >= 2 || $rating_popular_users[$id][0] == 2) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                                        @if($rating_popular_users[$id][0] > 2 && $rating_popular_users[$id][0] < 3) <img alt="5" src="/img/star-half.png"> @elseif($rating_popular_users[$id][0] >= 3 || $rating_popular_users[$id][0] == 3) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                                        @if($rating_popular_users[$id][0] > 3 && $rating_popular_users[$id][0] < 4) <img alt="5" src="/img/star-half.png"> @elseif($rating_popular_users[$id][0] >= 4 || $rating_popular_users[$id][0] == 4) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                                        @if($rating_popular_users[$id][0] > 4 && $rating_popular_users[$id][0] < 5) <img alt="5" src="/img/star-half.png"> @elseif($rating_popular_users[$id][0] >= 5 || $rating_popular_users[$id][0] == 5) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="no-week-events">Не найдено популярных артистов</div>
                        @endif
                    </div>
                </div>

            </section>
            <section class="artists artists--slider">
                <h2 class="simple-sub-title simple-sub-title--link">Недавно зарегистрированные артисты
                    <a href="{{ route('artists') }}">показать всех</a></h2>

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @if(count($new_artists) > 0)
                            @foreach ($new_artists as $id => $artist)
                                <div class="swiper-slide">
                                    <div class="artist-item artist-item--slider">
                                        <div class="artist-item__img">
                                            <div><a href="/artist/{{$artist->id}}"><img @if ($artist->avatar) src="/uploads/avatars/{{$artist->avatar}}" @else src="/images/artist.png" @endif alt=""></a></div>
                                        </div>
                                        <div class="artist-item__info">
                                            <div class="artist-item__type">музыкальная группа</div>
                                            <h2 class="artist-item__title"><a href="/artist/{{$artist->id}}">{{$artist->login}}</a></h2>
                                            <div class="artist-item__bot">
                                                <div class="artist-item__stat">
                                                    <p><span>Рейтинг</span>9 183</p>
                                                    <p><span>Фанатов</span> 762</p>
                                                </div>
                                                <p class="artist-item__fans">Рейтинг: </p>
                                                <div class="artist-item__reviews">
                                                    <div class="rate-num">{{number_format($rating_new_users[$id][0], 2, '.', '')}}</div>
                                                    <div class="rate2">
                                                        @if($rating_new_users[$id][0] > 0 && $rating_new_users[$id][0] < 1) <img alt="5" src="/img/star-half.png"> @elseif($rating_new_users[$id][0] >= 1 || $rating_new_users[$id][0] == 1) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                                        @if($rating_new_users[$id][0] > 1 && $rating_new_users[$id][0] < 2) <img alt="5" src="/img/star-half.png"> @elseif($rating_new_users[$id][0] >= 2 || $rating_new_users[$id][0] == 2) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                                        @if($rating_new_users[$id][0] > 2 && $rating_new_users[$id][0] < 3) <img alt="5" src="/img/star-half.png"> @elseif($rating_new_users[$id][0] >= 3 || $rating_new_users[$id][0] == 3) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                                        @if($rating_new_users[$id][0] > 3 && $rating_new_users[$id][0] < 4) <img alt="5" src="/img/star-half.png"> @elseif($rating_new_users[$id][0] >= 4 || $rating_new_users[$id][0] == 4) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                                        @if($rating_new_users[$id][0] > 4 && $rating_new_users[$id][0] < 5) <img alt="5" src="/img/star-half.png"> @elseif($rating_new_users[$id][0] >= 5 || $rating_new_users[$id][0] == 5) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="no-week-events">Не найдено новых артистов</div>
                        @endif
                    </div>
                </div>

            </section>
            <section class="artists artists--slider">
                <h2 class="simple-sub-title simple-sub-title--link">Мероприятия на неделю
                    <a href="{{ route('events') }}">показать все</a></h2>

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @if(count($week_events) > 0)
                            @foreach ($week_events as $id => $event)
                                <div class="swiper-slide">
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
                                                {{--<span>гитаристы</span>
                                                <span>рэперы</span>
                                                <span>ведущие</span>--}}
                                            </div>
                                            <div class="event-item__places">{{$places[$id]}}@if ($places[$id] == 1) место @elseif($places[$id] == 2 || $places[$id] == 3 || $places[$id] == 4) места @else мест @endif</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="no-week-events">Не найдено ближайших мероприятий на этой неделе</div>
                        @endif
                    </div>
                </div>

            </section>
        </div>
        @include('blocks.form')
        @include('blocks.features')
@endsection
