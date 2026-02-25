<?php

namespace App\Http\Controllers;

use App\Library\Template;
use App\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LoanRequestController extends Controller
{
    public function loanRequest()
    {
        return Template::loadView('admin/loan/loan_request');
    }

     public function store(Request $request)
    {
        dd($request->all());    
        // try {
             DB::beginTransaction();
            // Validate the request
            $validator = Validator::make($request->all(), [
                'user_id'           => 'required|exists:users,id',
                'loan_amount'       => 'required|numeric|min:1',
                'loan_purpose'      => 'required|string|max:1000',
                'loan_category_id'  => 'required|exists:loancategories,id',
                'loan_term'         => 'required|integer|min:1|max:60',
                'monthly_income'    => 'required|numeric|min:0',
                'other_documents'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // max 2MB
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // Handle file upload if exists
            $filePath = null;
            if ($request->hasFile('other_documents')) {
                $filePath = $request->file('other_documents')->store('loan_documents', 'public');
            }

            // Create Loan
            $loan = Loan::create([
                'user_id'           => $request->user_id,
                'loan_amount'       => $request->loan_amount,
                'loan_purpose'      => $request->loan_purpose,
                'loan_category_id'  => $request->loan_category_id,
                'loan_term'         => $request->loan_term,
                'monthly_income'    => $request->monthly_income,
                'other_documents'   => $filePath,
                'status'            => 'pending',
            ]);

           
                return response()->json([
                    'msg' => 'Loan Request Updated Successfully',
                    'title' => 'Success'
                ]);
        // } catch (\Exception $e) {

        //     DB::rollback();

        //     return response()->json([
        //         'msg' => 'Error: ' . $e->getMessage(),
        //         'title' => 'Error'
        //     ]);
        // }
    }
}

