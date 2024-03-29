@extends('layouts.app')

@section('content')
    <section class="lk-data">
        <div class="center-wrap">
            <form action="/lk-info-update" class="inputs" method="post" enctype="multipart/form-data">
                @csrf
                <div class="contact-info-title">Общая информация</div>
                <div class="detail-container">
                    <div class="detail-left">
                        <div class="details-contact">
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Фотография профиля</p>
                                <div class="contact-image-content">
                                    <img src="uploads/avatars/{{ Auth::user()->avatar }}" class="contact-image img-view" alt="">
                                    <input type="file" name="avatar" id="avatar" class="img-load none">
                                    <label for="avatar" class="attached-foto">Загрузить фотографию</label>
                                </div>
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Сценическое имя</p>
                                <input type="text" name="login" value="{{ Auth::user()->login }}">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Опыт работы (лет)</p>
                                <div class="exp-group">
                                    <button type="button" class="minus-exp">-</button>
                                    <input type="number" id="expirience" name="expirience" value="{{ Auth::user()->expirience }}" min="0" max="99">
                                    <button type="button" class="plus-exp">+</button>
                                </div>
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Имя</p>
                                <input type="text" name="name" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Фамилия</p>
                                <input type="text" name="lastname" value="{{ Auth::user()->lastname }}">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Выберите город</p>
                                <select name="city" id="city-list">
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
                                <p class="inputs__wrap-title">Дата рождения</p>
                                <input type="text" name="birthday" class="date-input datepicker-here" placeholder="Дата" value="{{ Auth::user()->birthday}}">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Пол</p>
                                <div class="gender-radio">
                                    <input type="radio" id="man" name="gender" value="man" @if (Auth::user()->gender  == "man") checked @endif >
                                    <label for="man">Мужской</label>
                                    <input type="radio" id="girl" name="gender" value="woman" @if (Auth::user()->gender  == "woman") checked @endif >
                                    <label for="girl">Женский</label>
                                </div>
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Email</p>
                                <input type="text" name="email" value="{{ Auth::user()->email }}" disabled>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Телефон</p>
                                <input type="tel" name="phone" class="tel" value="{{ Auth::user()->phone }}">
                            </div>
                        </div>

                        <div class="contact-password">
                            <div class="contact-info-title">Настройка пароля</div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Пароль</p>
                                <input type="password" name="password" id="new-pass">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Подтверждение пароля</p>
                                <input type="password" id="repeat-pass">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Старый пароль</p>
                                <input type="password" name="old_pass">
                            </div>
                        </div>
                    </div>
                    <div class="detail-right">
                        <div class="contact-about">
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">О себе</p>
                                <textarea name="about" cols="30" rows="10">{{ Auth::user()->about }}</textarea>
                            </div>
                        </div>
                        <div class="contact-social">
                            <div class="contact-info-title">Социальные сети</div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">FaceBook</p>
                                <input type="text" name="facebook" value="{{ Auth::user()->facebook }}">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Вконтакте</p>
                                <input type="text" name="vkontakte" value="{{ Auth::user()->vkontakte }}">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Одноклассники</p>
                                <input type="text" name="odnoklassniki" value="{{ Auth::user()->odnoklassniki }}">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Instagram</p>
                                <input type="text" name="instagram" value="{{ Auth::user()->instagram }}">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Telegram</p>
                                <input type="text" name="telegram" value="{{ Auth::user()->telegram }}">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Twitter</p>
                                <input type="text" name="twitter" value="{{ Auth::user()->twitter }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sub-contacts">
                    <input type="submit" class="btn" value='Сохранить'>
                    <a href="/artist/{{ Auth::user()->id }}" class="btn btn-black">Как видят мою анкету</a>
                </div>
            </form>
        </div>
    </section>
@endsection
