@extends('layouts.app')

@section('title')
    <title>Восстановление пароля - MuzPlace</title>
@endsection

@section('content')
    <div class="autorization">
        <div class="registered-login active">
            <div class="left-login">
                <div class="login-title">Восстановление пароля</div>
                <p>После указания данных вам на почту придет письмо для смены пароля</p>
                <div class="login-image"></div>
            </div>
            <div class="right-login">
                <form method="POST" action="{{ route('password.email') }}" class="login-user">
                    @csrf
                    <div class="input-field">
                        <input id="email" type="email" class="login-field @error('email') is-invalid @enderror" placeholder="E-mail" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @if (session('status'))
                            <span class="invalid-feedback" role="alert">
                                Ссылка на восстановление пароля отправлена!
                            </span>
                        @endif
                    </div>

                    <button type="submit" class="btn">Получить новый пароль</button>
                </form>
                <div class="change-autorization">
                    <div class="no-acc"><span>Нет аккаунта?</span></div>
                    <a href="{{ route('register') }}" class="btn">Зарегистрироваться</a>
                </div>
            </div>
        </div>
    </div>
@endsection
