@extends('layouts.app')

@section('content')
    <section class="artist-top">
        <img class='artist-top__bg' src="/uploads/avatars/{{ $user->avatar }}" alt="">
        <div class="center-wrap">
            <div class="artist-top__wrap">
                <div class="artist-top__img">
                    <div>
                        <img src="/uploads/avatars/{{ $user->avatar }}" alt="">
                    </div>
                </div>
                <div class="artist-top__content">
                    <h1 class="artist-top__title">{{ $user->login }}</h1>
                    <div class="artist-top__info">
                        <div>
                            <p><span>Возраст</span>{{ $years }} лет</p>
                            <p><span>Отзывы</span>726</p>
                        </div>
                        <div>
                            <p><span>Опыт</span>8 лет</p>
                            <p>
                                <span>Рейтинг</span>4.5
                                <img alt="1" src="/img/star-on.png">
                                <img alt="2" src="/img/star-on.png">
                                <img alt="3" src="/img/star-on.png">
                                <img alt="4" src="/img/star-on.png">
                                <img alt="5" src="/img/star-half.png">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="info-cont">
        <div class="center-wrap artist-infoblock">
            <div class="left-info">
                <div id="calendar"></div>
                <a href="" class="btn">Пригласить на мероприятие</a>
            </div>
            <div class="right-info">
                <h2 class="info-cont__title">Информация и контакты</h2>
                <p class="info-cont__text">{{ $user->about }}</p>
                {{--<div class="info-cont__tags">
                    <p class="info-cont__tag">Музыкальная группа (ВИА)</p>
                    <p class="info-cont__tag">Кавер-группа</p>
                    <p class="info-cont__tag">Оригинальный жанр-группа</p>
                </div>--}}
                <div class="info-cont__contacts">
                    <div class="info-cont__contacts-item">
                        <a id="none_phone">+7 XXX XXX-XX-XX</a>
                        <a id="show_phone" class="none">{{ $user->phone }}</a>
                        <span id="btn_phone_show">Показать телефон</span>
                    </div>
                    <div class="info-cont__contacts-item">
                        <a id="none_email">XXXXXXX{{ '@'.$email_domain }}</a>
                        <a id="show_email" class="none">{{ $user->email }}</a>
                        <span id="btn_email_show">Показать email</span>
                    </div>
                    <div class="socials socials--info-cont">
                        @if ($user->facebook != null)
                            <a href="{{ $user->facebook }}" class="socials__item">
                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11.5" cy="11.5" r="11.5" fill="#7A7999"/>
                                    <path d="M12.4621 17.9933V12.0688H14.4468L14.7444 9.7605H12.4626V8.28669C12.4626 7.61801 12.6472 7.16212 13.6042 7.16212L14.8246 7.16161V5.09696C14.6132 5.06815 13.8893 5.00598 13.0468 5.00598C11.2876 5.00598 10.0828 6.08152 10.0828 8.05773V9.76H8.09155V12.0683H10.0813V17.9928H12.4621V17.9933Z" fill="#1D1D37"/>
                                </svg>
                            </a>
                        @endif
                        @if ($user->odnoklassniki != null)
                            <a href="{{ $user->odnoklassniki }}" class="socials__item">
                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11.5" cy="11.5" r="11.5" fill="#7A7999"/>
                                    <path d="M11.9994 11.7034C13.9374 11.7034 15.5135 10.2376 15.5135 8.43581C15.5135 6.63347 13.9374 5.16724 11.9994 5.16724C10.0619 5.16724 8.48633 6.63347 8.48633 8.43581C8.48633 10.2382 10.0619 11.7034 11.9994 11.7034ZM11.9994 7.08279C12.8013 7.08279 13.4538 7.68981 13.4538 8.43632C13.4538 9.18182 12.8013 9.78883 11.9994 9.78883C11.198 9.78883 10.5449 9.18182 10.5449 8.43632C10.5449 7.68981 11.198 7.08279 11.9994 7.08279Z" fill="#1D1D37"/>
                                    <path d="M13.4207 14.37C14.1368 14.2184 14.8262 13.9556 15.4614 13.5831C15.9416 13.3021 16.0867 12.7107 15.7841 12.2634C15.4815 11.8146 14.8452 11.6802 14.3644 11.9617C12.9268 12.8037 11.0725 12.8032 9.63437 11.9617C9.15245 11.6802 8.51786 11.8146 8.21524 12.2634C7.91262 12.7112 8.05659 13.3026 8.53742 13.5831C9.17255 13.9546 9.86256 14.2184 10.5776 14.37L8.61294 16.1971C8.21198 16.5711 8.21198 17.1771 8.61403 17.5517C8.81505 17.7382 9.07802 17.8317 9.34152 17.8317C9.60503 17.8317 9.86853 17.7382 10.0696 17.5517L11.9988 15.7554L13.9298 17.5517C14.3313 17.9247 14.9832 17.9247 15.3848 17.5517C15.7873 17.1776 15.7873 16.5711 15.3848 16.1971L13.4207 14.37Z" fill="#1D1D37"/>
                                </svg>
                            </a>
                        @endif
                        @if ($user->twitter != null)
                            <a href="{{ $user->twitter }}" class="socials__item">
                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11.5" cy="11.5" r="11.5" fill="#E94F59"/>
                                    <path d="M17.9504 7.47689C17.5103 7.68866 17.0376 7.83169 16.5417 7.89639C17.0488 7.56736 17.4372 7.04526 17.6197 6.42409C17.1461 6.72937 16.6213 6.95075 16.0629 7.06952C15.6159 6.55247 14.9783 6.229 14.2733 6.229C12.919 6.229 11.8214 7.42078 11.8214 8.89005C11.8214 9.09879 11.8428 9.30147 11.8847 9.49657C9.84732 9.38537 8.04043 8.326 6.83102 6.71674C6.62006 7.10945 6.49898 7.56635 6.49898 8.05408C6.49898 8.97749 6.93208 9.79173 7.58964 10.2688C7.18774 10.2552 6.81006 10.1349 6.47942 9.93628C6.47942 9.9474 6.47942 9.95853 6.47942 9.96964C6.47942 11.2585 7.32419 12.334 8.44604 12.5786C8.24067 12.6398 8.02413 12.6726 7.80013 12.6726C7.64226 12.6726 7.48905 12.6555 7.33909 12.6246C7.65111 13.6815 8.55688 14.4507 9.62938 14.4725C8.7902 15.1861 7.73353 15.6112 6.58466 15.6112C6.38674 15.6112 6.19162 15.5985 5.99976 15.5743C7.08482 16.3294 8.3734 16.7696 9.75791 16.7696C14.2677 16.7696 16.7335 12.7156 16.7335 9.19886C16.7335 9.08362 16.7312 8.96839 16.7256 8.85467C17.2062 8.47964 17.6216 8.01062 17.9504 7.47689Z" fill="#1D1D37"/>
                                </svg>
                            </a>
                        @endif
                        @if ($user->telegram != null)
                            <a href="{{ $user->telegram }}" class="socials__item">
                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11.5" cy="11.5" r="11.5" fill="#7A7999"/>
                                    <path d="M7.41464 17.911H4.34571V9.3456H7.41464V17.911ZM5.88134 8.17554C4.89581 8.17554 4.10181 7.48412 4.10181 6.63147C4.10181 5.77933 4.89581 5.0874 5.88134 5.0874C6.86221 5.0874 7.65796 5.77933 7.65796 6.63147C7.65738 7.48412 6.86163 8.17554 5.88134 8.17554ZM18.8981 17.911H15.8326V13.7463C15.8326 12.7532 15.8123 11.4755 14.2394 11.4755C12.6438 11.4755 12.4005 12.5576 12.4005 13.6756V17.9125H9.33737V9.3456H12.2759V10.5172H12.3178C12.7265 9.84344 13.7277 9.13332 15.2191 9.13332C18.3224 9.13332 18.8957 10.9063 18.8957 13.2136V17.911H18.8981Z" fill="#1D1D37"/>
                                </svg>
                            </a>
                        @endif
                        @if ($user->instagram != null)
                            <a href="{{ $user->instagram }}" class="socials__item">
                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11.5" cy="11.5" r="11.5" fill="#7A7999"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.54011 5H16.4566C17.3033 5 17.9963 5.75159 17.9963 6.671V16.3482C17.9963 17.2671 17.3038 18.0192 16.4566 18.0192H7.54011C6.69298 18.0192 6 17.2676 6 16.3482V6.671C6 5.75159 6.69298 5 7.54011 5ZM14.7386 6.44658C14.441 6.44658 14.1984 6.70991 14.1984 7.03289V8.4355C14.1984 8.75797 14.441 9.02181 14.7386 9.02181H16.0943C16.3914 9.02181 16.6341 8.75797 16.6341 8.4355V7.03289C16.6341 6.70991 16.3914 6.44658 16.0943 6.44658H14.7386ZM16.6401 10.5058H15.5844C15.684 10.8601 15.7385 11.2346 15.7385 11.6228C15.7385 13.7881 14.0685 15.5441 12.0091 15.5441C9.9497 15.5441 8.28059 13.7881 8.28059 11.6228C8.28059 11.2346 8.33461 10.8601 8.43428 10.5058H7.33287V16.0055C7.33287 16.2901 7.54756 16.5231 7.80976 16.5231H16.1637C16.4259 16.5231 16.6401 16.2901 16.6401 16.0055V10.5058ZM12.0091 8.94802C10.6785 8.94802 9.59995 10.0822 9.59995 11.4818C9.59995 12.8814 10.6785 14.0151 12.0091 14.0151C13.3396 14.0151 14.4187 12.8814 14.4187 11.4818C14.4187 10.0822 13.3401 8.94802 12.0091 8.94802Z" fill="#1D1D37"/>
                                </svg>
                            </a>
                        @endif
                        @if ($user->vkontakte != null)
                            <a href="{{ $user->vkontakte }}" class="socials__item">
                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11.5" cy="11.5" r="11.5" fill="#7A7999"/>
                                    <path d="M11.3616 15.1559H12.1324C12.1324 15.1559 12.365 15.1296 12.4841 15.0013C12.5936 14.8835 12.5905 14.6621 12.5905 14.6621C12.5905 14.6621 12.5754 13.6255 13.0552 13.4724C13.5284 13.3222 14.1368 14.4741 14.7806 14.9174C15.2679 15.2525 15.6382 15.1792 15.6382 15.1792L17.3611 15.1554C17.3611 15.1554 18.2621 15.0998 17.8343 14.3892C17.8 14.3316 17.5856 13.8646 16.5539 12.9043C15.4733 11.9 15.6185 12.0622 16.9197 10.3246C17.7117 9.26673 18.0286 8.6208 17.9297 8.34433C17.8353 8.08101 17.2526 8.15076 17.2526 8.15076L15.3128 8.16238C15.3128 8.16238 15.169 8.14267 15.0626 8.20635C14.9582 8.26902 14.8911 8.41509 14.8911 8.41509C14.8911 8.41509 14.5843 9.23388 14.1747 9.93035C13.311 11.3996 12.9654 11.4775 12.8241 11.386C12.4957 11.1727 12.5779 10.5318 12.5779 10.0759C12.5779 8.65163 12.7933 8.05826 12.1582 7.90461C11.9473 7.85357 11.7914 7.82021 11.2531 7.81414C10.5604 7.80707 9.97469 7.81616 9.64323 7.97942C9.42276 8.08808 9.25224 8.32917 9.35617 8.34332C9.48481 8.36051 9.7749 8.42166 9.92827 8.63141C10.1275 8.90232 10.1205 9.51085 10.1205 9.51085C10.1205 9.51085 10.2345 11.1873 9.85361 11.3956C9.59227 11.5376 9.23357 11.2465 8.4637 9.91367C8.06868 9.23085 7.77102 8.47574 7.77102 8.47574C7.77102 8.47574 7.71351 8.33473 7.61109 8.25892C7.48699 8.16743 7.31344 8.13862 7.31344 8.13862L5.46999 8.15076C5.46999 8.15076 5.19302 8.15884 5.09161 8.27913C5.00131 8.38628 5.08455 8.60766 5.08455 8.60766C5.08455 8.60766 6.52743 11.9905 8.16151 13.6947C9.65988 15.258 11.3616 15.1559 11.3616 15.1559Z" fill="black"/>
                                    <path d="M11.3616 15.1559H12.1324C12.1324 15.1559 12.365 15.1296 12.4841 15.0013C12.5936 14.8835 12.5905 14.6621 12.5905 14.6621C12.5905 14.6621 12.5754 13.6255 13.0552 13.4724C13.5284 13.3222 14.1368 14.4741 14.7806 14.9174C15.2679 15.2525 15.6382 15.1792 15.6382 15.1792L17.3611 15.1554C17.3611 15.1554 18.2621 15.0998 17.8343 14.3892C17.8 14.3316 17.5856 13.8646 16.5539 12.9043C15.4733 11.9 15.6185 12.0622 16.9197 10.3246C17.7117 9.26673 18.0286 8.6208 17.9297 8.34433C17.8353 8.08101 17.2526 8.15076 17.2526 8.15076L15.3128 8.16238C15.3128 8.16238 15.169 8.14267 15.0626 8.20635C14.9582 8.26902 14.8911 8.41509 14.8911 8.41509C14.8911 8.41509 14.5843 9.23388 14.1747 9.93035C13.311 11.3996 12.9654 11.4775 12.8241 11.386C12.4957 11.1727 12.5779 10.5318 12.5779 10.0759C12.5779 8.65163 12.7933 8.05826 12.1582 7.90461C11.9473 7.85357 11.7914 7.82021 11.2531 7.81414C10.5604 7.80707 9.97469 7.81616 9.64323 7.97942C9.42276 8.08808 9.25224 8.32917 9.35617 8.34332C9.48481 8.36051 9.7749 8.42166 9.92827 8.63141C10.1275 8.90232 10.1205 9.51085 10.1205 9.51085C10.1205 9.51085 10.2345 11.1873 9.85361 11.3956C9.59227 11.5376 9.23357 11.2465 8.4637 9.91367C8.06868 9.23085 7.77102 8.47574 7.77102 8.47574C7.77102 8.47574 7.71351 8.33473 7.61109 8.25892C7.48699 8.16743 7.31344 8.13862 7.31344 8.13862L5.46999 8.15076C5.46999 8.15076 5.19302 8.15884 5.09161 8.27913C5.00131 8.38628 5.08455 8.60766 5.08455 8.60766C5.08455 8.60766 6.52743 11.9905 8.16151 13.6947C9.65988 15.258 11.3616 15.1559 11.3616 15.1559Z" fill="#1D1D37"/>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($skills)<section class="directions">
        <div class="center-wrap">
            <h2 class="directions__title">Направления и проекты</h2>
            <div class="directions__tags">
                <div class="directions__tags-item directions__tags-item--active">@if($skills){{$available_genres[$skills->current_genre-1]['name']}}@endif
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.37826 0.622538L10.4135 5.43954L15.6239 5.88715C15.9853 5.91836 16.1323 6.36926 15.858 6.60662L11.9058 10.0307L13.0901 15.1245C13.1723 15.4784 12.7887 15.7569 12.4783 15.5688L8.00046 12.8683L3.52266 15.5688C3.21138 15.7561 2.82865 15.4776 2.91078 15.1245L4.09512 10.0307L0.142135 6.6058C-0.132183 6.36844 0.0140106 5.91754 0.37621 5.88633L5.58662 5.43872L7.62183 0.622538C7.7631 0.287442 8.237 0.287442 8.37826 0.622538Z" fill="#7A7999"/>
                    </svg>
                </div>
                <?php $i = 0; ?>
                @foreach ($genre_artist as $item => $key)
                    @if($key != null && $item != $skills->current_genre)
                        <div class="directions__tags-item">{{$available_genres[$item-1]['name']}}
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.586 3.8147e-06H19V2H17.414L13.166 6.242C12.7958 5.68302 12.317 5.20419 11.758 4.834L16.586 3.8147e-06ZM9 5C9.97224 5.00186 10.9105 5.35775 11.6394 6.00114C12.3683 6.64453 12.8379 7.53137 12.9605 8.49585C13.083 9.46034 12.8501 10.4364 12.3052 11.2417C11.7604 12.0469 10.9409 12.6261 10 12.871V13C10 13.9889 9.70676 14.9556 9.15735 15.7779C8.60794 16.6001 7.82705 17.241 6.91342 17.6194C5.99979 17.9978 4.99446 18.0969 4.02455 17.9039C3.05465 17.711 2.16373 17.2348 1.46447 16.5355C0.765206 15.8363 0.289002 14.9454 0.0960758 13.9755C-0.0968503 13.0056 0.00216642 12.0002 0.380605 11.0866C0.759043 10.173 1.39991 9.39206 2.22215 8.84266C3.0444 8.29325 4.0111 8 5 8L5.129 8.012C5.34835 7.15148 5.84781 6.38842 6.54868 5.84307C7.24955 5.29773 8.11196 5.00113 9 5ZM9 7.5C8.60218 7.5 8.22065 7.65804 7.93934 7.93934C7.65804 8.22065 7.5 8.60218 7.5 9C7.5 9.39783 7.65804 9.77936 7.93934 10.0607C8.22065 10.342 8.60218 10.5 9 10.5C9.39783 10.5 9.77936 10.342 10.0607 10.0607C10.342 9.77936 10.5 9.39783 10.5 9C10.5 8.60218 10.342 8.22065 10.0607 7.93934C9.77936 7.65804 9.39783 7.5 9 7.5ZM3.937 11.236L3.23 11.943L6.059 14.771L6.766 14.064L3.937 11.236Z" fill="#7A7999"/>
                            </svg>
                        </div>
                    <?php $i++; ?>
                    @endif
                @endforeach
            </div>
            <div class="directions__wrap">
                <div class="directions__nav">
                    <?php $i = 0; ?>
                    @foreach ($skills_project as $item => $key)
                        @if($key != null)
                            <div class="directions__nav-item @if ($i == 0) directions__nav-item--active @endif">
                                <h3 class='directions__nav-title'>{{$projects[$item-1]['name']}}</h3>
                                <p>От {{$skills_price[$item][0]}}р. / час</p>
                            </div>
                        <?php $i++; ?>
                        @endif
                    @endforeach
                </div>
                <div class="directions__content">
                    <div class="directions__content-img">
                        <div><img src="/uploads/images/@if($skills){{$skills->obloshka}}@endif" alt=""></div>
                    </div>
                    <div class="my-track_list">
                        @if ($user_tracks != null)
                            @foreach ($user_tracks as $track)
                                <div class="track-item">
                                    <div class="play_track" data-track-play="/uploads/tracks/{{ $track->url }}"></div>
                                    <div class="track_name">{{ $track->name }}</div>
                                    <div class="time_track">{{ $track->duration }}</div>
                                </div>
                            @endforeach
                        @endif
                        <audio id="play_player" controls="" class="none" preload="metadata">
                            <source id="play_player_src" src="">
                        </audio>
                    </div>
                    <p class="directions__content-text">
                        @if($skills){{$skills->text_albom}}@endif
                    </p>
                </div>
            </div>
        </div>
    </section>@endif

    <section class="reviews-slider">
        <h2 class="simple-sub-title simple-sub-title--link">Отзывы
            <div class="select">
                <div class="select__value">Все направления</div>
                <div class="select__variants">
                    <label for="" class="select__variant select__variant--active"><span>03</span></label>
                    <label for="" class="select__variant"><span>04</span></label>
                    <label for="" class="select__variant"><span>05</span></label>
                    <label for="" class="select__variant"><span>06</span></label>
                    <label for="" class="select__variant"><span>07</span></label>
                    <label for="" class="select__variant"><span>08</span></label>
                    <label for="" class="select__variant"><span>09</span></label>
                </div>
            </div>

        </h2>
        <div class="swiper-container">
            <div class="understand">
                <img src="/images/understand.svg" alt="">
                <p class="understand__text">Потяните влево или вправо<br> для смены слайда</p>
                <span class="btn">Понятно</span>
            </div>
            <div class="swiper-wrapper">
                <div class="swiper-slide swiper-slide1">
                    <div class="review">
                        <div class="review__header">
                            <span>Маргарита С.</span><span>11 апреля 2019</span>
                        </div>
                        <p class="review__text">
                            Отличный мастер ! Руки откуда надо ,необходимые инструменты наличии! Качественно и быстро устранил засор я очень довольна. Отличный мастер ! Руки откуда надо, необходимые инструменты наличии!
                        </p>
                        <div class="review__slider">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href='assets/images/review.png' data-fancybox='review1'><img src="/images/review.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review2.png' data-fancybox='review1'><img src="/images/review2.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review3.png' data-fancybox='review1'><img src="/images/review3.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review4.png' data-fancybox='review1'><img src="/images/review4.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review5.png' data-fancybox='review1'><img src="/images/review5.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide2">
                    <div class="review">
                        <div class="review__header">
                            <span>Маргарита С.</span><span>11 апреля 2019</span>
                        </div>
                        <p class="review__text">
                            Отличный мастер ! Руки откуда надо ,необходимые инструменты наличии! Качественно и быстро устранил засор я очень довольна. Отличный мастер ! Руки откуда надо, необходимые инструменты наличии!
                        </p>
                        <div class="review__slider">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href='assets/images/review.png' data-fancybox='review2'><img src="/images/review.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review2.png' data-fancybox='review2'><img src="/images/review2.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review3.png' data-fancybox='review2'><img src="/images/review3.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review4.png' data-fancybox='review2'><img src="/images/review4.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review5.png' data-fancybox='review2'><img src="/images/review5.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide3">
                    <div class="review">
                        <div class="review__header">
                            <span>Маргарита С.</span><span>11 апреля 2019</span>
                        </div>
                        <p class="review__text">
                            Отличный мастер ! Руки откуда надо ,необходимые инструменты наличии! Качественно и быстро устранил засор я очень довольна. Отличный мастер ! Руки откуда надо, необходимые инструменты наличии!
                        </p>
                        <div class="review__slider">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href='assets/images/review.png' data-fancybox='review3'><img src="/images/review.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review2.png' data-fancybox='review3'><img src="/images/review2.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review3.png' data-fancybox='review3'><img src="/images/review3.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review4.png' data-fancybox='review3'><img src="/images/review4.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review5.png' data-fancybox='review3'><img src="/images/review5.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide4">
                    <div class="review">
                        <div class="review__header">
                            <span>Маргарита С.</span><span>11 апреля 2019</span>
                        </div>
                        <p class="review__text">
                            Отличный мастер ! Руки откуда надо ,необходимые инструменты наличии! Качественно и быстро устранил засор я очень довольна. Отличный мастер ! Руки откуда надо, необходимые инструменты наличии!
                        </p>
                        <div class="review__slider">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href='assets/images/review.png' data-fancybox='review3'><img src="/images/review.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review2.png' data-fancybox='review3'><img src="/images/review2.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review3.png' data-fancybox='review3'><img src="/images/review3.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review4.png' data-fancybox='review3'><img src="/images/review4.png" alt=""></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href='assets/images/review5.png' data-fancybox='review3'><img src="/images/review5.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="event-slider">
        <h2 class='simple-sub-title'>Ближайшие мероприятия</h2>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="event-item">
                        <div class="event-item__img">
                            <img src="/images/event-img1.png" alt="">
                        </div>

                        <div class="event-item__content">
                            <div class="event-item__date">
                                <span>пн</span>
                                <p>13</p>
                                <span>авг</span>
                            </div>
                            <div class="event-item__info">
                                <span class="event-item__type">фестиваль</span>
                                <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                                <p class="event-item__time">с 14:30 до 18:00</p>
                                <p class="event-item__place">Chorcha Entertainment</p>
                            </div>
                        </div>
                        <div class="event-item__bot">
                            <div class="event-item__who">
                                <span>гитаристы</span>
                                <span>рэперы</span>
                                <span>ведущие</span>
                            </div>
                            <div class="event-item__places">3 места</div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="event-item">
                        <div class="event-item__img">
                            <img src="/images/event-img1.png" alt="">
                        </div>

                        <div class="event-item__content">
                            <div class="event-item__date">
                                <span>пн</span>
                                <p>13</p>
                                <span>авг</span>
                            </div>
                            <div class="event-item__info">
                                <span class="event-item__type">фестиваль</span>
                                <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                                <p class="event-item__time">с 14:30 до 18:00</p>
                                <p class="event-item__place">Chorcha Entertainment</p>
                            </div>
                        </div>
                        <div class="event-item__bot">
                            <div class="event-item__who">
                                <span>гитаристы</span>
                                <span>рэперы</span>
                                <span>ведущие</span>
                            </div>
                            <div class="event-item__places">3 места</div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="event-item">
                        <div class="event-item__img">
                            <img src="/images/event-img1.png" alt="">
                        </div>

                        <div class="event-item__content">
                            <div class="event-item__date">
                                <span>пн</span>
                                <p>13</p>
                                <span>авг</span>
                            </div>
                            <div class="event-item__info">
                                <span class="event-item__type">фестиваль</span>
                                <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                                <p class="event-item__time">с 14:30 до 18:00</p>
                                <p class="event-item__place">Chorcha Entertainment</p>
                            </div>
                        </div>
                        <div class="event-item__bot">
                            <div class="event-item__who">
                                <span>гитаристы</span>
                                <span>рэперы</span>
                                <span>ведущие</span>
                            </div>
                            <div class="event-item__places">3 места</div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="event-item">
                        <div class="event-item__img">
                            <img src="/images/event-img1.png" alt="">
                        </div>

                        <div class="event-item__content">
                            <div class="event-item__date">
                                <span>пн</span>
                                <p>13</p>
                                <span>авг</span>
                            </div>
                            <div class="event-item__info">
                                <span class="event-item__type">фестиваль</span>
                                <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                                <p class="event-item__time">с 14:30 до 18:00</p>
                                <p class="event-item__place">Chorcha Entertainment</p>
                            </div>
                        </div>
                        <div class="event-item__bot">
                            <div class="event-item__who">
                                <span>гитаристы</span>
                                <span>рэперы</span>
                                <span>ведущие</span>
                            </div>
                            <div class="event-item__places">3 места</div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="event-item">
                        <div class="event-item__img">
                            <img src="/images/event-img1.png" alt="">
                        </div>

                        <div class="event-item__content">
                            <div class="event-item__date">
                                <span>пн</span>
                                <p>13</p>
                                <span>авг</span>
                            </div>
                            <div class="event-item__info">
                                <span class="event-item__type">фестиваль</span>
                                <h3 class="event-item__title"><a href="/event.html">Holi Dance of Colours León 2019</a></h3>
                                <p class="event-item__time">с 14:30 до 18:00</p>
                                <p class="event-item__place">Chorcha Entertainment</p>
                            </div>
                        </div>
                        <div class="event-item__bot">
                            <div class="event-item__who">
                                <span>гитаристы</span>
                                <span>рэперы</span>
                                <span>ведущие</span>
                            </div>
                            <div class="event-item__places">3 места</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('blocks.features')
@endsection
