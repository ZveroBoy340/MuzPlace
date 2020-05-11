@extends('layouts.app')

@section('content')
    <section class="lk-data">
        <div class="center-wrap">
            <form action="" class="inputs">
                <div class="contact-info-title">Общая информация</div>
                <div class="detail-container">
                    <div class="detail-left">
                        <div class="details-contact">
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Фотография профиля</p>
                                <div class="contact-image-content">
                                    <div class="contact-image"></div>
                                    <a href="" class="attached-foto">Загрузить фотографию</a>
                                </div>
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Сценическое имя</p>
                                <input type="text">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Имя</p>
                                <input type="text">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Фамилия</p>
                                <input type="text">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Дата рождения</p>
                                <input type="date">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Пол</p>
                                <div class="gender-radio">
                                    <input type="radio" id="man" name="gender" value="man">
                                    <label for="contactChoice1">Мужской</label>
                                    <input type="radio" id="girl" name="gender" value="girl">
                                    <label for="girl">Женский</label>
                                </div>
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Email</p>
                                <input type="text">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Телефон</p>
                                <input type="text">
                            </div>
                        </div>

                        <div class="contact-password">
                            <div class="contact-info-title">Настройка пароля</div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Пароль</p>
                                <input type="password">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Подтверждение пароля</p>
                                <input type="password">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Старый пароль</p>
                                <input type="password">
                            </div>
                        </div>
                    </div>
                    <div class="detail-right">
                        <div class="contact-about">
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">О себе</p>
                                <textarea name="" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="contact-social">
                            <div class="contact-info-title">Социальные сети</div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">FaceBook</p>
                                <input type="text">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Вконтакте</p>
                                <input type="text">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Одноклассники</p>
                                <input type="text">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Instagram</p>
                                <input type="text">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Telegram</p>
                                <input type="text">
                            </div>
                            <div class="inputs__wrap">
                                <p class="inputs__wrap-title">Twitter</p>
                                <input type="text">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sub-contacts">
                    <input type="submit" class="btn" value='Сохранить'>
                    <input type="submit" class="btn btn-black" value='Как видят мою анкету'>
                </div>
            </form>
        </div>
    </section>
@endsection
