<?php

namespace App\Http\Controllers;

use App\Library\Template;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ManagerAddController extends Controller
{
    public function managerCreate($id = "")
    {
        $data = User::find($id);
        return Template::loadView('admin/managerReg/reg_create_form', ['data' => $data]);
    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'name'           => 'required|string|max:255',
                'email'          => 'required|email',
                'member_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'gender'         => 'required|string',
                'age'            => 'nullable|numeric',
                'religion'       => 'nullable|string',
                'fathers_name'   => 'nullable|string',
                'mothers_name'   => 'nullable|string',
                'mobile'         => 'nullable|string|max:20',
                'address'        => 'nullable|string|max:500',
                'nid'            => 'nullable|string|max:50',
                'profession'     => 'nullable|string|max:255',
            ]);

            if ($request->validate()) {
                return response()->json([
                    'msg'   => 'Validation failed',
                    'title' => 'Error'
                ]);
            }
            $id = $request->id;

            // Handle file upload
            $imagePath = null;
            if ($request->hasFile('member_image')) {
                $imagePath = $request->file('member_image')->store('members', 'public');
            }

            // Generate unique user_name
            $nameParts = explode(' ', trim($request->name));
            $firstLetter = strtolower(substr($nameParts[0], 0, 1));
            $lastName = isset($nameParts[1]) ? strtolower($nameParts[1]) : '';
            $emailPrefix = strtolower(explode('@', $request->email)[0]);
            $baseUserName = "@{$firstLetter}{$lastName}_{$emailPrefix}_sunriseloan";

            $userName = $baseUserName;
            $counter = 1;
            while (User::where('user_name', $userName)->exists()) {
                $userName = $baseUserName . $counter;
                $counter++;
            }

            // Prepare data array
            $data = [
                'name'         => $request->name,
                'user_name'    => $userName,
                'email'        => $request->email,
                'password'     => Hash::make('12345678'), // default password
                'gender'       => $request->gender,
                'user_type'    => 'manager',
                'age'          => $request->age,
                'religion'     => $request->religion,
                'fathers_name' => $request->fathers_name,
                'mothers_name' => $request->mothers_name,
                'mobile'       => $request->mobile,
                'address'      => $request->address,
                'nid'          => $request->nid,
                'profession'   => $request->profession,
                'created_at'   => now(),
                'created_by'   => Auth::user()->name,
                'ref_id'       => Auth::user()->id
            ];

            if ($imagePath) {
                $data['member_image'] = $imagePath;
            }

            if (empty($id)) {
                // ❗ Check if email already exists
                $existingUser = User::where('email', $request->email)->first();
                if ($existingUser) {
                    return response()->json([
                        'msg'   => 'Email already exists',
                        'title' => 'Error'
                    ]);
                }

                // Create new manager
                User::create($data);

                DB::commit();

                return response()->json([
                    'msg'   => 'Manager Saved Successfully',
                    'title' => 'Success'
                ]);
            } else {
                // Update existing manager
                User::where('id', $id)->update($data);

                DB::commit();

                return response()->json([
                    'msg'   => 'Manager Updated Successfully',
                    'title' => 'Success'
                ]);
            }
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Manager create/update failed: ' . $e->getMessage());

            return response()->json([
                'msg'   => 'Error: ' . $e->getMessage(),
                'title' => 'Error'
            ]);
        }
    }

    public function managerList()
    {
        $data = User::where('user_type', 'manager')->get();
        return Template::loadView('admin/managerReg/manager_list', ['data' => $data]);
    }

   
}
