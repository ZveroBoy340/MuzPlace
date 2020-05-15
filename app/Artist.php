<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Skills;
use Carbon\Carbon;

class Artist extends Model
{
    public static function user_years($id) {
        $current_user = User::orderBy('id', 'asc')->where('id', '=', $id)->first();
        $birthday = $current_user->birthday;
        $years = Carbon::parse($birthday)->age;
        return $years;
    }

    public static function email_domain($id) {
        $current_user = User::orderBy('id', 'asc')->where('id', '=', $id)->first();
        $email = $current_user->email;
        $email_domain = substr($email, strpos($email, '@') + 1);
        return $email_domain;
    }
}
