<?php

namespace App\Http\Controllers;

use App\Library\Template;
use App\Loan;
use App\Loancategory;
use App\LoanCommit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoanController extends Controller
{
    public function index()
    {

        // Get the currently authenticated user
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Retrieve all loans for the authenticated user
        $loans = Loan::where('user_id', $user->id)->where('status', 'complete')->get(); // Get loans where user_id matches


        // Pass the authenticated user, their loans, and loan commits to the view
        return Template::loadView('admin.userloan.user_loan_form', compact('user', 'loans'));
    }

    public function getLoanCommitments(Request $request)
    {
        // Get the loan ID from the request (loan_ide)
        $loanId = $request->input('loan_ide');

        // Check if a loan ID is provided
        if (!$loanId) {
            return response()->json(['success' => false, 'message' => 'No loan ID provided.']);
        }

        // Fetch loan details for the selected loan
        $loan = Loan::where('loan_ide', $loanId)->first();

        if (!$loan) {
            return response()->json(['success' => false, 'message' => 'Loan not found.']);
        }

        // Fetch loan commitments for the selected loan ID (loan_ide corresponds to loan_payment_id in LoanCommit)
        $loanCommits = LoanCommit::where('loan_payment_id', $loanId)->where('status', 'approved')->get();

        $loan_term = $loan->loan_term;
        $loan_amount = $loan->loan_amount;
        $interestrate = $loan->loan_category_id;
        // Calculate the total paid amount
        $totalPaidAmount = $loanCommits->sum('payment_amount');

        $loanCategory = Loancategory::where('id', $loan->loan_category_id)->first();
        $interestRate = $loanCategory ? $loanCategory->percentage : 0;
        $interest = $loan->loan_amount * $interestRate;
        $totalInterest = $interest / 100;
        $InterestWithamount = $loan->loan_amount + $totalInterest;
        $remainingAmount = $InterestWithamount - $totalPaidAmount;

        // Calculate the remaining amount (Loan Amount - Total Paid Amount)
        //$remainingAmount = $loan->loan_amount - $totalPaidAmount;

        // If there are commitments, return them along with the remaining amount
        if ($loanCommits->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'data' => $loanCommits,
                'remaining_amount' => $remainingAmount,
                'loanterm' => $loan_term,
                'loanamount' => $loan_amount,
                'interestwithloan' => $InterestWithamount,
                'interestrate' => $interestrate,
                'interestRateValue' => $interestRate,

            ]);
        }

        // If no commitments are found, return a message
        return response()->json(['success' => false, 'message' => 'No commitments found for this loan.']);
    }

    public function userDashboard()
    {
        // Get the currently authenticated user
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $countLoan = Loan::where('user_id', $user->id)->where('status', 'complete')->count();
        $rejectedLoan = Loan::where('user_id', $user->id)->where('status', 'rejected')->count();
        $pendingLoan = Loan::where('user_id', $user->id)->where('status', 'pending')->count();
        $totalLoanAmt = Loan::where('user_id', $user->id)->where('status', 'complete')->sum('loan_amount');

        $loan = Loan::where('user_id', $user->id)
            ->where('status', 'complete')
            ->first();
         $loanCategory = Loan::where('user_id', $user->id)
        ->where('status','complete')
        ->value('loan_category_id'); 
    
        $laonPercentage = Loancategory::where('id', $loanCategory)->value('percentage') ?? 0; 

        $loanInterest = $totalLoanAmt * ($laonPercentage / 100);

        $loanInterestWithAmount = $loanInterest + $totalLoanAmt;
        $committedLoan = LoanCommit::where('loan_payment_id', $loan->loan_ide)->where('status', 'approved')->sum('payment_amount');
        $remainingAmount = $totalLoanAmt - $committedLoan;

      $latestMonth = LoanCommit::where('loan_payment_id', $loan->loan_ide)
            ->where('status', 'approved')
            ->latest()
            ->first()
            ->payment_month ?? null;


        return Template::loadView('admin/userdashboard', [
            'countLoan' => $countLoan,
            'rejectedLoan' => $rejectedLoan,
            'pendingLoan' => $pendingLoan,
            'totalLoanAmt' => $totalLoanAmt,
            'remainingAmount' => $remainingAmount,
            'latestMonth' => $latestMonth,
            'loanInterest'=> $loanInterest,
            'loanInterestWithAmount'=> $loanInterestWithAmount

        ]);
    }

//     public function userDashboard()
// {
//     $user = Auth::user();
//     if (!$user) {
//         return redirect()->route('login');
//     }
    
//     // Loan statistics
//     $countLoan = Loan::where('user_id', $user->id)->where('status', 'complete')->count();
//     $rejectedLoan = Loan::where('user_id', $user->id)->where('status', 'rejected')->count();
//     $pendingLoan = Loan::where('user_id', $user->id)->where('status', 'pending')->count();
//     $totalLoanAmt = Loan::where('user_id', $user->id)->where('status', 'complete')->sum('loan_amount');
    
//     // Get completed loan
//     $loan = Loan::where('user_id', $user->id)
//         ->where('status', 'complete')
//         ->first();
    
//     // Initialize default values
//     $remainingAmount = $totalLoanAmt;
//     // $latestMonth = null;
//     $loanInterest = 0;
//     $committedLoan = 0;
    
//     if ($loan) {
//         // Get loan category percentage
//         $loanCategoryId = Loan::where('user_id', $user->id)
//             ->where('status', 'complete')
//             ->value('loan_category_id');
        
//         $loanPercentage = Loancategory::where('id', $loanCategoryId)->value('percentage') ?? 0;
//         $loanInterest = $totalLoanAmt * ($loanPercentage / 100);
        
//         // Get committed loan amount
//         $committedLoan = LoanCommit::where('loan_payment_id', $loan->loan_id) // Fixed: loan_ide -> loan_id
//             ->where('status', 'approved')
//             ->sum('payment_amount');
        
//         $remainingAmount = $totalLoanAmt - $committedLoan;
        
//         // Get latest payment month
//         $latestMonth = LoanCommit::where('loan_payment_id', $loan->loan_id)
//             ->where('status', 'approved')
//             ->latest()
//             ->value('payment_month');
//     }
    
//     return Template::loadView('admin/userdashboard', [
//         'countLoan' => $countLoan,
//         'rejectedLoan' => $rejectedLoan,
//         'pendingLoan' => $pendingLoan,
//         'totalLoanAmt' => $totalLoanAmt,
//         'remainingAmount' => $remainingAmount,
//         'latestMonth' => $latestMonth,
//         'loanInterest' => $loanInterest,
//         'committedLoan' => $committedLoan // Consider adding this to view
//     ]);
// }
}
