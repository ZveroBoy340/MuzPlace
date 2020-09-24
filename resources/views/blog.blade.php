@extends('layouts.app')

@section('content')
    <div class="center-wrap">
        <h1 class="simple-title simple-sub-title--link">Блог <div class="select select--sep select--filters">
                <div class="select__value">Фильтр</div>
                <div class="select__variants">
                    <label for="" class="select__variant select__variant--active"><span>03</span></label>
                    <label for="" class="select__variant"><span>04</span></label>
                    <label for="" class="select__variant"><span>05</span></label>
                    <label for="" class="select__variant"><span>06</span></label>
                    <label for="" class="select__variant"><span>07</span></label>
                    <label for="" class="select__variant"><span>08</span></label>
                    <label for="" class="select__variant"><span>09</span></label>
                </div>
            </div></h1>
    </div>
    <section class="blog">
        <div class="center-wrap">
            <div class="blog__list">
                @foreach($articles as $item => $article)
                    <a href="/blog/{{$article->id}}" class="blog__item">
                        <div>
                            <img src="/uploads/images/{{$article->image}}" alt="">
                            <h3>{{$article->title}}</h3>
                        </div>
                    </a>
                @endforeach
                <a href="" class="blog__item blog__item--hide"></a>
                <a href="" class="blog__item blog__item--hide"></a>
            </div>
            {{$articles->links()}}
        </div>
    </section>
    @include('blocks.features')
@endsection
