<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $primaryKey = 'loan_ide'; 
   protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
