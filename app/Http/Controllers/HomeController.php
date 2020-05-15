<?php

namespace App\Http\Controllers;

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

        $user_skills = DB::table('users_skills')->where('user_id', $id)->first();
        $status_skill = json_decode($user_skills->skills_id, true);
        $price_skill = json_decode($user_skills->prices, true);

        return view('lk.skills', [
            'available_skills' => $available_skills,
            'status_skill' => $status_skill,
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
        $skills_id = json_encode($request->input('skills_id'));
        $prices = json_encode($request->input('prices'));

        if (DB::table('users_skills')->where('user_id', $id)->first()) {
            DB::table('users_skills')->where('user_id', $id)->update([
                'skills_id' => $skills_id,
                'prices' => $prices,
            ]);
        }
        else {
            DB::table('users_skills')->updateOrInsert([
                'skills_id' => $skills_id,
                'user_id' => $id,
                'prices' => $prices,
            ]);
        }

        return redirect('/lk-skills/');
    }
}
