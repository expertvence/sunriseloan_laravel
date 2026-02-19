<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstallmentLateFine extends Model
{
    protected $table = 'installment_late_fines';
    protected $fillable = ['member_id_fk', 'from_month', 'year','share_amount','total_amount','fine_percent','fine_amount','payment_ind'];
    //
}
