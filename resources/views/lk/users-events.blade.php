@extends('layouts.app')

@section('content')
    <section class="lk-event">
        <div class="center-wrap">
            <a href="/lk-events/" class="lk-event__back">Назад к списку</a>
            <h1>{{$event->name}}</h1>
            <div class="lk-event__nav">
                <a href="/lk-event/{{$event->id}}/proposal/" class="lk-event__nav-item btn">Заявки</a>
                <a href="/lk-event/{{$event->id}}/users/" class="lk-event__nav-item btn lk-event__nav-item--active">Участники</a>
            </div>
            <div class="lk-event__list players-list">
                @if (!$proposals->isEmpty())
                @foreach($proposals as $item => $key)
                    <div class="lk-event__item">
                    <div class="artist-item">
                        <div class="artist-item__img">
                            <div>@foreach($users_data as $user => $data) @if($data['id'] == $key->user_id)<a href="/artist/{{$data['id']}}"><img @if ($data['avatar']) src="/uploads/avatars/{{$data['avatar']}}" @else src="/images/artist.png" @endif alt=""></a>@endif @endforeach</div>
                        </div>
                        <div class="artist-item__info">
                            <div class="artist-item__type">музыкальная группа</div>
                            <h2 class="artist-item__title">@foreach($users_data as $user => $data) @if($data['id'] == $key->user_id)<a href="/artist/{{$data['id']}}">{{$data['login']}}</a>@endif @endforeach</h2>
                            <div class="artist-item__bot">
                                <p class="artist-item__fans">Рейтинг: </p>
                                <div class="artist-item__reviews">
                                    <div class="rate-num">{{number_format($rating_users[$item][0], 2, '.', '')}}</div>
                                    <div class="rate2">
                                        @if($rating_users[$item][0] > 0 && $rating_users[$item][0] < 1) <img alt="5" src="/img/star-half.png"> @elseif($rating_users[$item][0] >= 1 || $rating_users[$item][0] == 1) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                        @if($rating_users[$item][0] > 1 && $rating_users[$item][0] < 2) <img alt="5" src="/img/star-half.png"> @elseif($rating_users[$item][0] >= 2 || $rating_users[$item][0] == 2) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                        @if($rating_users[$item][0] > 2 && $rating_users[$item][0] < 3) <img alt="5" src="/img/star-half.png"> @elseif($rating_users[$item][0] >= 3 || $rating_users[$item][0] == 3) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                        @if($rating_users[$item][0] > 3 && $rating_users[$item][0] < 4) <img alt="5" src="/img/star-half.png"> @elseif($rating_users[$item][0] >= 4 || $rating_users[$item][0] == 4) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                        @if($rating_users[$item][0] > 4 && $rating_users[$item][0] < 5) <img alt="5" src="/img/star-half.png"> @elseif($rating_users[$item][0] >= 5 || $rating_users[$item][0] == 5) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lk-event__item-right">
                        <div class="lk-event__item-btns">
                            <a href="/lk-event/{{$key->event_id}}/chat/{{$key->user_id}}">перейти в чат</a>
                            @if(strtotime('now') > strtotime($proposals_date[$item])) <a href="/add_review/{{$key->id}}" class="btn add-review">Оставить отзыв</a> @else <a href="/lk-event/{{$key->event_id}}/delete/{{$key->id}}" class="btn">Отказать</a> @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    <div class="no-events"><span class="icon-warning">!</span>Нет одобренных к участию заявок</div>
                @endif
            </div>
            {{$proposals->links()}}
        </div>
    </section>
@endsection
