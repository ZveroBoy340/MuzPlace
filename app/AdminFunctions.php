<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AdminFunctions extends Model
{
    public static function register_today() {
        $today = User::whereDate('created_at', Carbon::today())->get();
        $today = count($today);

        return $today;
    }

    public static function register_month() {
        $now = Carbon::now();
        $month = User::whereMonth('created_at', $now->month)->get();
        $month = count($month);

        return $month;
    }

    public static function register_all() {
        $all = User::all();
        $all = count($all);

        return $all;
    }

    public static function check_events() {
        $events = Events::where('status', 'check')->paginate(10);

        return $events;
    }

    public static function check_reviews() {
        $reviews = Reviews::where('status', 0)->paginate(10);

        return $reviews;
    }

    public static function verify_users() {
        $active = User::orderBy('id', 'desc')->where('email_verified_at', '!=', null)->paginate(10);
        return $active;
    }

    public static function user_edit($id) {
        $edit = User::orderBy('id', 'asc')->where('id', '=', $id)->first();
        return $edit;
    }

    public static function events() {
        $events = Events::orderBy('id', 'desc')->paginate(10);
        return $events;
    }

    public static function reviews() {
        $reviews = Reviews::orderBy('id', 'desc')->paginate(10);
        return $reviews;
    }

    public static function articles() {
        $articles = Articles::orderBy('id', 'desc')->paginate(10);
        return $articles;
    }

    public static function pages() {
        $pages = Pages::orderBy('id', 'desc')->paginate(10);
        return $pages;
    }

    public static function faq() {
        $faq = Faq::orderBy('id', 'desc')->paginate(10);
        return $faq;
    }

    public static function types() {
        $types = Skills::get();
        return $types;
    }

    public static function genres() {
        $types = Genres::get();
        return $types;
    }
}
