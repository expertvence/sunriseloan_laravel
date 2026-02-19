<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Template;

class LoanRequestController extends Controller
{
    public function loanRequest()
    {
        return Template::loadView('admin/loan/loan_request');
    }
}
