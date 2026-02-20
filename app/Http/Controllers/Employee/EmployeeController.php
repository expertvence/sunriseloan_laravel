<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library\Template;
use App\MemberRegistration;

class EmployeeController extends Controller
{

  public function memRegistration()
    {
        return Template::loadView('employee/memberRegister/register');
    }
    public function memRegistrationForm($id = "")
    {

        $data = MemberRegistration::find($id);

        return Template::loadView('employee/memberRegister/reg_create_form', ['data' => $data]);
    }
    
}

