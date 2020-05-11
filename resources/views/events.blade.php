@extends('layouts.app')

@section('content')
    <div class="center-wrap">
        <h1 class='simple-title simple-sub-title--link'>Мероприятия
        </h1>
    </div>
    <section class="artists-filters">
        <div class="center-wrap">
            <div class="inputs">
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
            <div class="center-wrap without-space">

                <div class="select select--sep">
                    <div class="select__value">Жанры</div>
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
    <section class="events">
        <div class="center-wrap">
            <h2 class='simple-sub-title'>На этой неделе</h2>
            <div class="events__list">
                <div class="event-item">
                    <div class="event-item__img">
                        <img src="images/event-img1.png" alt="">
                    </div>

                    <div class="event-item__content">
                        <div class="event-item__date">
                            <span>пн</span>
                            <p>13</p>
                            <span>авг</span>
                        </div>
                        <div class="event-item__info">
                            <span class="event-item__type">фестиваль</span>
                            <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                            <p class="event-item__time">с 14:30 до 18:00</p>
                            <p class="event-item__place">Chorcha Entertainment</p>
                        </div>
                    </div>
                    <div class="event-item__bot">
                        <div class="event-item__who">
                            <span>гитаристы</span>
                            <span>рэперы</span>
                            <span>ведущие</span>
                        </div>
                        <div class="event-item__places">3 места</div>
                    </div>
                </div>
                <div class="event-item">
                    <div class="event-item__img">
                        <img src="images/event-img2.png" alt="">
                    </div>

                    <div class="event-item__content">
                        <div class="event-item__date">
                            <span>пн</span>
                            <p>13</p>
                            <span>авг</span>
                        </div>
                        <div class="event-item__info">
                            <span class="event-item__type">фестиваль</span>
                            <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                            <p class="event-item__time">с 14:30 до 18:00</p>
                            <p class="event-item__place">Chorcha Entertainment</p>
                        </div>
                    </div>
                    <div class="event-item__bot">
                        <div class="event-item__who">
                            <span>гитаристы</span>
                            <span>рэперы</span>
                            <span>ведущие</span>
                        </div>
                        <div class="event-item__places">3 места</div>
                    </div>
                </div>
                <div class="event-item">
                    <div class="event-item__img">
                        <img src="images/event-img3.png" alt="">
                    </div>

                    <div class="event-item__content">
                        <div class="event-item__date">
                            <span>пн</span>
                            <p>13</p>
                            <span>авг</span>
                        </div>
                        <div class="event-item__info">
                            <span class="event-item__type">фестиваль</span>
                            <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                            <p class="event-item__time">с 14:30 до 18:00</p>
                            <p class="event-item__place">Chorcha Entertainment</p>
                        </div>
                    </div>
                    <div class="event-item__bot">
                        <div class="event-item__who">
                            <span>гитаристы</span>
                            <span>рэперы</span>
                            <span>ведущие</span>
                        </div>
                        <div class="event-item__places">3 места</div>
                    </div>
                </div>
                <div class="event-item event-item--hide"></div>
                <div class="event-item event-item--hide"></div>

            </div>
        </div>
    </section>
    <section class="events">
        <div class="center-wrap">
            <h2 class='simple-sub-title'>В ближайшие 2 недели</h2>
            <div class="events__list">
                <div class="event-item">
                    <div class="event-item__img">
                        <img src="images/event-img1.png" alt="">
                    </div>

                    <div class="event-item__content">
                        <div class="event-item__date">
                            <span>пн</span>
                            <p>13</p>
                            <span>авг</span>
                        </div>
                        <div class="event-item__info">
                            <span class="event-item__type">фестиваль</span>
                            <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                            <p class="event-item__time">с 14:30 до 18:00</p>
                            <p class="event-item__place">Chorcha Entertainment</p>
                        </div>
                    </div>
                    <div class="event-item__bot">
                        <div class="event-item__who">
                            <span>гитаристы</span>
                            <span>рэперы</span>
                            <span>ведущие</span>
                        </div>
                        <div class="event-item__places">3 места</div>
                    </div>
                </div>
                <div class="event-item">
                    <div class="event-item__img">
                        <img src="images/event-img2.png" alt="">
                    </div>

                    <div class="event-item__content">
                        <div class="event-item__date">
                            <span>пн</span>
                            <p>13</p>
                            <span>авг</span>
                        </div>
                        <div class="event-item__info">
                            <span class="event-item__type">фестиваль</span>
                            <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                            <p class="event-item__time">с 14:30 до 18:00</p>
                            <p class="event-item__place">Chorcha Entertainment</p>
                        </div>
                    </div>
                    <div class="event-item__bot">
                        <div class="event-item__who">
                            <span>гитаристы</span>
                            <span>рэперы</span>
                            <span>ведущие</span>
                        </div>
                        <div class="event-item__places">3 места</div>
                    </div>
                </div>
                <div class="event-item">
                    <div class="event-item__img">
                        <img src="images/event-img3.png" alt="">
                    </div>

                    <div class="event-item__content">
                        <div class="event-item__date">
                            <span>пн</span>
                            <p>13</p>
                            <span>авг</span>
                        </div>
                        <div class="event-item__info">
                            <span class="event-item__type">фестиваль</span>
                            <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                            <p class="event-item__time">с 14:30 до 18:00</p>
                            <p class="event-item__place">Chorcha Entertainment</p>
                        </div>
                    </div>
                    <div class="event-item__bot">
                        <div class="event-item__who">
                            <span>гитаристы</span>
                            <span>рэперы</span>
                            <span>ведущие</span>
                        </div>
                        <div class="event-item__places">3 места</div>
                    </div>
                </div>
                <div class="event-item">
                    <div class="event-item__img">
                        <img src="images/event-img3.png" alt="">
                    </div>

                    <div class="event-item__content">
                        <div class="event-item__date">
                            <span>пн</span>
                            <p>13</p>
                            <span>авг</span>
                        </div>
                        <div class="event-item__info">
                            <span class="event-item__type">фестиваль</span>
                            <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                            <p class="event-item__time">с 14:30 до 18:00</p>
                            <p class="event-item__place">Chorcha Entertainment</p>
                        </div>
                    </div>
                    <div class="event-item__bot">
                        <div class="event-item__who">
                            <span>гитаристы</span>
                            <span>рэперы</span>
                            <span>ведущие</span>
                        </div>
                        <div class="event-item__places">3 места</div>
                    </div>
                </div>
                <div class="event-item">
                    <div class="event-item__img">
                        <img src="images/event-img3.png" alt="">
                    </div>

                    <div class="event-item__content">
                        <div class="event-item__date">
                            <span>пн</span>
                            <p>13</p>
                            <span>авг</span>
                        </div>
                        <div class="event-item__info">
                            <span class="event-item__type">фестиваль</span>
                            <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                            <p class="event-item__time">с 14:30 до 18:00</p>
                            <p class="event-item__place">Chorcha Entertainment</p>
                        </div>
                    </div>
                    <div class="event-item__bot">
                        <div class="event-item__who">
                            <span>гитаристы</span>
                            <span>рэперы</span>
                            <span>ведущие</span>
                        </div>
                        <div class="event-item__places">3 места</div>
                    </div>
                </div>
                <div class="event-item event-item--hide"></div>
                <div class="event-item event-item--hide"></div>
            </div>
        </div>
    </section>

    <section class="events">
        <div class="center-wrap">
            <h2 class='simple-sub-title'>Через 2 недели</h2>
            <div class="events__list">
                <div class="event-item">
                    <div class="event-item__img">
                        <img src="images/event-img1.png" alt="">
                    </div>

                    <div class="event-item__content">
                        <div class="event-item__date">
                            <span>пн</span>
                            <p>13</p>
                            <span>авг</span>
                        </div>
                        <div class="event-item__info">
                            <span class="event-item__type">фестиваль</span>
                            <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                            <p class="event-item__time">с 14:30 до 18:00</p>
                            <p class="event-item__place">Chorcha Entertainment</p>
                        </div>
                    </div>
                    <div class="event-item__bot">
                        <div class="event-item__who">
                            <span>гитаристы</span>
                            <span>рэперы</span>
                            <span>ведущие</span>
                        </div>
                        <div class="event-item__places">3 места</div>
                    </div>
                </div>
                <div class="event-item">
                    <div class="event-item__img">
                        <img src="images/event-img2.png" alt="">
                    </div>

                    <div class="event-item__content">
                        <div class="event-item__date">
                            <span>пн</span>
                            <p>13</p>
                            <span>авг</span>
                        </div>
                        <div class="event-item__info">
                            <span class="event-item__type">фестиваль</span>
                            <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                            <p class="event-item__time">с 14:30 до 18:00</p>
                            <p class="event-item__place">Chorcha Entertainment</p>
                        </div>
                    </div>
                    <div class="event-item__bot">
                        <div class="event-item__who">
                            <span>гитаристы</span>
                            <span>рэперы</span>
                            <span>ведущие</span>
                        </div>
                        <div class="event-item__places">3 места</div>
                    </div>
                </div>
                <div class="event-item">
                    <div class="event-item__img">
                        <img src="images/event-img3.png" alt="">
                    </div>

                    <div class="event-item__content">
                        <div class="event-item__date">
                            <span>пн</span>
                            <p>13</p>
                            <span>авг</span>
                        </div>
                        <div class="event-item__info">
                            <span class="event-item__type">фестиваль</span>
                            <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                            <p class="event-item__time">с 14:30 до 18:00</p>
                            <p class="event-item__place">Chorcha Entertainment</p>
                        </div>
                    </div>
                    <div class="event-item__bot">
                        <div class="event-item__who">
                            <span>гитаристы</span>
                            <span>рэперы</span>
                            <span>ведущие</span>
                        </div>
                        <div class="event-item__places">3 места</div>
                    </div>
                </div>
                <div class="event-item event-item--hide"></div>
                <div class="event-item event-item--hide"></div>
            </div>
        </div>
    </section>
    @include('blocks.features')
@endsection
