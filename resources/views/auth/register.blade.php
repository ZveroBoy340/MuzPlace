@extends('layouts.app')

@section('content')
    <div class="autorization">
        <div class="guest-register">
            <div class="left-login">
                <div class="login-title">Зарегистрироваться</div>
                <p>Нажимая «Создать учетную запись», вы подтверждаете, что прочитали и соглашаетесь с Правилами порталa и Политикой конфиденциальности.</p>
                <div class="login-image"></div>
            </div>
            <div class="right-login">
                <div class="type-user">
                    <span id="organizator" class="active">Я организатор</span>
                    <span id="artist">Я артист</span>
                </div>
                <form method="POST" action="{{ route('register') }}" class="login-user">
                    @csrf
                    <div class="input-field">
                        <input id="email" type="text" class="login-field @error('email') is-invalid @enderror" placeholder="Телефон или E-mail" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <input type="password" class="login-field @error('password') is-invalid @enderror" placeholder="Пароль"  name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="hidden" name="status" id="status" value="organizator">
                    <button type="submit" class="btn">Зарегистрироваться</button>
                </form>
                <div class="change-autorization">
                    <div class="no-acc"><span>Зарегистрированы?</span></div>
                    <a href="{{ route('login') }}" class="btn">Войти</a>
                </div>
            </div>
        </div>
    </div>
@endsection
