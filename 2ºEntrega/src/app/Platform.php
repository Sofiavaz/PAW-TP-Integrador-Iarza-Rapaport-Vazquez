<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    //
    public static function scopeName($query, $name)
    {
        return $query->where('name', '=', $name)->first();
    }
}
