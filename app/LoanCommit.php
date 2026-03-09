<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanCommit extends Model
{
    // protected $fillable = [
    //     'loan_payment_id',
    //     'loan_commit_id',
    //     'payment_amount',
    //     'loan_year',
    //     'payment_month',
    // ];

    protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }

     
}
