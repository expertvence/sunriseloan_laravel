<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Library\Template;
use Illuminate\Http\Request;

class ManagerLonCommitController extends Controller
{
      public function index()
    {
        return Template::loadView('manager/LoanCommit/loan_commit');
    }
}
