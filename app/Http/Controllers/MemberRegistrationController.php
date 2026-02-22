<?php

namespace App\Http\Controllers;

use App\Library\Template;
use App\MemberRegistration;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class MemberRegistrationController extends Controller
{
    public function __construct(MemberRegistration $MemberRegistration)
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    try {

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

                $user_data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'member_id' => $member_id,
                    'password' => Hash::make('12345678'),
                    'status' => 'active'
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
    public function show(MemberRegistration $memberRegistration)
    {
        //
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
        //
    }
}
