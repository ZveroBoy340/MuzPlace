@extends('layouts.app')

@section('content')
    <section class="reviews-list">
        <div class="center-wrap">
            @if(count($reviews) > 0)
            @foreach ($reviews as $number => $review)
                <div class="reviews-item">
                <div class="review-info">
                    <div class="review-foto">
                        <img src="/uploads/avatars/{{$review->avatar}}" alt="">
                    </div>
                    <div class="review-autor">
                        <div class="autor-name">{{$review->name}} {{$review->lastname}}</div>
                        <div class="data-review">{{$review->date}}</div>
                        <div class="rating-review">
                            <div class="rate2">
                                @if($review->rating >= 1) <img alt="1" src="/img/star-on.png"> @else <img alt="1" src="/img/star-off.png"> @endif
                                @if($review->rating >= 2) <img alt="2" src="/img/star-on.png"> @else <img alt="2" src="/img/star-off.png"> @endif
                                @if($review->rating >= 3) <img alt="3" src="/img/star-on.png"> @else <img alt="3" src="/img/star-off.png"> @endif
                                @if($review->rating >= 4) <img alt="4" src="/img/star-on.png"> @else <img alt="4" src="/img/star-off.png"> @endif
                                @if($review->rating >= 5) <img alt="5" src="/img/star-on.png"> @else <img alt="5" src="/img/star-off.png"> @endif
                            </div>
                        </div>
                        @if ($attachment[$number][0] != null)<a class="attached-review">Показать вложения</a>
                            <div class="review review-page">
                                <div class="review__slider">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach ($attachment[$number][0] as $count => $photo)
                                                <div class="swiper-slide">
                                                    <a href='/uploads/images/{{$photo}}' data-fancybox='review{{$number}}'><img src="/uploads/images/{{$photo}}" alt=""></a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="review-textbox">
                    {{$review->text_review}}
                    <span class="more-review"></span>
                </div>
            </div>
            @endforeach
        </div>
        {{$reviews->links()}}
        @else
            <div class="no-events"><span class="icon-warning">!</span>У Вас нет отзывов от других пользователей</div>
        @endif
    </section>
@endsection
