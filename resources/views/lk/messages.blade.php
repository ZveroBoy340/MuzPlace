@extends('layouts.app')

@section('content')
    <section class="lk-messages">
        <div class="center-wrap">
            <div class="lk-list">
                <div class="lk-list__header">
                    <p>Дата</p>
                    <p>Название</p>
                    <div class="lk-list__header-item">
                        <span>C</span>
                        <div class="date-input">Дата</div>
                    </div>
                    <div class="lk-list__header-item">
                        <span>По</span>
                        <div class="date-input">Дата</div>
                    </div>
                </div>
                <div class="lk-list__item">
                    <p>03.09.2019</p>
                    <p><a href="/lk-event.html">Новая заявка на Holi Dance of Colours León 2019</a></p>
                </div>
                <div class="lk-list__item">
                    <p>03.09.2019</p>
                    <p><a href="/lk-event.html">Ваше мероприятие прошло проверку</a></p>
                </div>
                <div class="lk-list__item">
                    <p>03.09.2019</p>
                    <p><a href="/lk-event.html">Мероприяие Holi Dance of Colours León 2019 остановлено т.к. набралось достаточное количество участников</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
