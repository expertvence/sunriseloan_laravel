<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     public function index()
    {
        $user = Auth::user()->where('user_type', 'user')->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404); // Redirect to login if user not found
        }
        return Template::loadView('user/user_profile', [ 'user' => $user]);
    }
}
