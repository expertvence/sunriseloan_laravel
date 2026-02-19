<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraPayment extends Model
{
    protected $table = 'extra_payments';
    // const CREATED_AT = 'created_at';
    public function memberRegistration()
    {
        return $this->belongsTo(MemberRegistration::class,'member_id_fk');
    }
}
