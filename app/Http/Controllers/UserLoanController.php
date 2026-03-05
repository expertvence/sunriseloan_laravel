<?php

namespace App\Http\Controllers;

use App\Library\Template;
use App\Loan;
use App\LoanCommit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoanController extends Controller
{
    public function index()
    {

        // Get the currently authenticated user
        $user = auth()->user();

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

        $interest = $loan->loan_amount * $loan->loan_category_id;
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
                'interestrate' => $interestrate

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


        return Template::loadView('admin/userdashboard', [
            'countLoan' => $countLoan,
            'rejectedLoan' => $rejectedLoan,
            'pendingLoan' => $pendingLoan,
            'totalLoanAmt' => $totalLoanAmt

        ]);
    }
}
