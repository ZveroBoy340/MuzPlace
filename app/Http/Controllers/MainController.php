<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Chat;
use App\Events;
use App\Faq;
use App\Genres;
use App\MetaTags;
use App\Notices;
use App\Pages;
use App\Reviews;
use App\Skills;
use App\Users_proposal;
use App\Users_skills;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use \App\User;
use \App\Artist;
use \App\ArtistType;
use DB;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function city_cookie($city)
    {
        if ($city > 15) {} else {
            switch ($city) {
                case 1:
                    $city = 'Москва';
                    $city_name = 'Москве';
                    break;
                case 2:
                    $city = 'Санкт-Петербург';
                    $city_name = 'Санкт-Петербурге';
                    break;
                case 3:
                    $city = 'Новосибирск';
                    $city_name = 'Новосибирске';
                    break;
                case 4:
                    $city = 'Екатеринбург';
                    $city_name = 'Екатеринбурге';
                    break;
                case 5:
                    $city = 'Казань';
                    $city_name = 'Казани';
                    break;
                case 6:
                    $city = 'Нижний Новгород';
                    $city_name = 'Нижнем Новгороде';
                    break;
                case 7:
                    $city = 'Челябинск';
                    $city_name = 'Челябинске';
                    break;
                case 8:
                    $city = 'Самара';
                    $city_name = 'Самаре';
                    break;
                case 9:
                    $city = 'Омск';
                    $city_name = 'Омске';
                    break;
                case 10:
                    $city = 'Ростов-на-Дону';
                    $city_name = 'Ростове-на-Дону';
                    break;
                case 11:
                    $city = 'Уфа';
                    $city_name = 'Уфе';
                    break;
                case 12:
                    $city = 'Красноярск';
                    $city_name = 'Красноярске';
                    break;
                case 13:
                    $city = 'Воронеж';
                    $city_name = 'Воронеже';
                    break;
                case 14:
                    $city = 'Пермь';
                    $city_name = 'Перми';
                    break;
                case 15:
                    $city = 'Волгоград';
                    $city_name = 'Волгограде';
                    break;
            }

            session()->put('city', $city);
            session()->put('city_name', $city_name);
        }
        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl);
    }

    public function index()
    {
        $city = session()->get('city');

        if ($city == '' || $city == null) {
            $city = 'Москва';
        }

        $popular_artists = Reviews::select('owner_id')->orderBy('rating', 'desc')->groupBy('owner_id')->limit(10)->get();
        $popular_artists = User::whereIn('id', $popular_artists)->where('city', $city)->where('status', 'artist')->where('email_verified_at', '!=', null)->get();
        $new_artists = User::orderBy('id', 'desc')->where('city', $city)->where('status', 'artist')->where('email_verified_at', '!=', null)->limit(10)->get();
        $last_events = DB::table('events')->where('city', $city)->orderBy('id', 'desc')->where('status', 'accept')->limit(10)->get();
        $type = DB::table('skills')->get();

        $proposals_accept = [];
        $type_events = [];
        $places = [];
        $event_data = [];
        $owner_login = [];
        $rating_new_users = [];
        $rating_popular_users = [];
        $week_events = [];

        foreach ($new_artists as $number => $artist) {
            $rating_new_users[$number][] = Reviews::reviews_rating_num($artist->id);
        }

        foreach ($popular_artists as $number => $artist) {
            $rating_popular_users[$number][] = Reviews::reviews_rating_num($artist->id);
        }

        foreach ($last_events as $id => $event) {
            $temp_data = json_decode($event->data, true);
            foreach ($temp_data as $counter => $data) {
                if (strtotime($data[0]) > strtotime(date("d.m.Y")) && strtotime($data[0]) < (strtotime(date("d.m.Y")) + 604800)) {
                    $event_data[$id] = $data;
                    $week_events[$id] = $event;
                    $type_events[$id] = $type[$event->type - 1]->name;
                    $places[$id] = count(json_decode($event->artist_type));
                    $owner = User::where('id', $event->user_id)->first();
                    $owner_login[$id] = $owner['login'];
                    $accept_proposals = Users_proposal::where('event_id', $event->id)->where('status', 'accept')->get();

                    if ($accept_proposals) {
                        $proposals_accept[$id] = count(json_decode($accept_proposals));
                        $places[$id] = $places[$id] - $proposals_accept[$id];
                    }
                    break;
                }
            }
        }

        $week_events = collect($week_events)->sortBy('data');

        $seo = MetaTags::where('id', 1)->first();

        SEOMeta::setTitle($seo->title);
        SEOMeta::setDescription($seo->description);

        return view('main', [
            'popular_artists' => $popular_artists,
            'new_artists' => $new_artists,
            'week_events' => $week_events,
            'type_events' => $type_events,
            'places' => $places,
            'event_data' => $event_data,
            'owner_login' => $owner_login,
            'rating_new_users' => $rating_new_users,
            'rating_popular_users' => $rating_popular_users,
            'type' => $type
        ]);
    }

    public function search(Request $request)
    {
        $city = session()->get('city');
        $search_name = $request->input('name');

        if ($city == '' || $city == null) {
            $city = 'Москва';
        }

        $new_artists = User::orderBy('id', 'desc')->where('city', $city)->where('login','LIKE', '%'.$search_name.'%')->where('status', 'artist')->where('email_verified_at', '!=', null)->limit(10)->get();
        $last_events = DB::table('events')->where('city', $city)->where('name','LIKE', '%'.$search_name.'%')->orderBy('id', 'desc')->where('status', 'accept')->limit(10)->get();
        $type = DB::table('skills')->get();

        $proposals_accept = [];
        $type_events = [];
        $places = [];
        $event_data = [];
        $owner_login = [];
        $rating_new_users = [];
        $rating_popular_users = [];
        $week_events = [];

        foreach ($new_artists as $number => $artist) {
            $rating_new_users[$number][] = Reviews::reviews_rating_num($artist->id);
        }

        foreach ($last_events as $id => $event) {
            $temp_data = json_decode($event->data, true);
            foreach ($temp_data as $counter => $data) {
                if (strtotime($data[0]) > strtotime(date("d.m.Y")) && strtotime($data[0]) < (strtotime(date("d.m.Y")) + 604800)) {
                    $event_data[$id] = $data;
                    $week_events[$id] = $event;
                    $type_events[$id] = $type[$event->type - 1]->name;
                    $places[$id] = count(json_decode($event->artist_type));
                    $owner = User::where('id', $event->user_id)->first();
                    $owner_login[$id] = $owner['login'];
                    $accept_proposals = Users_proposal::where('event_id', $event->id)->where('status', 'accept')->get();

                    if ($accept_proposals) {
                        $proposals_accept[$id] = count(json_decode($accept_proposals));
                        $places[$id] = $places[$id] - $proposals_accept[$id];
                    }
                    break;
                }
            }
        }

        $week_events = collect($week_events)->sortBy('data');

        $seo = MetaTags::where('id', 2)->first();

        $title = str_replace("{search}", $search_name, $seo->title);
        $description = str_replace("{search}", $search_name, $seo->description);

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);

        return view('search', [
            'new_artists' => $new_artists,
            'week_events' => $week_events,
            'type_events' => $type_events,
            'places' => $places,
            'event_data' => $event_data,
            'owner_login' => $owner_login,
            'rating_new_users' => $rating_new_users,
            'rating_popular_users' => $rating_popular_users
        ]);
    }

    public function artists()
    {
        $city = session()->get('city');

        if ($city == '' || $city == null) {
            $city = 'Москва';
        }

        $users = User::orderBy('rating', 'desc')->where('city', $city)->where('status', 'artist')->where('email_verified_at', '!=', null)->paginate(30);
        $type = Skills::where('status', 1)->get();
        $genres = Genres::where('status', 1)->get();

        $seo = MetaTags::where('id', 3)->first();

        $title = str_replace("{city}", $city, $seo->title);
        $description = str_replace("{city}", $city, $seo->description);

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);

        return view('artists', [
            'users' => $users,
            "genres" => $genres,
            "type" => $type
        ]);
    }

    public function artists_filter(Request $request)
    {
        $sort = $request->input('sort');
        $type = $request->input('type');
        $genre = $request->input('genre');
        $price = $request->input('price');

        $date_search = $request->input('artists_search');

        $city = session()->get('city');

        if ($city == '' || $city == null) {
            $city = 'Москва';
        }

        switch ($price) {
            case 1:
                $price = '\b([1-9]|[1-8][0-9]|9[0-9]|[1-8][0-9]{2}|9[0-8][0-9]|99[0-9]|1[0-9]{3}|2000)\b';
                break;
            case 2:
                $price = '\b([1-9]|[1-8][0-9]|9[0-9]|[1-8][0-9]{2}|9[0-8][0-9]|99[0-9]|[1-8][0-9]{3}|9[0-8][0-9]{2}|99[0-8][0-9]|999[0-9]|10000)\b';
                break;
            case 3:
                $price = '\b([1-8][0-9]{4}|9[0-8][0-9]{3}|99[0-8][0-9]{2}|999[0-8][0-9]|9999[0-9]|[1-8][0-9]{5}|9[0-8][0-9]{4}|99[0-8][0-9]{3}|999[0-8][0-9]{2}|9999[0-8][0-9]|99999[0-9]|[1-8][0-9]{6}|9[0-8][0-9]{5}|99[0-8][0-9]{4}|999[0-8][0-9]{3}|9999[0-8][0-9]{2}|99999[0-8][0-9]|999999[0-9]|[1-8][0-9]{7}|9[0-8][0-9]{6}|99[0-8][0-9]{5}|999[0-8][0-9]{4}|9999[0-8][0-9]{3}|99999[0-8][0-9]{2}|999999[0-8][0-9]|9999999[0-9]|[1-8][0-9]{8}|9[0-8][0-9]{7}|99[0-8][0-9]{6}|999[0-8][0-9]{5}|9999[0-8][0-9]{4}|99999[0-8][0-9]{3}|999999[0-8][0-9]{2}|9999999[0-8][0-9]|99999999[0-9])\b';
                break;
        }

        if ($type != '' && $type != 'all' && $genre != '' && $genre != 'all' && $price != '' && $price != 'all') {
            $users = Users_skills::join('users','users_skills.user_id', 'users.id')
                ->where('skills_id','LIKE', '%"'.$type.'":["on"]%')
                ->where('genre_id','LIKE', '%"'.$genre.'":["on"]%')
                ->where('prices', 'regexp', $price)
                ->where('city', $city)
                ->where('status', 'artist')->where('email_verified_at', '!=', null)
                ->orderBy($sort, 'desc')->paginate(30);
        }
        else if ($type != '' && $type != 'all' && $price != '' && $price != 'all') {
            $users = Users_skills::join('users','users_skills.user_id', 'users.id')
                ->where('skills_id','LIKE', '%"'.$type.'":["on"]%')
                ->where('prices', 'regexp', $price)
                ->where('city', $city)
                ->where('status', 'artist')->where('email_verified_at', '!=', null)
                ->orderBy($sort, 'desc')->paginate(30);
        }
        else if ($price != '' && $price != 'all' && $genre != '' && $genre != 'all') {
            $users = Users_skills::join('users','users_skills.user_id', 'users.id')
                ->where('prices', 'regexp', $price)
                ->where('genre_id','LIKE', '%"'.$genre.'":["on"]%')
                ->where('city', $city)
                ->where('status', 'artist')->where('email_verified_at', '!=', null)
                ->orderBy($sort, 'desc')->paginate(30);
        }
        else if ($type != '' && $type != 'all' && $price != '' && $price != 'all') {
            $users = Users_skills::join('users','users_skills.user_id', 'users.id')
                ->where('skills_id','LIKE', '%"'.$type.'":["on"]%')
                ->where('prices', 'regexp', $price)
                ->where('city', $city)
                ->where('status', 'artist')->where('email_verified_at', '!=', null)
                ->orderBy($sort, 'desc')->paginate(30);
        }
        else if ($type != '' && $type != 'all' && $genre != '' && $genre != 'all') {
            $users = Users_skills::join('users','users_skills.user_id', 'users.id')
                ->where('skills_id','LIKE', '%"'.$type.'":["on"]%')
                ->where('genre_id','LIKE', '%"'.$genre.'":["on"]%')
                ->where('city', $city)
                ->where('status', 'artist')->where('email_verified_at', '!=', null)
                ->orderBy($sort, 'desc')->paginate(30);
        }
        else if ($price != '' && $price != 'all') {
            $users = Users_skills::join('users','users_skills.user_id', 'users.id')
                ->where('prices', 'regexp', $price)
                ->where('city', $city)
                ->where('status', 'artist')->where('email_verified_at', '!=', null)
                ->orderBy($sort, 'desc')->paginate(30);
        }
        else if ($genre != '' && $genre != 'all') {
            $users = Users_skills::join('users','users_skills.user_id', 'users.id')
                ->where('genre_id','LIKE', '%"'.$genre.'":["on"]%')
                ->where('city', $city)
                ->where('status', 'artist')->where('email_verified_at', '!=', null)
                ->orderBy($sort, 'desc')->paginate(30);
        }
        else if ($type != '' && $type != 'all') {
            $users = Users_skills::join('users','users_skills.user_id', 'users.id')
                ->where('skills_id','LIKE', '%"'.$type.'":["on"]%')
                ->where('city', $city)
                ->where('status', 'artist')->where('email_verified_at', '!=', null)
                ->orderBy($sort, 'desc')->paginate(30);
        } else {
            $users = User::orderBy($sort, 'desc')->where('city', $city)->where('status', 'artist')->where('email_verified_at', '!=', null)->paginate(30);
        }

        if ($date_search != '' && $date_search != null) {
            foreach ($users as $item => $user) {
                $user_events = Users_proposal::where('user_id', $user->id)->where('status', 'accept')->get();
                foreach ($user_events as $number => $event_id) {
                    $event = Events::where('id', $event_id->event_id)->first();
                    $event_date = json_decode($event->data, true);
                    $search_date = $event_date[$event_id->data][0];
                    if (strtotime($search_date) == strtotime($date_search)) {
                        $users->forget($item);
                    }
                }
            }
        }

        return view('ajax.artists', [
            'users' => $users
        ]);
    }

    public function events()
    {
        $city = session()->get('city');

        if ($city == '' || $city == null) {
            $city = 'Москва';
        }

        $last_events = Events::orderBy('id', 'desc')->where('city', $city)->where('status', 'accept')->limit(20)->get();
        $type = DB::table('skills')->get();
        $genres = Genres::where('status', 1)->get();

        $proposals_accept = [];
        $type_events = [];
        $places = [];
        $event_data = [];
        $owner_login = [];
        $week_events = [];

        $proposals_accept_two = [];
        $type_events_two = [];
        $places_two = [];
        $event_data_two = [];
        $owner_login_two = [];
        $week_events_two = [];

        $proposals_accept_three = [];
        $type_events_three = [];
        $places_three = [];
        $event_data_three = [];
        $owner_login_three = [];
        $week_events_three = [];

        foreach ($last_events as $id => $event) {
            $temp_data = json_decode($event->data, true);
            foreach ($temp_data as $counter => $data) {
                if (strtotime($data[0]) > strtotime(date("d.m.Y")) && strtotime($data[0]) < (strtotime(date("d.m.Y")) + 604800)) {
                    $event_data[$id] = $data;
                    $week_events[$id] = $event;
                    $type_events[$id] = $type[$event->type - 1]->name;
                    $places[$id] = count(json_decode($event->artist_type));
                    $owner = User::where('id', $event->user_id)->first();
                    $owner_login[$id] = $owner['login'];
                    $accept_proposals = Users_proposal::where('event_id', $event->id)->where('status', 'accept')->get();

                    if ($accept_proposals) {
                        $proposals_accept[$id] = count(json_decode($accept_proposals));
                        $places[$id] = $places[$id] - $proposals_accept[$id];
                    }
                    break;
                }
                elseif (strtotime($data[0]) > (strtotime(date("d.m.Y")) + 604800) && strtotime($data[0]) < (strtotime(date("d.m.Y")) + 1209600)) {
                    $event_data_two[$id] = $data;
                    $week_events_two[$id] = $event;
                    $type_events_two[$id] = $type[$event->type - 1]->name;
                    $places_two[$id] = count(json_decode($event->artist_type));
                    $owner = User::where('id', $event->user_id)->first();
                    $owner_login_two[$id] = $owner['login'];
                    $accept_proposals = Users_proposal::where('event_id', $event->id)->where('status', 'accept')->get();

                    if ($accept_proposals) {
                        $proposals_accept_two[$id] = count(json_decode($accept_proposals));
                        $places_two[$id] = $places_two[$id] - $proposals_accept_two[$id];
                    }
                    break;
                }
                elseif (strtotime($data[0]) > (strtotime(date("d.m.Y")) + 1209600) && strtotime($data[0]) < (strtotime(date("d.m.Y")) + 1814400)) {
                    $event_data_three[$id] = $data;
                    $week_events_three[$id] = $event;
                    $type_events_three[$id] = $type[$event->type - 1]->name;
                    $places_three[$id] = count(json_decode($event->artist_type));
                    $owner = User::where('id', $event->user_id)->first();
                    $owner_login_three[$id] = $owner['login'];
                    $accept_proposals = Users_proposal::where('event_id', $event->id)->where('status', 'accept')->get();

                    if ($accept_proposals) {
                        $proposals_accept_three[$id] = count(json_decode($accept_proposals));
                        $places_three[$id] = $places_three[$id] - $proposals_accept_three[$id];
                    }
                    break;
                }
            }
        }

        $week_events = collect($week_events)->sortBy('data');
        $week_events_two = collect($week_events_two)->sortBy('data');
        $week_events_three = collect($week_events_three)->sortBy('data');

        $seo = MetaTags::where('id', 4)->first();

        $title = str_replace("{city}", $city, $seo->title);
        $description = str_replace("{city}", $city, $seo->description);

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);

        return view('events', [
            "proposals_accept" => $proposals_accept,
            "type_events" => $type_events,
            "places" => $places,
            "event_data" => $event_data,
            "owner_login" => $owner_login,
            "week_events" => $week_events,
            "proposals_accept_two" => $proposals_accept_two,
            "type_events_two" => $type_events_two,
            "places_two" => $places_two,
            "event_data_two" => $event_data_two,
            "owner_login_two" => $owner_login_two,
            "week_events_two" => $week_events_two,
            "proposals_accept_three" => $proposals_accept_three,
            "type_events_three" => $type_events_three,
            "places_three" => $places_three,
            "event_data_three" => $event_data_three,
            "owner_login_three" => $owner_login_three,
            "week_events_three" => $week_events_three,
            "genres" => $genres,
            "type" => $type
        ]);
    }

    public function events_filter(Request $request)
    {
        $sort_genre = $request->input('genre');
        $sort_type = $request->input('type');
        $sort = $request->input('sort');

        $events_in = $request->input('events_in');
        $events_out = $request->input('events_out');

        $city = session()->get('city');

        if ($city == '' || $city == null) {
            $city = 'Москва';
        }

        if ($sort_type != "" && $sort_type != "all" && $sort_genre != "" && $sort_genre != "all") {
            $last_events = Events::orderBy('id', 'desc')->where('city', $city)->where('status', 'accept')->where('type', $sort_type)->where('artist_genre','LIKE', '%' . $sort_genre . '%')->limit(20)->get();
        }
        else if ($sort_type != "" && $sort_type != "all") {
            $last_events = Events::orderBy('id', 'desc')->where('city', $city)->where('status', 'accept')->where('type', $sort_type)->limit(20)->get();
        }
        else if ($sort_genre != "" && $sort_genre != "all") {
            $last_events = Events::orderBy('id', 'desc')->where('city', $city)->where('status', 'accept')->where('artist_genre','LIKE', '%' . $sort_genre . '%')->limit(20)->get();
        }
        else {
            $last_events = Events::orderBy('id', 'desc')->where('city', $city)->where('status', 'accept')->limit(20)->get();
        }

        $type = DB::table('skills')->get();

        $proposals_accept = [];
        $type_events = [];
        $places = [];
        $event_data = [];
        $owner_login = [];
        $week_events = [];

        $proposals_accept_two = [];
        $type_events_two = [];
        $places_two = [];
        $event_data_two = [];
        $owner_login_two = [];
        $week_events_two = [];

        $proposals_accept_three = [];
        $type_events_three = [];
        $places_three = [];
        $event_data_three = [];
        $owner_login_three = [];
        $week_events_three = [];

        foreach ($last_events as $id => $event) {
            $temp_data = json_decode($event->data, true);
            foreach ($temp_data as $counter => $data) {
                if ($events_in != '' && $events_out != '') {
                    if (strtotime($data[0]) > strtotime($events_in) && strtotime($data[0]) < strtotime($events_out)) {}
                    else {
                        break;
                    }
                }
                if (strtotime($data[0]) > strtotime(date("d.m.Y")) && strtotime($data[0]) < (strtotime(date("d.m.Y")) + 604800)) {
                    $event_data[$id] = $data;
                    $week_events[$id] = $event;
                    $type_events[$id] = $type[$event->type - 1]->name;
                    $places[$id] = count(json_decode($event->artist_type));
                    $owner = User::where('id', $event->user_id)->first();
                    $owner_login[$id] = $owner['login'];
                    $accept_proposals = Users_proposal::where('event_id', $event->id)->where('status', 'accept')->get();

                    if ($accept_proposals) {
                        $proposals_accept[$id] = count(json_decode($accept_proposals));
                        $places[$id] = $places[$id] - $proposals_accept[$id];
                    }
                    break;
                }
                elseif (strtotime($data[0]) > (strtotime(date("d.m.Y")) + 604800) && strtotime($data[0]) < (strtotime(date("d.m.Y")) + 1209600)) {
                    $event_data_two[$id] = $data;
                    $week_events_two[$id] = $event;
                    $type_events_two[$id] = $type[$event->type - 1]->name;
                    $places_two[$id] = count(json_decode($event->artist_type));
                    $owner = User::where('id', $event->user_id)->first();
                    $owner_login_two[$id] = $owner['login'];
                    $accept_proposals = Users_proposal::where('event_id', $event->id)->where('status', 'accept')->get();

                    if ($accept_proposals) {
                        $proposals_accept_two[$id] = count(json_decode($accept_proposals));
                        $places_two[$id] = $places_two[$id] - $proposals_accept_two[$id];
                    }
                    break;
                }
                elseif (strtotime($data[0]) > (strtotime(date("d.m.Y")) + 1209600) && strtotime($data[0]) < (strtotime(date("d.m.Y")) + 1814400)) {
                    $event_data_three[$id] = $data;
                    $week_events_three[$id] = $event;
                    $type_events_three[$id] = $type[$event->type - 1]->name;
                    $places_three[$id] = count(json_decode($event->artist_type));
                    $owner = User::where('id', $event->user_id)->first();
                    $owner_login_three[$id] = $owner['login'];
                    $accept_proposals = Users_proposal::where('event_id', $event->id)->where('status', 'accept')->get();

                    if ($accept_proposals) {
                        $proposals_accept_three[$id] = count(json_decode($accept_proposals));
                        $places_three[$id] = $places_three[$id] - $proposals_accept_three[$id];
                    }
                    break;
                }
            }
        }

        $week_events = collect($week_events)->sortBy($sort);
        $week_events_two = collect($week_events_two)->sortBy($sort);
        $week_events_three = collect($week_events_three)->sortBy($sort);

        return view('ajax.events', [
            "proposals_accept" => $proposals_accept,
            "type_events" => $type_events,
            "places" => $places,
            "event_data" => $event_data,
            "owner_login" => $owner_login,
            "week_events" => $week_events,
            "proposals_accept_two" => $proposals_accept_two,
            "type_events_two" => $type_events_two,
            "places_two" => $places_two,
            "event_data_two" => $event_data_two,
            "owner_login_two" => $owner_login_two,
            "week_events_two" => $week_events_two,
            "proposals_accept_three" => $proposals_accept_three,
            "type_events_three" => $type_events_three,
            "places_three" => $places_three,
            "event_data_three" => $event_data_three,
            "owner_login_three" => $owner_login_three,
            "week_events_three" => $week_events_three
        ]);
    }

    public function blog()
    {
        $articles = Articles::where('status', 1)->orderBy('id', 'desc')->paginate(10);

        $seo = MetaTags::where('id', 5)->first();

        SEOMeta::setTitle($seo->title);
        SEOMeta::setDescription($seo->description);

        return view('blog', [
            'articles' => $articles,
        ]);
    }

    public function blog_article($article_id)
    {
        $article = Articles::where('id', $article_id)->first();

        if ($article) {
            SEOMeta::setTitle($article->meta_title);
            SEOMeta::setDescription($article->meta_description);

            return view('article', [
                'article' => $article,
            ]);
        } else {
            return redirect('/blog');
        }
    }

    public function page($url)
    {
        $page = Pages::where('url', $url)->first();

        SEOMeta::setTitle($page->meta_title);
        SEOMeta::setDescription($page->meta_description);

        return view('pages', [
            'page' => $page,
        ]);
    }

    public function faq()
    {
        $faq = Faq::where('status', 1)->get();
        $type = DB::table('skills')->get();

        $seo = MetaTags::where('id', 6)->first();

        SEOMeta::setTitle($seo->title);
        SEOMeta::setDescription($seo->description);

        return view('faq', [
            'faq' => $faq,
            'type' => $type
        ]);
    }

    public function artist_invite(Request $request, $user_id) {
        $id = Auth::user()->id;

        $date = $request->input('date');
        $event = $request->input('event');
        $message = $request->input('message');

        $event_link = Events::where('name', $event)->where('user_id', $id)->first();

        $btn = "<span class='invite-btns'><a class='btn' href='/event/".$event_link->id."'>Страница мероприятия</a><a class='btn' href='/artist/".$id."'>Страница организатора</a></span>";

        if ($event != "none" && $date != "") {
            $result = $message."<br><br>На дату: ".$date."<br>Мероприятие: <a href='/event/".$event_link->id."'>".$event."</a><br><br>".$btn;
        }
        elseif($event != "none") {
            $result = $message."<br><br>Мероприятие: <a href='/event/".$event_link->id."'>".$event."</a><br><br>".$btn;
        }
        elseif($date != "") {
            $result = $message."<br><br>На дату: ".$date."<br><br>".$btn;
        }
        else {
            $result = $message."<br><br>".$btn;
        }


        $invite_chat = Chat::create([
            'from' => $id,
            'to' => $user_id,
            'message' => $result,
            'is_read' => 0,
            'invite' => 0
        ]);

        return redirect('/lk-chat');
    }

    public function artist($id)
    {
        $user = User::orderBy('id', 'asc')->where('id', '=', $id)->first();
        if ($user) {
            $years = Artist::user_years($id);
            $email_domain = Artist::email_domain($id);

            $projects_artist = [];
            $genre_artist = [];
            $skills_project = [];
            $skills_price = [];
            $owner_events = [];

            $skills = DB::table('users_skills')->where('user_id', $id)->first();
            $user_tracks = DB::table('user_tracks')->where('user_id', $id)->get();
            $projects = DB::table('skills')->get();
            $genres = DB::table('genres')->get();
            $type = DB::table('skills')->get();
            $proposals = Users_proposal::where('user_id', $id)->where('status', 'accept')->get();
            $count_reviews = Reviews::where('owner_id', $id)->where('status', 1)->get();
            $user_reviews = Reviews::where('owner_id', $id)->where('status', 1)->take(8)->get();
            $attachment = Reviews::reviews_attachment($user_reviews);
            $user_rating = Reviews::reviews_rating_num($id);
            $user_events = Events::where('user_id', $id)->where('status', 'accept')->get();
            if (Auth::check()) {
                $invite_events = Events::where('user_id', Auth::user()->id)->where('status', 'accept')->get();
            } else {
                $invite_events = [];
            }


            $count_reviews = count($count_reviews);

            $type_events = [];
            $places = [];
            $proposals_accept = [];
            $event_datas = [];
            $owner_login = [];
            $reserved_calendar = [];
            $active_events_owner = [];



            foreach ($proposals as $prop_count => $proposal) {
                $temp_event = Events::where('user_id', $proposal->owner_id)->where('id', $proposal->event_id)->where('status', 'accept')->first();
                if ($temp_event) {
                    $owner_events[$prop_count] = $temp_event;
                }
            }

            foreach ($owner_events as $numer => $event) {
                $temp_data = json_decode($event->data, true);
                $reserved_calendar[$numer] = $temp_data[$proposals[$numer]->data];
            }

            foreach ($user_events as $numer => $event) {
                $temp_data = json_decode($event->data, true);
                foreach ($temp_data as $items => $datus) {
                    $reserved_calendar[] = $datus;
                }
            }

            if ($user->status == 'artist') {
                foreach ($owner_events as $num => $data) {
                    $event_date = json_decode($data->data, true);

                    foreach ($event_date as $counter => $date) {
                        if (strtotime($date[0]) > strtotime(date('d.m.Y'))) {
                            $active_events_owner[$num] = $data;
                            $type_events[$num][] = $type[$data->type - 1]->name;
                            $event_datas[$num][] = json_decode($data->data, true);
                            $places[$num][] = count(json_decode($data->artist_type));

                            $owner = User::where('id', $data->user_id)->first();
                            $owner_login[$num][] = $owner['login'];

                            $accept_proposals = Users_proposal::where('event_id', $data->id)->where('status', 'accept')->get();

                            if ($accept_proposals) {
                                $proposals_accept[$num][] = count(json_decode($accept_proposals));
                                $places[$num][0] = $places[$num][0] - $proposals_accept[$num][0];
                            }
                        }
                    }
                }
            }
            else {
                foreach ($user_events as $num => $data) {
                    $event_date = json_decode($data->data, true);

                    foreach ($event_date as $counter => $date) {
                        if (strtotime($date[0]) > strtotime(date('d.m.Y'))) {
                            $active_events_owner[$num] = $data;
                            $type_events[$num][] = $type[$data->type - 1]->name;
                            $event_datas[$num][] = json_decode($data->data, true);
                            $places[$num][] = count(json_decode($data->artist_type));

                            $owner = User::where('id', $data->user_id)->first();
                            $owner_login[$num][] = $owner['login'];

                            $accept_proposals = Users_proposal::where('event_id', $data->id)->where('status', 'accept')->get();

                            if ($accept_proposals) {
                                $proposals_accept[$num][] = count(json_decode($accept_proposals));
                                $places[$num][0] = $places[$num][0] - $proposals_accept[$num][0];
                            }
                        }
                    }
                }
            }

            $available_genres = json_decode($genres, true);
            if ($projects) {
                $projects_artist = json_decode($projects, true);
            }
            if ($skills) {
                $genre_artist = json_decode($skills->genre_id, true);
                $skills_project = json_decode($skills->skills_id, true);
                $skills_price = json_decode($skills->prices, true);
            }

            $active_events_owner = collect($active_events_owner)->sortBy('data');

            $seo = MetaTags::where('id', 7)->first();

            $title = str_replace("{artist}", $user->login, $seo->title);
            $description = str_replace("{artist}", $user->login, $seo->description);

            SEOMeta::setTitle($title);
            SEOMeta::setDescription($description);
            

            return view('artist', [
                'user' => $user,
                'years' => $years,
                'available_genres' => $available_genres,
                'skills' => $skills,
                'projects' => $projects_artist,
                'user_tracks' => $user_tracks,
                'genre_artist' => $genre_artist,
                'skills_project' => $skills_project,
                'skills_price' => $skills_price,
                'email_domain' => $email_domain,
                'reviews' => $user_reviews,
                'attachment' => $attachment,
                'count_reviews' => $count_reviews,
                'type_events' => $type_events,
                'places' => $places,
                'event_data' => $event_datas,
                'owner_login' => $owner_login,
                'owner_events' => $active_events_owner,
                'user_rating' => $user_rating,
                'reserved_calendar' => $reserved_calendar,
                'invite_events' => $invite_events
            ]);
        }
        else {
            return redirect('/');
        }
    }

    public function event($id)
    {
        $event = DB::table('events')->where('id', $id)->first();
        if ($event) {
            $user = User::where('id', $event->user_id)->first();
            $email_domain = Artist::email_domain($user->id);
            $genres = DB::table('genres')->get();
            $proposals = Users_proposal::where('event_id', $id)->where('status', 'accept')->orderBy('role', 'ASC')->get();
            $type = DB::table('skills')->get();
            $owner_events = DB::table('events')->where('user_id', $event->user_id)->where('id', '!=', $id)->where('status', 'accept')->orderBy('id', 'desc')->limit(10)->get();

            $user_reviews = Reviews::where('owner_id', $event->user_id)->where('status', 1)->take(8)->get();
            $attachment = Reviews::reviews_attachment($user_reviews);

            $artist_types = ArtistType::get();

            $users_data = [];
            $users_data_array = [];
            $proposals_user = [];
            $event_users = [];
            $proposals_role = [];

            $type_events = [];
            $places = [];
            $proposals_accept = [];
            $event_datas = [];
            $owner_login = [];
            $active_events_owner = [];
            $all_date = [];
            $find_users = [];

            foreach ($owner_events as $num => $data) {
                $event_date = json_decode($data->data, true);

                foreach ($event_date as $counter => $date) {
                    if (strtotime($date[0]) > strtotime(date('d.m.Y'))) {
                        $active_events_owner[$num] = $data;

                        $type_events[$num][] = $type[$data->type - 1]->name;
                        $event_datas[$num][] = json_decode($data->data, true);
                        $places[$num][] = count(json_decode($data->artist_type));

                        $owner = User::where('id', $event->user_id)->first();
                        $owner_login[$num][] = $owner['login'];

                        $accept_proposals = Users_proposal::where('event_id', $data->id)->where('status', 'accept')->get();

                        if ($accept_proposals) {
                            $proposals_accept[$num][] = count(json_decode($accept_proposals));
                            $places[$num][0] = $places[$num][0] - $proposals_accept[$num][0];
                        }
                        break;
                    }
                }
            }

            $event_data = json_decode($event->data, true);
            $dop_option = json_decode($event->dop_option, true);
            $available_genres = json_decode($genres, true);
            $artist_type = json_decode($event->artist_type, true);
            $artist_genre = json_decode($event->artist_genre, true);
            $artist_date = json_decode($event->artist_date, true);
            $artist_wish = json_decode($event->artist_wish, true);

            $count_data = count ($event_data) - 1;
            $count_artist = count ($artist_type) - 1;

            /*if (!empty($proposals)) {
                $proposals_array = json_decode($proposals, true);
                foreach ($proposals_array as $item => $key) {
                    $proposals_user[] = json_decode($key['user_id'], true);
                    $proposals_role[$item][] = json_decode($key['role'], true);
                    $proposals_role[$item]['user_id'] = json_decode($key['user_id'], true);
                    $proposals_role[$item]['data'] = json_decode($key['data'], true);
                }

                foreach ($artist_date as $number => $artist) {
                    $event_users[] = $artist[0];
                    $event_users_data[] = $artist[0];
                }

                foreach ($proposals_role as $data => $position) {
                    $event_users[$position[0]] = $position['user_id'];
                    $event_users_data[$position[0]] = $position['data'];
                }

                foreach ($proposals_role as $data => $position) {
                    $users_data[$position['user_id']] = DB::table('users')->where('id', $position['user_id'])->first();
                }

                foreach ($users_data as $user_id => $data) {
                    $users_data_array[$user_id]['id'] = $data->id;
                    $users_data_array[$user_id]['login'] = $data->login;
                    $users_data_array[$user_id]['avatar'] = $data->avatar;
                }
            }*/

            if (!empty($proposals)) {
                foreach ($proposals as $item => $key) {
                    $temp_user = User::where('id', $key->user_id)->first();

                    $proposals_role[$item]['role'] = $key->role;
                    $proposals_role[$item]['data'] = $key->data;
                    $proposals_role[$item]['user_id'] = $key->user_id;

                    $proposals_role[$item]['login'] = $temp_user->login;
                    $proposals_role[$item]['avatar'] = $temp_user->avatar;
                }
                foreach ($artist_date as $item => $date) {
                    $all_date[$item] = $date[0];
                }
                foreach ($proposals_role as $item => $proposal) {
                    foreach ($all_date as $num => $date) {
                        if ($proposal['role'] == $num && $proposal['data'] == $date) {
                            $all_date[$num] = 'yes';
                            $find_users[$num] = $proposal;
                        }
                    }
                }
            }

            $active_events_owner = collect($active_events_owner)->sortBy('data');

            $seo = MetaTags::where('id', 8)->first();

            $title = str_replace("{event}", $event->name, $seo->title);
            $description = str_replace("{event}", $event->name, $seo->description);

            SEOMeta::setTitle($title);
            SEOMeta::setDescription($description);

            return view('event', [
                'user' => $user,
                'event' => $event,
                'email_domain' => $email_domain,
                'count_data' => $count_data,
                'dop_option' => $dop_option,
                'available_genres' => $available_genres,
                'artist_type' => $artist_type,
                'artist_genre' => $artist_genre,
                'artist_types' => $artist_types,
                'artist_date' => $artist_date,
                'artist_wish' => $artist_wish,
                'count_artist' => $count_artist,
                'data' => $event_data,
                'users_data' => $users_data_array,
                'event_users' => $event_users,
                'type_events' => $type_events,
                'places' => $places,
                'all_date' => $all_date,
                'find_users' => $find_users,
                'event_data' => $event_datas,
                'owner_login' => $owner_login,
                'owner_events' => $active_events_owner,
                'reviews' => $user_reviews,
                'attachment' => $attachment
            ]);
        }
        else {
            return redirect('/');
        }
    }

    public function add_proposal($id, $owner, $data, $role, Request $request)
    {
        $user_id = Auth::user()->id;

        $event_proposal = DB::table('events')->where('id', $id)->first();
        $already_proposal = Users_proposal::where('event_id', $id)->where('user_id', $user_id)->where('data', $data)->first();

        if (empty($already_proposal)) {

            Notices::new_proposal($id, $owner);

            Users_proposal::insert([
                'user_id' => $user_id,
                'event_id' => $id,
                'owner_id' => $owner,
                'data' => $data,
                'proposal_text' => $request->input('proposal_text'),
                'role' => $role,
                'status' => 'check'
            ]);
            return redirect('/lk-events?proposal=success');
        }
        else {
            return redirect('/lk-events?proposal=error');
        }
    }
}
