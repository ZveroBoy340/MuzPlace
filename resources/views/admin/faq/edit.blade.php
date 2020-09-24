@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5">Редактирование вопроса</h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <form method="post" enctype="multipart/form-data" action="/mpadmin/faq/{{ $faq->id }}/update">
                            @csrf
                            <div class="detail-container">
                                <div class="detail-left">
                                    <div class="details-contact">
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Статус модерации: @if($faq->status == 0) <span>Не проверен</span> @elseif($faq->status == 1) <span class="green-back">Одобрен</span> @else <span class="red-back">Отклонен</span> @endif</p>
                                            <div class="group_status">
                                                <a class="btn btn-primary" href="/mpadmin/faq/{{ $faq->id }}/status/1">Одобрить</a>
                                                <a class="btn btn-warning" href="/mpadmin/faq/{{ $faq->id }}/status/0">Не проверен</a>
                                            </div>
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Вопрос</p>
                                            <input type="text" class="form-control" name="question" value="{{ $faq->question }}">
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Ответ</p>
                                            <textarea name="answer" class="form-control" cols="30" rows="10">{{ $faq->answer }}</textarea>
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
