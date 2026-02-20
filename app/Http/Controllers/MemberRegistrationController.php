<?php

namespace App\Http\Controllers;

use App\Library\Template;
use App\MemberRegistration;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;
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
        
            // Prepare member data
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
                'user_type'=> 'user',
                'email' => $request->email,
                'no_of_share' => $request->number_of_share ,
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
                        'user_type' =>$request->user_type,
                        'member_id' => $member_id,
                        'password' => Hash::make('12345678'),  // Hash password securely
                    ];
        
                    $user = User::all();
                    $user = User::where('email', $request->email)->first();
                    if($user){
                        $message = ['msg' => 'Email already exist', 'title' => 'Error'];
                    }
                    // Insert the user data into User table
                    User::insert($user_data);  // Prefer create() if using fillable attributes
        
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
                        'user_type' => 'user',
                        'member_id' => $id,
                        'password' => Hash::make('12345678'),  // Hash password securely
                    ];
                    User::where('member_id',$id)->update($user_data);
                    DB::commit();  // Commit the transaction
                       $message = ['msg' => 'Member Updated Successfully', 'title' => 'Success'];
                } else {
                    DB::rollback();  // Rollback on error
                    $message = ['msg' => 'Error updating member', 'title' => 'Error'];
                }
            }
        } catch (\Exception $e) {
            DB::rollback();  // Rollback the transaction on any error
            $message = ['msg' => 'An error occurred: ' . $e->getMessage(), 'title' => 'Error'];
        }
        
        
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
