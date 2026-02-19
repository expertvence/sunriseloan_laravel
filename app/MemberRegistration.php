<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class MemberRegistration extends Model
{
    protected $table = 'members';
    const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'AU_UPDATE_AT';

    public function installmentPayment()
    {
        return $this->hasMany(InstallmentPayment::class,'member_id_fk');
    }
    public function extraPayment()
    {
        return $this->hasMany(ExtraPayment::class,'member_id_fk');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'member_id', 'id');
    }

    
}
