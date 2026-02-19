<?php

namespace App\Http\Controllers;

use App\Library\Template;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    public function index()
    {
        return Template::loadView('admin/employee_salary/employee_salary_form');
    }
}
