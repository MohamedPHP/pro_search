<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BussnessType extends Model
{
    public function company()
    {
        $this->belongsTo('App\Company');
    }
}
