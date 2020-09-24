@extends('layouts.app')

@section('content')
    <section class="lk-messages">
        <div class="center-wrap">
            <div class="lk-list">
                <div class="lk-list__header chat-dates">
                    <div class="lk-list__header-item">
                        <span>C</span>
                        <input type="text" class="date-input datepicker-here" id="notice_in" placeholder="Дата">
                    </div>
                    <div class="lk-list__header-item">
                        <span>По</span>
                        <input type="text" class="date-input datepicker-here" id="notice_out" placeholder="Дата">
                    </div>
                </div>
                <div class="lk-list__header after">
                    <p>Дата</p>
                    <p>Название</p>
                    <a id="all-notice" class="lk-event__back">Пометить все как прочитанное</a>
                </div>
                @if(count($notices) > 0)
                @foreach ($notices as $notice)
                    <div class="lk-list__item @if($notice->viewed == 1) readed-notice @endif">
                        <div class="left-list_item">
                            <p>{{$notice->date}}</p>
                            <p class="nolink">{!! $notice->message !!}</p>
                        </div>
                        <div class="right-list_item">
                            @if($notice->viewed == 0) <p class="right-notice"><a class="read-notice" data-notice="{{$notice->id}}" title="Пометить как прочитанное"></a></p> @endif
                            <p class="right-notice"><a class="delete-notice" data-notice="{{$notice->id}}" data-viewed="{{$notice->viewed}}"></a></p>
                        </div>
                    </div>
                @endforeach
                @else
                    <div class="no-events"><span class="icon-warning">!</span>У Вас нет новых уведомлений</div>
                @endif
                <div class="notices-paginator">
                    {{$notices->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_scripts')
    <script>
        var reserved_days = new Array();
        @foreach ($reserved_calendar as $num => $date)
        reserved_days.push('{{$date}} 00:00:00');
        @endforeach

        $('.lk-list__header-item .datepicker-here').datepicker({
            onRenderCell: function(date, cellType) {
                var i;
                for (i = 0; i < reserved_days.length; i++) {
                    var pattern = /(\d{2})\.(\d{2})\.(\d{4})/;
                    var dates = new Date(reserved_days[i].replace(pattern,'$3-$2-$1'));
                    if (cellType == 'day' && date.getDate() == dates.getDate() && date.getMonth() == dates.getMonth()) {
                        return {
                            classes: 'accepted-date'
                        }
                    }
                }
            }
        });
    </script>
@endsection
