@if (count($messages) > 0)
@foreach($messages as $item => $message)
    @if ($message->invite == 0)
    <div class="chat__message @if($message->from == Auth::id()) chat__message--people @endif">
        <p class="chat__message-text">{!! $message->message !!}</p>
        <div class="chat__message-data">
            @if($message->is_read == 1)<span class="chat__message-status">Прочтено</span>@endif
            <div class="chat__message-info">
                <p><a href="/artist/{{$message->from}}"> @if($users[$message->from]->name){{$users[$message->from]->name}} @else {{$users[$message->from]->login}} @endif </a></p>
                <span>{{date('d.m.Y h:i', strtotime($message->created_at))}}</span>
            </div>
                <a href="/artist/{{$message->from}}"> @if($users[$message->from]->avatar) <img src="/uploads/avatars/{{$users[$message->from]->avatar}}" alt="" class="chat__message-img"> @else <img src="/images/artist.png" alt="" class="chat__message-img"> @endif </a>
        </div>
    </div>
    @endif
@endforeach
@else
    <div class="empty-message">Не найдено сообщений с данным пользователем</div>
@endif
