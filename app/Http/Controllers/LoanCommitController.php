<?php

namespace App\Http\Controllers;

use App\Library\Template;
use App\Loan;
use App\LoanCommit;
use App\User;  // Corrected capitalization for User class
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoanCommitController extends Controller
{
    public function index()
    {
        return Template::loadView('admin/loan_commit/loan_commit');
    }

    /*  public function searchUser(Request $request)
    {
        $loanIde = $request->input('loan_ide');
        // Assuming you have a Loan model where loans are tied to users by loan_ide
        $users = User::whereHas('loans', function ($query) use ($loanIde) {
            $query->where('loan_ide', 'like', '%' . $loanIde . '%')
            ->where('status','complete');
        })->get();
    
        return response()->json($users);
    } */

    // Get loan data associated with the selected user
    public function getUserLoans(Request $request, $userId)
    {
        $loanIde = $request->input('loan_ide');  // Get loan_ide from the request
        $loans = Loan::where('user_id', $userId)
            ->where('loan_ide', $loanIde)
            ->where('status', 'complete') // Filter loans by loan_ide
            ->get();

        return response()->json($loans);
    }

    public function getLoansForUser($userId)
    {
        // Fetch the loans associated with the user_id
        $loans = Loan::where('user_id', $userId)
            ->where('status', 'complete')
            ->get(['loan_ide', 'l_uId']);  // Only return the loan_ide field

        // Return the loan_ide data in JSON format
        return response()->json($loans);
    }


    public function getLoanDetails($loanIde)
    {
        $loan = Loan::where('loan_ide', $loanIde)->first();

        if (!$loan) {
            return response()->json([
                'message' => 'Loan not found'
            ], 404);
        }

        // Get percentage
        $percentage = DB::table('loancategories')
            ->where('id', $loan->loan_category_id)
            ->value('percentage');

        // Attach percentage to loan object
        $loan->loan_category_percentage = (float) $percentage;

        return response()->json($loan);
    }

    public function insertLoanCommit(Request $request)
    {
        // dd($request->all());
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

            $user = Auth::user();
            // Insert data into LoanCommit table for each selected month
            foreach ($validated['from_month'] as $month) {
                LoanCommit::create([
                    'loan_payment_id' => $validated['loan_payment_id'],
                    'loan_commit_id' => $loanCommitId,
                    'payment_amount' => $validated['payment_amount'],
                    'loan_year' => $validated['loan_year'],
                    'payment_month' => $month,  
                     'total_savings' => 0,
                     'committed_user_id' => $user->id,
                     'committed_user_name' => $user->name,
                ]);
            }
            return response()->json([
                'msg' => 'Loan Commit(s) created successfully',
                'title' => 'Success'
            ], 201);  // HTTP Status 201 for successful creation

        } catch (\Exception $e) {

            DB::rollback();

            return response()->json([
                'msg' => 'Error: ' . $e->getMessage(),
                'title' => 'Error'
            ]);
        }
            
    }


    // public function getTotalPaid($loanIde)
    // {
    //     $loan=Loan::find($loanIde);
    //      if (!$loan) {
    //         // Loan does not exist
    //         return response()->json([
    //             'totalPaid' => 0,
    //             'remainingAmount' => 0,
    //             'message' => 'Loan not found'
    //         ], 404);
    //     }
    //     // Fetch total payments made for the given loan_ide
    //     $totalPaid = LoanCommit::where('loan_payment_id', $loanIde)->sum('payment_amount');
    //     //$lastPaymentData=LoanCommit::where('loan_payment_id',$loanIde)->get('created_at');
    //     $interest=$loan->loan_amount*$loan->loan_category_id;
    //     $totalInterest=$interest/100;
    //     $InterestWithamount=$loan->loan_amount+$totalInterest;
    //     $amounts=$InterestWithamount-$totalPaid;


    //     return response()->json([
    //         'totalPaid' => $totalPaid,
    //         'remainingAmount' => $amounts,
    //        // 'lastPaymentData'=>$lastPaymentData,
    //     ]);
    // }


    public function getTotalPaid($loanIde)
    {
        $loan = Loan::find($loanIde);

        if (!$loan) {
            return response()->json([
                'totalPaid' => 0,
                'remainingAmount' => 0,
                'lastPaymentData' => null,
                'message' => 'Loan not found'
            ], 404);
        }

        $totalPaid = LoanCommit::where('loan_payment_id', $loanIde)->sum('payment_amount');

        // Cast to float to avoid string multiplication error
        $loanAmount = (float) $loan->loan_amount;
        $loanCategory = DB::table('loancategories')
            ->where('id', $loan->loan_category_id)
            ->value('percentage');  // Assuming 'percentage' column exists

        $loanCategory = (float) $loanCategory;

        $interest = ($loanAmount * $loanCategory) / 100;
        $totalWithInterest = $loanAmount + $interest;
        $remainingAmount = $totalWithInterest - (float)$totalPaid;

        $lastPayment = LoanCommit::where('loan_payment_id', $loanIde)
            ->latest('created_at')
            ->first();
        $lastPaymentDate = $lastPayment ? $lastPayment->created_at->format('Y-m-d') : null;

        return response()->json([
            'totalPaid' => $totalPaid,
            'remainingAmount' => $remainingAmount,
            'lastPaymentData' => $lastPaymentDate,
            'loan_category_percentage' => (float)$loanCategory
        ]);
    }
}
