@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5">Редактирование страницы</h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <form method="post" enctype="multipart/form-data" action="/mpadmin/pages/{{ $page->id }}/update">
                            @csrf
                            <div class="detail-container">
                                <div class="detail-left">
                                    <div class="details-contact">
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Статус модерации: @if($page->status == 0) <span>Не проверен</span> @elseif($page->status == 1) <span class="green-back">Одобрен</span> @else <span class="red-back">Отклонен</span> @endif</p>
                                            <div class="group_status">
                                                <a class="btn btn-primary" href="/mpadmin/pages/{{ $page->id }}/status/1">Одобрить</a>
                                                <a class="btn btn-warning" href="/mpadmin/pages/{{ $page->id }}/status/0">Не проверен</a>
                                            </div>
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Заголовок</p>
                                            <input type="text" class="form-control" name="title" value="{{ $page->title }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Title</p>
                                            <input type="text" class="form-control" name="meta_title" value="{{ $page->meta_title }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Description</p>
                                            <input type="text" class="form-control" name="meta_description" value="{{ $page->meta_description }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">URL</p>
                                            <input type="text" class="form-control" name="url" value="{{ $page->url }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Текст страницы</p>
                                            <textarea name="text" class="form-control" cols="30" rows="10">{{ $page->text }}</textarea>
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
