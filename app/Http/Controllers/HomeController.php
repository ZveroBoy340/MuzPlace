<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Events;
use App\Genres;
use App\Reviews;
use App\Skills;
use App\Users_proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\User;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Notices;
use Carbon\Carbon;
use Pusher;
use Artesaos\SEOTools\Facades\SEOMeta;
use \App\ArtistType;
use Mail;
use \App\Mail\NewEvent;
use \App\Mail\NewReview;
use Image;

class HomeController extends Controller
{

    protected $count_notice;
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
        $my_events_data = [];
        $proposals_check_date = [];
        $proposals_accept_date = [];
        $proposals_count = [];
        $end_my_events = 0;
        $reserved_calendar = [];
        $owner_events = [];

        $type = DB::table('skills')->get();
        $my_events = DB::table('events')->where('user_id', $id)->get();
        if ($my_events) {
            foreach ($my_events as $item => $key) {
                $my_events_data[] = json_decode($key->data, true);
            }
            foreach ($my_events as $item => $key) {
                $proposal_event = Users_proposal::where('event_id', $key->id)->where('status', 'check')->get();
                $proposals_count[] = count($proposal_event);
            }
            $end_my_events = count ($my_events_data) - 1;
        }



        foreach ($my_events_data as $numer => $datum) {
            foreach ($datum as $numb => $ev_data) {
                $reserved_calendar[] = $ev_data;
            }
        }

        $my_proposals = Users_proposal::where('user_id', $id)->get();
        if ($my_proposals) {
            foreach ($my_proposals as $item => $key) {
                if ($key->status == 'check' || $key->status == 'decline') {
                    $result_event = DB::table('events')->where('id', $key->event_id)->get();
                    $check_event = json_decode($result_event, true);

                    if (!empty($check_event)) {
                        $my_proposals_check[$key->id][] = $result_event;
                        $my_proposals_check[$key->id][][] = $key->status;
                    }
                }
                elseif ($key->status == 'accept') {
                    $result_event = DB::table('events')->where('id', $key->event_id)->get();
                    $check_event = json_decode($result_event, true);

                    if (!empty($check_event)) {
                        $my_proposals_accept[$key->id][] = $result_event;
                    }
                }
                foreach ($my_proposals_check as $item => $event) {
                    $data_proposal = json_decode($event[0][0]->data, true);
                    $proposals_check_date[$item][] = $data_proposal[$key->data];
                }
                foreach ($my_proposals_accept as $item => $event) {
                    $data_proposal = json_decode($event[0][0]->data, true);
                    $proposals_accept_date[$item][] = $data_proposal[$key->data];
                }
            }
        }

        foreach ($proposals_check_date as $numer => $datum) {
            foreach ($datum as $numb => $ev_data) {
                $reserved_calendar[] = $ev_data;
            }
        }

        foreach ($proposals_accept_date as $numer => $datum) {
            foreach ($datum as $numb => $ev_data) {
                $reserved_calendar[] = $ev_data;
            }
        }

        $type_events = [];
        $places = [];
        $proposals_accept = [];
        $event_datas = [];
        $owner_login = [];
        $reserved_calendar = [];
        $active_events_owner = [];

