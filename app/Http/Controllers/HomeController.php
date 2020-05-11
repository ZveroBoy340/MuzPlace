<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('lk.skills');
    }

    public function create()
    {
        return view('lk.create');
    }
}
