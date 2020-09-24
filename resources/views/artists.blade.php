@extends('layouts.app')

@section('content')
    <div class="center-wrap">
        <h1 class='simple-title'>Артисты в @if (session()->get('city')){{session()->get('city_name')}} @elseМоскве @endif</h1>
    </div>
    <section class="artists-filters">
        <div class="center-wrap">
            <div class="inputs">
                <div class="inputs__wrap">
                    <p class="inputs__title">На дату</p>
                    <input type="text" id="artists_search" class="date-input datepicker-here" placeholder="Дата">
                </div>
            </div>
        </div>
        <div class="artists-filters__selects">
            <div class="center-wrap without-space">
                <div class="select select--sep select--big">
                    <div class="select__value">Цена</div>
                    <div class="select__variants">
                        <label class="select__variant price-artists" data-a_price="all"><span>Все цены</span></label>
                        <label class="select__variant price-artists" data-a_price="1"><span>до 2 000р</span></label>
                        <label class="select__variant price-artists" data-a_price="2"><span>до 10 000р</span></label>
                        <label class="select__variant price-artists" data-a_price="3"><span>от 10 000р</span></label>
                    </div>
                </div>

                <div class="select select--sep select--big">
                    <div class="select__value">Жанр</div>
                    <div class="select__variants">
                        <label class="select__variant genre-artists" data-a_genre="all"><span>Все жанры</span></label>
                        @foreach ($genres as $item)
                        <label class="select__variant genre-artists" data-a_genre="{{$item->id}}"><span>{{$item->name}}</span></label>
                        @endforeach
                    </div>
                </div>

                <div class="select select--sep select--big">
                    <div class="select__value">Типы мероприятий</div>
                    <div class="select__variants">
                        <label class="select__variant type-artist" data-a_type="all"><span>Все типы</span></label>
                        @foreach ($type as $item)
                        <label class="select__variant type-artist" data-a_type="{{$item->id}}"><span>{{$item->name}}</span></label>
                        @endforeach
                    </div>
                </div>
                <div class="artists-filters__sort">
                    <span>Сортировать по:</span>
                    <div class="select select--sep">
                        <div class="select__value">Популярности</div>
                        <div class="select__variants">
                            <label class="select__variant sort-artists" data-a_sort="rating"><span>Популярности</span></label>
                            <label class="select__variant sort-artists" data-a_sort="created_at"><span>Дате регистрации</span></label>
                            <label class="select__variant sort-artists" data-a_sort="login"><span>Логину</span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="artists artists--list">
        <div class="center-wrap">
            <div class="artists__list">
                @if(count($users) > 0)
                @foreach ($users as $id => $artist)
                    <div class="artist-item">
                    <div class="artist-item__img">
                        <div><a href="/artist/{{$artist->id}}"><img @if ($artist->avatar) src="/uploads/avatars/{{$artist->avatar}}" @else src="/images/artist.png" @endif alt=""></a></div>
                    </div>
                    <div class="artist-item__info">
                        <div class="artist-item__type">музыкальная группа</div>
                        <h2 class="artist-item__title"><a href="/artist/{{$artist->id}}">{{$artist->login}}</a></h2>
                        <div class="artist-item__bot">
                            <p class="artist-item__fans">Рейтинг: </p>
                            <div class="artist-item__reviews">
                                <div class="rate-num">{{number_format($artist->rating, 2, '.', '')}}</div>
                                <div class="rate2">
                                    @if($artist->rating > 0 && $artist->rating < 1) <img alt="5" src="/img/star-half.png"> @elseif($artist->rating >= 1 || $artist->rating == 1) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                    @if($artist->rating > 1 && $artist->rating < 2) <img alt="5" src="/img/star-half.png"> @elseif($artist->rating >= 2 || $artist->rating == 2) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                    @if($artist->rating > 2 && $artist->rating < 3) <img alt="5" src="/img/star-half.png"> @elseif($artist->rating >= 3 || $artist->rating == 3) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                    @if($artist->rating > 3 && $artist->rating < 4) <img alt="5" src="/img/star-half.png"> @elseif($artist->rating >= 4 || $artist->rating == 4) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                    @if($artist->rating > 4 && $artist->rating < 5) <img alt="5" src="/img/star-half.png"> @elseif($artist->rating >= 5 || $artist->rating == 5) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    <div class="no-week-events">Артисты не найдены</div>
                @endif
                <div class="artist-item artist-item--hide">Заглушка</div>
                <div class="artist-item artist-item--hide">Зашлушка</div>
            </div>
            {{$users->links()}}
        </div>
    </section>
    @include('blocks.form')
    @include('blocks.features')
@endsection

@section('custom_scripts')
    <script>
        $(document).ready(function(){
            if (location.search.indexOf('type') > -1 && location.search.indexOf('date') > -1) {

                @if ($_GET)
                type_artists = "{{$_GET['type']}}";
                artists_search = "{{$_GET['date']}}";
                @endif

                $.ajax({
                    url: "/artists/filter",
                    type: "post",
                    data: "sort=" + sort_artists + "&type=" + type_artists + "&price=" + price_artists + "&genre=" + genre_artists + "&artists_search=" + artists_search,
                    success: function (data) {
                        $('.artists.artists--list').html(data);
                    }
                });
            }
        });
    </script>
@endsection
