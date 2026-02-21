<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'company_name', 'company_address', 'company_phone',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
