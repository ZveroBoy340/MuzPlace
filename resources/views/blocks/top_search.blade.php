<section class="main-screen">
    <div class="center-wrap">
        <h1>Найдите подходящего артиста для вашего мероприятия.</h1>
        <form action="/artists" method="get" class="main-screen__inputs">
            <div class="select select--big">
                <div class="select__value">Тип исполнителя</div>
                <div class="select__variants">
                    <label for="type_all" class="select__variant"><span>Все типы</span></label>
                    @foreach ($type as $item)
                        <label for="type_{{$item->id}}" class="select__variant"><span>{{$item->name}}</span></label>
                    @endforeach
                </div>
                <div class="radio-elements none">
                    <input type="radio" name="type" id="type_all" value="all" checked>
                    @foreach ($type as $item)
                        <input type="radio" name="type" id="type_{{$item->id}}" value="{{$item->id}}">
                    @endforeach
                </div>
            </div>
            <input type="text" name="date" class="date-input find-artist-date datepicker-here" placeholder="На дату">
            <button class='btn' type="submit" id="finde-artist">Найти</button>
        </form>
    </div>
</section>
