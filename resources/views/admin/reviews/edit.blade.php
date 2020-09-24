@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5">Редактирование отзыва</h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <form method="post" enctype="multipart/form-data" action="/mpadmin/reviews/{{ $review->id }}/update">
                            @csrf
                            <div class="detail-container">
                                <div class="detail-left">
                                    <div class="details-contact">
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Фотография отзыва</p>
                                            <div class="contact-image-content">
                                                <img src="/uploads/avatars/{{ $review->avatar }}" class="contact-image img-view" alt="">
                                                <input type="file" name="avatar" id="avatar" class="img-load none" value="{{$review->avatar}}">
                                                <label for="avatar" class="attached-foto">Загрузить фотографию</label>
                                            </div>
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Статус модерации: @if($review->status == 0) <span>Не проверен</span> @elseif($review->status == 1) <span class="green-back">Одобрен</span> @else <span class="red-back">Отклонен</span> @endif</p>
                                            <div class="group_status">
                                                <a class="btn btn-primary" href="/mpadmin/reviews/{{ $review->id }}/status/1">Одобрить</a>
                                                <a class="btn btn-danger" href="/mpadmin/reviews/{{ $review->id }}/status/2">Отклонить</a>
                                                <a class="btn btn-warning" href="/mpadmin/reviews/{{ $review->id }}/status/0">Не проверен</a>
                                            </div>
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Имя</p>
                                            <input type="text" class="form-control" name="name" value="{{ $review->name }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Фамилия</p>
                                            <input type="text" class="form-control" name="lastname" value="{{ $review->lastname }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Дата отзыва</p>
                                            <input type="date" class="form-control date-input" name="date" placeholder="Дата" value="{{date('Y-m-d', strtotime($review->date))}}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Оценка</p>
                                            <div class="rate3"></div>
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Текст отзыва</p>
                                            <textarea name="text_review" class="form-control" cols="30" rows="10">{{ $review->text_review }}</textarea>
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Фотографии с мероприятия</p>
                                            <div class="review-img">
                                                @foreach($review_img as $item => $img)
                                                    <input type="text" name="photo[{{$item}}][]" id="review-foto_{{$item}}" value="{{$img}}" class="img-load review-add-photo none">
                                                    <div data-photo="{{$item}}" class="review-foto" style="background: url('/uploads/images/{{$img}}');"><span>x</span></div>
                                                @endforeach
                                                <label class="add_foto" title="Добавить фото с мероприятия" data-photos="{{$img_count}}"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block mt-4" type="submit">Сохранить изменения</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_scripts')
    <script>
        $(document).ready(function(){
            $('.rate3').raty({
                click: function(score, evt) {
                }
            });
            $('.rate3').raty('score', {{$review->rating}});
        });
    </script>
@endsection
