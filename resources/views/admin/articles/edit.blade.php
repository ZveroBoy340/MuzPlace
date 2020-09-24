@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5">Редактирование статьи</h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <form method="post" enctype="multipart/form-data" action="/mpadmin/articles/{{ $article->id }}/update">
                            @csrf
                            <div class="detail-container">
                                <div class="detail-left">
                                    <div class="details-contact">
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Миниатюра статьи</p>
                                            <div class="contact-image-content">
                                                <img src="/uploads/images/{{ $article->image }}" class="contact-image img-view" alt="">
                                                <input type="file" name="image" id="image" class="img-load none" value="{{$article->image}}">
                                                <label for="image" class="attached-foto">Загрузить фотографию</label>
                                            </div>
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Статус модерации: @if($article->status == 0) <span>Не проверен</span> @elseif($article->status == 1) <span class="green-back">Одобрен</span> @else <span class="red-back">Отклонен</span> @endif</p>
                                            <div class="group_status">
                                                <a class="btn btn-primary" href="/mpadmin/articles/{{ $article->id }}/status/1">Одобрить</a>
                                                <a class="btn btn-warning" href="/mpadmin/articles/{{ $article->id }}/status/0">Не проверен</a>
                                            </div>
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Заголовок</p>
                                            <input type="text" class="form-control" name="title" value="{{ $article->title }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Title</p>
                                            <input type="text" class="form-control" name="meta_title" value="{{ $article->meta_title }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Description</p>
                                            <input type="text" class="form-control" name="meta_description" value="{{ $article->meta_description }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Дата статьи</p>
                                            <input type="date" class="form-control date-input" name="date" placeholder="Дата" value="{{date('Y-m-d', strtotime($article->date))}}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Текст статьи</p>
                                            <textarea name="text" class="form-control" cols="30" rows="10">{{ $article->text }}</textarea>
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
