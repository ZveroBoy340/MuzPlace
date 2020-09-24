@extends('layouts.app')

@section('content')
        <div class="main-artists">
            <section class="main-screen">
                <div class="center-wrap">
                    <h1>Найдите подходящего артиста для вашего мероприятия.</h1>
                    <form action="/artists" method="get" class="main-screen__inputs">
                        <div class="select select--big">
                            <div class="select__value">Тип исполнителя</div>
                            <div class="select__variants">
                                <label for="type_all" class="select__variant"><span>Все типы</span></label>
                                <label for="type_1" class="select__variant"><span>Концерт</span></label>
                                <label for="type_2" class="select__variant"><span>Корпоратив</span></label>
                                <label for="type_3" class="select__variant"><span>Музыкальный фестиваль</span></label>
                                <label for="type_4" class="select__variant"><span>Рэп-батл</span></label>
                                <label for="type_5" class="select__variant"><span>Детский праздник</span></label>
                                <label for="type_6" class="select__variant"><span>Джем-сейшн</span></label>
                                <label for="type_7" class="select__variant"><span>Квартирник</span></label>
                                <label for="type_8" class="select__variant"><span>Бал</span></label>
                                <label for="type_9" class="select__variant"><span>Open air</span></label>
                                <label for="type_10" class="select__variant"><span>Другое</span></label>
                            </div>
                            <div class="radio-elements none">
                                <input type="radio" name="type" id="type_all" value="all" checked>
                                <input type="radio" name="type" id="type_1" value="1">
                                <input type="radio" name="type" id="type_2" value="2">
                                <input type="radio" name="type" id="type_3" value="3">
                                <input type="radio" name="type" id="type_4" value="4">
                                <input type="radio" name="type" id="type_5" value="5">
                                <input type="radio" name="type" id="type_6" value="6">
                                <input type="radio" name="type" id="type_7" value="7">
                                <input type="radio" name="type" id="type_8" value="8">
                                <input type="radio" name="type" id="type_9" value="9">
                                <input type="radio" name="type" id="type_10" value="10">
                            </div>
                        </div>
                        <input type="text" name="date" class="date-input find-artist-date datepicker-here" placeholder="На дату">
                        <button class='btn' type="submit" id="finde-artist">Найти</button>
                    </form>
                </div>
            </section>
            <section class="artists artists--slider">
                <h2 class="simple-sub-title simple-sub-title--link">Найденные артисты
                    <a href="{{ route('artists') }}">показать всех</a></h2>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @if(count($new_artists) > 0)
                            @foreach ($new_artists as $id => $artist)
                                <div class="swiper-slide">
                                    <div class="artist-item artist-item--slider">
                                        <div class="artist-item__img">
                                            <svg width="39" height="38" viewBox="0 0 39 38" fill="none" xmlns="http://www.w3.org/2000/svg"><g filter="url(#filter0_d)"><path d="M26.586 10H29V12H27.414L23.166 16.242C22.7958 15.683 22.317 15.2042 21.758 14.834L26.586 10ZM19 15C19.9722 15.0019 20.9105 15.3577 21.6394 16.0011C22.3683 16.6445 22.8379 17.5314 22.9605 18.4959C23.083 19.4603 22.8501 20.4364 22.3052 21.2417C21.7604 22.0469 20.9409 22.6261 20 22.871V23C20 23.9889 19.7068 24.9556 19.1573 25.7779C18.6079 26.6001 17.827 27.241 16.9134 27.6194C15.9998 27.9978 14.9945 28.0969 14.0246 27.9039C13.0546 27.711 12.1637 27.2348 11.4645 26.5355C10.7652 25.8363 10.289 24.9454 10.0961 23.9755C9.90315 23.0055 10.0022 22.0002 10.3806 21.0866C10.759 20.173 11.3999 19.3921 12.2222 18.8427C13.0444 18.2932 14.0111 18 15 18L15.129 18.012C15.3483 17.1515 15.8478 16.3884 16.5487 15.8431C17.2495 15.2977 18.112 15.0011 19 15ZM19 17.5C18.6022 17.5 18.2206 17.658 17.9393 17.9393C17.658 18.2206 17.5 18.6022 17.5 19C17.5 19.3978 17.658 19.7794 17.9393 20.0607C18.2206 20.342 18.6022 20.5 19 20.5C19.3978 20.5 19.7794 20.342 20.0607 20.0607C20.342 19.7794 20.5 19.3978 20.5 19C20.5 18.6022 20.342 18.2206 20.0607 17.9393C19.7794 17.658 19.3978 17.5 19 17.5ZM13.937 21.236L13.23 21.943L16.059 24.771L16.766 24.064L13.937 21.236Z" fill="#E3E6E9"/></g><defs><filter id="filter0_d" x="0" y="0" width="39" height="38" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset/><feGaussianBlur stdDeviation="5"/><feColorMatrix type="matrix" values="0 0 0 0 0.231373 0 0 0 0 0.231373 0 0 0 0 0.333333 0 0 0 0.43 0"/><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/><feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/></filter></defs></svg>
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
                            <div class="no-week-events">Не найдено артистов по указанному логину</div>
                        @endif
                    </div>
                </div>

            </section>
            <section class="artists artists--slider">
                <h2 class="simple-sub-title simple-sub-title--link">Найденные мероприятия
                    <a href="{{ route('events') }}">показать все</a></h2>

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @if(count($week_events) > 0)
                            @foreach ($week_events as $id => $event)
                                <div class="swiper-slide">
                                    <div class="event-item">
                                        <div class="event-item__img">
                                            <img src="/uploads/images/{{$event->cover}}" alt="">
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
                                </div>
                            @endforeach
                        @else
                            <div class="no-week-events">Не найдено мероприятий по указанному названию</div>
                        @endif
                    </div>
                </div>

            </section>
        </div>
        @include('blocks.form')
        @include('blocks.features')
@endsection
