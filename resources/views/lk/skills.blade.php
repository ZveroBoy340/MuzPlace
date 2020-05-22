@extends('layouts.app')

@section('content')
    <div class="center-wrap">
        <form action="/lk-skills-update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="my_skils">
                <div class="skill_title">Проекты</div>
                <div class="select-skill">
                    <div class="skills-title">
                        <div class="title_skills">Название</div>
                        <div class="price_skills">Стоимость</div>
                    </div>

                    @foreach ($available_skills as $skills)
                        <div class="skill-item">
                            <input type="hidden" name="skills_id[{{ $skills->id }}]">
                            <input type="checkbox" name="skills_id[{{ $skills->id }}][]" class="check_skill" id="skill_{{ $skills->id }}" @if($status_skill[$skills->id][0] != null) checked @endif>
                            <label class="form-check-label" for="skill_{{ $skills->id }}"></label>
                            <div class="name_skill">{{ $skills->name }}</div>
                            <input type="number" class="price_skill" name="prices[{{ $skills->id }}][]" @if($price_skill[$skills->id][0] !== 1500) value="{{$price_skill[$skills->id][0]}}" @else value="1500" @endif>
                            <span class="price_text">руб./час</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="artist-content">
                <div class="my-tracks">
                    <div class="content-my_tracks">
                        <div class="skill_title">Мои треки</div>
                        <div class="cover-image">
                            <img src="/uploads/images/{{ $obloshka }}" class="img-view" alt="">
                        </div>
                        <div class="controll-cover lk-event__item-btns">
                            <input type="file" name="obloshka" id="obloshka" class="img-load none">
                            <label for="obloshka" class="edit-cover">Изменить обложку</label>
                            <label class="delete-cover del-img">Удалить обложку</label>
                        </div>
                        <div class="my-track_list">
                            <audio id="player" controls="" class="none" preload="metadata">
                                <source id="player_src" src="">
                            </audio>
                            @foreach ($user_tracks as $track)
                            <div class="track-item">
                                <div class="play_track" data-track-play="/uploads/tracks/{{ $track->url }}"></div>
                                <div class="track_name">{{ $track->name }}</div>
                                <div class="time_track">{{ $track->duration }}</div>
                                <div class="delete_track" data-track-id="{{ $track->id }}"></div>
                            </div>
                            @endforeach
                            <audio id="play_player" controls="" class="none" preload="metadata">
                                <source id="play_player_src" src="">
                            </audio>
                       </div>
                        <div class="add_track_list lk-event__item-btns">
                            <label class="add_track" data-tracks="0">Добавить трек</label>
                        </div>
                        <div class="description_tracks">
                            <label for="decription-albom">Описание</label>
                            <textarea id="decription-albom" name="text_albom" placeholder="Описание албома">{{ $text_albom }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="music-genre">
                    <div class="skill_title">Музыкальные направления</div>
                    <div class="genre-list">
                        @foreach ($available_genres as $genres)
                            <div class="genre-item">
                                <input type="hidden" name="genre_id[{{ $genres->id }}]">
                                <input type="checkbox" name="genre_id[{{ $genres->id }}][]" class="check_skill" id="genre_{{$genres->id}}" @if($genre_user[$genres->id][0] != null) checked @endif>
                                <label class="form-check-label" for="genre_{{$genres->id}}">{{$genres->name}}</label>
                                <div class="current-genre"><span data-genre="{{$genres->id}}" @if($genres->id == $current_genre) class="active" @endif>Основной</span></div>
                            </div>
                        @endforeach
                        <input type="hidden" name="current_genre" id="current_genre" value="{{$current_genre}}">
                    </div>
                </div>
            </div>
            <div class="save-result lk-event__item-btns">
                <input type="submit" class="btn" value="Сохранить изменения">
            </div>
        </form>
    </div>
@endsection
