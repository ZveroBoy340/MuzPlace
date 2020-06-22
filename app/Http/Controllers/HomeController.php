<?php

namespace App\Http\Controllers;

use App\Genres;
use App\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\User;
use Illuminate\Support\Facades\Hash;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $my_proposals_check = [];
        $my_proposals_accept = [];
        $proposals_check_date = [];
        $proposals_accept_date = [];
        $proposals_count = [];

        $my_events = DB::table('events')->where('user_id', $id)->get();
        if ($my_events) {
            foreach ($my_events as $item => $key) {
                $my_events_data[] = json_decode($key->data, true);
            }
            foreach ($my_events as $item => $key) {
                $proposal_event = DB::table('users_proposal')->where('event_id', $key->id)->where('status', 'check')->get();
                $proposals_count[] = count($proposal_event);
            }
        }

        $my_proposals = DB::table('users_proposal')->where('user_id', $id)->get();
        if ($my_proposals) {
            foreach ($my_proposals as $item => $key) {
                if ($key->status == 'check') {
                    $my_proposals_check[$key->id][] = DB::table('events')->where('id', $key->event_id)->get();
                }
                elseif ($key->status == 'accept') {
                    $my_proposals_accept[$key->id][] = DB::table('events')->where('id', $key->event_id)->get();
                }
            }
            foreach ($my_proposals_check as $item => $key) {
                $proposals_check_date[$item][] = json_decode($key[0][0]->data, true);
            }
            foreach ($my_proposals_accept as $item => $key) {
                $proposals_accept_date[$item][] = json_decode($key[0][0]->data, true);
            }
        }

        $end_my_events = count ($my_events_data) - 1;

        return view('lk.events', [
            'my_events' => $my_events,
            'my_events_data' => $my_events_data,
            'end_my_events' => $end_my_events,
            'my_proposals_check' => $my_proposals_check,
            'my_proposals_accept' => $my_proposals_accept,
            'proposals_check_date' => $proposals_check_date,
            'proposals_accept_date' => $proposals_accept_date,
            'proposals_count' => $proposals_count
        ]);
    }

    public function messages()
    {
        return view('lk.messages');
    }

    public function chat()
    {
        return view('lk.chat');
    }

    public function info()
    {
        return view('lk.info');
    }

    public function reviews()
    {
        return view('lk.reviews');
    }

    public function skills()
    {
        $id = Auth::user()->id;

        $available_skills = Skills::orderBy('id', 'asc')->where('status', '=', 1)->get();
        $available_genres = Genres::orderBy('id', 'asc')->where('status', '=', 1)->get();

        $user_skills = DB::table('users_skills')->where('user_id', $id)->first();

        if ($user_skills != null) {
            $user_tracks = DB::table('user_tracks')->where('user_id', $id)->get();

            $status_skill = json_decode($user_skills->skills_id, true);
            $price_skill = json_decode($user_skills->prices, true);
            $genre_user = json_decode($user_skills->genre_id, true);

            $current_genre = $user_skills->current_genre;
            $text_albom = $user_skills->text_albom;
            $obloshka = $user_skills->obloshka;

            return view('lk.skills', [
                'available_skills' => $available_skills,
                'available_genres' => $available_genres,
                'genre_user' => $genre_user,
                'user_tracks' => $user_tracks,
                'status_skill' => $status_skill,
                'current_genre' => $current_genre,
                'obloshka' => $obloshka,
                'text_albom' => $text_albom,
                'price_skill' => $price_skill
            ]);
        }
        else {
            return view('lk.skills', [
                'available_skills' => $available_skills,
                'available_genres' => $available_genres,
                'genre_user' => null,
                'user_tracks' => null,
                'status_skill' => null,
                'current_genre' => null,
                'obloshka' => null,
                'text_albom' => null,
                'price_skill' => null
            ]);
        }
    }

    public function create()
    {
        return view('lk.create');
    }

    public function update_info(Request $request)
    {
        $id = Auth::user()->id;
        $pass = Auth::user()->password;
        $email = Auth::user()->email;

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/avatars/');
            $image->move($destinationPath, $name);
            User::where('id', $id)->update(['avatar' => $name]);
        }

        if ($request->input('password')) {
            $request->validate([
                'password' => ['string', 'min:8'],
            ]);
            if (Hash::check($request->old_pass, $pass)) {
                User::where('id', $id)->update(['password' => Hash::make($request->input('password'))]);
            } else {
                return redirect('/lk-info/?error=pass');
            }
        }

        if ($request->input('name')) {
            User::where('id', $id)->update(['name' => $request->input('name')]);
        }

        if ($request->input('lastname')) {
            User::where('id', $id)->update(['lastname' => $request->input('lastname')]);
        }

        if ($request->input('login')) {
            User::where('id', $id)->update(['login' => $request->input('login')]);
        }

        if ($request->input('email') != $email) {
            $request->validate([
                'email' => ['string', 'email', 'max:255', 'unique:users'],
            ]);
            User::where('id', $id)->update(['email' => $request->input('email')]);
        }

        if ($request->input('phone')) {
            User::where('id', $id)->update(['phone' => $request->input('phone')]);
        }

        if ($request->input('birthday')) {
            User::where('id', $id)->update(['birthday' => $request->input('birthday')]);
        }

        if ($request->input('gender')) {
            User::where('id', $id)->update(['gender' => $request->input('gender')]);
        }

        if ($request->input('about')) {
            User::where('id', $id)->update(['about' => $request->input('about')]);
        }

        if ($request->input('facebook')) {
            User::where('id', $id)->update(['facebook' => $request->input('facebook')]);
        }

        if ($request->input('vkontakte')) {
            User::where('id', $id)->update(['vkontakte' => $request->input('vkontakte')]);
        }

        if ($request->input('odnoklassniki')) {
            User::where('id', $id)->update(['odnoklassniki' => $request->input('odnoklassniki')]);
        }

        if ($request->input('instagram')) {
            User::where('id', $id)->update(['instagram' => $request->input('instagram')]);
        }

        if ($request->input('telegram')) {
            User::where('id', $id)->update(['telegram' => $request->input('telegram')]);
        }

        if ($request->input('twitter')) {
            User::where('id', $id)->update(['twitter' => $request->input('twitter')]);
        }

        return redirect('/lk-info/');
    }
    public function update_skills(Request $request)
    {
        $id = Auth::user()->id;

        if (DB::table('users_skills')->where('user_id', $id)->first()) {

        }
        else {
            DB::table('users_skills')->insert(['user_id' => $id]);
        }

        if ($request->hasFile('obloshka')) {
            $image = $request->file('obloshka');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/images/');
            $image->move($destinationPath, $name);
            DB::table('users_skills')->where('user_id', $id)->update(['obloshka' => $name]);
        }

        if ($request->input('delete_track')) {
            $delete_track = $request->input('delete_track');
            foreach ($delete_track as $file => $key) {
                if (DB::table('user_tracks')->where('user_id', $id)->where('id', $key)->first()) {
                    $track = DB::table('user_tracks')->where('user_id', $id)->where('id', $key)->first();
                    unlink(public_path('/uploads/tracks/'.$track->url));
                    DB::table('user_tracks')->where('user_id', $id)->where('id', $key)->delete();
                }
            }
        }

        if ($request->hasFile('tracks')) {
            $track = $request->file('tracks');
            $track_name = $request->input('track_name');
            $track_time = $request->input('track_time');
            $destinationPath = public_path('/uploads/tracks/');

            foreach ($track as $file => $key) {
                $name = time() . rand(1, 100) . '.' . $key->getClientOriginalExtension();
                $title = $key->getClientOriginalName();
                $title = preg_replace('/\\.[^.\\s]{3,4}$/', '', $title);
                $key->move($destinationPath, $name);

                $duration = $track_time[$file];

                DB::table('user_tracks')->insert([
                    'user_id' => $id,
                    'name' => $title,
                    'duration' => $duration,
                    'url' => $name
                ]);
            }
        }

        if ($request->input('skills_id')) {
            $skills_id = json_encode($request->input('skills_id'));
            DB::table('users_skills')->where('user_id', $id)->update(['skills_id' => $skills_id]);
        }

        if ($request->input('genre_id')) {
            $genre_id = json_encode($request->input('genre_id'));
            DB::table('users_skills')->where('user_id', $id)->update(['genre_id' => $genre_id]);
        }

        if ($request->input('prices')) {
            $prices = json_encode($request->input('prices'));
            DB::table('users_skills')->where('user_id', $id)->update(['prices' => $prices]);
        }

        if ($request->input('current_genre')) {
            $current_genre = $request->input('current_genre');
            DB::table('users_skills')->where('user_id', $id)->update(['current_genre' => $current_genre]);
        }

        if ($request->input('text_albom')) {
            $text_albom = $request->input('text_albom');
            DB::table('users_skills')->where('user_id', $id)->update(['text_albom' => $text_albom]);
        }

        return redirect('/lk-skills/');
    }

    public function create_event(Request $request) {
        $id = Auth::user()->id;

        $date = json_encode($request->input('date'));
        $artist_type = json_encode($request->input('artist_type'));
        $artist_genre = json_encode($request->input('artist_genre'));
        $artist_date = json_encode($request->input('artist_date'));
        $artist_wish = json_encode($request->input('artist_wish'));
        $dop_option = json_encode($request->input('dop_option'));

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $name_cover = time().'.'.$cover->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/images/');
            $cover->move($destinationPath, $name_cover);
        }

        if ($request->hasFile('dogovor')) {
            $dogovor = $request->file('dogovor');
            $name_dogovor = time().'.'.$dogovor->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/documents/');
            $dogovor->move($destinationPath, $name_dogovor);
        }

        DB::table('events')->insert([
            'user_id' => $id,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'cover' => $name_cover,
            'data' => $date,
            'type' => $request->input('type'),
            'place' => $request->input('place'),
            'people' => $request->input('people'),
            'artist_type' => $artist_type,
            'artist_genre' => $artist_genre,
            'artist_date' => $artist_date,
            'artist_wish' => $artist_wish,
            'payment' => $request->input('payment'),
            'payment_method' => $request->input('payment_method'),
            'payment_condition' => $request->input('payment_condition'),
            'instruments' => $request->input('instruments'),
            'dogovor' => $name_dogovor,
            'dop_option' => $dop_option,
            'additional_conditions' => $request->input('additional_conditions'),
            'status' => "check"
        ]);

        return redirect('/lk-events');
    }

    public function edit_event($event_id) {

        $id = Auth::user()->id;

        $data_event = DB::table('events')->where('user_id', $id)->where('id', $event_id)->first();
        if ($data_event) {

            $type_event = DB::table('skills')->where('id', $data_event->type)->first();
            $skills = DB::table('genres')->get();

            $event_data = json_decode($data_event->data, true);
            $dop_option = json_decode($data_event->dop_option, true);

            $artist_type = json_decode($data_event->artist_type, true);
            $artist_genre = json_decode($data_event->artist_genre, true);
            $artist_date = json_decode($data_event->artist_date, true);
            $artist_wish = json_decode($data_event->artist_wish, true);

            $count_data = count ($event_data) - 1;
            $count_artist = count ($artist_type) - 1;

            return view('lk.edit-event', [
                'event_data' => $data_event,
                'count_data' => $count_data,
                'type_event' => $type_event,
                'dop_option' => $dop_option,
                'artist_type' => $artist_type,
                'artist_genre' => $artist_genre,
                'artist_date' => $artist_date,
                'artist_wish' => $artist_wish,
                'count_artist' => $count_artist,
                'skills' => $skills,
                'data' => $event_data
            ]);

        }
        else {
            return redirect('/lk-events');
        }
    }

    public function update_event(Request $request, $event_id) {
        $id = Auth::user()->id;

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $name_cover = time().'.'.$cover->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/images/');
            $cover->move($destinationPath, $name_cover);
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['cover' => $name_cover]);
        }

        if ($request->hasFile('dogovor')) {
            $dogovor = $request->file('dogovor');
            $name_dogovor = time().'.'.$dogovor->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/documents/');
            $dogovor->move($destinationPath, $name_dogovor);
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['dogovor' => $name_dogovor]);
        }

        if ($request->input('name')) {
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['name' => $request->input('name')]);
        }

        if ($request->input('description')) {
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['description' => $request->input('description')]);
        }

        if ($request->input('type')) {
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['type' => $request->input('type')]);
        }

        if ($request->input('date')) {
            $date = json_encode($request->input('date'));
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['data' => $date]);
        }

        if ($request->input('artist_type')) {
            $artist_type = json_encode($request->input('artist_type'));
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['artist_type' => $artist_type]);
        }

        if ($request->input('artist_genre')) {
            $artist_genre = json_encode($request->input('artist_genre'));
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['artist_genre' => $artist_genre]);
        }

        if ($request->input('artist_date')) {
            $artist_date = json_encode($request->input('artist_date'));
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['artist_date' => $artist_date]);
        }

        if ($request->input('artist_wish')) {
            $artist_wish = json_encode($request->input('artist_wish'));
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['artist_wish' => $artist_wish]);
        }

        if ($request->input('dop_option')) {
            $dop_option = json_encode($request->input('dop_option'));
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['dop_option' => $dop_option]);
        }

        if ($request->input('place')) {
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['place' => $request->input('place')]);
        }

        if ($request->input('people')) {
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['people' => $request->input('people')]);
        }

        if ($request->input('payment')) {
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['payment' => $request->input('payment')]);
        }

        if ($request->input('payment_method')) {
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['payment_method' => $request->input('payment_method')]);
        }

        if ($request->input('payment_condition')) {
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['payment_condition' => $request->input('payment_condition')]);
        }

        if ($request->input('additional_conditions')) {
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['additional_conditions' => $request->input('additional_conditions')]);
        }

        return redirect('/lk-events');
    }
    public function delete_event($event_id) {
        $id = Auth::user()->id;
        $event = DB::table('events')->where('user_id', $id)->where('id', $event_id)->delete();

        return redirect('/lk-events');
    }
    public function event_proposals($event_id) {
        $id = Auth::user()->id;

        $event = DB::table('events')->where('user_id', $id)->where('id', $event_id)->first();
        $proposals = DB::table('users_proposal')->where('owner_id', $id)->where('event_id', $event_id)->where('status', 'check')->paginate(2);

        $users_data = null;
        $proposals_id = [0];

        if (!empty($proposals)) {
            foreach ($proposals as $item => $key) {
                $proposals_id[] = json_decode($key->user_id, true);
            }
            $users_data = DB::table('users')->whereIn('id', $proposals_id)->get();
            $users_data = json_decode($users_data, true);
        }

        return view('lk.proposal-events', [
            'event' => $event,
            'users_data' => $users_data,
            'proposals' => $proposals
        ]);
    }

    public function accept_proposal($id, $proposal) {
        $owner = Auth::user()->id;

        DB::table('users_proposal')->where('event_id', $id)->where('id', $proposal)->where('owner_id', $owner)->update(['status' => 'accept']);

        return redirect()->back();
    }

    public function delete_proposal($id, $proposal) {
        $owner = Auth::user()->id;

        DB::table('users_proposal')->where('event_id', $id)->where('id', $proposal)->where('owner_id', $owner)->delete();

        return redirect()->back();
    }

    public function delete_proposal_user($proposal) {
        $id = Auth::user()->id;

        DB::table('users_proposal')->where('user_id', $id)->where('id', $proposal)->delete();

        return redirect()->back();
    }

    public function event_users($event_id) {
        $id = Auth::user()->id;

        $event = DB::table('events')->where('user_id', $id)->where('id', $event_id)->first();
        $proposals = DB::table('users_proposal')->where('owner_id', $id)->where('event_id', $event_id)->where('status', 'accept')->paginate(2);

        $users_data = null;
        $proposals_id = [];

        if (!empty($proposals)) {
            foreach ($proposals as $item => $key) {
                $proposals_id[] = json_decode($key->user_id, true);
            }
            $users_data = DB::table('users')->whereIn('id', $proposals_id)->get();
            $users_data = json_decode($users_data, true);
        }

        return view('lk.users-events', [
            'event' => $event,
            'users_data' => $users_data,
            'proposals' => $proposals
        ]);
    }
}
