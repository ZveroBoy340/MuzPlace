@component('mail::message')
# Новый отзыв!

@component('mail::panel')
    <p><b>Пользователь</b>: {{$user_name}}</p>
    <p><b>Текст отзыва</b>: {{$review_text}}</p>
@endcomponent

@component('mail::button', ['url' => 'https://german-granit.shop/'])
    Перейти на сайт
@endcomponent

@lang('mails.regards'),<br>
MuzPlace
@endcomponent
