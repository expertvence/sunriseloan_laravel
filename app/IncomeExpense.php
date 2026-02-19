<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeExpense extends Model
{
    protected $table = 'income_expense';
    protected $fillable = ['description', 'income_expence', 'type','date','id'];
}
