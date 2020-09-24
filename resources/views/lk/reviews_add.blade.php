@extends('layouts.app')

@section('content')
    <div class="review-container">
        <div class="review-box">
            <div class="review-title">Добавление отзыва</div>
            <span class="close-preview add_preview">x</span>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="review-data">
                    <div class="your-review">Ваш отзыв:</div>
                    <div class="rating-post">
                        <div class="rating-text">Оценка:</div>
                        <div class="rating-stars"><div class="rate1"></div></div>
                    </div>
                </div>
                <div class="review-text">
                    <textarea placeholder="Расскажите о своем впечатлении..." name="text-review" id="double-text-review"></textarea>
                </div>
                <div class="review-control">
                    <div class="review-sub">
                        <input type="submit" class="btn btn-review" value="Добавить отзыв">
                    </div>
                    <div class="review-img">
                        <input type="file" name="photo[0]" id="review-foto_0" class="img-load review-add-photo none">
                        <label class="add_foto" title="Добавить фото с мероприятия" data-photos="0"></label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="preview-review">
        <div class="autor-review">
            <div class="bloom_ava_review" style="background: url(@if ($artist->avatar)'/uploads/avatars/{{$artist->avatar}}' @else '/images/artist.png' @endif );"></div>
            <div class="avatar_autor_review_content">
                <div class="avatar_autor_review">
                    <img @if ($artist->avatar) src="/uploads/avatars/{{$artist->avatar}}" @else src="/images/artist.png" @endif alt="">
                </div>
                <div class="name_autor_review">{{$artist->name}} {{$artist->lastname}}</div>
                <div class="data_autor_review">{{date('d.m.Y')}}</div>
                <div class="rating_autor_review"><div class="rate1"></div></div>
                <div class="images_autor_review"></div>
            </div>
        </div>
        <div class="review-comment">
            <span class="close-preview view_preview">x</span>
            <div class="review-comment-content" id="double-review">
                Введите Ваш отзыв...
            </div>
        </div>
    </div>
@endsection
