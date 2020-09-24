<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [ 'status', 'question', 'answer'];

    public static function update_faq($request, $faq_id) {

        Faq::where('id', $faq_id)->update([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
            'status' => $request->input('status')
        ]);

        return true;
    }

    public static function add_faq($request) {
        Faq::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
            'status' => $request->input('status')
        ]);
    }
}
