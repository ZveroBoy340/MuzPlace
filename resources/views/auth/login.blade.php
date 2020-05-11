@extends('layouts.app')

@section('content')
    <div class="autorization">
        <div class="registered-login active">
            <div class="left-login">
                <div class="login-title">Вход в личный кабинет</div>
                <p>Получите доступ к Личному кабинету, избранному и рекомендациям</p>
                <div class="login-image"></div>
            </div>
            <div class="right-login">
                <form method="POST" action="{{ route('login') }}" class="login-user">
                    @csrf
                    <div class="input-field">
                        <input id="email" type="email" class="login-field @error('email') is-invalid @enderror" placeholder="Телефон или E-mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-field">
                        <input id="password" type="password" class="login-field @error('password') is-invalid @enderror" name="password" placeholder="Пароль" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    @if (Route::has('password.request'))
                        <div class="lost-password">
                            <a href="{{ route('password.request') }}">Забыли пароль?</a>
                        </div>
                    @endif
                    <button type="submit" class="btn">Войти</button>
                </form>
                <div class="change-autorization">
                    <div class="no-acc"><span>Нет аккаунта?</span></div>
                    <a href="{{ route('register') }}" class="btn">Зарегистрироваться</a>
                </div>
            </div>
        </div>
    </div>
@endsection
