@extends('layouts.app')

@section('content')
    <div class="center-wrap">
        <div class="my_skils">
            <div class="skill_title">Проекты</div>
            <div class="select-skill">
                <div class="skills-title">
                    <div class="title_skills">Название</div>
                    <div class="price_skills">Стоимость</div>
                </div>
                <form action="/lk-skills-update" method="post">
                @csrf
                @foreach ($available_skills as $skills)
                    <div class="skill-item">
                        <input type="hidden" name="skills_id[{{ $skills->id }}]">
                        <input type="checkbox" name="skills_id[{{ $skills->id }}][]" class="check_skill" id="skill_{{ $skills->id }}" @if($status_skill[$skills->id][0] === 'on') checked @endif>
                        <label class="form-check-label" for="skill_{{ $skills->id }}"></label>
                        <div class="name_skill">{{ $skills->name }}</div>
                        <input type="number" class="price_skill" name="prices[{{ $skills->id }}][]" @if($price_skill[$skills->id][0] !== 1500) value="{{$price_skill[$skills->id][0]}}" @else value="1500" @endif>
                        <span class="price_text">руб./час</span>
                    </div>
                @endforeach
                    <input type="submit" class="btn" value="Отправить">
                </form>
            </div>
        </div>
        <div class="artist-content">
            <div class="my-tracks">
                <div class="content-my_tracks">
                    <div class="skill_title">Мои треки</div>
                    <div class="cover-image" style="background-image: url(img/obloshka.png)"></div>
                    <div class="controll-cover lk-event__item-btns">
                        <a href="" class="edit-cover">Изменить обложку</a>
                        <a href="" class="delete-cover">Удалить обложку</a>
                    </div>
                    <div class="my-track_list">
                        <div class="track-item">
                            <div class="play_track"></div>
                            <div class="track_name">Цветы ада</div>
                            <div class="time_track">3:39</div>
                            <div class="delete_track"></div>
                        </div>
                        <div class="track-item">
                            <div class="play_track"></div>
                            <div class="track_name">Цветы ада</div>
                            <div class="time_track">3:39</div>
                            <div class="delete_track"></div>
                        </div>
                        <div class="track-item">
                            <div class="play_track"></div>
                            <div class="track_name">Цветы ада</div>
                            <div class="time_track">3:39</div>
                            <div class="delete_track"></div>
                        </div>
                    </div>
                    <div class="add_track_list lk-event__item-btns">
                        <a href="" class="add_track">Добавить трек</a>
                    </div>
                    <div class="description_tracks">
                        <label for="decription-albom">Описание</label>
                        <textarea id="decription-albom" placeholder="Описание албома"></textarea>
                    </div>
                </div>
            </div>
            <div class="music-genre">
                <div class="skill_title">Музыкальные направления</div>
                <div class="genre-list">
                    <div class="genre-item">
                        <input type="checkbox" class="check_skill" id="genre_1">
                        <label class="form-check-label" for="genre_1">авторская песня</label>
                    </div>
                    <div class="genre-item">
                        <input type="checkbox" class="check_skill" id="genre_2">
                        <label class="form-check-label" for="genre_2">блатная песня</label>
                    </div>
                    <div class="genre-item">
                        <input type="checkbox" class="check_skill" id="genre_3">
                        <label class="form-check-label" for="genre_3">блюз</label>
                    </div>
                    <div class="genre-item">
                        <input type="checkbox" class="check_skill" id="genre_4">
                        <label class="form-check-label" for="genre_4">джаз</label>
                    </div>
                    <div class="genre-item">
                        <input type="checkbox" class="check_skill" id="genre_5">
                        <label class="form-check-label" for="genre_5">диско</label>
                    </div>
                    <div class="genre-item">
                        <input type="checkbox" class="check_skill" id="genre_6">
                        <label class="form-check-label" for="genre_6">индийская классическая музыка</label>
                    </div>
                    <div class="genre-item">
                        <input type="checkbox" class="check_skill" id="genre_7">
                        <label class="form-check-label" for="genre_7">кантри</label>
                    </div>
                    <div class="genre-item">
                        <input type="checkbox" class="check_skill" id="genre_8">
                        <label class="form-check-label" for="genre_8">латиноамериканская музыка</label>
                    </div>
                    <div class="genre-item">
                        <input type="checkbox" class="check_skill" id="genre_9">
                        <label class="form-check-label" for="genre_9">народная музыка</label>
                    </div>
                    <div class="genre-item">
                        <input type="checkbox" class="check_skill" id="genre_10">
                        <label class="form-check-label" for="genre_10">рок-музыка</label>
                    </div>
                    <div class="genre-item">
                        <input type="checkbox" class="check_skill" id="genre_11">
                        <label class="form-check-label" for="genre_11">романс</label>
                    </div>
                    <div class="genre-item">
                        <input type="checkbox" class="check_skill" id="genre_12">
                        <label class="form-check-label" for="genre_12">ска</label>
                    </div>
                    <div class="genre-item">
                        <input type="checkbox" class="check_skill" id="genre_13">
                        <label class="form-check-label" for="genre_13">хип-хор</label>
                    </div>
                    <div class="genre-item">
                        <input type="checkbox" class="check_skill" id="genre_14">
                        <label class="form-check-label" for="genre_14">шансон</label>
                    </div>
                    <div class="genre-item">
                        <input type="checkbox" class="check_skill" id="genre_15">
                        <label class="form-check-label" for="genre_15">электронная музыка</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="save-result lk-event__item-btns">
            <input type="submit" class="btn" value="Сохранить изменения">
        </div>
    </div>
@endsection
