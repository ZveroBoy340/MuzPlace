<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['from', 'to', 'message', 'is_read', 'date', 'invite'];

    public static function count_chat($user)
    {
        $chat = Chat::orderBy('id', 'desc')->where('to', $user)->where('is_read', '=', 0)->get();
        $notices_count = $chat->count();
        return $notices_count;
    }
}
