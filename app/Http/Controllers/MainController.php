<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Artist;
use DB;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $popular_artists = User::orderBy('id', 'asc')->limit(10)->get();
        $new_artists = User::orderBy('id', 'desc')->limit(10)->get();
        $popular_events = DB::table('events')->orderBy('id', 'desc')->limit(10)->get();
        $type = DB::table('skills')->get();

        $type_events = [];
        $places = [];
        $proposals_accept = [];
        $event_data = [];
        $owner_login = [];

        foreach ($popular_events as $id => $event) {
            $type_events[$id][] = $type[$event->type]->name;
            $event_data[$id][] = json_decode($event->data, true);
            $places[$id][] = count(json_decode($event->artist_type));

            $owner = User::where('id', $event->user_id)->first();
            $owner_login[$id][] = $owner['login'];

            $accept_proposals = DB::table('users_proposal')->where('event_id', $event->id)->where('status', 'accept')->get();

            if ($accept_proposals) {
                $proposals_accept[$id][] = count(json_decode($accept_proposals));
                $places[$id][0] = $places[$id][0] - $proposals_accept[$id][0];
            }
        }

        return view('main', [
            'popular_artists' => $popular_artists,
            'new_artists' => $new_artists,
            'popular_events' => $popular_events,
            'type_events' => $type_events,
            'places' => $places,
            'event_data' => $event_data,
            'owner_login' => $owner_login,
        ]);
    }

    public function artists()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);

        return view('artists', [
            'users' => $users,
        ]);
    }

    public function events()
    {
        return view('events');
    }

    public function blog()
    {
        return view('blog');
    }

    public function about()
    {
        return view('about');
    }

    public function artist($id)
    {
        $user = User::orderBy('id', 'asc')->where('id', '=', $id)->first();
        $years = Artist::user_years($id);
        $email_domain = Artist::email_domain($id);

        $projects_artist = [];
        $genre_artist = [];
        $skills_project = [];
        $skills_price = [];

        $skills = DB::table('users_skills')->where('user_id', $id)->first();
        $user_tracks = DB::table('user_tracks')->where('user_id', $id)->get();
        $projects = DB::table('skills')->get();
        $genres = DB::table('genres')->get();

        $available_genres = json_decode($genres, true);
        if ($projects) {
            $projects_artist = json_decode($projects, true);
        }
        if ($skills) {
            $genre_artist = json_decode($skills->genre_id, true);
            $skills_project = json_decode($skills->skills_id, true);
            $skills_price = json_decode($skills->prices, true);
        }

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
            'email_domain' => $email_domain
        ]);
    }

    public function event($id)
    {
        $event = DB::table('events')->where('id', $id)->first();
        $user = User::orderBy('id', 'asc')->where('id', $event->user_id)->first();
        $email_domain = Artist::email_domain($user->id);
        $genres = DB::table('genres')->get();
        $proposals = DB::table('users_proposal')->where('event_id', $id)->where('status', 'accept')->orderBy('role', 'ASC')->get();
        $type = DB::table('skills')->get();
        $owner_events = DB::table('events')->where('user_id', $event->user_id)->orderBy('id', 'desc')->limit(10)->get();

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

        foreach ($owner_events as $num => $event) {
            $type_events[$num][] = $type[$event->type]->name;
            $event_datas[$num][] = json_decode($event->data, true);
            $places[$num][] = count(json_decode($event->artist_type));

            $owner = User::where('id', $event->user_id)->first();
            $owner_login[$num][] = $owner['login'];

            $accept_proposals = DB::table('users_proposal')->where('event_id', $event->id)->where('status', 'accept')->get();

            if ($accept_proposals) {
                $proposals_accept[$num][] = count(json_decode($accept_proposals));
                $places[$num][0] = $places[$num][0] - $proposals_accept[$num][0];
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

        if (!empty($proposals)) {
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
        }

        return view('event', [
            'user' => $user,
            'event' => $event,
            'email_domain' => $email_domain,
            'count_data' => $count_data,
            'dop_option' => $dop_option,
            'available_genres' => $available_genres,
            'artist_type' => $artist_type,
            'artist_genre' => $artist_genre,
            'artist_date' => $artist_date,
            'artist_wish' => $artist_wish,
            'count_artist' => $count_artist,
            'data' => $event_data,
            'event_users_data' => $event_users_data,
            'users_data' => $users_data_array,
            'event_users' => $event_users,
            'type_events' => $type_events,
            'places' => $places,
            'event_data' => $event_datas,
            'owner_login' => $owner_login,
            'owner_events' => $owner_events
        ]);
    }
    public function add_proposal($id, $owner, $data, $role)
    {
        $user_id = Auth::user()->id;

        $event_proposal = DB::table('events')->where('id', $id)->first();
        $already_proposal = DB::table('users_proposal')->where('event_id', $id)->where('user_id', $user_id)->where('data', $data)->first();

        if (empty($already_proposal)) {
            DB::table('users_proposal')->insert([
                'user_id' => $user_id,
                'event_id' => $id,
                'owner_id' => $owner,
                'data' => $data,
                'role' => $role,
                'status' => 'check'
            ]);
        }

        return redirect('/lk-events');
    }
}
