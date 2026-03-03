<?php

namespace App\Http\Controllers;

use App\Library\Template;
use App\MemberRegistration;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class MemberRegistrationController extends Controller
{
    public function __construct(MemberRegistration $MemberRegistration)
    {
        $this->middleware('auth');
    }
   
    public function store(Request $request)
    {
        try {

        $request->validate([
               'uid' => 'required|string|max:50',
            'gender'         => 'required|string',
            'age'            => 'nullable|numeric',
            'religion'       => 'nullable|string',
            'fathers_name'   => 'nullable|string',
            'mothers_name'   => 'nullable|string',
            'mobile'         => 'nullable|string|max:20',
            'address'        => 'nullable|string|max:500',
            'name'           => 'required|string|max:255',
            'email'          => 'required|email',
            'member_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // if ($request->validate()) {
        //     return response()->json([
        //         'msg'   => 'Validation failed',
        //         'title' => 'Error'
        //     ]);
        // }
            $id = $request->id;
            DB::beginTransaction();

            // ✅ Status only admin can control
            $status = 'inactive'; // default

            if (Auth::user()->user_type == 'admin') {
                $status = $request->status ?? 'inactive';
            }

            $data = [
                'Uid' => $request->uid,
                'name' => $request->name,
                'gender' => $request->gender,
                'age' => $request->age,
                'religion' => $request->religion,
                'fathers_name' => $request->fathers_name,
                'mothers_name' => $request->mothers_name,
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
                'updated_at' => now(),


                // ✅ New system
                'status' => $status,

                // ✅ Creator tracking
                'created_by' => Auth::user()->name,
            ];

            // ✅ File Upload
            if ($request->hasFile('member_image')) {
                $uploadedFile = $request->file('member_image');
                $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
                $destinationPath = public_path('images/member_images');
                $uploadedFile->move($destinationPath, $fileName);
                $data['member_photo'] = $fileName;
            }

            if ($id == "") {

                // ❗ Email duplicate check BEFORE insert
                $existingUser = User::where('email', $request->email)->first();
                if ($existingUser) {
                    return response()->json([
                        'msg' => 'Email already exists',
                        'title' => 'Error'
                    ]);
                }

                $member_id = MemberRegistration::insertGetId($data);

                if ($member_id) {

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


                    $user_data = [
                        'name' => $request->name,
                        'user_name' => $userName,
                        'email' => $request->email,
                        'member_id' => $member_id,
                        'password' => Hash::make('12345678'),
                        'status' => 'active',
                        'user_type' => 'manager',
                        'ref_id' => Auth::user()->id,
                        'created_by' => Auth::user()->name,
                        'created_at' => now(),
                    ];

                    User::insert($user_data);

                    DB::commit();

                    return response()->json([
                        'msg' => 'Member Saved Successfully',
                        'title' => 'Success'
                    ]);
                } else {
                    DB::rollback();
                }
            } else {

                MemberRegistration::where('id', $id)->update($data);

                User::where('member_id', $id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'update_ref_id' => Auth::user()->id,
                    'updated_by' => Auth::user()->name,
                ]);

                DB::commit();

                return response()->json([
                    'msg' => 'Member Updated Successfully',
                    'title' => 'Success'
                ]);
            }
        } catch (\Exception $e) {

            DB::rollback();

            return response()->json([
                'msg' => 'Error: ' . $e->getMessage(),
                'title' => 'Error'
            ]);
        }
    }

    public function updateStatus(Request $request)
    {
        if (Auth::user()->user_type != 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $member = MemberRegistration::find($request->id);

        if (!$member) {
            return response()->json(['error' => 'Member not found'], 404);
        }

        $member->status = $request->status;
        $member->save();

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MemberRegistration  $memberRegistration
     * @return \Illuminate\Http\Response
     */
public function show($id)
{
    $user = DB::table('members')
        ->leftJoin('users', 'users.member_id', '=', 'members.id')
        ->where('members.id', $id)
        ->where('users.member_id', $id)
        ->first();

    // dd($user);

    return Template::loadView('admin/memberReg/member_show', compact('user'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MemberRegistration  $memberRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberRegistration $memberRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MemberRegistration  $memberRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberRegistration $memberRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MemberRegistration  $memberRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberRegistration $memberRegistration)
    {
        
    }
}
