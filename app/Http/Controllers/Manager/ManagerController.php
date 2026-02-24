<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Library\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function managerDashboard()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        return Template::loadView('manager/managerdashboard');
    }
}
