@extends('layouts.app')

@section('content')
    <div class="center-wrap">
        <h1 class='simple-title'>Артисты в Санкт-Петербурге</h1>
    </div>
    <section class="artists-filters">
        <div class="center-wrap">
            <div class="inputs">
                <div class="inputs__wrap">
                    <p class="inputs__title">Я ищу</p>
                    <div class="select">
                        <div class="select__value">Тип артиста</div>
                        <div class="select__variants">
                            <label for="" class="select__variant select__variant--active"><span>03</span></label>
                            <label for="" class="select__variant"><span>04</span></label>
                            <label for="" class="select__variant"><span>05</span></label>
                            <label for="" class="select__variant"><span>06</span></label>
                            <label for="" class="select__variant"><span>07</span></label>
                            <label for="" class="select__variant"><span>08</span></label>
                            <label for="" class="select__variant"><span>09</span></label>
                        </div>
                    </div>

                </div>
                <div class="inputs__wrap">
                    <p class="inputs__title">C</p>
                    <input type="date" class="date-input">
                </div>
                <div class="inputs__wrap">
                    <p class="inputs__title">По</p>
                    <input type="date" class="date-input">
                </div>
            </div>
        </div>
        <div class="artists-filters__selects">
            <div class="center-wrap">
                <div class="select select--sep">
                    <div class="select__value">Цена</div>
                    <div class="select__variants">
                        <label for="" class="select__variant select__variant--active"><span>03</span></label>
                        <label for="" class="select__variant"><span>04</span></label>
                        <label for="" class="select__variant"><span>05</span></label>
                        <label for="" class="select__variant"><span>06</span></label>
                        <label for="" class="select__variant"><span>07</span></label>
                        <label for="" class="select__variant"><span>08</span></label>
                        <label for="" class="select__variant"><span>09</span></label>
                    </div>
                </div>

                <div class="select select--sep">
                    <div class="select__value">Жанр</div>
                    <div class="select__variants">
                        <label for="" class="select__variant select__variant--active"><span>03</span></label>
                        <label for="" class="select__variant"><span>04</span></label>
                        <label for="" class="select__variant"><span>05</span></label>
                        <label for="" class="select__variant"><span>06</span></label>
                        <label for="" class="select__variant"><span>07</span></label>
                        <label for="" class="select__variant"><span>08</span></label>
                        <label for="" class="select__variant"><span>09</span></label>
                    </div>
                </div>

                <div class="select select--sep">
                    <div class="select__value">Типы мероприятий</div>
                    <div class="select__variants">
                        <label for="" class="select__variant select__variant--active"><span>03</span></label>
                        <label for="" class="select__variant"><span>04</span></label>
                        <label for="" class="select__variant"><span>05</span></label>
                        <label for="" class="select__variant"><span>06</span></label>
                        <label for="" class="select__variant"><span>07</span></label>
                        <label for="" class="select__variant"><span>08</span></label>
                        <label for="" class="select__variant"><span>09</span></label>
                    </div>
                </div>

                <div class="select select--sep">
                    <div class="select__value">Виды инструментов</div>
                    <div class="select__variants">
                        <label for="" class="select__variant select__variant--active"><span>03</span></label>
                        <label for="" class="select__variant"><span>04</span></label>
                        <label for="" class="select__variant"><span>05</span></label>
                        <label for="" class="select__variant"><span>06</span></label>
                        <label for="" class="select__variant"><span>07</span></label>
                        <label for="" class="select__variant"><span>08</span></label>
                        <label for="" class="select__variant"><span>09</span></label>
                    </div>
                </div>

                <div class="select select--sep">
                    <div class="select__value">Теги</div>
                    <div class="select__variants">
                        <label for="" class="select__variant select__variant--active"><span>03</span></label>
                        <label for="" class="select__variant">Полная залупа<span>04</span></label>
                        <label for="" class="select__variant"><span>05</span></label>
                        <label for="" class="select__variant"><span>06</span></label>
                        <label for="" class="select__variant"><span>07</span></label>
                        <label for="" class="select__variant"><span>08</span></label>
                        <label for="" class="select__variant"><span>09</span></label>
                    </div>
                </div>

                <div class="select select--sep">
                    <div class="select__value">Праздники</div>
                    <div class="select__variants">
                        <label for="" class="select__variant select__variant--active"><span>03</span></label>
                        <label for="" class="select__variant"><span>04</span></label>
                        <label for="" class="select__variant"><span>05</span></label>
                        <label for="" class="select__variant"><span>06</span></label>
                        <label for="" class="select__variant"><span>07</span></label>
                        <label for="" class="select__variant"><span>08</span></label>
                        <label for="" class="select__variant"><span>09</span></label>
                    </div>
                </div>
                <div class="artists-filters__sort">
                    <span>Сортировать по:</span>
                    <div class="select select--sep">
                        <div class="select__value">популярности</div>
                        <div class="select__variants">
                            <label for="" class="select__variant select__variant--active"><span>популярности</span></label>
                            <label for="" class="select__variant"><span>04</span></label>
                            <label for="" class="select__variant"><span>05</span></label>
                            <label for="" class="select__variant"><span>06</span></label>
                            <label for="" class="select__variant"><span>07</span></label>
                            <label for="" class="select__variant"><span>08</span></label>
                            <label for="" class="select__variant"><span>09</span></label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="artists artists--list">
        <div class="center-wrap">
            <div class="artists__list">
                @foreach ($users as $id => $artist)
                    <div class="artist-item">
                    <div class="artist-item__img">
                        <svg width="39" height="38" viewBox="0 0 39 38" fill="none" xmlns="http://www.w3.org/2000/svg"><g filter="url(#filter0_d)"><path d="M26.586 10H29V12H27.414L23.166 16.242C22.7958 15.683 22.317 15.2042 21.758 14.834L26.586 10ZM19 15C19.9722 15.0019 20.9105 15.3577 21.6394 16.0011C22.3683 16.6445 22.8379 17.5314 22.9605 18.4959C23.083 19.4603 22.8501 20.4364 22.3052 21.2417C21.7604 22.0469 20.9409 22.6261 20 22.871V23C20 23.9889 19.7068 24.9556 19.1573 25.7779C18.6079 26.6001 17.827 27.241 16.9134 27.6194C15.9998 27.9978 14.9945 28.0969 14.0246 27.9039C13.0546 27.711 12.1637 27.2348 11.4645 26.5355C10.7652 25.8363 10.289 24.9454 10.0961 23.9755C9.90315 23.0055 10.0022 22.0002 10.3806 21.0866C10.759 20.173 11.3999 19.3921 12.2222 18.8427C13.0444 18.2932 14.0111 18 15 18L15.129 18.012C15.3483 17.1515 15.8478 16.3884 16.5487 15.8431C17.2495 15.2977 18.112 15.0011 19 15ZM19 17.5C18.6022 17.5 18.2206 17.658 17.9393 17.9393C17.658 18.2206 17.5 18.6022 17.5 19C17.5 19.3978 17.658 19.7794 17.9393 20.0607C18.2206 20.342 18.6022 20.5 19 20.5C19.3978 20.5 19.7794 20.342 20.0607 20.0607C20.342 19.7794 20.5 19.3978 20.5 19C20.5 18.6022 20.342 18.2206 20.0607 17.9393C19.7794 17.658 19.3978 17.5 19 17.5ZM13.937 21.236L13.23 21.943L16.059 24.771L16.766 24.064L13.937 21.236Z" fill="#E3E6E9"/></g><defs><filter id="filter0_d" x="0" y="0" width="39" height="38" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset/><feGaussianBlur stdDeviation="5"/><feColorMatrix type="matrix" values="0 0 0 0 0.231373 0 0 0 0 0.231373 0 0 0 0 0.333333 0 0 0 0.43 0"/><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/><feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/></filter></defs></svg>
                        <div><img src="/uploads/avatars/{{$artist->avatar}}" alt=""></div>
                    </div>
                    <div class="artist-item__info">
                        <div class="artist-item__type">музыкальная группа</div>
                        <h2 class="artist-item__title"><a href="/artist/{{$artist->id}}">{{$artist->login}}</a></h2>
                        <div class="artist-item__bot">
                            <p class="artist-item__fans">Рейтинг: </p>
                            <div class="artist-item__reviews">
                                <div class="rate-num">4.5</div>
                                <div class="rate1">
                                    <img alt="1" src="img/star-on.png">
                                    <img alt="2" src="img/star-on.png">
                                    <img alt="3" src="img/star-on.png">
                                    <img alt="4" src="img/star-on.png">
                                    <img alt="5" src="img/star-half.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="artist-item artist-item--hide">Заглушка</div>
                <div class="artist-item artist-item--hide">Зашлушка</div>
            </div>
            {{$users->links()}}
        </div>
        </div>
    </section>
    @include('blocks.form')
    @include('blocks.features')
@endsection
