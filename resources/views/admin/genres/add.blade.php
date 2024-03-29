@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5">Добавление жанра артиста/мероприятия</h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <form method="post" enctype="multipart/form-data" action="/mpadmin/genres/add">
                            @csrf
                            <div class="detail-container">
                                <div class="detail-left">
                                    <div class="details-contact">
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Статус модерации</p>
                                            <div class="gender-radio">
                                                <input type="radio" id="accept" name="status" value="1">
                                                <label for="accept">Одобрен</label>
                                                <input type="radio" id="check" name="status" value="0" checked>
                                                <label for="check">Не проверен</label>
                                            </div>
                                        </div>
                                        <div class="inputs__wrap">
                                            <p class="inputs__wrap-title">Название</p>
                                            <input type="text" class="form-control" name="name" value="">
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
