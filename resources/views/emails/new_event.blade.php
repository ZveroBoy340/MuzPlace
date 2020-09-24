@component('mail::message')
# Новое мероприятие!

@component('mail::panel')
    <p><b>Название</b>: {{$event_name}}</p>
    <p><b>Статус</b>: Ожидает проверки</p>
@endcomponent

@component('mail::button', ['url' => 'https://german-granit.shop/event/'.$event_id.''])
    Просмотреть мероприятие
@endcomponent

@lang('mails.regards'),<br>
MuzPlace
@endcomponent
