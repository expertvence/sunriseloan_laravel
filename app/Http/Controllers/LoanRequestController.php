<?php

namespace App\Http\Controllers;

use App\Library\Template;
use App\Loan;
use App\MemberRegistration;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoanRequestController extends Controller
{
    public function loanRequest()
    {
        return Template::loadView('admin/loan/loan_request');
    }

    public function loanRequestList()
    {
        $data = Loan::all();
        // dd($data);
        return Template::loadView('admin/loan/loan_list', ['data' => $data]);
    }


    function generateUniqueUid()
    {
        do {
            $letters = strtoupper(Str::random(3));
            $numbers = rand(100, 999);
            $uid = $letters . $numbers;
        } while (DB::table('loans')->where('l_uId', $uid)->exists());

        return $uid;
    }

    public function store(Request $request)
    {
        // dd($request->all());

        try {

            DB::beginTransaction();

            // ✅ Validation
            $request->validate([
                'member_id'        => 'required|exists:members,id',
                'loan_amount'      => 'required|numeric|min:1',
                'loan_purpose'     => 'required|string|max:1000',
                'loan_category_id' => 'required|',
                // 'loan_term'        => 'required|integer|min:1|max:60',
                'monthly_income'   => 'required|numeric|min:0',
                'monthly_duration' => 'nullable|integer|min:1|max:60',
                'weekly_duration'  => 'nullable|integer|min:1|max:60',
                'repayment_type'   => 'required|string|in:monthly,weekly',
                'other_documents'  => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            ]);

            $memberRegistration = MemberRegistration::where('id', $request->member_id)->first();

            if (!$memberRegistration || $memberRegistration->status !== 'active') {
                DB::rollback();
                return response()->json([
                    'msg' => 'Loan request denied: Member registration is not active.',
                    'title' => 'Error'
                ], 400);
            }
            // ✅ Get user using member_id (same system logic)
            $user = User::where('member_id', $request->member_id)->first();

            if (!$user) {
                DB::rollback();
                return response()->json([
                    'msg' => 'User not found for selected member',
                    'title' => 'Error'
                ]);
            }

            // ✅ File Upload
            $filePath = null;
            if ($request->hasFile('other_documents')) {
                $uploadedFile = $request->file('other_documents');
                $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
                $destinationPath = public_path('images/loan_documents');
                $uploadedFile->move($destinationPath, $fileName);
                $filePath = $fileName;
            }

            // if ($request->loan_term == 30) {
            //     $payment_schedule = 12;
            // } else {
            //     $payment_schedule = 52;
            // }

            if ($request->repayment_type == 'monthly') {

    if (!$request->monthly_duration) {
        return response()->json([
            'msg' => 'Please select monthly duration',
            'title' => 'Error'
        ], 400);
    }

    $loanTerm = $request->monthly_duration;

} else {

    if (!$request->weekly_duration) {
        return response()->json([
            'msg' => 'Please select weekly duration',
            'title' => 'Error'
        ], 400);
    }

    $loanTerm = $request->weekly_duration;
}

            $loan_uId = $this->generateUniqueUid();
            $data = [
                'user_id'         => $user->id,
                'l_uId'           => $loan_uId,
                'member_id'       => $request->member_id,
                'loan_amount'     => $request->loan_amount,
                'loan_purpose'    => $request->loan_purpose,
                'loan_category_id' => $request->loan_category_id,
                'loan_term'       => $loanTerm,
                'payment_schedule' => $loanTerm,
                'repayment_type'   => $request->repayment_type,
                'monthly_duration' => $request->repayment_type == 'monthly' ? $request->monthly_duration : null,
                'weekly_duration'  => $request->repayment_type == 'weekly' ? $request->weekly_duration : null,
                'monthly_income'  => $request->monthly_income,
                'other_documents' => $filePath,
                'status'          => 'pending',
                'created_by'      => Auth::user()->name,
                'created_at'      => now(),
                'creator_id'      => Auth::user()->id
            ];

            Loan::insert($data);

            DB::commit();

            return response()->json([
                'msg' => 'Loan Request Submitted Successfully',
                'title' => 'Success'
            ]);
        } catch (\Exception $e) {

            DB::rollback();

            return response()->json([
                'msg' => 'Error: ' . $e->getMessage(),
                'title' => 'Error'
            ]);
        }
    }
}
