<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Library\Template;
use App\Loan;
use App\Loancategory;
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

    public function getRepaymentType($userId)
    {
        // Get the latest loan of this user
        $loan = Loan::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$loan) {
            return response()->json([
                'repayment_type' => 'monthly', // default
                'remaining_weeks' => 4,
                'committed_weeks' => []
            ]);
        }

        $repaymentType = $loan->repayment_type;

        // For weekly, calculate committed weeks
        $committedWeeks = [];
        $remainingWeeks = 4; // default
        if ($repaymentType == 'weekly') {
            $committedWeeks = LoanCommit::where('loan_payment_id', $loan->loan_ide)
                ->pluck('payment_week') // assuming payment_week stored as comma separated "1,2"
                ->toArray();

            // Convert comma-separated strings to array of numbers
            $committedWeeks = array_map(function ($w) {
                return (int)$w;
            }, explode(',', implode(',', $committedWeeks)));

            // Determine remaining weeks
            $remainingWeeks = max(0, 4 - count($committedWeeks));
        }

        return response()->json([
            'repayment_type' => $repaymentType,
            'remaining_weeks' => 4,
            'committed_weeks' => $committedWeeks
        ]);
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

    // public function insertLoanCommit(Request $request)
    // {
    //     // dd($request->all());
    //     // Validate the incoming request data
    //     $validated = $request->validate([
    //         'loan_payment_id' => 'required|exists:loans,loan_ide',
    //         'payment_amount' => 'required|numeric',
    //         'loan_year' => 'required|integer',
    //         'from_month' => 'required|array',
    //         'repayment_type'  => 'required|in:monthly,weekly',

    //         'from_week'       => 'nullable|array',
    //     ]);
    //     if ($validated['repayment_type'] === 'weekly') {
    //         foreach ($validated['from_week'] as $week) {
    //             if ($week > 4) {
    //                 return response()->json([
    //                     'message' => 'Cannot select more than 4 weeks per month',
    //                     'error' => true
    //                 ], 400);
    //             }
    //         }
    //     }

    //     try {
    //         $loan = Loan::where('loan_ide', $validated['loan_payment_id'])->first();
    //         // If the loan does not exist, return an error
    //         if (!$loan) {
    //             return response()->json([
    //                 'message' => 'Loan not found.',
    //                 'error' => 'Loan ID does not exist in the system.',
    //             ], 404);  // Return 404 if loan is not found
    //         }

    //         // Payment amount * number of months
    //         $totalPaid = LoanCommit::where('loan_payment_id', $validated['loan_payment_id'])
    //             ->sum('payment_amount');
    //         $loan = Loan::where('loan_ide', $validated['loan_payment_id'])->first();
    //         $category = Loancategory::find($loan->loan_category_id); // get the category
    //         $interest = $loan->loan_amount * ($category->percentage / 100); // interest as decimal
    //         $totalAmount = $loan->loan_amount + $interest;

    //         // Check if the total payment matches the loan amount
    //         if ($totalPaid >= $totalAmount) {
    //             return response()->json([
    //                 'message' => 'Total payments have already reached or exceeded the loan amount.',
    //                 'total_paid' => $totalPaid,
    //                 'loan_amount' => $loan->loan_amount,
    //             ], 400);  // Return 400 if the total payments exceed or match the loan amount
    //         }

    //         // Loop through the selected months and check if there is any duplicate month-year combination
    //         $totalDepositForLoan = 0;
    //         foreach ($validated['from_month'] as $month) {
    //             // Check if this combination already exists
    //             $existingCommit = LoanCommit::where('loan_payment_id', $validated['loan_payment_id'])
    //                 ->where('loan_year', $validated['loan_year'])
    //                 ->where('payment_month', $month)
    //                 ->exists();

    //             if ($existingCommit) {
    //                 // If duplicate found, return a response indicating the duplicate month
    //                 return response()->json([
    //                     'message' => 'Duplicate entry for this loan ID, year, and month.',
    //                     'duplicate_month' => $month,  // Return the duplicate month
    //                 ], 400);  // 400 Bad Request
    //             }
    //         }

    //         // Generate a unique loan_commit_id (e.g., LCN001, LCN002)
    //         $lastCommit = LoanCommit::orderBy('created_at', 'desc')->first();
    //         $newCommitNumber = $lastCommit ? (int) substr($lastCommit->loan_commit_id, 3) + 1 : 1;
    //         $loanCommitId = 'LCN' . str_pad($newCommitNumber, 3, '0', STR_PAD_LEFT);

    //         // Ensure the loan_commit_id is unique
    //         while (LoanCommit::where('loan_commit_id', $loanCommitId)->exists()) {
    //             $newCommitNumber++;  // Increment the commit number
    //             $loanCommitId = 'LCN' . str_pad($newCommitNumber, 3, '0', STR_PAD_LEFT);  // Rebuild the loan_commit_id
    //         }

    //         $user = Auth::user();
    //         $withoutDeposit = (float) $validated['payment_amount'] - (float) $validated['deposit'];

    //         // Insert data into LoanCommit table for each selected month
    //         foreach ($validated['from_month'] as $month) {
    //             $commit = LoanCommit::create([
    //                 'loan_payment_id' => $validated['loan_payment_id'],
    //                 'loan_commit_id' => $loanCommitId,
    //                 'payment_amount' => $validated['payment_amount'],
    //                 'loan_year' => $validated['loan_year'],
    //                 'payment_month' => $month,
    //                 'total_savings' => 0,
    //                 'committed_user_id' => $user->id,
    //                 'committed_user_name' => $user->name,
    //                 'savings' => $validated['deposit'],
    //                 'without_deposit' => $withoutDeposit,
    //                 'emp_name' => $user->name,
    //                 'manager_id' => $user->id,
    //                 'committed_user_name' => $user->name,
    //                 'committed_user_id' => $user->id
    //             ]);

    //             $loanOwnerId = $loan->user_id; // use loan's user_id

    //             Deposit::updateOrCreate(
    //                 [
    //                     'loan_commit_id' => $commit->id, // link to this commit
    //                     'user_id' => $loanOwnerId
    //                 ],
    //                 [
    //                     'total_deposit' => $validated['deposit']
    //                 ]
    //             );

    //             $totalDepositForLoan += $validated['deposit'];
    //         }
    //         return response()->json([
    //             'msg' => 'Loan Commit(s) created successfully',
    //             'title' => 'Success'
    //         ], 201);  // HTTP Status 201 for successful creation

    //     } catch (\Exception $e) {

    //         DB::rollback();

    //         return response()->json([
    //             'msg' => 'Error: ' . $e->getMessage(),
    //             'title' => 'Error'
    //         ]);
    //     }
    // }

    // public function insertLoanCommit(Request $request)
    // {
    //     // Validate incoming request
    //     $validated = $request->validate([
    //         'loan_payment_id' => 'required|exists:loans,loan_ide',
    //         'payment_amount' => 'required|numeric',
    //         'loan_year' => 'required|integer',
    //         'from_month' => 'required|array',
    //         'repayment_type' => 'required|in:monthly,weekly',
    //         'from_week' => 'nullable|array',
    //     ]);

    //     try {
    //         // Get the loan
    //         $loan = Loan::where('loan_ide', $validated['loan_payment_id'])->firstOrFail();

    //         // Extra validation: weekly loans must have weeks selected
    //         if ($loan->repayment_type === 'weekly') {
    //             if (empty($validated['from_week']) || count($validated['from_week']) === 0) {
    //                 return response()->json([
    //                     'message' => 'You must select at least one week for weekly loans.',
    //                     'error' => true
    //                 ], 400);
    //             }

    //             foreach ($validated['from_week'] as $week) {
    //                 if ($week > 4 || $week < 1) {
    //                     return response()->json([
    //                         'message' => 'Invalid week selected. Weeks must be 1-4.',
    //                         'error' => true
    //                     ], 400);
    //                 }
    //             }
    //         }

    //         // Extra validation: monthly loans must have at least one month selected
    //         if ($loan->repayment_type === 'monthly') {
    //             if (empty($validated['from_month']) || count($validated['from_month']) === 0) {
    //                 return response()->json([
    //                     'message' => 'You must select at least one month for monthly loans.',
    //                     'error' => true
    //                 ], 400);
    //             }
    //         }

    //         // Get interest and total amount
    //         $category = Loancategory::find($loan->loan_category_id);
    //         $interest = $loan->loan_amount * ($category->percentage / 100);
    //         $totalAmount = $loan->loan_amount + $interest;

    //         // Check total paid
    //         $totalPaid = LoanCommit::where('loan_payment_id', $loan->loan_ide)
    //             ->sum('payment_amount');

    //         if ($totalPaid >= $totalAmount) {
    //             return response()->json([
    //                 'message' => 'Total payments have already reached or exceeded the loan amount.',
    //                 'total_paid' => $totalPaid,
    //                 'loan_amount' => $loan->loan_amount,
    //             ], 400);
    //         }

    //         $user = Auth::user();

    //         // Generate unique loan_commit_id
    //         $lastCommit = LoanCommit::orderBy('created_at', 'desc')->first();
    //         $newCommitNumber = $lastCommit ? (int) substr($lastCommit->loan_commit_id, 3) + 1 : 1;
    //         $loanCommitId = 'LCN' . str_pad($newCommitNumber, 3, '0', STR_PAD_LEFT);
    //         while (LoanCommit::where('loan_commit_id', $loanCommitId)->exists()) {
    //             $newCommitNumber++;
    //             $loanCommitId = 'LCN' . str_pad($newCommitNumber, 3, '0', STR_PAD_LEFT);
    //         }

    //         foreach ($validated['from_month'] as $month) {
    //             if ($loan->repayment_type === 'weekly') {
    //                 // --- Weekly loan validation ---
    //                 $existingWeeks = LoanCommit::where('loan_payment_id', $loan->loan_ide)
    //                     ->where('loan_year', $validated['loan_year'])
    //                     ->where('payment_month', $month)
    //                     ->pluck('payment_week')
    //                     ->toArray();

    //                 $existingWeeks = collect($existingWeeks)
    //                     ->map(fn($w) => explode(',', $w))
    //                     ->flatten()
    //                     ->map(fn($x) => (int)$x)
    //                     ->sort()
    //                     ->values()
    //                     ->toArray();

    //                 foreach ($validated['from_week'] as $week) {
    //                     if (in_array($week, $existingWeeks)) {
    //                         return response()->json([
    //                             'message' => "Week {$week} for {$month} is already committed.",
    //                             'error' => true
    //                         ], 400);
    //                     }

    //                     $nextWeek = count($existingWeeks) + 1;
    //                     if ($week != $nextWeek) {
    //                         return response()->json([
    //                             'message' => "Please select the next available week sequentially. Next week should be {$nextWeek}.",
    //                             'error' => true
    //                         ], 400);
    //                     }

    //                     $existingWeeks[] = $week;
    //                     sort($existingWeeks);
    //                 }

    //                 LoanCommit::create([
    //                     'loan_payment_id' => $loan->loan_ide,
    //                     'loan_commit_id' => $loanCommitId,
    //                     'payment_amount' => $validated['payment_amount'],
    //                     'loan_year' => $validated['loan_year'],
    //                     'payment_month' => $month,
    //                     'payment_week' => implode(',', $validated['from_week']),
    //                     'total_savings' => 0,
    //                     'committed_user_id' => $user->id,
    //                     'committed_user_name' => $user->name,
    //                     'emp_name' => $user->name,
    //                     'manager_id' => $user->id,
    //                 ]);

    //             } else {
    //                 // --- Monthly loan validation ---
    //                 $existingCommit = LoanCommit::where('loan_payment_id', $loan->loan_ide)
    //                     ->where('loan_year', $validated['loan_year'])
    //                     ->where('payment_month', $month)
    //                     ->exists();

    //                 if ($existingCommit) {
    //                     return response()->json([
    //                         'message' => "Duplicate entry for month {$month} and year {$validated['loan_year']}.",
    //                         'error' => true
    //                     ], 400);
    //                 }

    //                 LoanCommit::create([
    //                     'loan_payment_id' => $loan->loan_ide,
    //                     'loan_commit_id' => $loanCommitId,
    //                     'payment_amount' => $validated['payment_amount'],
    //                     'loan_year' => $validated['loan_year'],
    //                     'payment_month' => $month,
    //                     'payment_week' => null,
    //                     'total_savings' => 0,
    //                     'committed_user_id' => $user->id,
    //                     'committed_user_name' => $user->name,
    //                     'emp_name' => $user->name,
    //                     'manager_id' => $user->id,
    //                 ]);
    //             }
    //         }

    //         return response()->json([
    //             'msg' => 'Loan Commit(s) created successfully',
    //             'title' => 'Success'
    //         ], 201);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'msg' => 'Error: ' . $e->getMessage(),
    //             'title' => 'Error'
    //         ], 500);
    //     }
    // }

    public function insertLoanCommit(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'loan_payment_id' => 'required|exists:loans,loan_ide',
            'payment_amount'  => 'required|numeric',
            'loan_year'       => 'required|integer',
            'from_month'      => 'required|array',
            'repayment_type'  => 'required|in:monthly,weekly',
            'from_week'       => 'nullable|array',
        ]);

        try {
            $loan = Loan::where('loan_ide', $validated['loan_payment_id'])->firstOrFail();
            $user = Auth::user();

            // Fetch category and calculate total amount
            $category = Loancategory::find($loan->loan_category_id);
            $interest = $loan->loan_amount * ($category->percentage / 100);
            $totalAmount = $loan->loan_amount + $interest;

            // Check total paid
            $totalPaid = LoanCommit::where('loan_payment_id', $loan->loan_ide)
                ->sum('payment_amount');

            if ($totalPaid >= $totalAmount) {
                return response()->json([
                    'message' => 'Loan already fully paid.',
                    'total_paid' => $totalPaid,
                    'loan_amount' => $loan->loan_amount,
                ], 400);
            }

            // --- Weekly extra validation ---
            if ($loan->repayment_type === 'weekly') {
                if (empty($validated['from_week'])) {
                    return response()->json([
                        'message' => 'Select at least one week for weekly loans.',
                        'error' => true
                    ], 400);
                }

                foreach ($validated['from_week'] as $week) {
                    if ($week < 1 || $week > 4) {
                        return response()->json([
                            'message' => "Invalid week selected: {$week}",
                            'error' => true
                        ], 400);
                    }
                }
            }

            // --- Monthly extra validation ---
            if ($loan->repayment_type === 'monthly' && empty($validated['from_month'])) {
                return response()->json([
                    'message' => 'Select at least one month for monthly loans.',
                    'error' => true
                ], 400);
            }

            // Generate starting number for loan_commit_id
            $maxCommit = LoanCommit::max(DB::raw('CAST(SUBSTRING(loan_commit_id,4) AS UNSIGNED)'));
            $commitNumber = $maxCommit ? $maxCommit : 0;

            foreach ($validated['from_month'] as $month) {
                if ($loan->repayment_type === 'weekly') {
                    $existingWeeks = LoanCommit::where('loan_payment_id', $loan->loan_ide)
                        ->where('loan_year', $validated['loan_year'])
                        ->where('payment_month', $month)
                        ->pluck('payment_week')
                        ->toArray();

                    $existingWeeks = collect($existingWeeks)
                        ->map(fn($w) => explode(',', $w))
                        ->flatten()
                        ->map(fn($x) => (int)$x)
                        ->sort()
                        ->values()
                        ->toArray();

                    foreach ($validated['from_week'] as $week) {
                        if (in_array($week, $existingWeeks)) {
                            return response()->json([
                                'message' => "Week {$week} for {$month} is already committed.",
                                'error' => true
                            ], 400);
                        }

                        $nextWeek = count($existingWeeks) + 1;
                        if ($week != $nextWeek) {
                            return response()->json([
                                'message' => "Select the next sequential week. Next week: {$nextWeek}",
                                'error' => true
                            ], 400);
                        }

                        $existingWeeks[] = $week;
                        sort($existingWeeks);

                        // --- Generate unique ID ---
                        $commitNumber++;
                        $loanCommitId = 'LCN' . str_pad($commitNumber, 3, '0', STR_PAD_LEFT);

                        LoanCommit::create([
                            'loan_payment_id' => $loan->loan_ide,
                            'loan_commit_id'  => $loanCommitId,
                            'payment_amount'  => $validated['payment_amount'],
                            'loan_year'       => $validated['loan_year'],
                            'payment_month'   => $month,
                            'payment_week'    => $week,
                            'total_savings'   => 0,
                            'committed_user_id'   => $user->id,
                            'committed_user_name' => $user->name,
                            'emp_name'            => $user->name,
                            'manager_id'          => $user->id,
                        ]);
                    }
                } else {
                    // Monthly commits
                    $existingCommit = LoanCommit::where('loan_payment_id', $loan->loan_ide)
                        ->where('loan_year', $validated['loan_year'])
                        ->where('payment_month', $month)
                        ->exists();

                    if ($existingCommit) {
                        return response()->json([
                            'message' => "Duplicate entry for month {$month} and year {$validated['loan_year']}.",
                            'error' => true
                        ], 400);
                    }

                    $commitNumber++;
                    $loanCommitId = 'LCN' . str_pad($commitNumber, 3, '0', STR_PAD_LEFT);

                    LoanCommit::create([
                        'loan_payment_id' => $loan->loan_ide,
                        'loan_commit_id'  => $loanCommitId,
                        'payment_amount'  => $validated['payment_amount'],
                        'loan_year'       => $validated['loan_year'],
                        'payment_month'   => $month,
                        'payment_week'    => null,
                        'total_savings'   => 0,
                        'committed_user_id'   => $user->id,
                        'committed_user_name' => $user->name,
                        'emp_name'            => $user->name,
                        'manager_id'          => $user->id,
                    ]);
                }
            }

            return response()->json([
                'msg' => 'Loan commit(s) created successfully!',
                'title' => 'Success'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'msg'   => 'Error: ' . $e->getMessage(),
                'title' => 'Error'
            ], 500);
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
