@extends('layouts.app')

@section('content')
    <section class="about">
        <div class="center-wrap">
            <img src="/uploads/images/{{$article->image}}" alt="">
            <h1 class='simple-title'>{{$article->title}}</h1>
            {{$article->text}}
        </div>
    </section>
    @include('blocks.form')
    @include('blocks.features')
@endsection
