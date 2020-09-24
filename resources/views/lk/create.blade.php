@extends('layouts.app')

@section('content')
    <section class="create">
        <div class="center-wrap">
            <h1 class='simple-title'>Создание мероприятия</h1>
            <div class="create__nav">
                <div class="create__nav-links">
                    <h2 class="create__nav-link">о мероприятии</h2>
                    <h2 class="create__nav-link">кого ищите</h2>
                    <h2 class="create__nav-link">условия</h2>
                </div>
                <div class="create__nav-bar">
                    <span class="active"></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <form action="/event-form" method="post" id="submit-create-event" enctype="multipart/form-data" class="inputs inputs--small">
                @csrf
                <div class="create__columns active" id="create_event_1">
                    <div class="create__column">
                        <h3 class="create__column-title">Описание</h3>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Выберите город</p>
                            <select name="city" id="city-list" class="events-city" required>
                                <option value="Москва" @if (Auth::user()->city  == "Москва") selected @endif>Москва</option>
                                <option value="Санкт-Петербург" @if (Auth::user()->city  == "Санкт-Петербург") selected @endif>Санкт-Петербург</option>
                                <option value="Новосибирск" @if (Auth::user()->city  == "Новосибирск") selected @endif>Новосибирск</option>
                                <option value="Екатеринбург" @if (Auth::user()->city  == "Екатеринбург") selected @endif>Екатеринбург</option>
                                <option value="Нижний" @if (Auth::user()->city  == "Нижний") selected @endif>Нижний</option>
                                <option value="Новгород" @if (Auth::user()->city  == "Новгород") selected @endif>Новгород</option>
                                <option value="Челябинск" @if (Auth::user()->city  == "Челябинск") selected @endif>Челябинск</option>
                                <option value="Самара" @if (Auth::user()->city  == "Самара") selected @endif>Самара</option>
                                <option value="Омск" @if (Auth::user()->city  == "Омск") selected @endif>Омск</option>
                                <option value="Ростов-на-Дону" @if (Auth::user()->city  == "Ростов-на-Дону") selected @endif>Ростов-на-Дону</option>
                                <option value="Уфа" @if (Auth::user()->city  == "Уфа") selected @endif>Уфа</option>
                                <option value="Красноярск" @if (Auth::user()->city  == "Красноярск") selected @endif>Красноярск</option>
                                <option value="Воронеж" @if (Auth::user()->city  == "Воронеж") selected @endif>Воронеж</option>
                                <option value="Пермь" @if (Auth::user()->city  == "Пермь") selected @endif>Пермь</option>
                                <option value="Волгоград" @if (Auth::user()->city  == "Волгоград") selected @endif>Волгоград</option>
                            </select>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Название</p>
                            <input type="text" name="name" id="name-event" required>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Краткое описание</p>
                            <textarea name="description" cols="30" rows="10" id="description-event"></textarea>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Обложка</p>
                            <label class="inputs__file cover">
                                <span>Добавить обложку</span>
                                <img src="" class="img-view" alt="">
                                <span class="del-cover">x</span>
                                <input type="file" name="cover" id="cover" class="img-load">
                            </label>
                        </div>
                    </div>
                    <div class="create__column firts-date dates-creates">
                        <h3 class="create__column-title">Дата и время</h3>
                        <div class="inputs__inputs" id="date-event_0">
                            <div class="inputs__wrap">
                                <p class="inputs__title">Дата</p>
                                <input type="text" name="date[0][]" class="date-input artiste datepicker-here" value="00.00.0000" placeholder="Дата" data-date="0">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__title">C</p>
                                <input type="text" name="date[0][]" id="demo1" value="00:00" class="date-input times">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__title">До</p>
                                <input type="text" name="date[0][]" value="00:00" class="date-input times">
                            </div>
                        </div>
                        <a class="add_date_event dates" data-events="0">Добавить дату</a>
                    </div>
                    <div class="create__column">
                        <h3 class="create__column-title">Дополнительно</h3>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Тип</p>
                            <div class="select">
                                <div class="select__value">Концерт</div>
                                <div class="select__variants">
                                    @foreach ($types as $type)
                                    <label for="type_{{$type->id}}" class="select__variant @if ($type->id == 1) select__variant--active @endif "><span>{{$type->name}}</span></label>
                                    @endforeach
                                </div>
                                <div class="radio-elements none">
                                    @foreach ($types as $type)
                                    <input type="radio" name="type" id="type_{{$type->id}}" value="{{$type->id}}" @if ($type->id == 1) checked @endif>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="inputs__wrap">
                            <p class="inputs__title">Площадка открытая или закрытая?</p>
                            <div class="select">
                                <div class="select__value">Открытая</div>
                                <div class="select__variants">
                                    <label for="place_1" class="select__variant select__variant--active"><span>Открытая</span></label>
                                    <label for="place_2" class="select__variant"><span>Закрытая</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="place" id="place_1" value="Открытая" checked>
                                    <input type="radio" name="place" id="place_2" value="Закрытая">
                                </div>
                            </div>
                        </div>

                        <div class="inputs__wrap">
                            <p class="inputs__title">Количество человек</p>
                            <div class="select">
                                <div class="select__value"><i class="first_people"></i>До 10</div>
                                <div class="select__variants">
                                    <label for="people_1" class="select__variant select__variant--active"><span><i class="first_people"></i>До 10</span></label>
                                    <label for="people_2" class="select__variant"><span><i class="two_people"></i>До 100</span></label>
                                    <label for="people_3" class="select__variant"><span><i class="three_people"></i>Более 1000</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="people" id="people_1" value="10" checked>
                                    <input type="radio" name="people" id="people_2" value="100">
                                    <input type="radio" name="people" id="people_3" value="1000">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="create__btn">
                        <a class="btn event-page-2">Продолжить</a>
                    </div>
                </div>
                <div class="get-artist-info" id="create_event_2">
                    <div class="artist-data-titles">
                        <h3 class="create__column-title">Артисты</h3>
                        <h3 class="create__column-title">Дополнительно</h3>
                    </div>
                    <div class="artist-create-item" id="artist_0">
                        <div class="inputs__wrap">
                            <p class="inputs__title">Тип артиста</p>
                            <div class="select tip_artist">
                                <div class="select__value">Вокалист</div>
                                <div class="select__variants">
                                    <label for="artist_type[0]_0" class="select__variant select__variant--active"><span>Вокалист</span></label>
                                    <label for="artist_type[0]_1" class="select__variant"><span>Группа</span></label>
                                    <label for="artist_type[0]_2" class="select__variant"><span>DJ</span></label>
                                    <label for="artist_type[0]_3" class="select__variant"><span>Ведущий</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="artist_type[0][]" id="artist_type[0]_0" value="0" checked="checked">
                                    <input type="radio" name="artist_type[0][]" id="artist_type[0]_1" value="1">
                                    <input type="radio" name="artist_type[0][]" id="artist_type[0]_2" value="2">
                                    <input type="radio" name="artist_type[0][]" id="artist_type[0]_3" value="3">
                                </div>
                            </div>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">В жанре</p>
                            <div class="select genre_artist">
                                <div class="select__value">Авторский</div>
                                <div class="select__variants">
                                    @foreach ($genres as $genre)
                                    <label for="artist_genre[0]_{{$genre->id}}" class="select__variant @if ($genre->id == 1) select__variant--active @endif"><span>{{$genre->name}}</span></label>
                                    @endforeach
                                </div>
                                <div class="radio-elements none">
                                    @foreach ($genres as $genre)
                                    <input type="radio" name="artist_genre[0][]" id="artist_genre[0]_{{$genre->id}}" value="{{$genre->id}}" @if ($genre->id == 1) checked="checked" @endif>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">На дату</p>
                            <div class="select data_artist">
                                <div class="select__value">дд.мм.гггг</div>
                                <div class="select__variants">
                                    <label for="artist_date[0]_0" class="select__variant select__variant--active"><span>дд.мм.гггг</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="artist_date[0][]" id="artist_date[0]_0" value="0" checked="checked">
                                </div>
                            </div>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Пожелания и требования</p>
                            <div class="inputs__wrap">
                                <textarea class="create_trebovania" name="artist_wish[]" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <a class="add_date_event artistes" data-artists="0">Добавить артиста</a>
                    <div class="create__btn">
                        <a class="btn btn-black event-page-1">Назад</a>
                        <a class="btn event-page-3">Продолжить</a>
                    </div>
                </div>
                <div class="create__columns" id="create_event_3">
                    <div class="create__column">
                        <h3 class="create__column-title">Оплата</h3>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Что оплачивается</p>
                            <div class="select">
                                <div class="select__value">Часы</div>
                                <div class="select__variants">
                                    <label for="payment_0" class="select__variant select__variant--active"><span>Часы</span></label>
                                    <label for="payment_1" class="select__variant"><span>Дни</span></label>
                                    <label for="payment_2" class="select__variant"><span>Песни</span></label>
                                    <label for="payment_3" class="select__variant"><span>Договорная</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="payment" id="payment_0" value="Часы" checked>
                                    <input type="radio" name="payment" id="payment_1" value="Дни">
                                    <input type="radio" name="payment" id="payment_2" value="Песни">
                                    <input type="radio" name="payment" id="payment_3" value="Договорная">
                                </div>
                            </div>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Форма оплаты</p>
                            <div class="select">
                                <div class="select__value">Наличные</div>
                                <div class="select__variants">
                                    <label for="payment_method_0" class="select__variant select__variant--active"><span>Наличные</span></label>
                                    <label for="payment_method_1" class="select__variant"><span>На карту</span></label>
                                    <label for="payment_method_2" class="select__variant"><span>Безналичный</span></label>
                                    <label for="payment_method_3" class="select__variant"><span>Договорная</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="payment_method" id="payment_method_0" value="Наличные" checked>
                                    <input type="radio" name="payment_method" id="payment_method_1" value="На карту">
                                    <input type="radio" name="payment_method" id="payment_method_2" value="Безналичный">
                                    <input type="radio" name="payment_method" id="payment_method_3" value="Договорная">
                                </div>
                            </div>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Предоплата</p>
                            <div class="select">
                                <div class="select__value">Без предоплаты</div>
                                <div class="select__variants">
                                    <label for="payment_condition_0" class="select__variant select__variant--active"><span>Без предоплаты</span></label>
                                    <label for="payment_condition_1" class="select__variant"><span>30%</span></label>
                                    <label for="payment_condition_2" class="select__variant"><span>50%</span></label>
                                    <label for="payment_condition_3" class="select__variant"><span>100%</span></label>
                                    <label for="payment_condition_4" class="select__variant"><span>Договорная</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="payment_condition" id="payment_condition_0" value="Без предоплаты" checked>
                                    <input type="radio" name="payment_condition" id="payment_condition_1" value="30%">
                                    <input type="radio" name="payment_condition" id="payment_condition_2" value="50%">
                                    <input type="radio" name="payment_condition" id="payment_condition_3" value="100%">
                                    <input type="radio" name="payment_condition" id="payment_condition_4" value="Договорная">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="create__column">
                        <h3 class="create__column-title">Договор</h3>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Должен иметь свое оборудование?</p>
                            <div class="select">
                                <div class="select__value">Да</div>
                                <div class="select__variants">
                                    <label for="instruments_0" class="select__variant select__variant--active"><span>Да</span></label>
                                    <label for="instruments_1" class="select__variant"><span>Нет</span></label>
                                    <label for="instruments_3" class="select__variant"><span>Договорная</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="instruments" id="instruments_0" value="Да" checked>
                                    <input type="radio" name="instruments" id="instruments_1" value="Нет">
                                    <input type="radio" name="instruments" id="instruments_2" value="Договорная">
                                </div>
                            </div>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Файл договора</p>
                            <label class="inputs__file cover dogovor">
                                <span class="dogovors">Добавить договор</span>
                                <span class="del-doc">x</span>
                                <input type="file" name="dogovor" id="dogovor">
                            </label>
                        </div>
                    </div>
                    <div class="create__column">
                        <h3 class="create__column-title">Дополнительно</h3>
                        <div class="genre-list">
                            <div class="genre-item">
                                <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_1" value="Тематика 18+">
                                <label class="form-check-label" for="dop_option_1">Тематика 18+</label>
                            </div>
                            <div class="genre-item">
                                <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_2" value="Наличие охраны">
                                <label class="form-check-label" for="dop_option_2">Наличие охраны</label>
                            </div>
                            <div class="genre-item">
                                <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_3" value="Наличие координатора">
                                <label class="form-check-label" for="dop_option_3">Наличие координатора</label>
                            </div>
                            <div class="genre-item">
                                <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_4" value="Отдельная зона для курящих">
                                <label class="form-check-label" for="dop_option_4">Отдельная зона для курящих</label>
                            </div>
                            <div class="genre-item">
                                <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_5" value="Бар и алкоголь">
                                <label class="form-check-label" for="dop_option_5">Бар и алкоголь</label>
                            </div>
                            <div class="genre-item">
                                <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_6" value="Экран / проектор для видео">
                                <label class="form-check-label" for="dop_option_6">Экран / проектор для видео</label>
                            </div>
                        </div>
                    </div>
                    <div class="create__column">
                        <h3 class="create__column-title hidden">Дополнительные условия</h3>
                        <p class="inputs__title">Дополнительные условия</p>
                        <textarea name="additional_conditions" class="dop-info-uslovia" cols="30" rows="10"></textarea>
                    </div>
                    <div class="create__btn">
                        <a class="btn btn-black event-page-2">Назад</a>
                        <a id="create-event" class="btn">Создать</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
