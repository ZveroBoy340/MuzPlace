<section class="form">
    <div class="center-wrap">
        <p class="form__title">Оставьте заявку!</p>
        <p class="form__text">и мы поможем в организации и координаци музыкантов</p>
        <form class="form__form">
            <input placeholder='Напишите, кто вам требуется' type="text">
            @if (Auth::check() && Auth::user()->status  == "organizator")
                <a href="/create-event" class='btn' type="submit">Создать мероприятие</a>
            @elseif (Auth::check() && Auth::user()->status  == "artist")
                <a class='btn only-organizator' type="submit">Создать мероприятие</a>
            @else
                <a href="/create-event" class='btn' type="submit">Создать мероприятие</a>
            @endif
        </form>
        <p class="form__example">Например: диджей на свадьбу</p>
    </div>
</section>
