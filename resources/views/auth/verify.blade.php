@extends('layouts.app')

@section('title')
    <title>Подтверждение почты - MuzPlace</title>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center mail-verify">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Подтвердите Вашу почту</div>

                <div class="card-body">
                    На Вашу почту отправлено письмо для активации аккаунта.<br>
                    Если Вы не получили письмо, нажмите на кнопку ниже:
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Отправить новое письмо</button>
                    </form>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Сообщение с подтверждением отправлено на Вашу почту!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
