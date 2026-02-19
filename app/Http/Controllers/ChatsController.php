<?php

namespace App\Http\Controllers;

use App\Library\Template;
use App\Events\MessageSent;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\MemberRegistration;
use App\InstallmentPayment;
use App\ExtraPayment;
use App\Investment;
use App\IncomeExpense;
use DB;
use PDF;

class ChatsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $no_of_member = MemberRegistration::where('is_publish', 1)->count();
        $total_amts = InstallmentPayment::select(DB::raw('sum(share_amount)  as total_amt'), 'no_of_share')->groupBy('no_of_share')->where('is_publish', 1)->get();
        $total_amt = 0;
        if (!empty($total_amts)) {
            foreach ($total_amts as $key => $value) {
                $total_amt += $value->total_amt * $value->no_of_share;
            }
        }
        // dd($no_of_member);
        $total_dues = InstallmentPayment::select('member_id_fk')->groupBy('member_id_fk')->where('is_publish', 1)->get();
        $total_due = [];
        $date_diff = [];
        if (!empty($total_dues)) {
            foreach ($total_dues as $key => $value) {
                $total_due = InstallmentPayment::select('member_id_fk', 'from_month', 'year')->where('member_id_fk', $value->member_id_fk)->where('is_publish', 1)->orderBy('id', 'desc')->first();
            }
        }

        return Template::loadView('admin/index', ['no_of_member' => $no_of_member, 'total_amt' => $total_amt]);
  }

  /**
   * Fetch all messages
   *
   * @return Message
   */
  public function fetchMessages()
  {
    return Message::with('user')->get();
  }

  /**
   * Persist message to database
   *
   * @param  Request $request
   * @return Response
   */
  public function sendMessage(Request $request)
  {
    $user = Auth::user();


    $message = $user->messages()->create([
      'message' => $request->input('message')
    ]);

    broadcast(new MessageSent($user, $message))->toOthers();

    return ['status' => 'Message Sent!'];
  }
}
