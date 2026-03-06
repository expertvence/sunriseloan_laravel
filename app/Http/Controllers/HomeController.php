<?php

namespace App\Http\Controllers;

use App\ExtraPayment;
use App\IncomeExpense;
use App\InstallmentPayment;
use App\Investment;
use App\Library\Template;
use App\Loan;
use App\Loancategory;
use App\LoanCommit;
use App\MemberDeposit;
use App\MemberRegistration;
use App\TotalAsset;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
// use Dompdf\Dompdf;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function landingPage()
    {
        // return Template::loadView('welcome');
        return view('welcome');
    }
    public function index()
    {

        // Sum of total assets and loans
        $totalAssets = TotalAsset::sum('assets') ?? 0;
        $loan = Loan::where('status', 'complete')->sum('loan_amount') ?? 0;

        // Calculate remaining amount
        $remainingAmount = $totalAssets - $loan;
        // dd($remainingAmount);
        //$removeAmount=$remainingAmount+$loan;
        // Warning message if remaining amount is negative
        $warningMessage = $remainingAmount < 0 ? 'Total loan exceeds total assets! Remove : ' . abs($remainingAmount)  : null;

        //Fetch completed loans and calculate total profit
        $loans = Loan::where('status', 'complete')->get();


        $totalProfit = Loan::where('loans.status', 'complete')
            ->join('loancategories', 'loans.loan_category_id', '=', 'loancategories.id')
            ->selectRaw('SUM(loans.loan_amount * (loancategories.percentage / 100)) as total_profit')
            ->value('total_profit') ?? 0;

        // $totalProfit = $completedLoans->reduce(function ($carry, $loan) {
        //     $loanCategory = $loan->loan_category_id ?? 0; // Default to 0 if null
        //     return $carry + ($loan->loan_amount * ($loanCategory / 100));
        // }, 0);


        //Exact Capital
        $comitedAmount = LoanCommit::sum('payment_amount');
        $totalExpence = IncomeExpense::where('type', 'Expense')->sum('income_expence');

        $totalServicesCharge = IncomeExpense::where('type', 'Income')->sum('income_expence');
        //dd($totalServicesCharge);
        $exactAssetsWithprofitandwithoutloan = $remainingAmount + $comitedAmount + $totalServicesCharge - $totalExpence;
        //dd($exactAssetsWithprofitandwithoutloan);
        // Count total users
        $totalUser = User::count();


        // dd($totalExpence);
        // Return the admin view
        return Template::loadView('admin.index', compact(
            'totalAssets',
            'loan',
            'remainingAmount',
            'totalProfit',
            'totalUser',
            'warningMessage',
            'exactAssetsWithprofitandwithoutloan',
            'totalExpence',
            'totalServicesCharge'
        ));
    }

    public function test()
    {
        return Template::loadView('admin/test');
    }
    public function adminPanel()
    {
        $totalDeposit = MemberDeposit::where('deposit_type', 'deposite')->sum('deposite_amount');
        $totalWithdraw = MemberDeposit::where('deposit_type', 'relesed')->sum('deposite_amount');

        $totalBalance = $totalDeposit - $totalWithdraw;


        // Sum of total assets and loans
        $totalAssets = TotalAsset::sum('assets') ?? 0;
        $loan = Loan::where('status', 'complete')->sum('loan_amount') ?? 0;

        // Calculate remaining amount
        $remainingAmount = $totalAssets - $loan;
        // dd($remainingAmount);
        //$removeAmount=$remainingAmount+$loan;
        // Warning message if remaining amount is negative
        $warningMessage = $remainingAmount < 0 ? 'Total loan exceeds total assets! Remove : ' . abs($remainingAmount)  : null;

        // Fetch completed loans and calculate total profit
        // $completedLoans = Loan::where('status', 'complete')->get();
        // $totalProfit = $completedLoans->reduce(function ($carry, $loan) {
        //     $loanCategory = $loan->loan_category_id ?? 0; // Default to 0 if null
        //     return $carry + ($loan->loan_amount * ($loanCategory / 100));
        // }, 0);
        $totalProfit = Loan::where('loans.status', 'complete')
            ->join('loancategories', 'loans.loan_category_id', '=', 'loancategories.id')
            ->selectRaw('SUM(loans.loan_amount * (loancategories.percentage / 100)) as total_profit')
            ->value('total_profit') ?? 0;

        //Exact Capital
        $comitedAmount = LoanCommit::sum('payment_amount');
        $totalExpence = IncomeExpense::where('type', 'Expense')->sum('income_expence');

        $totalServicesCharge = IncomeExpense::where('type', 'Income')->sum('income_expence');
        //dd($totalServicesCharge);
        $exactAssetsWithprofitandwithoutloan = $remainingAmount + $comitedAmount + $totalServicesCharge - $totalExpence;

        $activeUser = DB::table('users')
            ->join('members', 'users.member_id', '=', 'members.id')
            ->where('users.user_type', 'user')
            ->where('users.status', 'active')
            ->where('members.status', 'active')
            ->count();

        $totalUser = User::where('user_type', 'user')->count();
        $totalManager = User::where('user_type', 'manager')->count();
        $activeManger = User::where('user_type', 'manager')->where('status', 'active')->count();

        return Template::loadView('admin.index', compact(
            'totalAssets',
            'loan',
            'remainingAmount',
            'totalProfit',
            'totalUser',
            'activeUser',
            'totalManager',
            'activeManger',
            'warningMessage',
            'exactAssetsWithprofitandwithoutloan',
            'totalExpence',
            'totalServicesCharge',
            'totalDeposit',
            'totalWithdraw',
            'totalBalance'
        ));
    }

    public function memRegistration()
    {
        return Template::loadView('admin/memberReg/register');
    }
    public function memRegistrationForm($id = "")
    {

        $data = MemberRegistration::find($id);

        return Template::loadView('admin/memberReg/reg_create_form', ['data' => $data]);
    }


    public function installmentPayment()
    {
        $payment_data = [];

        // dd(  $payment_list);
        return Template::loadView('admin/payment/installment_payment', ['payment_data' => $payment_data]);
    }
    public function investment_system()
    {
        $invenstment_data = [];
        // dd(  $payment_list);
        return Template::loadView('admin/payment/investment_system', ['invenstment_data' => $invenstment_data]);
    }
    public function investment_edit($id = "")
    {
        $invenstment_data = Investment::where('id', $id)->first();

        return Template::loadView('admin/payment/investment_system_form', ['invenstment_data' => $invenstment_data]);
    }
    public function incomeExpence()
    {
        $invenstment_data = [];


        return Template::loadView('admin/income_expence/income_expence', ['invenstment_data' => $invenstment_data]);
        //  return Template::loadView('admin/income_expence/income_expence', ['invenstment_data' => $invenstment_data]);
    }
    public function incomeExpenceEdit($id = "")
    {
        $income_expence_data = IncomeExpense::where('id', $id)->first();
        return Template::loadView('admin/income_expence/income_expence_form', ['income_expence_data' => $income_expence_data]);
    }
    public function incomeExpence_store(Request $request)
    {
        try {
            $id = $request->id;
            $data = [
                'date' => $request->transection_date != "" ? date('Y-m-d', strtotime($request->transection_date)) : '',
                'income_expence' => $request->income_expence_amt,
                'description' => $request->description,
                'type' => $request->type,
                'entry_by' => Auth::id(),
                'created_at' => date('Y-m-d'),
            ];

            if ($id == "") {
                $data['created_at'] = date('Y-m-d');
                IncomeExpense::insert($data);
            } else {
                $data['updated_at'] = date('Y-m-d');
                IncomeExpense::where('id', $id)->update($data);
            }
            DB::commit();
            $message = ['msg' => ' Saved Successfully ', 'title' => 'Success'];
        } catch (\Throwable $th) {
            DB::rollback();
            $message = ['msg' => 'Do not save', 'title' => 'Error'];
        }
        return response()->json($message);
    }

    public function incomeExpenceList()
    {
        $income_expense = IncomeExpense::orderby('created_at', 'desc')->get();
        // dd($payment_list);
        return Template::loadView('admin/income_expence/income_expence_list', ['income_expense' => $income_expense]);
        //  return Template::loadView('admin/income_expence/income_expence_list', ['income_expense' => $income_expense]);
    }
    public function paymentLIst()
    {
        $investment_list = InstallmentPayment::orderby('created_at', 'desc')->get();
        // dd($payment_list);
        return Template::loadView('admin/payment/installment_payment_list', ['payment_list' => $investment_list]);
    }
    public function investment_system_list()
    {
        $investment_list = Investment::orderby('created_at', 'desc')->get();
        // dd($payment_list);
        return Template::loadView('admin/payment/investment_list', ['payment_list' => $investment_list]);
    }
    //  public function memRegistrationForm($id ="")
    // {

    //     $data=MemberRegistration::find($id);

    //      return Template::loadView('admin/memberReg/reg_create_form',['data'=> $data]);
    // }

    public function paymentStore(Request $request)
    {

        $request->validate([
            // 'member_id_fk' => 'required',
            'from_month' => 'required',
            'year' => 'required',
        ]);
        // try {
        $total_paid_month = $request->no_of_month;
        $total_paid_amount = $request->payable_amt;
        $member_id = $request->member_id;
        $id = $request->id;
        $invoice_id = InstallmentPayment::select('invoice_id')->latest('id')->first();
        $previous_payment = InstallmentPayment::get();
        $val_m_y = [];
        if (!empty($previous_payment)) {
            foreach ($previous_payment as $key => $value) {
                $val_m_y[] = $value->member_id_fk . '_' . $value->from_month . '_' . $value->year;
            }
        }

        // dd($val_m_y);
        $member_info = MemberRegistration::select('Uid', 'name')->find($member_id);
        $invoice_no = '1';
        $invoice_code = 'INV-001';
        if (!empty($invoice_id)) {
            $invoice_no =  ($invoice_id->invoice_id + 1);
            $invoice_code = 'INV-00' . $invoice_no;
        }

        for ($i = 0; $i < count($request->from_month); $i++) {
            if (!empty($val_m_y)) {
                foreach ($val_m_y as $key => $value) {
                    $expl = explode('_',  $value);
                    // dd($request->from_month[$i] ,$expl[0] ,  $expl[1] , $request->year);
                    if ($member_id == $expl[0] && $request->from_month[$i] == $expl[1] && $request->year == $expl[2]) {
                        DB::rollback();
                        $message = ['msg' => 'You Have Alredy Paid "' . $request->from_month[$i] . '-' . $request->year . '"', 'title' => 'Error'];
                        return response()->json($message);
                        return;
                    }
                }
            }


            $data = [
                'member_id_fk'      =>  $member_id, //$request->member_id,
                'invoice_id'        =>  $invoice_no,
                'invoice_code'        => $invoice_code,
                'member_code_no'    =>  $member_info->Uid,
                'member_name'          =>  $member_info->name,
                'from_month'        => $request->from_month[$i],
                'year'              => $request->year,
                'no_of_share'       => $request->no_of_share,
                'share_amount'      => $request->share_amt,
                'is_publish'        => 1,
                // 'created_at'        => 1,
            ];

            if ($id == "") {
                InstallmentPayment::create($data);
            } else {
                InstallmentPayment::where('id', $id)->update($data);
            }
        }

        if ($request->extra_payment_year != "" && $request->extra_payment_amt != "") {
            $data2 = [
                'invoice_no_fk'         =>  $invoice_no,
                'member_id_fk'          =>  $member_id,
                'member_code_no'        =>  $member_info->Uid,
                'member_name'           =>  $member_info->name,
                'year'                  => $request->extra_payment_year,
                'amount'                  => $request->extra_payment_amt,
                'is_publish'            => 1,
            ];
            if ($id == "") {
                ExtraPayment::insert($data2);
            } else {
                ExtraPayment::where('id', $id)->update($data2);
            }
        }

        // dd( $data);
        DB::commit();
        $message = ['msg' => ' Saved Successfully ', 'title' => 'Success'];
        // } catch (\Throwable $th) {
        //     DB::rollback();
        //     $message = ['msg' => 'Do not paid', 'title' => 'Error'];
        // }
       

        return response()->json($message);
    }
    public function investment_store(Request $request)
    {

        try {
            $id = $request->id;
            $inversment_info = Investment::select('id')->orderby('id', 'desc')->first();

            if ($inversment_info != null) {
                $uid = 'invest-00' . (intval($inversment_info->id) + 1);
            } else {
                $uid = 'invest-001';
            }

            $data = [
                'uid' => $id == '' ? $uid : $request->uid,
                'investment_to' => $request->investment_to,
                'fathers_mane' => $request->fathers_name,
                'mothers_mane' => $request->mothers_name,
                'mobile' => $request->mobile_no,
                'age' => $request->age != "" ? date('Y-m-d', strtotime($request->age)) : '',
                'religion' => $request->religion,
                'gender' => $request->gender,
                'email' => $request->email,
                'nid_birth_certificate' => $request->nid_no,
                'gurdian_phone' => $request->gurdian_phone_no,
                'Present_address' => $request->present_addr,
                'permanent_address' => $request->permanent_addr,
                'invest_amount' => $request->Investment_amount,
                'profit_amount' => $request->profit_amount,
                'start_date' => $request->investment_start_date != null ? date('Y-m-d', strtotime($request->investment_start_date)) : '',
                'return_date' => $request->investment_return_date != null ? date('Y-m-d', strtotime($request->investment_return_date)) : '',
                'profit_polocy' => $request->profit_polocy,
                'reference_name' => $request->refer_name,
                'reference_address' => $request->refer_address,
                'reference_phone' => $request->refered_mobile,
                'relation' => $request->refer_relation,
                'note' => $request->note,
                'is_publish' => $request->active,
            ];

            if ($id == "") {
                Investment::insert($data);
            } else {
                Investment::where('id', $id)->update($data);
            }
            // dd( $data);
            DB::commit();
            $message = ['msg' => ' Saved Successfully ', 'title' => 'Success'];
        } catch (\Throwable $th) {
            DB::rollback();
            $message = ['msg' => 'Do not paid', 'title' => 'Error'];
        }

        return response()->json($message);
    }


    public function memberList()
    {
        // $data = MemberRegistration::get();
        $data = DB::table('members')
            ->join('users', 'members.id', '=', 'users.member_id')
            ->where('users.user_type', 'user')
            ->select('members.*', 'users.user_type')
            ->get();

        // dd($data);
        return Template::loadView('admin/memberReg/member_list', ['data' => $data]);
    }
    public function memberProfile($id)
    {
        $user = User::find($id);
        return Template::loadView('admin/memberReg/member_profile', ['user' => $user]);
    }


    public function memberAutocompleteSearch(Request $request)
    {
        // dd($request->all());
        $query = $request->search_data;

        // $filterResult = DB::table('members')->select('members.*', 'users.id as user_id')->leftJoin('users', 'users.member_id', '=', 'members.id')->whereRaw(DB::raw(" upper(members.name) LIKE '%$query%'"))->get();
        $filterResult = DB::table('members')
            ->select('members.*', 'users.id as user_id')
            ->leftJoin('users', 'users.member_id', '=', 'members.id')
            ->whereRaw("UPPER(members.name) LIKE '%$query%' 
                OR UPPER(members.uid) LIKE '%$query%'")
            ->get();
        $member_data = [];
        if (!empty($filterResult)) {
            foreach ($filterResult as $patient) {
                $member_data[] = array(
                    'id' => $patient->id,
                    'user_id' => $patient->user_id,
                    'member_id' => $patient->id,
                    'member_code' => $patient->Uid,
                    'share_no' => $patient->no_of_share,
                    'share_amt' => $patient->share_amount,
                    'name' => $patient->name,
                    'mobile' => $patient->mobile,
                );
            }
        }
        return $member_data;
        //   return response()->json($filterResult);
    }

    public function paymentPdf(Request $request)
    {
        PDF::setOptions(['isPhpEnabled', 'true']);
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->getDomPDF()->set_option('isHtml5ParserEnabled', true);
        $member_info = MemberRegistration::find($request->member_id);

        $payment_list = InstallmentPayment::where('member_id_fk', $member_info->id)->orderby('created_at', 'asc')->get();
        //  $extrapayment=ExtraPayment::where('member_id_fk',$member_info->id)->get();


        $pdf = PDF::loadView('admin/payment/installment_payment_list_pdf', ['payment_list' => $payment_list, 'member_info' => $member_info/*  'extrapayment'=>$extrapayment */]);
        return $pdf->stream('pdf_file.pdf');
        // ->setPaper('a5', 'portrait');
    }
}
