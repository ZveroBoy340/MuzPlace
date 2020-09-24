@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5">Все отзывы</h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Аватар</th>
                                <th scope="col">Логин</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Оценка</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reviews as $key => $review)
                            <tr>
                                <td>#{{ $review->id }}</td>
                                <td class="ava-user"><img @if($review->avatar) src="/uploads/avatars/{{ $review->avatar }}" @else src="/images/artist.png" @endif alt=""></td>
                                <td>{{ $review->name }} {{ $review->lastname }}</td>
                                <td>{{ $review->date }}</td>
                                <td>@if($review->rating > 0 && $review->rating < 1) <img alt="5" src="/img/star-half.png"> @elseif($review->rating >= 1 || $review->rating == 1) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                    @if($review->rating > 1 && $review->rating < 2) <img alt="5" src="/img/star-half.png"> @elseif($review->rating >= 2 || $review->rating == 2) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                    @if($review->rating > 2 && $review->rating < 3) <img alt="5" src="/img/star-half.png"> @elseif($review->rating >= 3 || $review->rating == 3) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                    @if($review->rating > 3 && $review->rating < 4) <img alt="5" src="/img/star-half.png"> @elseif($review->rating >= 4 || $review->rating == 4) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                                    @if($review->rating > 4 && $review->rating < 5) <img alt="5" src="/img/star-half.png"> @elseif($review->rating >= 5 || $review->rating == 5) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif</td>
                                <td class="status-item">@if($review->status == 0) <span>Не проверен</span>@endif @if($review->status == 1) <span class="green-back">Одобрен</span> @elseif($review->status == 2) <span class="red-back">Отклонен</span> @endif</td>
                                <td><a href="/mpadmin/reviews/{{ $review->id }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                    <div class="btn-group">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-trash-alt"></i></button>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <li>
                                                <a class="dropdown-item" href="/mpadmin/reviews/{{ $review->id }}/delete">Удалить отзыв</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-unlock-alt"></i></button>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <li>
                                                <a class="dropdown-item" href="/mpadmin/reviews/{{ $review->id }}/status/1">Одобрить</a>
                                                <a class="dropdown-item" href="/mpadmin/reviews/{{ $review->id }}/status/2">Отклонить</a>
                                                <a class="dropdown-item" href="/mpadmin/reviews/{{ $review->id }}/status/0">Не проверен</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$reviews->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
