<div id="pop-message">
    <div class="popup-message success">
        <span class="close-popup">x</span>
        <div class="popup-icon galka"></div>
        <div class="popup-text"></div>
        <div class="popup-btn">
            <a class="btn_popup confirm">Хорошо</a>
        </div>
    </div>

    <div class="popup-message warning">
        <span class="close-popup">x</span>
        <div class="popup-icon">?</div>
        <div class="popup-text">

        </div>
        <div class="popup-btn">
            <a class="btn_popup close">Отмена</a>
            <a href="" id="del-selected" class="btn_popup">Удалить</a>
        </div>
    </div>

    <div class="popup-message error">
        <span class="close-popup">x</span>
        <div class="popup-icon">!</div>
        <div class="popup-text"></div>
        <div class="popup-btn">
            <a class="btn_popup confirm">Хорошо</a>
        </div>
    </div>

    <div class="popup-message add-proposal">
        <span class="close-popup">x</span>
        <div class="popup-text">Комментарий к заявке</div>
        <form action="" method="post">
            @csrf
            <textarea name="proposal_text" cols="30" rows="3" placeholder="Ваше сообщение" required></textarea>
            <div class="popup-btn">
                <button type="submit" class="btn_popup send">Отправить</button>
            </div>
        </form>
    </div>

@auth
@if (Route::currentRouteName() == 'artist')
    <div class="popup-message invite-chat" id="invite_message">
        <span class="close-popup">x</span>
        <div class="popup-text">Текст приглашения</div>
        <form action="" method="post">
            @csrf
            <textarea name="message" cols="30" rows="3" placeholder="Ваше сообщение" required></textarea>
            <div class="info-invite">
                <div class="left-invite">
                    <div class="inputs__wrap">
                        <p class="inputs__wrap-title">На дату</p>
                        <input type="text" name="date" id="choice_date" placeholder="Не выбрана">
                    </div>
                </div>
                <div class="right-invite">
                    <div class="inputs__wrap">
                        <p class="inputs__wrap-title">Мероприятие</p>
                        <select name="event">
                            <option value="none" selected>Не указано</option>
                            @foreach ($invite_events as $event)
                            <option value="{{$event->name}}">{{$event->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="popup-btn">
                <button type="submit" class="btn_popup send">Отправить</button>
            </div>
        </form>
    </div>
@endif
@endauth
    <div class="popup-message select-city">
        <span class="close-popup">x</span>
        <div class="popup-text">Выберите город из списка</div>
        <div class="list-citys">
            <a href="/city/1">Москва</a>
            <a href="/city/2">Санкт-Петербург</a>
            <a href="/city/3">Новосибирск</a>
            <a href="/city/4">Екатеринбург</a>
            <a href="/city/5">Казань</a>
            <a href="/city/6">Нижний Новгород</a>
            <a href="/city/7">Челябинск</a>
            <a href="/city/8">Самара</a>
            <a href="/city/9">Омск</a>
            <a href="/city/10">Ростов-на-Дону</a>
            <a href="/city/11">Уфа</a>
            <a href="/city/12">Красноярск</a>
            <a href="/city/13">Воронеж</a>
            <a href="/city/14">Пермь</a>
            <a href="/city/15">Волгоград</a>
        </div>
    </div>

</div>
