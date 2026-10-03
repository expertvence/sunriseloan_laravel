<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;  // Corrected capitalization for User class
use App\Loan;
use App\Library\Template;
use App\LoanCommit;
use DB;

class LoanCommitController extends Controller
{

    public function index()
    {
        return Template::loadView('employee/loan_commit/loan_commit');
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
                     ->where('status','complete') // Filter loans by loan_ide
                     ->get();

        return response()->json($loans);
    }

    public function getLoansForUser($userId)
{
    // Fetch the loans associated with the user_id
    $loans = Loan::where('user_id', $userId)
    ->where('status','complete')
    ->pluck('loan_ide');  // Only return the loan_ide field

    // Return the loan_ide data in JSON format
    return response()->json($loans);
}


public function getLoanDetails($loanIde)
{
    $loan=Loan::where('loan_ide',$loanIde)->first();
    if (!$loan) { return response()->json(['message'=>'Loan not found'],404); }
    $loan->loan_category_percentage=(float) DB::table('loancategories')->where('id',$loan->loan_category_id)->value('percentage');
    return response()->json($loan);
}

public function insertLoanCommit(Request $request)
{
    $data=$request->validate(['loan_payment_id'=>'required|exists:loans,loan_ide','payment_amount'=>'required|numeric|min:0.01','loan_year'=>'required|integer','from_month'=>'required|array|min:1','from_month.*'=>'required|string','from_week'=>'nullable|array','from_week.*'=>'nullable|integer|min:1|max:5']);
    $loan=Loan::where('loan_ide',$data['loan_payment_id'])->firstOrFail(); $user=\Illuminate\Support\Facades\Auth::user(); $months=array_unique($data['from_month']); $selected=$data['from_week']??[]; $created=0;
        $remainingAmount = \App\LoanCommitSchedule::summary($loan)['remainingAmount'];
        if ($remainingAmount <= 0) {
            return response()->json(['message' => 'The loan is already fully paid.', 'error' => true], 400);
        }
    DB::beginTransaction();
    try {
        foreach($months as $month) {
            if($loan->repayment_type==='weekly') {
                $weeks=\App\LoanCommitSchedule::nextWeeks($loan->loan_ide,$data['loan_year'],$month,$selected);
                if(!$weeks){DB::rollBack();return response()->json(['message'=>"All five weekly payments for {$month} {$data['loan_year']} are already committed.",'error'=>true],422);}
                foreach($weeks as $week){LoanCommit::create(['loan_payment_id'=>$loan->loan_ide,'loan_commit_id'=>\App\LoanCommitSchedule::nextCommitId(),'payment_amount'=>$data['payment_amount'],'loan_year'=>$data['loan_year'],'payment_month'=>$month,'payment_week'=>$week,'total_savings'=>0,'committed_user_id'=>$user->id,'committed_user_name'=>$user->name,'emp_name'=>$user->name,'manager_id'=>$user->id]);$created++;}
            } else {
                $duplicate=LoanCommit::where('loan_payment_id',$loan->loan_ide)->where('loan_year',$data['loan_year'])->where('payment_month',$month)->exists();
                if($duplicate){DB::rollBack();return response()->json(['message'=>"A payment for {$month} {$data['loan_year']} is already committed.",'error'=>true],422);}
                LoanCommit::create(['loan_payment_id'=>$loan->loan_ide,'loan_commit_id'=>\App\LoanCommitSchedule::nextCommitId(),'payment_amount'=>$data['payment_amount'],'loan_year'=>$data['loan_year'],'payment_month'=>$month,'payment_week'=>null,'total_savings'=>0,'committed_user_id'=>$user->id,'committed_user_name'=>$user->name,'emp_name'=>$user->name,'manager_id'=>$user->id]);$created++;
            }
        }
        DB::commit(); return response()->json(['message'=>'Loan commit(s) created successfully','created_count'=>$created],201);
    } catch (\Exception $e) { DB::rollBack(); return response()->json(['message'=>'Unable to save loan commits.','error'=>true],500); }
}




public function getTotalPaid($loanIde)
{
    $loan=Loan::where('loan_ide',$loanIde)->first();
    if(!$loan){return response()->json(['totalPaid'=>0,'remainingAmount'=>0,'lastPaymentMonth'=>null,'totalWeeks'=>0],404);}
    return response()->json(\App\LoanCommitSchedule::summary($loan));
}
}