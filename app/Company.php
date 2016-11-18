<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{

    protected $table = 'companies';
    /**
     * The attributes that are mass assignable.
     *  `id`, `company_name`, `address`, `email`, `business_type`, `website`, `hashedcode`,
     *  `password`, `founder_date`
     * @var array
     */
    protected $fillable = [
        'company_name',
        'address',
        'email',
        'business_type',
        'website',
        'password',
        'founder_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
