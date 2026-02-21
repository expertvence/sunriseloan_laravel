<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Library\Template;
use App\MemberRegistration;
use App\User;
use Illuminate\Http\Request;
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
        // dd($data);
         return Template::loadView('employee/memberRegister/member_list', ['data' => $data]);
    }
    

    public function store(Request $request)
    {

     $user = Auth()->user();
    //  dd($user);
        try {
        // try {
            $id = $request->id;
            DB::beginTransaction();
            $data = [
                'Uid' => $request->uid,
                'name' => $request->name,  // Corrected 'namename' to 'name'
                'gender' => $request->gender,
                'age' => $request->age,
                'religion' => $request->religion,
                'fathers_mane' => $request->fathers_mane,
                'mothers_mane' => $request->mothers_name,
                'mobile' => $request->mobile,
                'address' => $request->address,
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
                'is_publish' => 1,
                
            ];
            dd($data);

            // Handle file upload
            if ($request->hasFile('member_image')) {
                $uploadedFile = $request->file('member_image');
                $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
                $destinationPath = public_path('images/member_images');
                $uploadedFile->move($destinationPath, $fileName);
                $data['member_photo'] = $fileName;
            }

            if ($id == "") {
                // Inserting new member
                $member_id = MemberRegistration::insertGetId($data);  // Get the new member ID

                if ($member_id) {
                    // Prepare user data
                    // $type='user';
                    $user_data = [
                        'name' => $request->name,  // Corrected 'namename' to 'name'
                        'email' => $request->email,
                        'ref_id' => $user->id, 
                        'user_type' => $request->user_type,
                        'member_id' => $member_id,
                        'password' => Hash::make('12345678'),  // Hash password securely
                        'created_by' => $user->name,
                        'updated_by' => $user->name,
                        'status' => 'active',
                        'created_at' => now(),
                    ];

                    $user = User::all();
                    $user = User::where('email', $request->email)->first();
                    if ($user) {
                        $message = ['msg' => 'Email already exist', 'title' => 'Error'];
                    }
                    // Insert the user data into User table
                    User::insert($user_data); 

                    DB::commit();  // Commit the transaction
                    $message = ['msg' => 'Member Saved Successfully', 'title' => 'Success'];
                    // return redirect()->route('member-list')->with('success', 'Member Saved Successfully');

                    //  return Template::loadView('admin/memberReg/member_list', ['invenstment_data' => $user_data]);
                } else {
                    DB::rollback();  // Rollback on error
                    $message = ['msg' => 'Error saving member', 'title' => 'Error'];
                }
            } else {
                // Updating existing member
                $memberUpdated = MemberRegistration::where('id', $id)->update($data);

                if ($memberUpdated) {
                    $user_data = [
                        'name' => $request->name,  // Corrected 'namename' to 'name'
                        'email' => $request->email,
                        'update_ref_id' => $user->id,
                        'updated_by' => $user->name,
                        'user_type' => 'user',
                        'member_id' => $id,
                        'updated_at' => now(),
                        'password' => Hash::make('12345678'),  // Hash password securely
                    ];
                    User::where('member_id', $id)->update($user_data);
                    DB::commit();  // Commit the transaction
                    $message = ['msg' => 'Member Updated Successfully', 'title' => 'Success'];
                } else {
                    DB::rollback();  // Rollback on error
                    $message = ['msg' => 'Error updating member', 'title' => 'Error'];
                }
            }
        // } catch (\Exception $e) {
        //     DB::rollback();  // Rollback the transaction on any error
        //     $message = ['msg' => 'An error occurred: ' . $e->getMessage(), 'title' => 'Error'];
        // }
        return response()->json($message);
    }
}

