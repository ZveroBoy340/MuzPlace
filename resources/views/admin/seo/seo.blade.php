@extends('admin.layouts.admin')

@section('content')
    <h1 class="pt-5 article-add"><span>Настройка мета-тегов</span></h1>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Название страницы</th>
                                <th scope="col">Title</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($seo as $key => $item)
                            <tr>
                                <td>#{{ $item->id }}</td>
                                <td>{{ $item->name_page }}</td>
                                <td>{{ $item->title }}</td>
                                <td><a href="/mpadmin/seo/{{ $item->id }}" class="btn btn-primary"><i class="fas fa-pen"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
