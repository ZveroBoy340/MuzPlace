<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaTags extends Model
{
    protected $fillable = [ 'name_page', 'title', 'description'];

    public static function update_seo($request, $seo_id) {

        MetaTags::where('id', $seo_id)->update([
            'name_page' => $request->input('name_page'),
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);

        return true;
    }
}
