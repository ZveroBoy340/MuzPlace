<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = [ 'title', 'url', 'text', 'meta_title', 'meta_description', 'status'];

    public static function update_page($request, $page_id) {

        Pages::where('id', $page_id)->update([
            'title' => $request->input('title'),
            'url' => $request->input('url'),
            'text' => $request->input('text'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'status' => $request->input('status')
        ]);

        return true;
    }

    public static function add_page($request) {
        Pages::create([
            'title' => $request->input('title'),
            'url' => $request->input('url'),
            'text' => $request->input('text'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'status' => $request->input('status')
        ]);
    }
}
