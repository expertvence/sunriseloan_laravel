<?php

namespace App\Http\Controllers;

use App\Library\Template;
use App\Loan;
use App\MemberDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddDepositeController extends Controller
{
    public function index()
    {
        return Template::loadView('admin/deposite/deposite_form');
    }

    public function addDeposite(Request $request)
{
    DB::beginTransaction();

    try {

        if (!$request->member_id) {
            return response()->json([
                'msg' => 'Member not selected',
                'title' => 'Error'
            ]);
        }

        // 🔎 Check loan exists with complete status
        $loan = Loan::where('member_id', $request->member_id)
                    ->where('status', 'complete')
                    ->first();

        if (!$loan) {
            return response()->json([
                'msg' => 'No completed loan found for this member',
                'title' => 'Error'
            ]);
        }

        // ✅ Insert into member_deposits
        MemberDeposit::create([
            'member_id'       => $request->member_id,
            'member_name'     => $request->member_name,
            'description'     => $request->description,
            'deposit_date'    => $request->transection_date 
                                    ? date('Y-m-d', strtotime($request->transection_date)) 
                                    : date('Y-m-d'),
            'deposit_type'    => 'deposite',
            'deposite_amount' => $request->income_expence_amt,
            'status'          => 'active',
        ]);

        DB::commit();

        return response()->json([
            'msg' => 'Deposit Saved Successfully',
            'title' => 'Success'
        ]);

    } catch (\Throwable $th) {

        DB::rollback();

        return response()->json([
            'msg' => 'Deposit Not Saved',
            'title' => 'Error'
        ]);
    }
}

 public function depositeList()
    {
        $deposit = MemberDeposit::orderby('created_at', 'desc')->get();
        // dd($deposit);
        return Template::loadView('admin/deposite/deposite_list', ['deposit' => $deposit]);
        //  return Template::loadView('admin/income_expence/income_expence_list', ['income_expense' => $income_expense]);
    }

     public function depositEdit($id = "")
    {
        $deposit = MemberDeposit::where('id', $id)->first();
         return Template::loadView('admin/deposite/deposite_form', ['deposit' => $deposit]);
    }
}
