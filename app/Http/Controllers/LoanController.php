<?php

namespace App\Http\Controllers;

use App\Library\Template;
use App\Loan;
use App\LoanCommit;
use App\TotalAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoanController extends Controller
{
    public function loanRequest()
    {
        return Template::loadView('admin/loan/loan_request');
    }

    // public function loan_store(Request $request)
    // {
    //     // Validate the incoming request
    //     $request->validate([
    //         'loan_amount' => 'required|numeric',
    //         'loan_category_id' => 'required|string', // Ensures loan category is an integer
    //         'loan_purpose' => 'required|string',
    //         'loan_term' => 'required|integer', // Assuming it's an integer
    //         'payment_schedule' => 'required|string',
    //         'monthly_income' => 'required|numeric',
    //         'other_documents' => 'nullable|file',
    //     ]);
    //     if ($request->hasFile('other_documents')) {
    //         // Get the uploaded file
    //         $uploadedFile = $request->file('other_documents');

    //         // Generate a unique file name
    //         $fileName = time() . '_' . $uploadedFile->getClientOriginalName();

    //         // Define the destination path (public/images/other_documents)
    //         $destinationPath = public_path('images/other_documents');

    //         // Move the uploaded file to the destination folder
    //         $uploadedFile->move($destinationPath, $fileName);

    //         // Store the file name in your data array or model
    //         // Assign the file path directly
    //     }

    //     try {
    //         // Create the loan record
    //         $loan = new Loan();
    //         $loan->user_id = auth()->id();  // Assuming the user is logged in
    //         $loan->loan_amount = $request->loan_amount;
    //         $loan->loan_category_id = $request->loan_category_id;
    //         $loan->loan_purpose = $request->loan_purpose;
    //         $loan->loan_term = $request->loan_term;
    //         $loan->payment_schedule = $request->payment_schedule;
    //         $loan->monthly_income = $request->monthly_income;
    //         $loan->other_documents = 'images/other_documents/' . $fileName;
    //         // Save the loan record
    //         $loan->save();


    //         return response()->json(['msg' => 'Loan saved successfully!']);
    //     } catch (\Exception $e) {
    //         // Log the exception
    //         \Log::error('Error saving loan application: ' . $e->getMessage());

    //         // Rollback if any error occurs
    //         DB::rollback();

    //         // Return a detailed error message
    //         return response()->json(['msg' => 'An error occurred while saving your loan application.', 'error' => $e->getMessage()]);
    //     }
    // }

    public function loan_store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'loan_payment_id' => 'required|exists:loans,loan_ide',
            'payment_amount' => 'required|numeric',
            'loan_year' => 'required|integer',
            'from_month' => 'required|array',
        ]);

        try {
            $loan = Loan::where('loan_ide', $validated['loan_payment_id'])->first();
            // If the loan does not exist, return an error
            if (!$loan) {
                return response()->json([
                    'message' => 'Loan not found.',
                    'error' => 'Loan ID does not exist in the system.',
                ], 404);  // Return 404 if loan is not found
            }

            // Payment amount * number of months
            $totalPaid = LoanCommit::where('loan_payment_id', $validated['loan_payment_id'])
                ->sum('payment_amount');
            //calculate total amount with intetest
            $interest = $loan->loan_amount * $loan->loan_category_id;
            //calculate total amount with intrest
            $totalAmount = $loan->loan_amount + $interest;
            // Check if the total payment matches the loan amount
            if ($totalPaid >= $totalAmount) {
                return response()->json([
                    'message' => 'Total payments have already reached or exceeded the loan amount.',
                    'total_paid' => $totalPaid,
                    'loan_amount' => $loan->loan_amount,
                ], 400);  // Return 400 if the total payments exceed or match the loan amount
            }

            // Loop through the selected months and check if there is any duplicate month-year combination
            foreach ($validated['from_month'] as $month) {
                // Check if this combination already exists
                $existingCommit = LoanCommit::where('loan_payment_id', $validated['loan_payment_id'])
                    ->where('loan_year', $validated['loan_year'])
                    ->where('payment_month', $month)
                    ->exists();

                if ($existingCommit) {
                    // If duplicate found, return a response indicating the duplicate month
                    return response()->json([
                        'message' => 'Duplicate entry for this loan ID, year, and month.',
                        'duplicate_month' => $month,  // Return the duplicate month
                    ], 400);  // 400 Bad Request
                }
            }

            // Generate a unique loan_commit_id (e.g., LCN001, LCN002)
            $lastCommit = LoanCommit::orderBy('created_at', 'desc')->first();
            $newCommitNumber = $lastCommit ? (int) substr($lastCommit->loan_commit_id, 3) + 1 : 1;
            $loanCommitId = 'LCN' . str_pad($newCommitNumber, 3, '0', STR_PAD_LEFT);

            // Ensure the loan_commit_id is unique
            while (LoanCommit::where('loan_commit_id', $loanCommitId)->exists()) {
                $newCommitNumber++;  // Increment the commit number
                $loanCommitId = 'LCN' . str_pad($newCommitNumber, 3, '0', STR_PAD_LEFT);  // Rebuild the loan_commit_id
            }

            // Insert data into LoanCommit table for each selected month
            foreach ($validated['from_month'] as $month) {
                LoanCommit::create([
                    'loan_payment_id' => $validated['loan_payment_id'],
                    'loan_commit_id' => $loanCommitId,
                    'payment_amount' => $validated['payment_amount'],
                    'loan_year' => $validated['loan_year'],
                    'payment_month' => $month,  // Store each month individually
                ]);
            }

            /*  DB::commit();  // Commit the transaction
        $message = ['msg' => ' Saved Successfully', 'title' => 'Success']; */
            return response()->json([
                'message' => 'Loan Commit(s) created successfully',
            ], 201);  // HTTP Status 201 for successful creation

        } catch (\Exception $e) {
            // Catch any error and return it as a response
            /* DB::rollback();  // Rollback on error
        $message = ['msg' => 'Error saving ', 'title' => 'Error']; */
        }
        /*   return response()->json($message); */
    }


    public function showLoan_list()
    {
        $data = Loan::with('user')->orderBy('created_at', 'desc')->get();
        return Template::loadView('admin/loan/loan_list', compact('data'));
    }

    public function updateDeposit(Request $request)
{
    //  dd($request->all());
    $request->validate([
        'deposit' => 'required|numeric|min:0'
    ]);

    $loan = Loan::where('loan_ide', $request->id)->first();

    if(!$loan){
        return response()->json([
            'success' => false,
            'message' => 'Loan not found'
        ]);
    }

    $loan->deposit = $request->deposit;
    $loan->save();

    return response()->json([
        'success' => true,
        'deposit' => $loan->deposit
    ]);
}


    /* Edit */

    public function loanEdit()
    {
        $data = Loan::all();
        return Template::loadView('admin/loan/loan_request_form', compact('data'));
    }
    /* status change */

     public function updateStatus(Request $request)
    {
<<<<<<< HEAD
        //dd($request->all());
=======
>>>>>>> 5e5667e0c6862e3a926cf645ff55d7af2e8340a8
        $status = $request->status;
        $newStatus = $request->status;

        $request->validate([
            'loan_ide' => 'required|exists:loans,loan_ide',
            'status' => 'required|in:pending,complete,rejected',
        ]);
        $loan = Loan::find($request->loan_ide);
        if ($newStatus == 'complete') {
            $totalLoan = Loan::sum('loan_amount');

            $totalAsset = TotalAsset::sum('assets');

            // if($totalLoan > $totalAsset)
            // {
            //     return response()->json(['error'=>false,'message'=>'Total loan exceeds total assets! Remove : '.abs($totalLoan-$totalAsset)]);
            // }
        }
        $loan->status = $status;
        $loan->save();
        return response()->json(['success' => true]);
    }

    public function ApprovalLoanList(){
        $data = LoanCommit::all();
        return Template::loadView('admin/loan_commit/approval_loan_list', compact('data'));
    }

    // public function UpdateApprovalLoanStatus(Request $request)
    // {

    //     $status = $request->status;
    //     $newStatus = $request->status;

    //     $request->validate([
    //         'id' => 'required|exists:loan_commits,id',
    //         'status' => 'required|in:pending,complete,rejected',
    //     ]);
    //     $loanCommit = LoanCommit::find($request->id);
    //     if ($newStatus == 'complete') {
    //         $totalLoan = LoanCommit::sum('payment_amount');

    //         $totalAsset = TotalAsset::sum('assets');

    //         // if($totalLoan > $totalAsset)
    //         // {
    //         //     return response()->json(['error'=>false,'message'=>'Total loan exceeds total assets! Remove : '.abs($totalLoan-$totalAsset)]);
    //         // }
    //     }
    //     $loanCommit->status = $status;
    //     $loanCommit->save();
    //     return response()->json(['success' => true]);
    // }  
    
    public function UpdateApprovalLoanStatus(Request $request)
{
    // dd($request->all());

    $request->validate([
        'loan_ide' => 'required|exists:loan_commits,id',
        'status' => 'required|in:pending,approved,rejected',
    ]);

    $loanCommit = LoanCommit::find($request->loan_ide);

    if (!$loanCommit) {
        return response()->json([
            'success' => false,
            'message' => 'Data not found'
        ]);
    }

    $loanCommit->status = $request->status;
    $loanCommit->save();

    return response()->json([
        'success' => true
    ]);
}
}
