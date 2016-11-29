<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyData extends Model
{
    public function bussniessType()
    {
        return $this->belongsTo('App\BussnessType');
    }
}
