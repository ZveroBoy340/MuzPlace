<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"></head>
    <link rel="stylesheet" href="/css/jsRapCalendar.css" />
</head>
<body>
    <div id="app">
        <header class="header">
            <div class="center-wrap">
                <a href='{{ route('index') }}' class="header__logo">MuzPlace</a>
                <p class="header__desk">платформа музыкантов и организаторов</p>
                <a href="#" target="_blank" class="header__city">
                    <svg width="9" height="12" viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.3 0C2.14664 0 0.4 1.881 0.4 4.2C0.4 7.35 4.3 12 4.3 12C4.3 12 8.2 7.35 8.2 4.2C8.2 1.881 6.45336 0 4.3 0ZM4.3 5.7C3.53114 5.7 2.90714 5.028 2.90714 4.2C2.90714 3.372 3.53114 2.7 4.3 2.7C5.06886 2.7 5.69286 3.372 5.69286 4.2C5.69286 5.028 5.06886 5.7 4.3 5.7Z" fill="#828282"/>
                    </svg>

                    Санкт-Петербург</a>
                <form action="" class='header__search'>
                    <label for="">
                        <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.8328 11.4122L8.12106 8.45258C8.81829 7.58281 9.2003 6.48845 9.2003 5.34917C9.2003 2.68736 7.13663 0.521729 4.60015 0.521729C2.06367 0.521729 0 2.68736 0 5.34917C0 8.01098 2.06367 10.1766 4.60015 10.1766C5.55238 10.1766 6.45981 9.87521 7.23563 9.30305L9.96792 12.2852C10.0821 12.4096 10.2357 12.4783 10.4003 12.4783C10.5561 12.4783 10.7039 12.4159 10.8162 12.3026C11.0546 12.0618 11.0622 11.6626 10.8328 11.4122ZM4.60015 1.78106C6.47501 1.78106 8.00026 3.38167 8.00026 5.34917C8.00026 7.31667 6.47501 8.91728 4.60015 8.91728C2.72529 8.91728 1.20004 7.31667 1.20004 5.34917C1.20004 3.38167 2.72529 1.78106 4.60015 1.78106Z" fill="#828282"/>
                        </svg>

                    </label>
                    <input type="text" placeholder="Поиск">
                    <input type="submit">
                </form>
                <nav class="header__nav">
                    <ul class="header__nav-list">
                        @auth
                            @if (Auth::user()->status  == "organizator")
                                <li class="header__nav-item"><a href="{{ route('create') }}" class="btn-sm">Создать мероприятие</a></li>
                            @endif
                        @endauth
                        <li class="header__nav-item"><a href="{{ route('artists') }}" class="header__nav-link">Все артисты</a></li>
                        <li class="header__nav-item"><a href="{{ route('events') }}" class="header__nav-link">Все мероприятия</a></li>
                    </ul>
                </nav>
                @auth
                    <div class="user-profiles">
                        <a href="{{ route('home') }}"><img @if (Auth::user()->avatar  != null) src="/uploads/avatars/{{ Auth::user()->avatar }}" @else src="/img/user_ava.png" @endif alt=""> <span>{{ Auth::user()->name }}</span></a>
                    </div>
                    <a class="header__login header__login--logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.1747 1.07542C13.6245 0.525313 12.9623 0.250244 12.1873 0.250244H9.06254C8.97778 0.250244 8.91105 0.271245 8.86235 0.313693C8.8134 0.356003 8.78087 0.419486 8.76473 0.504141C8.74834 0.588762 8.73873 0.665208 8.73555 0.733548C8.73227 0.801854 8.73381 0.888185 8.74048 0.992302C8.74684 1.09649 8.75009 1.16158 8.75009 1.18771C8.76962 1.23984 8.77632 1.28382 8.76962 1.31957C8.76309 1.35524 8.7859 1.38466 8.83796 1.4074C8.88995 1.43018 8.91591 1.44814 8.91591 1.46107C8.91591 1.474 8.9534 1.48371 9.02827 1.49031C9.10318 1.49688 9.14077 1.50003 9.14077 1.50003H9.26777H9.37524H12.1878C12.6174 1.50003 12.9851 1.65295 13.2911 1.95911C13.5973 2.26507 13.7502 2.6328 13.7502 3.06257V9.93749C13.7502 10.3672 13.5973 10.7349 13.2911 11.0408C12.9852 11.3469 12.6174 11.4999 12.1878 11.4999H9.06299C8.97823 11.4999 8.91126 11.5211 8.86279 11.5633C8.81388 11.6058 8.78132 11.6692 8.76507 11.7537C8.74879 11.8384 8.73897 11.915 8.73583 11.9833C8.73268 12.0515 8.73408 12.1378 8.74075 12.242C8.74742 12.3462 8.7506 12.4112 8.7506 12.4372C8.7506 12.522 8.78125 12.595 8.84319 12.6571C8.9051 12.7189 8.97826 12.7498 9.06302 12.7498H12.1878C12.9625 12.7498 13.625 12.4747 14.1749 11.9243C14.725 11.3744 15.0001 10.7119 15.0001 9.93722V3.06244C14.9998 2.28768 14.7247 1.62535 14.1747 1.07542Z"></path>
                            <path d="M-9.008e-05 6.49991C-9.00948e-05 6.66915 0.0619216 6.81571 0.185536 6.93943L5.49805 12.252C5.62173 12.3755 5.76809 12.4375 5.93747 12.4375C6.10684 12.4375 6.25327 12.3755 6.37699 12.252C6.50064 12.1283 6.56251 11.9816 6.56251 11.8125L6.56251 8.99999L10.9375 8.99999C11.1068 8.99999 11.2533 8.93801 11.377 8.81447C11.5007 8.69072 11.5625 8.54419 11.5625 8.37491L11.5625 4.62494C11.5625 4.45567 11.5007 4.30914 11.377 4.18549C11.2532 4.06201 11.1067 3.99986 10.9374 3.99986L6.56251 3.99986L6.56251 1.18743C6.56251 1.01829 6.50064 0.871625 6.37699 0.748012C6.25314 0.624296 6.10671 0.562352 5.93747 0.562352C5.76819 0.562352 5.62173 0.624296 5.49805 0.748012L0.185536 6.06032C0.0619217 6.18417 -9.00652e-05 6.33073 -9.008e-05 6.49991Z"></path>
                        </svg>
                        <span>Выйти</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href='{{ route('login') }}' class="header__login">
                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.1747 1.07542C13.6245 0.525313 12.9623 0.250244 12.1873 0.250244H9.06254C8.97778 0.250244 8.91105 0.271245 8.86235 0.313693C8.8134 0.356003 8.78087 0.419486 8.76473 0.504141C8.74834 0.588762 8.73873 0.665208 8.73555 0.733548C8.73227 0.801854 8.73381 0.888185 8.74048 0.992302C8.74684 1.09649 8.75009 1.16158 8.75009 1.18771C8.76962 1.23984 8.77632 1.28382 8.76962 1.31957C8.76309 1.35524 8.7859 1.38466 8.83796 1.4074C8.88995 1.43018 8.91591 1.44814 8.91591 1.46107C8.91591 1.474 8.9534 1.48371 9.02827 1.49031C9.10318 1.49688 9.14077 1.50003 9.14077 1.50003H9.26777H9.37524H12.1878C12.6174 1.50003 12.9851 1.65295 13.2911 1.95911C13.5973 2.26507 13.7502 2.6328 13.7502 3.06257V9.93749C13.7502 10.3672 13.5973 10.7349 13.2911 11.0408C12.9852 11.3469 12.6174 11.4999 12.1878 11.4999H9.06299C8.97823 11.4999 8.91126 11.5211 8.86279 11.5633C8.81388 11.6058 8.78132 11.6692 8.76507 11.7537C8.74879 11.8384 8.73897 11.915 8.73583 11.9833C8.73268 12.0515 8.73408 12.1378 8.74075 12.242C8.74742 12.3462 8.7506 12.4112 8.7506 12.4372C8.7506 12.522 8.78125 12.595 8.84319 12.6571C8.9051 12.7189 8.97826 12.7498 9.06302 12.7498H12.1878C12.9625 12.7498 13.625 12.4747 14.1749 11.9243C14.725 11.3744 15.0001 10.7119 15.0001 9.93722V3.06244C14.9998 2.28768 14.7247 1.62535 14.1747 1.07542Z" fill="#E3E6E9"/>
                            <path d="M11.5627 6.49997C11.5627 6.33073 11.5006 6.18416 11.377 6.06045L6.06452 0.747901C5.94083 0.624356 5.79447 0.562378 5.62509 0.562378C5.45572 0.562378 5.30929 0.624356 5.18557 0.747901C5.06192 0.871617 5.00005 1.01825 5.00005 1.18742V3.99989H0.625107C0.455728 3.99989 0.309232 4.06187 0.18555 4.18541C0.0618678 4.30916 6.10352e-05 4.45569 6.10352e-05 4.62497V8.37493C6.10352e-05 8.54421 0.0618678 8.69074 0.185584 8.81439C0.309369 8.93787 0.455865 9.00001 0.625141 9.00001H5.00005V11.8124C5.00005 11.9816 5.06192 12.1283 5.18557 12.2519C5.30943 12.3756 5.45585 12.4375 5.62509 12.4375C5.79437 12.4375 5.94083 12.3756 6.06452 12.2519L11.377 6.93956C11.5006 6.81571 11.5627 6.66914 11.5627 6.49997Z" fill="#E3E6E9"/>
                        </svg>
                        <span>Войти</span>
                    </a>
                @endauth
            </div>
        </header>

        <main class="py-4">
            @auth
                <section class="lk-menu">
                    <div class="center-wrap">
                        <a href="{{ route('home') }}" class="lk-menu__link @if(Route::currentRouteName() == 'home') lk-menu__link--active @endif">Мои мероприятия</a>
                        <a href="{{ route('lk-messages') }}" class="lk-menu__link @if(Route::currentRouteName() == 'lk-messages') lk-menu__link--active @endif">Уведомления</a>
                        <a href="{{ route('lk-chat') }}" class="lk-menu__link lk-menu__link--message @if(Route::currentRouteName() == 'lk-chat') lk-menu__link--active @endif">Сообщения <div><div><span>4</span></div></div></a>
                        <a href="{{ route('lk-info') }}" class="lk-menu__link @if(Route::currentRouteName() == 'lk-info') lk-menu__link--active @endif">Личная информация</a>
                        @if (Auth::user()->status  == "artist")
                            <a href="{{ route('lk-skills') }}" class="lk-menu__link @if(Route::currentRouteName() == 'lk-skills') lk-menu__link--active @endif">Мои навыки</a>
                        @endif
                        <a href="{{ route('lk-reviews') }}" class="lk-menu__link @if(Route::currentRouteName() == 'lk-reviews') lk-menu__link--active @endif">Мои отзывы</a>
                    </div>
                </section>
            @endauth
            @yield('content')
        </main>

        <footer class="footer">
            <div class="center-wrap">
                <a href='{{ route('index') }}' class="footer__copyright">© 2019 SlogoPro</a>
                <nav class="footer__nav">
                    <ul class="footer__nav-list">
                        <div class="footer__nav-left">
                            <li class="footer__nav-item"><a href="" class="footer__nav-link">Служба поддержки</a></li>
                            <li class="footer__nav-item"><a href="" class="footer__nav-link">Контакты</a></li>
                        </div>
                        <div class="footer__nav-right">
                            <li class="footer__nav-item"><a href="{{ route('about') }}" class="footer__nav-link">Частые вопросы</a></li>
                            <li class="footer__nav-item"><a href="{{ route('blog') }}" class="footer__nav-link">Блог</a></li>
                        </div>
                    </ul>
                </nav>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/scripts.js') }}" defer></script>
    <script src="{{ asset('js/jsRapCalendar.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
</body>
</html>
