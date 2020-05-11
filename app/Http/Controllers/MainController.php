<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        //$reviews = \App\Reviews::orderBy('id', 'desc')->where('public', 1)->limit(10)->get();
        return view('main', [
            'reviews' => "0"
        ]);
    }
}
