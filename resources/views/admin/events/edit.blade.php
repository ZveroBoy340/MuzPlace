@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5">Редактирование мероприятия</h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <section class="create">
                            <div class="center-wrap">
                                <form action="/mpadmin/events/{{$event_data->id}}/update" method="post" enctype="multipart/form-data" class="inputs inputs--small">
                                    @csrf
                                    <div class="inputs__wrap">
                                        <p class="inputs__wrap-title">Статус модерации: @if($event_data->status == 'check') <span>Не проверен</span> @elseif($event_data->status == 'accept') <span class="green-back">Одобрен</span> @else <span class="red-back">Отклонен</span> @endif</p>
                                        <div class="group_status">
                                            <a class="btn btn-primary" href="/mpadmin/events/{{ $event_data->id }}/status/accept">Одобрить</a>
                                            <a class="btn btn-danger" href="/mpadmin/events/{{ $event_data->id }}/status/decline">Отклонить</a>
                                            <a class="btn btn-warning" href="/mpadmin/events/{{ $event_data->id }}/status/check">Не проверен</a>
                                        </div>
                                    </div>
                                    <div class="preview_title">о мероприятии</div>
                                    <div class="create__columns undo-margin">
                                        <div class="create__column">
                                            <h3 class="create__column-title">Описание</h3>
                                            <div class="inputs__wrap">
                                                <p class="inputs__wrap-title">Выберите город</p>
                                                <select name="city" id="city-list" class="events-city form-control" required>
                                                    <option value="Москва" @if ($event_data->city  == "Москва") selected @endif>Москва</option>
                                                    <option value="Санкт-Петербург" @if ($event_data->city  == "Санкт-Петербург") selected @endif>Санкт-Петербург</option>
                                                    <option value="Новосибирск" @if ($event_data->city  == "Новосибирск") selected @endif>Новосибирск</option>
                                                    <option value="Екатеринбург" @if ($event_data->city  == "Екатеринбург") selected @endif>Екатеринбург</option>
                                                    <option value="Нижний" @if ($event_data->city  == "Нижний") selected @endif>Нижний</option>
                                                    <option value="Новгород" @if ($event_data->city  == "Новгород") selected @endif>Новгород</option>
                                                    <option value="Челябинск" @if ($event_data->city  == "Челябинск") selected @endif>Челябинск</option>
                                                    <option value="Самара" @if ($event_data->city  == "Самара") selected @endif>Самара</option>
                                                    <option value="Омск" @if ($event_data->city  == "Омск") selected @endif>Омск</option>
                                                    <option value="Ростов-на-Дону" @if ($event_data->city  == "Ростов-на-Дону") selected @endif>Ростов-на-Дону</option>
                                                    <option value="Уфа" @if ($event_data->city  == "Уфа") selected @endif>Уфа</option>
                                                    <option value="Красноярск" @if ($event_data->city  == "Красноярск") selected @endif>Красноярск</option>
                                                    <option value="Воронеж" @if ($event_data->city  == "Воронеж") selected @endif>Воронеж</option>
                                                    <option value="Пермь" @if ($event_data->city  == "Пермь") selected @endif>Пермь</option>
                                                    <option value="Волгоград" @if ($event_data->city  == "Волгоград") selected @endif>Волгоград</option>
                                                </select>
                                            </div>
                                            <div class="inputs__wrap">
                                                <p class="inputs__title">Название</p>
                                                <input type="text" name="name" class="form-control" value="{{$event_data->name}}" required>
                                            </div>
                                            <div class="inputs__wrap">
                                                <p class="inputs__title">Краткое описание</p>
                                                <textarea name="description" class="form-control" cols="30" rows="10" required>{{$event_data->description}}</textarea>
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
                                                        <input type="date" name="date[{{$item}}][]" class="form-control date-input artiste" data-date="{{$item}}" value="{{date('Y-m-d', strtotime($key[0]))}}">
                                                    </div>
                                                    <div class="inputs__wrap">
                                                        <p class="inputs__title">C</p>
                                                        <input type="time" name="date[{{$item}}][]" class="form-control date-input" value="{{$key[1]}}">
                                                    </div>
                                                    <div class="inputs__wrap">
                                                        <p class="inputs__title">До</p>
                                                        <input type="time" name="date[{{$item}}][]" class="form-control date-input" value="{{$key[2]}}">
                                                    </div>
                                                    @if(!$loop->first)
                                                        <span class="del_dates" data-number="{{$item}}"></span>
                                                    @endif
                                                </div>
                                                @if($loop->last)
                                                    <a class="add_date_event dates" data-events="{{$item}}">Добавить дату</a>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="create__column">
                                            <h3 class="create__column-title">Дополнительно</h3>
                                            <div class="inputs__wrap">
                                                <p class="inputs__title">Тип</p>
                                                <div class="select">
                                                    <div class="select__value">{{$type_event->name}}</div>
                                                    <div class="select__variants">
                                                        @foreach ($types as $type)
                                                            <label for="type_{{$type->id}}" class="select__variant @if ($type->id == $type_event->id) select__variant--active @endif "><span>{{$type->name}}</span></label>
                                                        @endforeach
                                                    </div>
                                                    <div class="radio-elements none">
                                                        @foreach ($types as $type)
                                                            <input type="radio" name="type" id="type_{{$type->id}}" value="{{$type->id}}" @if ($type->id == $type_event->id) checked @endif>
                                                        @endforeach
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
                                                        @foreach ($genres as $genre)
                                                            @if($genre->id == $artist_genre[$item][0])
                                                                <div class="select__value">{{$genre->name}}</div>
                                                            @endif
                                                        @endforeach
                                                        <div class="select__variants">
                                                            @foreach ($genres as $genre)
                                                                <label for="artist_genre[{{$item}}]_{{$genre->id}}" class="select__variant @if($genre->id == $artist_genre[$item][0]) select__variant--active @endif"><span>{{$genre->name}}</span></label>
                                                            @endforeach
                                                        </div>
                                                        <div class="radio-elements none">
                                                            @foreach ($genres as $genre)
                                                                <input type="radio" name="artist_genre[{{$item}}][]" id="artist_genre[{{$item}}]_{{$genre->id}}" value="{{$genre->id}}" @if($genre->id == $artist_genre[$item][0]) checked="checked" @endif>
                                                            @endforeach
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
                                                        <textarea class="form-control create_trebovania" name="artist_wish[]" cols="30" rows="10">{{$artist_wish[$item]}}</textarea>
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
                                                    @if($event_data->dogovor)<span class="dogovors set-doc">{{$event_data->dogovor}}</span>@else <span class="dogovors">Добавить договор</span> @endif
                                                    <span class="del-doc @if($event_data->dogovor) active @endif">x</span>
                                                    <input type="file" name="dogovor" id="dogovor">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="create__column">
                                            <h3 class="create__column-title">Дополнительно</h3>
                                            <div class="genre-list">
                                                <div class="genre-item">
                                                    <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_1" value="Тематика 18+" @if($dop_option != null) @foreach ($dop_option as $item => $key) @if($key == "Тематика 18+") checked @endif @endforeach @endif>
                                                    <label class="form-check-label" for="dop_option_1">Тематика 18+</label>
                                                </div>
                                                <div class="genre-item">
                                                    <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_2" value="Наличие охраны" @if($dop_option != null) @foreach ($dop_option as $item => $key) @if($key == "Наличие охраны") checked @endif @endforeach @endif>
                                                    <label class="form-check-label" for="dop_option_2">Наличие охраны</label>
                                                </div>
                                                <div class="genre-item">
                                                    <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_3" value="Наличие координатора" @if($dop_option != null) @foreach ($dop_option as $item => $key) @if($key == "Наличие координатора") checked @endif @endforeach @endif>
                                                    <label class="form-check-label" for="dop_option_3">Наличие координатора</label>
                                                </div>
                                                <div class="genre-item">
                                                    <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_4" value="Отдельная зона для курящих" @if($dop_option != null) @foreach ($dop_option as $item => $key) @if($key == "Отдельная зона для курящих") checked @endif @endforeach @endif>
                                                    <label class="form-check-label" for="dop_option_4">Отдельная зона для курящих</label>
                                                </div>
                                                <div class="genre-item">
                                                    <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_5" value="Бар и алкоголь" @if($dop_option != null) @foreach ($dop_option as $item => $key) @if($key == "Бар и алкоголь") checked @endif @endforeach @endif>
                                                    <label class="form-check-label" for="dop_option_5">Бар и алкоголь</label>
                                                </div>
                                                <div class="genre-item">
                                                    <input type="checkbox" name="dop_option[]" class="check_skill" id="dop_option_6" value="Экран / проектор для видео" @if($dop_option != null) @foreach ($dop_option as $item => $key) @if($key == "Экран / проектор для видео") checked @endif @endforeach @endif>
                                                    <label class="form-check-label" for="dop_option_6">Экран / проектор для видео</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="create__column">
                                            <h3 class="create__column-title hidden">Дополнительные условия</h3>
                                            <p class="inputs__title">Дополнительные условия</p>
                                            <textarea name="additional_conditions" class="form-control dop-info-uslovia" cols="30" rows="10">{{$event_data->additional_conditions}}</textarea>
                                        </div>
                                    </div>
                                    <div class="create__btn previews-btn">
                                        <button type="submit" class="btn">сохранить изменения</button>
                                        <a class="btn__back del-event" data-del-href="/delete-event/{{$event_data->id}}">удалить мероприятие</a>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
