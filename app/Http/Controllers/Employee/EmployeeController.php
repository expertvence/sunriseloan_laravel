<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Library\Template;
use App\MemberRegistration;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function EmployeememberList()
    {
        $data = MemberRegistration::get();
        return Template::loadView('employee/memberRegister/member_list', ['data' => $data]);
    }


    public function store(Request $request)
    {
        $authUser = Auth()->user();

        try {
            $id = $request->id;
            DB::beginTransaction();

            $data = [
                'Uid' => $request->uid,
                'name' => $request->name,
                'gender' => $request->gender,
                'age' => $request->age,
                'religion' => $request->religion,
                'fathers_name' => $request->fathers_name,
                'mothers_name' => $request->mothers_name,
                'address' => $request->address,
                'mobile' => $request->mobile,
                'user_type' => 'user',
                'email' => $request->email,
                'no_of_share' => $request->number_of_share,
                'share_amount' => $request->share_amt,
                'nid' => $request->nid,
                'member_profession' => $request->profession,
                'nomini_name' => $request->nomini_name,
                'nomini_relation' => $request->nomini_relation,
                'nomini_age' => $request->nomini_age,
                'nomini_barth_or_ind' => $request->nomini_birth_nid,
                'nomini_address' => $request->nomini_adress,

                // ✅ FIXED PART
                'status' => 'inactive', // default inactive
                'created_by' => $authUser->name,
            ];

            // File Upload
            if ($request->hasFile('member_image')) {
                $uploadedFile = $request->file('member_image');
                $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
                $destinationPath = public_path('images/member_images');
                $uploadedFile->move($destinationPath, $fileName);
                $data['member_photo'] = $fileName;
            }

            if ($id == "") {

                // Email duplicate check
                $existingUser = User::where('email', $request->email)->first();
                if ($existingUser) {
                    return response()->json([
                        'msg' => 'Email already exists',
                        'title' => 'Error'
                    ]);
                }

                // ✅ Generate unique user_name
                $nameParts = explode(' ', $request->name); // Split name into parts
                $firstLetter = strtolower(substr($nameParts[0], 0, 1)); // First letter of first name
                $lastName = isset($nameParts[1]) ? strtolower($nameParts[1]) : ''; // Last name if exists
                $emailPrefix = strtolower(explode('@', $request->email)[0]); // Email before @
                $baseUserName = "@{$firstLetter}{$lastName}_{$emailPrefix}_sunriseloan";

                // Ensure uniqueness
                $userName = $baseUserName;
                $counter = 1;
                while (User::where('user_name', $userName)->exists()) {
                    $userName = $baseUserName . $counter;
                    $counter++;
                }
                // Insert Member
                $member_id = MemberRegistration::insertGetId($data);

                if ($member_id) {

                    $user_data = [
                        'name' => $request->name,
                        'email' => $request->email,
                        'ref_id' => $authUser->id,
                        'user_name' => $userName,
                        'user_type' => 'user',
                        'member_id' => $member_id,
                        'password' => Hash::make('12345678'),
                        'created_by' => $authUser->name,
                        'updated_by' => $authUser->name,
                        'status' => 'active',
                        'created_at' => now(),
                    ];

                    User::insert($user_data);

                    DB::commit();

                    return response()->json([
                        'msg' => 'Member Saved Successfully',
                        'title' => 'Success'
                    ]);
                }

                DB::rollback();
                return response()->json([
                    'msg' => 'Error saving member',
                    'title' => 'Error'
                ]);
            } else {

                MemberRegistration::where('id', $id)->update($data);

                $user_data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'update_ref_id' => $authUser->id,
                    'updated_by' => $authUser->name,
                    'updated_at' => now(),
                ];

                User::where('member_id', $id)->update($user_data);

                DB::commit();

                return response()->json([
                    'msg' => 'Member Updated Successfully',
                    'title' => 'Success'
                ]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'msg' => 'An error occurred: ' . $e->getMessage(),
                'title' => 'Error'
            ]);
        }
    }

    // public function show($id)
    // {
    //     $user = DB::table('members')
    //         ->leftJoin('users', 'users.member_id', '=', 'members.id')
    //         ->where('members.id', $id)
    //         ->where('users.member_id', $id)
    //         ->first();

    //     // dd($user);

    //     return Template::loadView('employee/memberRegister/member_show', compact('user'));
    // }

    public function show($id)
    {
        $user = DB::table('members')
            ->leftJoin('users', 'users.member_id', '=', 'members.id')
            ->where('members.id', $id)
            ->select(
                'members.*',
                'users.id as user_id',
                'users.name as user_name',
                'users.email',
                // 'users.is_publish',
                'users.created_at as user_created_at'
            )
            ->first();

        return Template::loadView('employee/memberRegister/member_show', compact('user'));
    }
}
