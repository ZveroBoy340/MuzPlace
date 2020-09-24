@extends('layouts.app')

@section('content')
    <section class="about">
        <div class="center-wrap">
            <h1 class='simple-title'>{{$page->title}}</h1>
            {!! $page->text !!}
        </div>
    </section>
    @include('blocks.form')
    @include('blocks.features')
@endsection
