@extends('layouts.app')

@section('content')
    <section class="chat">
        <div class="center-wrap">
            <div class="chat__header dates-notice">
                <div class="chat__header-item">
                    <span>C</span>
                    <input type="text" class="date-input datepicker-here" id="chat_in" placeholder="Дата">
                </div>
                <div class="chat__header-item">
                    <span>По</span>
                    <input type="text" class="date-input datepicker-here" id="chat_out" placeholder="Дата">
                </div>
            </div>
            <div class="chat__wrap">
                <div class="chat__chats">
                    @if (count($users) > 0)
                    @foreach($users as $item => $user)
                        <div class="chat__chat @if ($unread_users[$item]['is_read'] == 0) chat__chat--curner @endif @if($user->isOnline()) chat__chat--online @endif" id="{{$user->id}}">
                            <div class="chat__chat-img"><img @if($user->avatar) src="/uploads/avatars/{{$user->avatar}}" @else src="/images/artist.png" @endif alt=""></div>
                            <div class="chat__chat-data">
                                <span>@if($user->name){{$user->name}} @elseif ($user->login) {{$user->login}} @endif</span>
                                <p>{{$unread_users[$item]['message']}}</p>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <div class="no-users">У вас пока нет контактов переписки</div>
                    @endif
                </div>
                <div class="chat__right">
                    <div class="chat__messages">
                        <div class="select-user">@if (count($users) > 0) Выберите контакт @else У вас пока нет истории переписки с контактами @endif</div>
                    </div>
                    <div class="chat__form">
                        <textarea name="" placeholder="Напиши сообщение..."></textarea>
                        <input type="submit" value="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_scripts')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        var receiver_id = '';
        var my_id = {{Auth::id()}};
        @if (count($users) > 0)
            $(document).ready(function(){
               var last_user = $('.chat__chats').find('.chat__chat').attr('id');
                setTimeout(function () {
                    $('#'+last_user).trigger('click');
                }, 100);
            });
        @endif

    </script>
    <script src="/js/chat.js"></script>
@endsection
