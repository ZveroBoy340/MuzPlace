@extends('layouts.app')

@section('title')
    <title>Новый пароль - MuzPlace</title>
@endsection

@section('content')
    <div class="autorization">
        <div class="registered-login active">
            <div class="left-login">
                <div class="login-title">Смена пароля</div>
                <p>Введите новый пароль, который будет закреплен за Вашим аккаунтом</p>
                <div class="login-image"></div>
            </div>
            <div class="right-login">
                <form method="POST" action="{{ route('password.update') }}" class="login-user">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="input-field">
                        <input id="email" type="email" class="login-field @error('email') is-invalid @enderror" placeholder="E-mail" name="email" value="{{ $email ?? old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-field">
                        <input type="password" class="login-field @error('password') is-invalid @enderror" placeholder="Пароль"  name="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-field">
                        <input id="password-confirm" type="password" class="login-field @error('password') is-invalid @enderror" placeholder="Повторите пароль" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn">{{ __('Reset Password') }}</button>
                </form>
                <div class="change-autorization">
                    <div class="no-acc"><span>Нет аккаунта?</span></div>
                    <a href="{{ route('register') }}" class="btn">Зарегистрироваться</a>
                </div>
            </div>
        </div>
    </div>

@endsection
