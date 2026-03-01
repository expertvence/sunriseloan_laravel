<?php

namespace App\Http\Controllers;

use App\Library\Template;
use App\TotalAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdmiProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        return Template::loadView('admin/profile/admin_profile', ['user' => $user]);
    }

    public function changePassword()
    {
        $data = Auth::user();
        if (!$data) {
            return redirect()->route('login');
        }
        return Template::loadView('admin/profile/admin_password', ['data' => $data]);
    }

    public function resetPassword(Request $request)
    {

        try {

            DB::beginTransaction();
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed|min:8',
            ]);

            $user = Auth::user();

            if (!Hash::check($request->old_password, $user->password)) {
                return response()->json(['success' => false, 'message' => 'Old password is incorrect.']);
            }

            DB::table('users')->where('id', $user->id)->update([
                'password' => Hash::make($request->new_password),
            ]);

            DB::commit();

            // return response()->json(['success' => true, 'message' => 'Password changed successfully.']);
            return response()->json([
                'message' => 'Password Updated Successfully',
                'title' => 'Success'
            ]);
        } catch (\Exception $e) {

            DB::rollback();

            return response()->json([
                'msg' => 'Error: ' . $e->getMessage(),
                'title' => 'Error'
            ]);
        }
        return response()->json($message);
    }
}
