<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'users';
    const CREATED_AT = 'created_at';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'member_id',
        'user_type',
        'updated_by',
        'created_by',
        'status',
        'ref_id',
        'update_ref_id',
        'name',
        'user_name',  // <--- must include this
        'email',
        'password',
        'gender',
        'age',
        'religion',
        'fathers_name',
        'mothers_name',
        'mobile',
        'address',
        'nid',
        'profession',
        'member_image',
        'user_type',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function member()
    {
        return $this->hasOne(MemberRegistration::class, 'id', 'member_id');
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function loans()
    {
        return $this->hasMany(Loan::class, 'user_id');
    }

    // In User.php model
    public function loanCommit()
    {
        return $this->hasOne(LoanCommit::class);
    }
}
