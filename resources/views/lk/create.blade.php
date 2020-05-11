@extends('layouts.app')

@section('content')
    <section class="create">
        <div class="center-wrap">
            <h1 class='simple-title'>Создание мероприятия</h1>
            <div class="create__nav">
                <div class="create__nav-links">
                    <h2 class="create__nav-link">о мероприятии</h2>
                    <h2 class="create__nav-link">кого ищите</h2>
                    <h2 class="create__nav-link">условия</h2>
                </div>
                <div class="create__nav-bar">
                    <span class="active"></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <form action="" class="create__columns inputs inputs--small">
                <div class="create__column">
                    <h3 class="create__column-title">Описание</h3>
                    <div class="inputs__wrap">
                        <p class="inputs__title">Название</p>
                        <input type="text">
                    </div>
                    <div class="inputs__wrap">
                        <p class="inputs__title">Краткое описание</p>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="inputs__wrap">
                        <p class="inputs__title">Обложка</p>
                        <label class="inputs__file cover">
									<span>
										Добавить обложку
									</span>
                            <input type="file" name="" id="">
                        </label>
                    </div>
                </div>
                <div class="create__column">
                    <h3 class="create__column-title">Дата и время</h3>
                    <div class="inputs__inputs">
                        <div class="inputs__wrap">
                            <p class="inputs__title">Дата</p>
                            <input type="date" class="date-input">
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">C</p>
                            <input type="time" class="date-input">
                        </div>
                        <div class="inputs__wrap">
                            <p class="inputs__title">До</p>
                            <input type="time" class="date-input">
                        </div>
                    </div>
                    <a href="" class="add_date_event">Добавить дату</a>
                </div>
                <div class="create__column">
                    <h3 class="create__column-title">Дополнительно</h3>
                    <div class="inputs__wrap">
                        <p class="inputs__title">Тип</p>
                        <div class="select">
                            <div class="select__value">Фестиваль</div>
                            <div class="select__variants">
                                <label for="" class="select__variant select__variant--active"><span>Фестиваль</span></label>
                                <label for="" class="select__variant"><span>04</span></label>
                                <label for="" class="select__variant"><span>05</span></label>
                                <label for="" class="select__variant"><span>06</span></label>
                                <label for="" class="select__variant"><span>07</span></label>
                                <label for="" class="select__variant"><span>08</span></label>
                                <label for="" class="select__variant"><span>09</span></label>
                            </div>
                        </div>
                    </div>

                    <div class="inputs__wrap">
                        <p class="inputs__title">Площадка открытая или закрытая?</p>
                        <div class="select">
                            <div class="select__value">Открытая</div>
                            <div class="select__variants">
                                <label for="" class="select__variant select__variant--active"><span>Открытая</span></label>
                                <label for="" class="select__variant"><span>04</span></label>
                                <label for="" class="select__variant"><span>05</span></label>
                                <label for="" class="select__variant"><span>06</span></label>
                                <label for="" class="select__variant"><span>07</span></label>
                                <label for="" class="select__variant"><span>08</span></label>
                                <label for="" class="select__variant"><span>09</span></label>
                            </div>
                        </div>
                    </div>

                    <div class="inputs__wrap">
                        <p class="inputs__title">Количество человек</p>
                        <div class="select">
                            <div class="select__value"><i class="first_people"></i>До 10</div>
                            <div class="select__variants">
                                <label for="" class="select__variant select__variant--active"><span><i class="first_people"></i>До 10</span></label>
                                <label for="" class="select__variant"><span><i class="two_people"></i>До 100</span></label>
                                <label for="" class="select__variant"><span><i class="three_people"></i>Более 1000</span></label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="create__btn">
                    <a href="/create_2.html" class="btn">Продолжить</a>
                </div>
            </form>
        </div>
    </section>
@endsection
