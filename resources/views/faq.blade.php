@extends('layouts.app')

@section('content')
    @include('blocks.top_search')
    <section class="about">
        <div class="center-wrap">
            <div class="faq_container">
                <h1 class='simple-title'>Часто задаваемые вопросы</h1>
                @foreach ($faq as $item)
                    <div class="faq">
                        <div class="faq_question open">{{$item->question}}</div>
                        <div class="faq_answer_container">
                            <div class="faq_answer">{{$item->answer}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('blocks.form')
    @include('blocks.features')
@endsection
