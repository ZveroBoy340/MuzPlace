<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $fillable = [ 'name', 'status'];

    public static function update_type($request, $type_id) {

        Skills::where('id', $type_id)->update([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'status' => $request->input('status')
        ]);

        return true;
    }

    public static function add_type($request) {
        Skills::create([
            'name' => $request->input('name'),
            'status' => $request->input('status')
        ]);
    }
}
