<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Library\Template;
use App\Manager;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function managerProfile()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        return Template::loadView('manager/profile/manager_profile', ['user' => $user]);
    }
    public function changePassword()
    {
        $data = Auth::user();
        if (!$data) {
            return redirect()->route('login');
        }
        return Template::loadView('manager/profile/change_password', ['data' => $data]);
    }

    public function managerPassword(Request $request)
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

    public function managerActiveStatus(Request $request)
    {
        if (Auth::user()->user_type != 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $member = User::find($request->id);

        if (!$member) {
            return response()->json(['error' => 'Manager not found'], 404);
        }

        $member->status = $request->status;
        $member->save();

        return response()->json(['success' => true]);
    }

    public function managerDestroy($id)
    {
        try {
            $manager = User::where('user_type', 'manager')->where('id', $id)->firstOrFail(); 
            $manager->delete(); // Delete the record

            return response()->json([
                'msg' => 'Manager Deleted Successfully',
                'title' => 'Success'
            ]);
        }  catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong. Please try again.'
            ], 500);
        }
    }
}
