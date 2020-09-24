<div class="lk-list" id="my-response-2">
        @if ($my_proposals_check)
            <div class="lk-list__header">
                <p>Дата</p>
                <p>Название</p>
                <p>Начало</p>
                <p>Окончание</p>
                <p>Статус</p>
                @if (Auth::user()->status  == "organizator")<p>Заявок</p> @elseif (Auth::user()->status  == "artist") <p>Аудитория</p> @endif
            </div>
            @foreach ($my_proposals_check as $item => $key)
                <div class="lk-list__item @if ($key[1][0] == 'decline' || strtotime($proposals_check_date[$item][0][0]) < strtotime(date("d.m.Y"))) ended-event @endif">
                    <p>{{$proposals_check_date[$item][0][0]}}</p>
                    <p><a href="/event/{{$key[0]->id}}">{{$key[0]->name}}</a></p>
                    <p>{{$proposals_check_date[$item][0][1]}}</p>
                    <p>{{$proposals_check_date[$item][0][2]}}</p>
                    <p>@if($key[0]->status == "accept")Одобрено@endif @if($key[1][0] == "check")На проверке@endif @if($key[1] == "decline")Отказано@endif</p>
                    <p><img src="img/{{$key[0]->people}}people.png" alt=""></p>
                    <p class="event-logo"><img src="/uploads/images/{{$key[0]->cover}}" alt=""></p>
                    <p class='lk-events__edit delete-event once' style="padding: 0px 10px;"><a class="del-proposal" data-del-href="/delete-proposal/{{$item}}"></a></p>
                </div>
            @endforeach
        @else
            <div class="no-events"><span class="icon-warning">!</span>На указанную дату нет заявок ожидающих проверки организатором</div>
        @endif
</div>
<div class="lk-list" id="my-party-2">
    @if($my_proposals_accept)
        <div class="lk-list__header">
            <p>Дата</p>
            <p>Название</p>
            <p>Начало</p>
            <p>Окончание</p>
            <p>Статус</p>
            <p>Аудитория</p>
        </div>
        @foreach ($my_proposals_accept as $item => $key)
            <div class="lk-list__item @if (strtotime($proposals_accept_date[$item][0][0]) == strtotime(date("d.m.Y"))) active-event @endif @if (strtotime($proposals_accept_date[$item][0][0]) < strtotime(date("d.m.Y"))) ended-event @endif">
                <p>{{$proposals_accept_date[$item][0][0]}}</p>
                <p><a href="/event/{{$key[0]->id}}">{{$key[0]->name}}</a></p>
                <p>{{$proposals_accept_date[$item][0][1]}}</p>
                <p>{{$proposals_accept_date[$item][0][2]}}</p>
                <p>Участник</p>
                <p><img src="img/{{$key[0]->people}}people.png" alt=""></p>
                <p class="event-logo"><img src="/uploads/images/{{$key[0]->cover}}" alt=""></p>
                @if(date($proposals_accept_date[$item][0][0]) < date("d.m.Y")) <p class='lk-events__edit edit-event review-event'><a href="/add_review/{{$item}}"></a></p> @endif
                <p class='lk-events__edit delete-event'><a class="del-proposal" data-del-href="/delete-proposal/{{$item}}"></a></p>
            </div>
        @endforeach
    @else
        <div class="no-events"><span class="icon-warning">!</span>У Вас нет одобренных заявок на указанную дату</div>
    @endif
</div>
