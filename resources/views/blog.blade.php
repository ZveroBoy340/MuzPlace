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
                <a href="/about.html" class="blog__item">
                    <div>
                        <img src="images/blog1.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a  href="about.html" class="blog__item blog__item--big">
                    <div>
                        <img src="images/blog2.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a href="/about.html" class="blog__item">
                    <div>
                        <img src="images/blog3.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a href="/about.html" class="blog__item">
                    <div>
                        <img src="images/blog4.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a href="/about.html" class="blog__item">
                    <div>
                        <img src="images/blog5.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a  href="about.html" class="blog__item blog__item--big">
                    <div>
                        <img src="images/blog6.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a href="/about.html" class="blog__item">
                    <div>
                        <img src="images/blog7.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a href="/about.html" class="blog__item">
                    <div>
                        <img src="images/blog8.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a href="/about.html" class="blog__item">
                    <div>
                        <img src="images/blog9.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a href="/about.html" class="blog__item">
                    <div>
                        <img src="images/blog10.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a href="/about.html" class="blog__item">
                    <div>
                        <img src="images/blog11.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a href="/about.html" class="blog__item">
                    <div>
                        <img src="images/blog12.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a href="/about.html" class="blog__item">
                    <div>
                        <img src="images/blog13.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a href="/about.html" class="blog__item">
                    <div>
                        <img src="images/blog14.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a  href="about.html" class="blog__item blog__item--big">
                    <div>
                        <img src="images/blog15.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a href="/about.html" class="blog__item">
                    <div>
                        <img src="images/blog16.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a href="/about.html" class="blog__item">
                    <div>
                        <img src="images/blog17.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a href="/about.html" class="blog__item">
                    <div>
                        <img src="images/blog18.png" alt="">
                        <h3>Эксплуатация бассейна - основные понятия</h3>
                    </div>
                </a>
                <a href="" class="blog__item blog__item--hide"></a>
                <a href="" class="blog__item blog__item--hide"></a>
            </div>
        </div>
    </section>
    @include('blocks.features')
@endsection
