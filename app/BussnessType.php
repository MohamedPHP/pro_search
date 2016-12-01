<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BussnessType extends Model
{
    public function companies()
    {
        $this->hasMany('App\Company');
    }
    public function companiesData()
    {
        return $this->hasMany('App\CompanyData');
    }
}
