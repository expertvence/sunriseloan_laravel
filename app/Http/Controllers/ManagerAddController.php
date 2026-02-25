<?php

namespace App\Http\Controllers;

use App\Library\Template;
use Illuminate\Http\Request;

class ManagerAddController extends Controller
{
     public function managerCreate()
    {
         return Template::loadView('admin/managerReg/reg_create_form');
    }
}
