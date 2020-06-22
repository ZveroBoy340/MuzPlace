@extends('layouts.app')

@section('content')
    <section class="create">
        <div class="center-wrap">
            <a href="/lk-events/" class="btn__back">назад к списку</a>
            <form action="/update-event/{{$event_data->id}}" method="post" enctype="multipart/form-data" class="inputs inputs--small">
                @csrf
                <div class="preview_title">о мероприятии</div>
                <div class="create__columns undo-margin">
                    <div class="create__column">
                        <h3 class="create__column-title">Описание</h3>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Название</p>
                            <input type="text" name="name" value="{{$event_data->name}}" required>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Краткое описание</p>
                            <textarea name="description" cols="30" rows="10" required>{{$event_data->description}}</textarea>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Обложка</p>
                            <label class="inputs__file cover set-image">
                                <span>Добавить обложку</span>
                                <img src="/uploads/images/{{$event_data->cover}}" class="img-view" alt="">
                                <span class="del-cover">x</span>
                                <input type="file" name="cover" id="cover" class="img-load">
                            </label>
                        </div>
                    </div>
                    <div class="create__column firts-date">
                        <h3 class="create__column-title">Дата и время</h3>
                        @foreach ($data as $item => $key)
                            <div class="inputs__inputs" id="date-event_{{$item}}">
                                <div class="inputs__wrap">
                                    <p class="inputs__title">Дата</p>
                                    <input type="date" name="date[{{$item}}][]" class="date-input artiste" data-date="{{$item}}" value="{{$key[0]}}">
                                </div>
                                <div class="inputs__wrap">
                                    <p class="inputs__title">C</p>
                                    <input type="time" name="date[{{$item}}][]" class="date-input" value="{{$key[1]}}">
                                </div>
                                <div class="inputs__wrap">
                                    <p class="inputs__title">До</p>
                                    <input type="time" name="date[{{$item}}][]" class="date-input" value="{{$key[2]}}">
                                </div>
                            </div>
                        @endforeach
                        <a class="add_date_event dates" data-events="{{$count_data}}">Добавить дату</a>
                    </div>
                    <div class="create__column">
                        <h3 class="create__column-title">Дополнительно</h3>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Тип</p>
                            <div class="select">
                                <div class="select__value">{{$type_event->name}}</div>
                                <div class="select__variants">
                                    <label for="type_1" class="select__variant select__variant--active"><span>Концерт</span></label>
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
                                    <input type="radio" name="type" id="type_1" value="1" @if ($event_data->type == 1) checked @endif>
                                    <input type="radio" name="type" id="type_2" value="2" @if ($event_data->type == 2) checked @endif>
                                    <input type="radio" name="type" id="type_3" value="3" @if ($event_data->type == 3) checked @endif>
                                    <input type="radio" name="type" id="type_4" value="4" @if ($event_data->type == 4) checked @endif>
                                    <input type="radio" name="type" id="type_5" value="5" @if ($event_data->type == 5) checked @endif>
                                    <input type="radio" name="type" id="type_6" value="6" @if ($event_data->type == 6) checked @endif>
                                    <input type="radio" name="type" id="type_7" value="7" @if ($event_data->type == 7) checked @endif>
                                    <input type="radio" name="type" id="type_8" value="8" @if ($event_data->type == 8) checked @endif>
                                    <input type="radio" name="type" id="type_9" value="9" @if ($event_data->type == 9) checked @endif>
                                    <input type="radio" name="type" id="type_10" value="10" @if ($event_data->type == 10) checked @endif>
                                </div>
                            </div>
                        </div>

                        <div class="inputs__wrap">
                            <p class="inputs__title">Площадка открытая или закрытая?</p>
                            <div class="select">
                                <div class="select__value">{{$event_data->place}}</div>
                                <div class="select__variants">
                                    <label for="place_1" class="select__variant select__variant--active"><span>Открытая</span></label>
                                    <label for="place_2" class="select__variant"><span>Закрытая</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="place" id="place_1" value="Открытая" @if ($event_data->place == "Открытая") checked @endif>
                                    <input type="radio" name="place" id="place_2" value="Закрытая" @if ($event_data->place == "Закрытая") checked @endif>
                                </div>
                            </div>
                        </div>

                        <div class="inputs__wrap">
                            <p class="inputs__title">Количество человек</p>
                            <div class="select">
                                <div class="select__value">@if ($event_data->people == 10)<i class="first_people"></i>@endif @if ($event_data->people == 100)<i class="two_people"></i>@endif @if ($event_data->people == 1000)<i class="three_people"></i>@endifДо {{$event_data->people}}</div>
                                <div class="select__variants">
                                    <label for="people_1" class="select__variant select__variant--active"><span><i class="first_people"></i>До 10</span></label>
                                    <label for="people_2" class="select__variant"><span><i class="two_people"></i>До 100</span></label>
                                    <label for="people_3" class="select__variant"><span><i class="three_people"></i>Более 1000</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="people" id="people_1" value="10" @if ($event_data->people == "10") checked @endif>
                                    <input type="radio" name="people" id="people_2" value="100" @if ($event_data->people == "100") checked @endif>
                                    <input type="radio" name="people" id="people_3" value="1000" @if ($event_data->people == "1000") checked @endif>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="preview_title">кого ищите</div>
                <div class="get-artist-info undo-margin">
                    <div class="artist-data-titles">
                        <h3 class="create__column-title">Артисты</h3>
                        <h3 class="create__column-title">Дополнительно</h3>
                    </div>
                    @foreach($artist_type as $item => $key)
                    <div class="artist-create-item" id="artist_{{$item}}">
                        <div class="inputs__wrap">
                            <p class="inputs__title">Тип артиста</p>
                            <div class="select tip_artist">
                                <div class="select__value">@if ($key[0] == "0") Вокалист @endif @if ($key[0] == "1") Группа @endif @if ($key[0] == "2") DJ @endif @if ($key[0] == "3") Ведущий @endif</div>
                                <div class="select__variants">
                                    <label for="artist_type[{{$item}}]_0" class="select__variant select__variant--active"><span>Вокалист</span></label>
                                    <label for="artist_type[{{$item}}]_1" class="select__variant"><span>Группа</span></label>
                                    <label for="artist_type[{{$item}}]_2" class="select__variant"><span>DJ</span></label>
                                    <label for="artist_type[{{$item}}]_3" class="select__variant"><span>Ведущий</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="artist_type[{{$item}}][]" id="artist_type[{{$item}}]_0" value="0" @if ($key[0] == "0") checked="checked" @endif>
                                    <input type="radio" name="artist_type[{{$item}}][]" id="artist_type[{{$item}}]_1" value="1" @if ($key[0] == "1") checked="checked" @endif>
                                    <input type="radio" name="artist_type[{{$item}}][]" id="artist_type[{{$item}}]_2" value="2" @if ($key[0] == "2") checked="checked" @endif>
                                    <input type="radio" name="artist_type[{{$item}}][]" id="artist_type[{{$item}}]_3" value="3" @if ($key[0] == "3") checked="checked" @endif>
                                </div>
                            </div>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">В жанре</p>
                            <div class="select genre_artist">
                                <div class="select__value">{{$skills[$artist_genre[$item][0]]->name}}</div>
                                <div class="select__variants">
                                    <label for="artist_genre[{{$item}}]_0" class="select__variant select__variant--active"><span>Авторский</span></label>
                                    <label for="artist_genre[{{$item}}]_1" class="select__variant"><span>Блатной</span></label>
                                    <label for="artist_genre[{{$item}}]_2" class="select__variant"><span>Блюз</span></label>
                                    <label for="artist_genre[{{$item}}]_3" class="select__variant"><span>Джаз</span></label>
                                    <label for="artist_genre[{{$item}}]_4" class="select__variant"><span>Диско</span></label>
                                    <label for="artist_genre[{{$item}}]_5" class="select__variant"><span>Индийский</span></label>
                                    <label for="artist_genre[{{$item}}]_6" class="select__variant"><span>Кантри</span></label>
                                    <label for="artist_genre[{{$item}}]_7" class="select__variant"><span>Латино</span></label>
                                    <label for="artist_genre[{{$item}}]_8" class="select__variant"><span>Народная</span></label>
                                    <label for="artist_genre[{{$item}}]_9" class="select__variant"><span>Рок</span></label>
                                    <label for="artist_genre[{{$item}}]_10" class="select__variant"><span>Романс</span></label>
                                    <label for="artist_genre[{{$item}}]_11" class="select__variant"><span>Ска</span></label>
                                    <label for="artist_genre[{{$item}}]_12" class="select__variant"><span>Хип-Хоп</span></label>
                                    <label for="artist_genre[{{$item}}]_13" class="select__variant"><span>Шансон</span></label>
                                    <label for="artist_genre[{{$item}}]_14" class="select__variant"><span>Электронная</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_0" value="0" @if($artist_genre[$item][0] == 0) checked="checked" @endif>
                                    <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_1" value="1" @if($artist_genre[$item][0] == 1) checked="checked" @endif>
                                    <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_2" value="2" @if($artist_genre[$item][0] == 2) checked="checked" @endif>
                                    <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_3" value="3" @if($artist_genre[$item][0] == 3) checked="checked" @endif>
                                    <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_4" value="4" @if($artist_genre[$item][0] == 4) checked="checked" @endif>
                                    <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_5" value="5" @if($artist_genre[$item][0] == 5) checked="checked" @endif>
                                    <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_6" value="6" @if($artist_genre[$item][0] == 6) checked="checked" @endif>
                                    <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_7" value="7" @if($artist_genre[$item][0] == 7) checked="checked" @endif>
                                    <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_8" value="8" @if($artist_genre[$item][0] == 8) checked="checked" @endif>
                                    <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_9" value="9" @if($artist_genre[$item][0] == 9) checked="checked" @endif>
                                    <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_10" value="10" @if($artist_genre[$item][0] == 10) checked="checked" @endif>
                                    <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_11" value="11" @if($artist_genre[$item][0] == 11) checked="checked" @endif>
                                    <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_12" value="12" @if($artist_genre[$item][0] == 12) checked="checked" @endif>
                                    <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_13" value="13" @if($artist_genre[$item][0] == 13) checked="checked" @endif>
                                    <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_14" value="14" @if($artist_genre[$item][0] == 14) checked="checked" @endif>
                                </div>
                            </div>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">На дату</p>
                            <div class="select data_artist">
                                <div class="select__value">{{$data[$artist_date[$item][0]][0]}}</div>
                                <div class="select__variants">
                                    @foreach ($data as $date => $key)
                                        <label for="artist_date[{{$item}}]_{{$date}}" class="select__variant"><span>{{$key[0]}}</span></label>
                                    @endforeach
                                </div>
                                <div class="radio-elements none">
                                    @foreach ($data as $value => $key)
                                        <input type="radio" name="artist_date[{{$item}}][]" id="artist_date[{{$item}}]_{{$value}}" value="{{$value}}" @if ($artist_date[$item][0] == $value) checked="checked" @endif>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Пожелания и требования</p>
                            <div class="inputs__wrap">
                                <textarea class="create_trebovania" name="artist_wish[]" cols="30" rows="10">{{$artist_wish[$item]}}</textarea>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <a class="add_date_event artistes" data-artists="{{$count_artist}}">Добавить артиста</a>
                </div>
                <div class="preview_title">условия сотрудничества</div>
                <div class="create__columns undo-margin">
                    <div class="create__column">
                        <h3 class="create__column-title">Оплата</h3>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Что оплачивается</p>
                            <div class="select">
                                <div class="select__value">{{$event_data->payment}}</div>
                                <div class="select__variants">
                                    <label for="payment_0" class="select__variant select__variant--active"><span>Часы</span></label>
                                    <label for="payment_1" class="select__variant"><span>Дни</span></label>
                                    <label for="payment_2" class="select__variant"><span>Песни</span></label>
                                    <label for="payment_3" class="select__variant"><span>Договорная</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="payment" id="payment_0" value="Часы" @if ($event_data->payment == "Часы") checked @endif>
                                    <input type="radio" name="payment" id="payment_1" value="Дни" @if ($event_data->payment == "Дни") checked @endif>
                                    <input type="radio" name="payment" id="payment_2" value="Песни" @if ($event_data->payment == "Песни") checked @endif>
                                    <input type="radio" name="payment" id="payment_3" value="Договорная" @if ($event_data->payment == "Договорная") checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Форма оплаты</p>
                            <div class="select">
                                <div class="select__value">{{$event_data->payment_method}}</div>
                                <div class="select__variants">
                                    <label for="payment_method_0" class="select__variant select__variant--active"><span>Наличные</span></label>
                                    <label for="payment_method_1" class="select__variant"><span>На карту</span></label>
                                    <label for="payment_method_2" class="select__variant"><span>Безналичный</span></label>
                                    <label for="payment_method_3" class="select__variant"><span>Договорная</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="payment_method" id="payment_method_0" value="Наличные" @if ($event_data->payment_method == "Наличные") checked @endif>
                                    <input type="radio" name="payment_method" id="payment_method_1" value="На карту" @if ($event_data->payment_method == "На карту") checked @endif>
                                    <input type="radio" name="payment_method" id="payment_method_2" value="Безналичный" @if ($event_data->payment_method == "Безналичный") checked @endif>
                                    <input type="radio" name="payment_method" id="payment_method_3" value="Договорная" @if ($event_data->payment_method == "Договорная") checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Предоплата</p>
                            <div class="select">
                                <div class="select__value">{{$event_data->payment_condition}}</div>
                                <div class="select__variants">
                                    <label for="payment_condition_0" class="select__variant select__variant--active"><span>Без предоплаты</span></label>
                                    <label for="payment_condition_1" class="select__variant"><span>30%</span></label>
                                    <label for="payment_condition_2" class="select__variant"><span>50%</span></label>
                                    <label for="payment_condition_3" class="select__variant"><span>100%</span></label>
                                    <label for="payment_condition_4" class="select__variant"><span>Договорная</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="payment_condition" id="payment_condition_0" value="Без предоплаты" @if ($event_data->payment_condition == "Без предоплаты") checked @endif>
                                    <input type="radio" name="payment_condition" id="payment_condition_1" value="30%" @if ($event_data->payment_condition == "30%") checked @endif>
                                    <input type="radio" name="payment_condition" id="payment_condition_2" value="50%" @if ($event_data->payment_condition == "50%") checked @endif>
                                    <input type="radio" name="payment_condition" id="payment_condition_3" value="100%" @if ($event_data->payment_condition == "100%") checked @endif>
                                    <input type="radio" name="payment_condition" id="payment_condition_4" value="Договорная" @if ($event_data->payment_condition == "Договорная") checked @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="create__column">
                        <h3 class="create__column-title">Договор</h3>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Должен иметь свое оборудование?</p>
                            <div class="select">
                                <div class="select__value">{{$event_data->instruments}}</div>
                                <div class="select__variants">
                                    <label for="instruments_0" class="select__variant select__variant--active"><span>Да</span></label>
                                    <label for="instruments_1" class="select__variant"><span>Нет</span></label>
                                    <label for="instruments_3" class="select__variant"><span>Договорная</span></label>
                                </div>
                                <div class="radio-elements none">
                                    <input type="radio" name="instruments" id="instruments_0" value="Да" @if ($event_data->instruments == "Да") checked @endif>
                                    <input type="radio" name="instruments" id="instruments_1" value="Нет" @if ($event_data->instruments == "Нет") checked @endif>
                                    <input type="radio" name="instruments" id="instruments_2" value="Договорная" @if ($event_data->instruments == "Договорная") checked @endif>
                                </div>
                            </div>
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">Файл договора</p>
                            <label class="inputs__file cover dogovor">
                                <span class="dogovors set-doc">{{$event_data->dogovor}}</span>
                                <span class="del-doc active">x</span>
                                <input type="file" name="dogovor" id="dogovor">
                            </label>
                        </div>
                    </div>
                    <div class="create__column">
                        <h3 class="create__column-title">Дополнительно</h3>
                        <div class="genre-list">
                            <div class="genre-item">
                                <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_1" value="Тематика 18+" @foreach ($dop_option as $item => $key) @if($key == "Тематика 18+") checked @endif @endforeach>
                                <label class="form-check-label" for="dop_option_1">Тематика 18+</label>
                            </div>
                            <div class="genre-item">
                                <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_2" value="Наличие охраны" @foreach ($dop_option as $item => $key) @if($key == "Наличие охраны") checked @endif @endforeach>
                                <label class="form-check-label" for="dop_option_2">Наличие охраны</label>
                            </div>
                            <div class="genre-item">
                                <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_3" value="Наличие координатора" @foreach ($dop_option as $item => $key) @if($key == "Наличие координатора") checked @endif @endforeach>
                                <label class="form-check-label" for="dop_option_3">Наличие координатора</label>
                            </div>
                            <div class="genre-item">
                                <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_4" value="Отдельная зона для курящих" @foreach ($dop_option as $item => $key) @if($key == "Отдельная зона для курящих") checked @endif @endforeach>
                                <label class="form-check-label" for="dop_option_4">Отдельная зона для курящих</label>
                            </div>
                            <div class="genre-item">
                                <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_5" value="Бар и алкоголь" @foreach ($dop_option as $item => $key) @if($key == "Бар и алкоголь") checked @endif @endforeach>
                                <label class="form-check-label" for="dop_option_5">Бар и алкоголь</label>
                            </div>
                            <div class="genre-item">
                                <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_6" value="Экран / проектор для видео" @foreach ($dop_option as $item => $key) @if($key == "Экран / проектор для видео") checked @endif @endforeach>
                                <label class="form-check-label" for="dop_option_6">Экран / проектор для видео</label>
                            </div>
                        </div>
                    </div>
                    <div class="create__column">
                        <h3 class="create__column-title hidden">Дополнительные условия</h3>
                        <p class="inputs__title">Дополнительные условия</p>
                        <textarea name="additional_conditions" class="dop-info-uslovia" cols="30" rows="10">{{$event_data->additional_conditions}}</textarea>
                    </div>
                </div>
                <div class="create__btn previews-btn">
                    <button type="submit" class="btn">сохранить изменения</button>
                    <a href="/delete-event/{{$event_data->id}}" class="btn__back">удалить мероприятие</a>
                </div>
            </form>
        </div>
    </section>
@endsection