        if (Auth::user()->status == 'artist') {
            foreach ($my_proposals as $prop_count => $proposal) {
                if ($proposal->status == 'accept') {
                    $temp_event = Events::where('user_id', $proposal->owner_id)->where('id', $proposal->event_id)->where('status', 'accept')->first();
                    if ($temp_event) {
                        $owner_events[$prop_count] = $temp_event;
                    }
                }
            }


            foreach ($owner_events as $num => $data) {
                $event_date = json_decode($data->data, true);

                foreach ($event_date as $counter => $date) {
                    if (strtotime($date[0]) > strtotime(date('d.m.Y'))) {
                        $active_events_owner[$num] = $data;
                        $type_events[$num][] = $type[$data->type - 1]->name;
                        $event_datas[$num][] = $date;
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
            $owner_events = collect($owner_events)->sortBy('data');
        }

        SEOMeta::setTitle('Личный кабинет пользователя - MuzPlace');

        return view('lk.events', [
            'my_events' => $my_events,
            'my_events_data' => $my_events_data,
            'end_my_events' => $end_my_events,
            'my_proposals_check' => $my_proposals_check,
            'my_proposals_accept' => $my_proposals_accept,
            'proposals_check_date' => $proposals_check_date,
            'proposals_accept_date' => $proposals_accept_date,
            'proposals_count' => $proposals_count,
            'reserved_calendar' => $reserved_calendar,
            'owner_events' => $active_events_owner,
            'type_events' => $type_events,
            'places' => $places,
            'event_data' => $event_datas,
            'owner_login' => $owner_login
        ]);
    }

    public function messages()
    {
        $reserved_calendar = [];

        $user = Auth::user()->id;
        $notices_all = Notices::orderBy('id', 'desc')->where('user_id', $user)->get();
        $notices = Notices::orderBy('id', 'desc')->where('user_id', $user)->paginate(10);

        foreach ($notices_all as $num => $data) {
            $reserved_calendar[] = $data->date;
        }

        SEOMeta::setTitle('Мои уведомления - MuzPlace');

        return view('lk.messages', [
            'notices' => $notices,
            'reserved_calendar' => $reserved_calendar
        ]);
    }

    public function chat()
    {
        $users = [];
        $id_users = [];
        $unread_users = [];
        $users = [];

        $messages = Chat::where(function ($query) {
            $query->where('from', Auth::id())
                ->orWhere('to', Auth::id());
        })->orderBy('id', 'desc')->get();

        foreach ($messages as $item => $message) {
            if ($message->to != Auth::id()) {
                $id_users[$message->to] = $message->to;
            }
            if ($message->from != Auth::id()) {
                $id_users[$message->from] = $message->from;
            }
        }

        if (count($messages) > 0) {
            $users_order = implode(',', $id_users);
            $users = User::whereIn('id', $id_users)->orderByRaw("FIELD(id, $users_order)")->get()->getDictionary();
        }

        foreach ($users as $item => $user) {
            $unread_message = Chat::where('from', $user->id)->where('to', Auth::id())->orderBy('id', 'desc')->first();

            if (!empty($unread_message) && $unread_message->is_read == 1) {
                $unread_users[$user->id]['is_read'] = 1;
                $unread_users[$user->id]['message'] = $unread_message->message;
            }
            else {
                $unread_users[$user->id]['is_read'] = 0;
                $unread_users[$user->id]['message'] = "Без ответа";
            }
        }

        SEOMeta::setTitle('Мои переписки - MuzPlace');

        return view('lk.chat', [
            'users' => $users,
            'unread_users' => $unread_users,
            'unread' => $unread_users
        ]);
    }

    public function chat_message($user_id)
    {
        $my_id = Auth::id();

        $check_unread = Chat::where('from', $user_id)->where('is_read', 0)->get();

        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            'bd9c99ccc12f92e17ea4',
            '1b746da4a3567f1b2e10',
            '1051131',
            $options
        );

        if (count($check_unread) > 0) {
            $update_read = Chat::where('from', $user_id)->update(['is_read' => 1]);

            $count_unread = Chat::count_chat($my_id);

            $data = ['from' => $my_id, 'to' => $user_id, 'counter' => $count_unread];
            $pusher->trigger('my-channel', 'view-message', $data);
        }

        $messages = Chat::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->orWhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->get();

        $users[$user_id] = User::where('id', $user_id)->first();
        $users[$my_id] = User::where('id', $my_id)->first();

        return view('ajax.chat_message', [
            'messages' => $messages,
            'users' => $users
        ]);
    }

    public function date_chat($first, $last, $user_id)
    {
        $my_id = Auth::id();

        $messages = Chat::where(function ($query) use ($user_id, $my_id, $first, $last) {
            $query->where('from', $my_id)->where('to', $user_id)->whereDate('created_at', '>=', date('Y-m-d', strtotime($first)))->whereDate('created_at', '<=', date('Y-m-d', strtotime($last)));
        })->orWhere(function ($query) use ($user_id, $my_id, $first, $last) {
            $query->where('from', $user_id)->where('to', $my_id)->whereDate('created_at', '>=', date('Y-m-d', strtotime($first)))->whereDate('created_at', '<=', date('Y-m-d', strtotime($last)));
        })->get();



        $users[$user_id] = User::where('id', $user_id)->first();
        $users[$my_id] = User::where('id', $my_id)->first();

        return view('ajax.chat_message', [
            'messages' => $messages,
            'users' => $users
        ]);
    }

    public function invite_chat($event_id, $user_id) {
        $id = Auth::user()->id;

        $event = Users_proposal::where('user_id', $user_id)->where('event_id', $event_id)->where('owner_id', $id)->first();

        if ($event) {
            $invite_chat = Chat::create([
                'from' => $id,
                'to' => $user_id,
                'message' => 'Приглашение в чат',
                'is_read' => 0,
                'invite' => 1
            ]);
            return redirect('/lk-chat');
        } else {
            return redirect('/lk-events');
        }
    }

    public function post_message(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $save = new Chat();
        $save->from = $from;
        $save->to = $to;
        $save->message = $message;
        $save->is_read = 0;
        $save->invite = 0;
        $save->save();

        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            'bd9c99ccc12f92e17ea4',
            '1b746da4a3567f1b2e10',
            '1051131',
            $options
        );


        $count_unread = Chat::count_chat($to);

        $data = ['from' => $from, 'to' => $to, 'message' => $message, 'counter' => $count_unread];
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    public function info()
    {
        SEOMeta::setTitle('Данные профиля - MuzPlace');

        $types = ArtistType::get();

        return view('lk.info', [
            'types' => $types
        ]);
    }

    public function reviews()
    {
        $id = Auth::user()->id;

        $user_reviews = Reviews::where('owner_id', $id)->where('status', 1)->paginate(5);
        $attachment = Reviews::reviews_attachment($user_reviews);

        SEOMeta::setTitle('Мои отзывы - MuzPlace');

        return view('lk.reviews', [
            'reviews' => $user_reviews,
            'attachment' => $attachment
        ]);
    }

    public function skills()
    {
        $id = Auth::user()->id;

        $available_skills = Skills::orderBy('id', 'asc')->where('status', '=', 1)->get();
        $available_genres = Genres::orderBy('id', 'asc')->where('status', '=', 1)->get();

        $user_skills = DB::table('users_skills')->where('user_id', $id)->first();

        SEOMeta::setTitle('Мои навыки - MuzPlace');

        if ($user_skills != null) {
            $user_tracks = DB::table('user_tracks')->where('user_id', $id)->get();

            $status_skill = json_decode($user_skills->skills_id, true);
            $price_skill = json_decode($user_skills->prices, true);
            $genre_user = json_decode($user_skills->genre_id, true);

            $current_genre = $user_skills->current_genre;
            $text_albom = $user_skills->text_albom;
            $obloshka = $user_skills->obloshka;

            $types = ArtistType::get();

            return view('lk.skills', [
                'available_skills' => $available_skills,
                'available_genres' => $available_genres,
                'genre_user' => $genre_user,
                'user_tracks' => $user_tracks,
                'status_skill' => $status_skill,
                'current_genre' => $current_genre,
                'obloshka' => $obloshka,
                'text_albom' => $text_albom,
                'price_skill' => $price_skill,
                'types' => $types
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
                'price_skill' => null,
                'types' => null
            ]);
        }
    }

    public function create()
    {
        $types = Skills::where('status', 1)->get();
        $genres = Genres::where('status', 1)->get();

        SEOMeta::setTitle('Создание мероприятия - MuzPlace');

        return view('lk.create', [
            'types' => $types,
            'genres' => $genres
        ]);
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

            $img = Image::make($destinationPath.$name)->orientate()->fit(500, 500)->save($destinationPath.$name);

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
        if ($request->input('expirience')) {
            User::where('id', $id)->update(['expirience' => $request->input('expirience')]);
        }

        if ($request->input('city')) {
            User::where('id', $id)->update(['city' => $request->input('city')]);
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

        /*if ($request->input('email') != $email) {
            $request->validate([
                'email' => ['string', 'email', 'max:255', 'unique:users'],
            ]);
            User::where('id', $id)->update(['email' => $request->input('email')]);
        }*/

        if ($request->input('phone')) {
            User::where('id', $id)->update(['phone' => $request->input('phone')]);
        }

        if ($request->input('birthday')) {
            $birthday = date( "Y.m.d", strtotime( $request->input('birthday') ));
            User::where('id', $id)->update(['birthday' => $birthday]);
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

        return redirect('/lk-info/?info=saved');
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

            $img = Image::make($destinationPath.$name)->orientate()->fit(700, 500)->save($destinationPath.$name);

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

        if ($request->input('type')) {
            User::where('id', $id)->update(['type' => $request->input('type')]);
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
        $name_dogovor = null;

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $name_cover = time().'.'.$cover->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/images/');
            $cover->move($destinationPath, $name_cover);
        } else {
            $name_cover = 'default.png';
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
            'city' => $request->input('city'),
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

        $new_event = Events::where('name', $request->input('name'))->where('user_id', $id)->first();

        Notices::event_check($request->input('name'), $id);

        Mail::to('orinrus@mail.ru')->send(new NewEvent($new_event->name, $new_event->id));

        return redirect('/lk-events');
    }

    public function edit_event($event_id) {

        $id = Auth::user()->id;

        $data_event = DB::table('events')->where('user_id', $id)->where('id', $event_id)->first();

        SEOMeta::setTitle('Редактирование мероприятия - MuzPlace');

        if ($data_event) {

            $type_event = DB::table('skills')->where('id', $data_event->type)->first();
            $types = Skills::where('status', 1)->get();
            $genres = Genres::where('status', 1)->get();

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
                'data' => $event_data,
                'types' => $types,
                'genres' => $genres
            ]);
        }
        else {
            return redirect('/lk-events?event=added');
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

        if ($request->input('city')) {
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['city' => $request->input('city')]);
        }

        if ($request->input('payment_condition')) {
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['payment_condition' => $request->input('payment_condition')]);
        }

        if ($request->input('additional_conditions')) {
            DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['additional_conditions' => $request->input('additional_conditions')]);
        }

        DB::table('events')->where('user_id', $id)->where('id', $event_id)->update(['status' => 'check']);

        Notices::event_check($request->input('name'), $id);

        Mail::to('orinrus@mail.ru')->send(new NewEvent($request->input('name'), $event_id));

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['event'=>'edited']));
    }
    public function delete_event($event_id) {
        $id = Auth::user()->id;
        $event = DB::table('events')->where('user_id', $id)->where('id', $event_id)->delete();

        return redirect('/lk-events?event=deleted');
    }
    public function event_proposals($event_id) {
        $id = Auth::user()->id;

        $event = DB::table('events')->where('user_id', $id)->where('id', $event_id)->first();

        SEOMeta::setTitle('Предложения пользователей - MuzPlace');
        if ($event) {
            $proposals = Users_proposal::where('owner_id', $id)->where('event_id', $event_id)->where('status', 'check')->paginate(2);

            $users_data = null;
            $proposals_id = [0];
            $rating_users = [];

            if (!empty($proposals)) {
                foreach ($proposals as $item => $key) {
                    $proposals_id[] = json_decode($key->user_id, true);
                }
                $users_data = DB::table('users')->whereIn('id', $proposals_id)->get();
                $users_data = json_decode($users_data, true);
            }

            foreach ($users_data as $number => $artist) {
                $rating_users[$number][] = Reviews::reviews_rating_num($artist['id']);
            }

            return view('lk.proposal-events', [
                'event' => $event,
                'users_data' => $users_data,
                'proposals' => $proposals,
                'rating_users' => $rating_users
            ]);
        } else {
            return redirect('/lk-events');
        }
    }

    public function accept_proposal($id, $proposal) {
        $owner = Auth::user()->id;

        $proposal_data = Users_proposal::where('event_id', $id)->where('id', $proposal)->where('owner_id', $owner)->first();
        Users_proposal::where('event_id', $id)->where('id', $proposal)->where('owner_id', $owner)->update(['status' => 'accept']);

        Notices::accept_proposal($proposal_data->user_id, $id);

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['proposal'=>'accept']));
    }

    public function delete_proposal($id, $proposal) {
        $owner = Auth::user()->id;

        $proposal_data = Users_proposal::where('event_id', $id)->where('id', $proposal)->where('owner_id', $owner)->first();
        Users_proposal::where('event_id', $id)->where('id', $proposal)->where('owner_id', $owner)->update(['status' => 'decline']);

        Notices::decline_proposal($proposal_data->user_id, $id);

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['proposal'=>'decline']));
    }

    public function delete_proposal_user($proposal) {
        $id = Auth::user()->id;

        Users_proposal::where('user_id', $id)->where('id', $proposal)->delete();

        return redirect('/lk-events?proposal=deleted');
    }

    public function event_users($event_id) {
        $id = Auth::user()->id;

        $proposals_accept_date = [];

        $event = DB::table('events')->where('user_id', $id)->where('id', $event_id)->first();

        SEOMeta::setTitle('Участники мероприятия - MuzPlace');
        if ($event) {
            $proposals = Users_proposal::where('owner_id', $id)->where('event_id', $event_id)->where('status', 'accept')->paginate(2);

            $users_data = null;
            $proposals_id = [];
            $rating_users = [];

            if (!empty($proposals)) {
                foreach ($proposals as $item => $key) {
                    $proposals_id[] = json_decode($key->user_id, true);
                }
                $users_data = DB::table('users')->whereIn('id', $proposals_id)->get();
                $users_data = json_decode($users_data, true);

                foreach ($proposals as $item => $key) {
                    $data_proposal = json_decode($event->data, true);
                    $proposals_accept_date[$item] = $data_proposal[$key->data][0];
                }
            }

            foreach ($users_data as $number => $artist) {
                $rating_users[$number][] = Reviews::reviews_rating_num($artist['id']);
            }



            return view('lk.users-events', [
                'event' => $event,
                'users_data' => $users_data,
                'proposals' => $proposals,
                'rating_users' => $rating_users,
                'proposals_date' => $proposals_accept_date
            ]);
        } else {
            return redirect('/lk-events');
        }
    }

    public function look_notice($notice_id) {
        $user = Auth::user()->id;

        $notice_find = Notices::where('user_id', $user)->where('id', $notice_id)->where('viewed', 0)->first();
        if ($notice_find) {
            Notices::where('user_id', $user)->where('id', $notice_id)->update(
                ['viewed' => 1]
            );
            return response()->json(array('data' => true));
        }

        return response()->json(array('data' => false));
    }

    public function read_all() {
        $user = Auth::user()->id;

        Notices::where('user_id', $user)->update(
            ['viewed' => 1]
        );
        return response()->json(array('data' => true));
    }

    public function date_notices($first, $last) {
        $user = Auth::user()->id;
        $first = Carbon::createFromFormat('d.m.Y', $first);
        $last = Carbon::createFromFormat('d.m.Y', $last);

        $all_notices = Notices::orderBy('id', 'desc')->where('user_id', $user)->get();
        $result_notices = Notices::date_notices($all_notices, $first, $last);

        return response()->json(array('data' => true, 'result' => $result_notices));
    }

    public function date_events($data) {
        $user = Auth::user()->id;

        if (Auth::user()->status == 'organizator') {
            $all_events = Events::orderBy('id', 'desc')->where('user_id', $user)->get();
            $result_events = Events::date_events($all_events, $data);

            return response()->json(array('data' => true, 'result' => $result_events));
        }
        else {
            $check_events = Events::check_events($user, $data);

            return response()->json(array('data' => 'artist', 'html' => $check_events));
        }
    }

    public function delete_notice($notice_id) {
        $user = Auth::user()->id;

        $notice_find = Notices::where('user_id', $user)->where('id', $notice_id)->first();
        if ($notice_find) {
            Notices::where('user_id', $user)->where('id', $notice_id)->delete();
            return response()->json(array('data' => true));
        }

        return response()->json(array('data' => false));
    }

    public function add_reviews($event_id) {
        $id = Auth::user()->id;

        $artist = User::orderBy('id', 'asc')->where('id', '=', $id)->first();

        SEOMeta::setTitle('Добавление отзыва - MuzPlace');

        return view('lk.reviews_add', [
            'artist' => $artist,
        ]);
    }

    public function post_reviews($proposal_id, Request $request) {
        $user = Auth::user()->id;

        $add_review = Reviews::post_review($request, $user, $proposal_id);
        $add_notice = Notices::new_review_event($user, $proposal_id);

        Mail::to('orinrus@mail.ru')->send(new NewReview(Auth::user()->login, $request->input('text-review')));

        if ($add_review === 'double') {
            return redirect('/lk-events?review=double');
        }
        elseif ($add_review == true) {
            return redirect('/lk-events?review=added');
        }
        else {
            return redirect('/lk-events?review=false');
        }
    }
}
