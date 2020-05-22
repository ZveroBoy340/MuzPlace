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
        return view('lk.events');
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
}
