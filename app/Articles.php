<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{

    protected $fillable = ['date', 'text', 'title', 'image', 'text', 'meta_title', 'meta_description', 'status'];

    public static function update_article($request, $article_id) {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/images/');
            $image->move($destinationPath, $name);
            Articles::where('id', $article_id)->update(['image' => $name]);
        }

        Articles::where('id', $article_id)->update([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'date' => date('Y-m-d', strtotime($request->input('date'))),
            'status' => $request->input('status')
        ]);

        return true;
    }
    public static function add_article($request) {
        Articles::create([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'date' => date('Y-m-d', strtotime($request->input('date'))),
            'status' => $request->input('status')
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/images/');
            $image->move($destinationPath, $name);
            Articles::where('title', $request->input('title'))->update(['image' => $name]);
        }
    }
}
