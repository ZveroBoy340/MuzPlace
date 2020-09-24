@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5">Редактирование пользователя</h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <form method="post" enctype="multipart/form-data" action="/mpadmin/users/{{ $user->id }}/update">
                            @csrf
                            <div class="detail-container">
                                <div class="detail-left">
                                    <div class="details-contact">
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Фотография профиля</p>
                                            <div class="contact-image-content">
                                                <img @if($user->avatar) src="/uploads/avatars/{{ $user->avatar }}" @else src="/images/artist.png" @endif class="contact-image img-view" alt="">
                                                <input type="file" name="avatar" id="avatar" class="img-load none">
                                                <label for="avatar" class="attached-foto">Загрузить фотографию</label>
                                            </div>
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Тип пользователя: @if($user->status == 'artist') <span class="green-back">Артист</span> @elseif($user->status == 'organizator') <span class="orange-back">Организатор</span>@endif</p>
                                            <div class="group_status">
                                                <a class="btn btn-primary" href="/mpadmin/users/{{ $user->id }}/status/organizator">Организатор</a>
                                                <a class="btn btn-warning" href="/mpadmin/users/{{ $user->id }}/status/artist">Артист</a>
                                            </div>
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Сценическое имя</p>
                                            <input type="text" class="form-control" name="login" value="{{ $user->login }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Опыт работы (лет)</p>
                                            <input type="number" class="form-control" name="expirience" value="{{ $user->expirience }}" min="0" max="99">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Имя</p>
                                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Фамилия</p>
                                            <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Выберите город</p>
                                            <select name="city" id="city-list" class="form-control">
                                                <option value="Москва" @if ($user->city  == "Москва") selected @endif>Москва</option>
                                                <option value="Санкт-Петербург" @if ($user->city  == "Санкт-Петербург") selected @endif>Санкт-Петербург</option>
                                                <option value="Новосибирск" @if ($user->city  == "Новосибирск") selected @endif>Новосибирск</option>
                                                <option value="Екатеринбург" @if ($user->city  == "Екатеринбург") selected @endif>Екатеринбург</option>
                                                <option value="Нижний" @if ($user->city  == "Нижний") selected @endif>Нижний</option>
                                                <option value="Новгород" @if ($user->city  == "Новгород") selected @endif>Новгород</option>
                                                <option value="Челябинск" @if ($user->city  == "Челябинск") selected @endif>Челябинск</option>
                                                <option value="Самара" @if ($user->city  == "Самара") selected @endif>Самара</option>
                                                <option value="Омск" @if ($user->city  == "Омск") selected @endif>Омск</option>
                                                <option value="Ростов-на-Дону" @if ($user->city  == "Ростов-на-Дону") selected @endif>Ростов-на-Дону</option>
                                                <option value="Уфа" @if ($user->city  == "Уфа") selected @endif>Уфа</option>
                                                <option value="Красноярск" @if ($user->city  == "Красноярск") selected @endif>Красноярск</option>
                                                <option value="Воронеж" @if ($user->city  == "Воронеж") selected @endif>Воронеж</option>
                                                <option value="Пермь" @if ($user->city  == "Пермь") selected @endif>Пермь</option>
                                                <option value="Волгоград" @if ($user->city  == "Волгоград") selected @endif>Волгоград</option>
                                            </select>
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Дата рождения</p>
                                            <input type="date" class="form-control date-input" name="birthday" placeholder="Дата" value="{{date('Y-m-d', strtotime($user->birthday))}}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Пол</p>
                                            <div class="gender-radio">
                                                <input type="radio" id="man" name="gender" value="man" @if ($user->gender  == "man") checked @endif >
                                                <label for="man">Мужской</label>
                                                <input type="radio" id="girl" name="gender" value="woman" @if ($user->gender  == "woman") checked @endif >
                                                <label for="girl">Женский</label>
                                            </div>
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Email</p>
                                            <input type="text" name="email" class="form-control" placeholder="email@mail.ru" value="{{ $user->email }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Телефон</p>
                                            <input type="tel" name="phone" class="form-control" class="tel" value="{{ $user->phone }}">
                                        </div>
                                    </div>

                                    <div class="contact-password">
                                        <div class="contact-info-title">Настройка пароля</div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Новый пароль (если нужно сменить)</p>
                                            <input type="password" name="password" class="form-control" placeholder="********" id="new-pass">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="detail-right">
                                    <div class="contact-about">
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">О себе</p>
                                            <textarea name="about" class="form-control" cols="30" rows="10">{{ $user->about }}</textarea>
                                        </div>
                                    </div>
                                    <div class="contact-social">
                                        <div class="contact-info-title">Социальные сети</div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">FaceBook</p>
                                            <input type="text" class="form-control" name="facebook" value="{{ $user->facebook }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Вконтакте</p>
                                            <input type="text" class="form-control" name="vkontakte" value="{{ $user->vkontakte }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Одноклассники</p>
                                            <input type="text" class="form-control" name="odnoklassniki" value="{{ $user->odnoklassniki }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Instagram</p>
                                            <input type="text" class="form-control" name="instagram" value="{{ $user->instagram }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Telegram</p>
                                            <input type="text" class="form-control" name="telegram" value="{{ $user->telegram }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Twitter</p>
                                            <input type="text" class="form-control" name="twitter" value="{{ $user->twitter }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block mt-4" type="submit">Сохранить изменения</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
