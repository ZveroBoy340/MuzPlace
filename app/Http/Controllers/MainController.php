<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Artist;

class MainController extends Controller
{
    public function index()
    {
        //$reviews = \App\Reviews::orderBy('id', 'desc')->where('public', 1)->limit(10)->get();
        return view('main', [
            'reviews' => "0"
        ]);
    }

    public function artists()
    {
        return view('artists');
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
        return view('artist', [
            'user' => $user,
            'years' => $years,
            'email_domain' => $email_domain
        ]);
    }
}
