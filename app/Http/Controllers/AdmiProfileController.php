<?php

namespace App\Http\Controllers;
use App\Library\Template;
use App\TotalAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class AdmiProfileController extends Controller
{
    public function index()
    {
         return Template::loadView('admin/profile/profile_request');
    }

    public function resetPassword(Request $request)
    {

       $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|confirmed|min:8',
    ]);

    $user = auth()->user();

    if (!Hash::check($request->old_password, $user->password)) {
        return response()->json(['success' => false, 'message' => 'Old password is incorrect.']);
    }

    DB::table('users')->where('id', $user->id)->update([
        'password' => Hash::make($request->new_password),
    ]);

    return response()->json(['success' => true, 'message' => 'Password changed successfully.']);
    }
}
