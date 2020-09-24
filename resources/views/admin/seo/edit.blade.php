@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5">Редактирование мета-тега</h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <form method="post" enctype="multipart/form-data" action="/mpadmin/seo/{{ $seo->id }}/update">
                            @csrf
                            <div class="detail-container">
                                <div class="detail-left">
                                    <div class="details-contact">
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Название страницы</p>
                                            <input type="text" class="form-control" name="name_page" value="{{ $seo->name_page }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Title</p>
                                            <input type="text" class="form-control" name="title" value="{{ $seo->title }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Description</p>
                                            <textarea name="answer" class="form-control" cols="10" rows="10">{{ $seo->description }}</textarea>
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
