<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstallmentPayment extends Model
{
    protected $table = 'installment_payment';
    // const CREATED_AT = 'created_at';
    protected $fillable = ['invoice_id', 'invoice_code', 'member_id_fk','member_code_no','member_name','from_month','to_month','year','no_of_share','share_amount','is_publish'];
    public function memberRegistration()
    {
        return $this->belongsTo(MemberRegistration::class,'member_id_fk');
    }
}
