<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $fillable = [ 'name', 'status'];

    public static function update_genre($request, $genre_id) {

        Genres::where('id', $genre_id)->update([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'status' => $request->input('status')
        ]);

        return true;
    }

    public static function add_genres($request) {
        Genres::create([
            'name' => $request->input('name'),
            'status' => $request->input('status')
        ]);
    }
}
