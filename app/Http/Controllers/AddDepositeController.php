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

        $id = $request->id;

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

        $data = [
            'member_id'       => $request->member_id,
            'member_name'     => $request->member_name,
            'description'     => $request->description,
            'deposit_date'    => $request->transection_date
                ? date('Y-m-d', strtotime($request->transection_date))
                : date('Y-m-d'),
            'deposit_type'    => $request->type,
            'deposite_amount' => $request->income_expence_amt,
            'status'          => 'active',
        ];

        // ✅ ADD
        if ($id == "") {

            $data['created_at'] = now();
            MemberDeposit::insert($data);

            $msg = 'Deposit Saved Successfully';

        } 
        // ✅ EDIT
        else {

            $data['updated_at'] = now();
            MemberDeposit::where('id', $id)->update($data);

            $msg = 'Deposit Updated Successfully';
        }

        DB::commit();

        return response()->json([
            'msg' => $msg,
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
        $deposit_data = MemberDeposit::where('id', $id)->first();
        return Template::loadView('admin/deposite/deposite_form', ['deposit_data' => $deposit_data]);
    }
}
