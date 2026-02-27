<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $primaryKey = 'loan_ide'; 
    protected $fillable = [
        'user_id', 'loan_amount', 'loan_purpose', 'loan_term', 
        'payment_schedule', 'monthly_income', 'other_documents','loan_category_id','created_by','created_at','deposit','l_uId'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
