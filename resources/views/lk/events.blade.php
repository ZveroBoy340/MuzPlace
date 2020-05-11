@extends('layouts.app')

@section('content')
    <section class="lk-events">
        <div class="center-wrap">
            <div class="change-list-event">
                <button class="btn active" id="btn_my_response">Мои отклики</button>
                <button class="btn no-active" id="btn_my_party">Я участник</button>
            </div>
            <div class="list-event-flex">
                <div class="lk-list active" id="my-response">
                    <div class="lk-list__header">
                        <p>Дата</p>
                        <p>Название</p>
                        <p>Начало</p>
                        <p>Окончание</p>
                        <p>Статус</p>
                        <p>Аудитория</p>
                        <p class='lk-events__edit'><a href="/lk-event.html">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.22342 2.79541H2.69939C2.2808 2.79541 1.87935 2.96169 1.58337 3.25768C1.28738 3.55367 1.12109 3.95511 1.12109 4.3737V15.4218C1.12109 15.8404 1.28738 16.2418 1.58337 16.5378C1.87935 16.8338 2.2808 17.0001 2.69939 17.0001H13.7474C14.166 17.0001 14.5675 16.8338 14.8635 16.5378C15.1595 16.2418 15.3257 15.8404 15.3257 15.4218V9.89773" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.142 1.61165C14.4559 1.29771 14.8817 1.12134 15.3257 1.12134C15.7697 1.12134 16.1955 1.29771 16.5094 1.61165C16.8234 1.92559 16.9998 2.35139 16.9998 2.79537C16.9998 3.23935 16.8234 3.66515 16.5094 3.97909L9.01255 11.476L5.85596 12.2651L6.6451 9.10855L14.142 1.61165Z" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a></p>
                    </div>
                    <div class="lk-list__item">
                        <p>03.09.2019</p>
                        <p><a href="/lk-event.html">Holi Dance of Colours León 2019</a></p>
                        <p>03.12.2020</p>
                        <p>05.12.2020</p>
                        <p>Открыто</p>
                        <p><img src="img/100people.png" alt=""></p>
                        <p class='lk-events__edit'><a href="/lk-event.html">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.22342 2.79541H2.69939C2.2808 2.79541 1.87935 2.96169 1.58337 3.25768C1.28738 3.55367 1.12109 3.95511 1.12109 4.3737V15.4218C1.12109 15.8404 1.28738 16.2418 1.58337 16.5378C1.87935 16.8338 2.2808 17.0001 2.69939 17.0001H13.7474C14.166 17.0001 14.5675 16.8338 14.8635 16.5378C15.1595 16.2418 15.3257 15.8404 15.3257 15.4218V9.89773" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.142 1.61165C14.4559 1.29771 14.8817 1.12134 15.3257 1.12134C15.7697 1.12134 16.1955 1.29771 16.5094 1.61165C16.8234 1.92559 16.9998 2.35139 16.9998 2.79537C16.9998 3.23935 16.8234 3.66515 16.5094 3.97909L9.01255 11.476L5.85596 12.2651L6.6451 9.10855L14.142 1.61165Z" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a></p>
                        <p class="event-logo"><img src="images/event-bg.png" alt=""></p>
                    </div>
                    <div class="lk-list__item active-event">
                        <p>03.09.2019</p>
                        <p><a href="/lk-event.html">Holi Dance of Colours León 2019</a></p>
                        <p>03.12.2020</p>
                        <p>05.12.2020</p>
                        <p>Открыто</p>
                        <p><img src="img/100people.png" alt=""></p>
                        <p class='lk-events__edit'><a href="/lk-event.html">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.22342 2.79541H2.69939C2.2808 2.79541 1.87935 2.96169 1.58337 3.25768C1.28738 3.55367 1.12109 3.95511 1.12109 4.3737V15.4218C1.12109 15.8404 1.28738 16.2418 1.58337 16.5378C1.87935 16.8338 2.2808 17.0001 2.69939 17.0001H13.7474C14.166 17.0001 14.5675 16.8338 14.8635 16.5378C15.1595 16.2418 15.3257 15.8404 15.3257 15.4218V9.89773" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.142 1.61165C14.4559 1.29771 14.8817 1.12134 15.3257 1.12134C15.7697 1.12134 16.1955 1.29771 16.5094 1.61165C16.8234 1.92559 16.9998 2.35139 16.9998 2.79537C16.9998 3.23935 16.8234 3.66515 16.5094 3.97909L9.01255 11.476L5.85596 12.2651L6.6451 9.10855L14.142 1.61165Z" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a></p>
                        <img src="images/event-bg.png" alt="">
                    </div>
                    <div class="lk-list__item">
                        <p>03.09.2019</p>
                        <p><a href="/lk-event.html">Holi Dance of Colours León 2019</a></p>
                        <p>03.12.2020</p>
                        <p>05.12.2020</p>
                        <p>Открыто</p>
                        <p><img src="img/100people.png" alt=""></p>
                        <p class='lk-events__edit'><a href="/lk-event.html">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.22342 2.79541H2.69939C2.2808 2.79541 1.87935 2.96169 1.58337 3.25768C1.28738 3.55367 1.12109 3.95511 1.12109 4.3737V15.4218C1.12109 15.8404 1.28738 16.2418 1.58337 16.5378C1.87935 16.8338 2.2808 17.0001 2.69939 17.0001H13.7474C14.166 17.0001 14.5675 16.8338 14.8635 16.5378C15.1595 16.2418 15.3257 15.8404 15.3257 15.4218V9.89773" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.142 1.61165C14.4559 1.29771 14.8817 1.12134 15.3257 1.12134C15.7697 1.12134 16.1955 1.29771 16.5094 1.61165C16.8234 1.92559 16.9998 2.35139 16.9998 2.79537C16.9998 3.23935 16.8234 3.66515 16.5094 3.97909L9.01255 11.476L5.85596 12.2651L6.6451 9.10855L14.142 1.61165Z" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a></p>
                        <img src="images/event-bg.png" alt="">
                    </div>
                    <div class="lk-list__item">
                        <p>03.09.2019</p>
                        <p><a href="/lk-event.html">Holi Dance of Colours León 2019</a></p>
                        <p>03.12.2020</p>
                        <p>05.12.2020</p>
                        <p>Открыто</p>
                        <p><img src="img/100people.png" alt=""></p>
                        <p class='lk-events__edit'><a href="/lk-event.html">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.22342 2.79541H2.69939C2.2808 2.79541 1.87935 2.96169 1.58337 3.25768C1.28738 3.55367 1.12109 3.95511 1.12109 4.3737V15.4218C1.12109 15.8404 1.28738 16.2418 1.58337 16.5378C1.87935 16.8338 2.2808 17.0001 2.69939 17.0001H13.7474C14.166 17.0001 14.5675 16.8338 14.8635 16.5378C15.1595 16.2418 15.3257 15.8404 15.3257 15.4218V9.89773" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.142 1.61165C14.4559 1.29771 14.8817 1.12134 15.3257 1.12134C15.7697 1.12134 16.1955 1.29771 16.5094 1.61165C16.8234 1.92559 16.9998 2.35139 16.9998 2.79537C16.9998 3.23935 16.8234 3.66515 16.5094 3.97909L9.01255 11.476L5.85596 12.2651L6.6451 9.10855L14.142 1.61165Z" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a></p>
                        <img src="images/event-bg.png" alt="">
                    </div>
                    <div class="lk-list__item ended-event">
                        <p>03.09.2019</p>
                        <p><a href="/lk-event.html">Holi Dance of Colours León 2019</a></p>
                        <p>03.12.2020</p>
                        <p>05.12.2020</p>
                        <p>Открыто</p>
                        <p><img src="img/100people.png" alt=""></p>
                        <p class='lk-events__edit'><a href="/lk-event.html">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.22342 2.79541H2.69939C2.2808 2.79541 1.87935 2.96169 1.58337 3.25768C1.28738 3.55367 1.12109 3.95511 1.12109 4.3737V15.4218C1.12109 15.8404 1.28738 16.2418 1.58337 16.5378C1.87935 16.8338 2.2808 17.0001 2.69939 17.0001H13.7474C14.166 17.0001 14.5675 16.8338 14.8635 16.5378C15.1595 16.2418 15.3257 15.8404 15.3257 15.4218V9.89773" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.142 1.61165C14.4559 1.29771 14.8817 1.12134 15.3257 1.12134C15.7697 1.12134 16.1955 1.29771 16.5094 1.61165C16.8234 1.92559 16.9998 2.35139 16.9998 2.79537C16.9998 3.23935 16.8234 3.66515 16.5094 3.97909L9.01255 11.476L5.85596 12.2651L6.6451 9.10855L14.142 1.61165Z" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a></p>
                        <img src="images/event-bg.png" alt="">
                    </div>
                </div>
                <div class="lk-list" id="my-party">
                    <div class="lk-list__header">
                        <p>Дата</p>
                        <p>Название</p>
                        <p>Начало</p>
                        <p>Окончание</p>
                        <p>Статус</p>
                        <p>Аудитория</p>
                        <p class='lk-events__edit'><a href="/lk-event.html">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.22342 2.79541H2.69939C2.2808 2.79541 1.87935 2.96169 1.58337 3.25768C1.28738 3.55367 1.12109 3.95511 1.12109 4.3737V15.4218C1.12109 15.8404 1.28738 16.2418 1.58337 16.5378C1.87935 16.8338 2.2808 17.0001 2.69939 17.0001H13.7474C14.166 17.0001 14.5675 16.8338 14.8635 16.5378C15.1595 16.2418 15.3257 15.8404 15.3257 15.4218V9.89773" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.142 1.61165C14.4559 1.29771 14.8817 1.12134 15.3257 1.12134C15.7697 1.12134 16.1955 1.29771 16.5094 1.61165C16.8234 1.92559 16.9998 2.35139 16.9998 2.79537C16.9998 3.23935 16.8234 3.66515 16.5094 3.97909L9.01255 11.476L5.85596 12.2651L6.6451 9.10855L14.142 1.61165Z" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a></p>
                    </div>
                    <div class="lk-list__item">
                        <p>03.09.2019</p>
                        <p><a href="/lk-event.html">Holi Dance of Colours León 2019</a></p>
                        <p>03.12.2020</p>
                        <p>05.12.2020</p>
                        <p>Открыто</p>
                        <p><img src="img/100people.png" alt=""></p>
                        <p class='lk-events__edit'><a href="/lk-event.html">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.22342 2.79541H2.69939C2.2808 2.79541 1.87935 2.96169 1.58337 3.25768C1.28738 3.55367 1.12109 3.95511 1.12109 4.3737V15.4218C1.12109 15.8404 1.28738 16.2418 1.58337 16.5378C1.87935 16.8338 2.2808 17.0001 2.69939 17.0001H13.7474C14.166 17.0001 14.5675 16.8338 14.8635 16.5378C15.1595 16.2418 15.3257 15.8404 15.3257 15.4218V9.89773" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.142 1.61165C14.4559 1.29771 14.8817 1.12134 15.3257 1.12134C15.7697 1.12134 16.1955 1.29771 16.5094 1.61165C16.8234 1.92559 16.9998 2.35139 16.9998 2.79537C16.9998 3.23935 16.8234 3.66515 16.5094 3.97909L9.01255 11.476L5.85596 12.2651L6.6451 9.10855L14.142 1.61165Z" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a></p>
                        <p class="event-logo"><img src="images/event-bg.png" alt=""></p>
                    </div>
                    <div class="lk-list__item active-event">
                        <p>03.09.2019</p>
                        <p><a href="/lk-event.html">Holi Dance of Colours León 2019</a></p>
                        <p>03.12.2020</p>
                        <p>05.12.2020</p>
                        <p>Открыто</p>
                        <p><img src="img/100people.png" alt=""></p>
                        <p class='lk-events__edit'><a href="/lk-event.html">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.22342 2.79541H2.69939C2.2808 2.79541 1.87935 2.96169 1.58337 3.25768C1.28738 3.55367 1.12109 3.95511 1.12109 4.3737V15.4218C1.12109 15.8404 1.28738 16.2418 1.58337 16.5378C1.87935 16.8338 2.2808 17.0001 2.69939 17.0001H13.7474C14.166 17.0001 14.5675 16.8338 14.8635 16.5378C15.1595 16.2418 15.3257 15.8404 15.3257 15.4218V9.89773" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.142 1.61165C14.4559 1.29771 14.8817 1.12134 15.3257 1.12134C15.7697 1.12134 16.1955 1.29771 16.5094 1.61165C16.8234 1.92559 16.9998 2.35139 16.9998 2.79537C16.9998 3.23935 16.8234 3.66515 16.5094 3.97909L9.01255 11.476L5.85596 12.2651L6.6451 9.10855L14.142 1.61165Z" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a></p>
                        <img src="images/event-bg.png" alt="">
                    </div>
                    <div class="lk-list__item">
                        <p>03.09.2019</p>
                        <p><a href="/lk-event.html">Holi Dance of Colours León 2019</a></p>
                        <p>03.12.2020</p>
                        <p>05.12.2020</p>
                        <p>Открыто</p>
                        <p><img src="img/100people.png" alt=""></p>
                        <p class='lk-events__edit'><a href="/lk-event.html">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.22342 2.79541H2.69939C2.2808 2.79541 1.87935 2.96169 1.58337 3.25768C1.28738 3.55367 1.12109 3.95511 1.12109 4.3737V15.4218C1.12109 15.8404 1.28738 16.2418 1.58337 16.5378C1.87935 16.8338 2.2808 17.0001 2.69939 17.0001H13.7474C14.166 17.0001 14.5675 16.8338 14.8635 16.5378C15.1595 16.2418 15.3257 15.8404 15.3257 15.4218V9.89773" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.142 1.61165C14.4559 1.29771 14.8817 1.12134 15.3257 1.12134C15.7697 1.12134 16.1955 1.29771 16.5094 1.61165C16.8234 1.92559 16.9998 2.35139 16.9998 2.79537C16.9998 3.23935 16.8234 3.66515 16.5094 3.97909L9.01255 11.476L5.85596 12.2651L6.6451 9.10855L14.142 1.61165Z" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a></p>
                        <img src="images/event-bg.png" alt="">
                    </div>
                    <div class="lk-list__item active-event">
                        <p>03.09.2019</p>
                        <p><a href="/lk-event.html">Holi Dance of Colours León 2019</a></p>
                        <p>03.12.2020</p>
                        <p>05.12.2020</p>
                        <p>Открыто</p>
                        <p><img src="img/100people.png" alt=""></p>
                        <p class='lk-events__edit'><a href="/lk-event.html">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.22342 2.79541H2.69939C2.2808 2.79541 1.87935 2.96169 1.58337 3.25768C1.28738 3.55367 1.12109 3.95511 1.12109 4.3737V15.4218C1.12109 15.8404 1.28738 16.2418 1.58337 16.5378C1.87935 16.8338 2.2808 17.0001 2.69939 17.0001H13.7474C14.166 17.0001 14.5675 16.8338 14.8635 16.5378C15.1595 16.2418 15.3257 15.8404 15.3257 15.4218V9.89773" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.142 1.61165C14.4559 1.29771 14.8817 1.12134 15.3257 1.12134C15.7697 1.12134 16.1955 1.29771 16.5094 1.61165C16.8234 1.92559 16.9998 2.35139 16.9998 2.79537C16.9998 3.23935 16.8234 3.66515 16.5094 3.97909L9.01255 11.476L5.85596 12.2651L6.6451 9.10855L14.142 1.61165Z" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a></p>
                        <img src="images/event-bg.png" alt="">
                    </div>
                    <div class="lk-list__item">
                        <p>03.09.2019</p>
                        <p><a href="/lk-event.html">Holi Dance of Colours León 2019</a></p>
                        <p>03.12.2020</p>
                        <p>05.12.2020</p>
                        <p>Открыто</p>
                        <p><img src="img/100people.png" alt=""></p>
                        <p class='lk-events__edit'><a href="/lk-event.html">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.22342 2.79541H2.69939C2.2808 2.79541 1.87935 2.96169 1.58337 3.25768C1.28738 3.55367 1.12109 3.95511 1.12109 4.3737V15.4218C1.12109 15.8404 1.28738 16.2418 1.58337 16.5378C1.87935 16.8338 2.2808 17.0001 2.69939 17.0001H13.7474C14.166 17.0001 14.5675 16.8338 14.8635 16.5378C15.1595 16.2418 15.3257 15.8404 15.3257 15.4218V9.89773" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.142 1.61165C14.4559 1.29771 14.8817 1.12134 15.3257 1.12134C15.7697 1.12134 16.1955 1.29771 16.5094 1.61165C16.8234 1.92559 16.9998 2.35139 16.9998 2.79537C16.9998 3.23935 16.8234 3.66515 16.5094 3.97909L9.01255 11.476L5.85596 12.2651L6.6451 9.10855L14.142 1.61165Z" stroke="#7A7999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a></p>
                        <img src="images/event-bg.png" alt="">
                    </div>
                </div>
                <div id="calendar"></div>
            </div>
        </div>
    </section>
@endsection
