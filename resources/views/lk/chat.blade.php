@extends('layouts.app')

@section('content')
    <section class="chat">
        <div class="center-wrap">
            <div class="chat__header">
                <div class="chat__header-item">
                    <span>C</span>
                    <div class="date-input">Дата</div>
                </div>
                <div class="chat__header-item">
                    <span>По</span>
                    <div class="date-input">Дата</div>
                </div>
            </div>
            <div class="chat__wrap">
                <div class="chat__chats">
                    <div class="chat__chat chat__chat--curner chat__chat--active chat__chat--online">
                        <div class="chat__chat-img"><img src="images/chat.png" alt=""></div>
                        <div class="chat__chat-data">
                            <span>Гриша</span>
                            <p>Holi Dance of Colours León 2019</p>
                        </div>
                    </div>
                    <div class="chat__chat chat__chat--curner chat__chat--online">
                        <div class="chat__chat-img"><img src="images/chat.png" alt=""></div>
                        <div class="chat__chat-data">
                            <span>Гриша</span>
                            <p>Holi Dance of Colours León 2019</p>
                        </div>
                    </div>
                    <div class="chat__chat">
                        <div class="chat__chat-img"><img src="images/chat.png" alt=""></div>
                        <div class="chat__chat-data">
                            <span>Гриша</span>
                            <p>Holi Dance of Colours León 2019</p>
                        </div>
                    </div>
                    <div class="chat__chat">
                        <div class="chat__chat-img"><img src="images/chat.png" alt=""></div>
                        <div class="chat__chat-data">
                            <span>Гриша</span>
                            <p>Holi Dance of Colours León 2019</p>
                        </div>
                    </div>
                    <div class="chat__chat">
                        <div class="chat__chat-img"><img src="images/chat.png" alt=""></div>
                        <div class="chat__chat-data">
                            <span>Гриша</span>
                            <p>Holi Dance of Colours León 2019</p>
                        </div>
                    </div>
                    <div class="chat__chat">
                        <div class="chat__chat-img"><img src="images/chat.png" alt=""></div>
                        <div class="chat__chat-data">
                            <span>Гриша</span>
                            <p>Holi Dance of Colours León 2019</p>
                        </div>
                    </div>
                    <div class="chat__chat">
                        <div class="chat__chat-img"><img src="images/chat.png" alt=""></div>
                        <div class="chat__chat-data">
                            <span>Гриша</span>
                            <p>Holi Dance of Colours León 2019</p>
                        </div>
                    </div>
                    <div class="chat__chat">
                        <div class="chat__chat-img"><img src="images/chat.png" alt=""></div>
                        <div class="chat__chat-data">
                            <span>Гриша</span>
                            <p>Holi Dance of Colours León 2019</p>
                        </div>
                    </div>
                    <div class="chat__chat">
                        <div class="chat__chat-img"><img src="images/chat.png" alt=""></div>
                        <div class="chat__chat-data">
                            <span>Гриша</span>
                            <p>Holi Dance of Colours León 2019</p>
                        </div>
                    </div>
                    <div class="chat__chat">
                        <div class="chat__chat-img"><img src="images/chat.png" alt=""></div>
                        <div class="chat__chat-data">
                            <span>Гриша</span>
                            <p>Holi Dance of Colours León 2019</p>
                        </div>
                    </div>
                    <div class="chat__chat">
                        <div class="chat__chat-img"><img src="images/chat.png" alt=""></div>
                        <div class="chat__chat-data">
                            <span>Гриша</span>
                            <p>Holi Dance of Colours León 2019</p>
                        </div>
                    </div>
                    <div class="chat__chat">
                        <div class="chat__chat-img"><img src="images/chat.png" alt=""></div>
                        <div class="chat__chat-data">
                            <span>Гриша</span>
                            <p>Holi Dance of Colours León 2019</p>
                        </div>
                    </div>
                </div>
                <div class="chat__right">
                    <div class="chat__messages">
                        <div class="chat__message">
                            <p class="chat__message-text">Добрый день, хочу заказать VPS для сайта у которого нагрузка слабая, но весит контент больше 70гб, возможно ли подобрать тариф с минимальным набором ОЗУ и мощностью процессора, но большим объемом жесткого диска?</p>
                            <div class="chat__message-data">
                                <span class="chat__message-status">Прочтено</span>
                                <div class="chat__message-info">
                                    <p>Артем</p>
                                    <span>31/09/2019 11:01</span>
                                </div>
                                <img src="images/chat2.png" alt="" class="chat__message-img">
                            </div>
                        </div>
                        <div class="chat__message chat__message--people">
                            <p class="chat__message-text">Добрый день, хочу заказать VPS для сайта у которого нагрузка слабая, но весит контент больше 70гб, возможно ли подобрать тариф с минимальным набором ОЗУ и мощностью процессора, но большим --peopleобъемом жесткого диска?</p>
                            <div class="chat__message-data">
                                <div class="chat__message-info">
                                    <p>Гриша</p>
                                    <span>31/09/2019 11:01</span>
                                </div>
                                <img src="images/chat.png" alt="" class="chat__message-img">
                            </div>
                        </div>
                    </div>
                    <div class="chat__form">
                        <textarea name="" placeholder="Напиши сообщение..."></textarea>
                        <input type="submit" value=""></div>
                </div>
            </div>
        </div>
    </section>
@endsection
