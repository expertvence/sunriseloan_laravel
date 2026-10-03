<?php
namespace App;
use App\LoanCommit;
class LoanCommitSchedule
{
    public static function committedWeeks($loanId, $year, $month)
    {
        return LoanCommit::where('loan_payment_id', $loanId)->where('loan_year', $year)->where('payment_month', $month)->pluck('payment_week')->flatMap(function ($value) { return array_filter(array_map('intval', explode(',', (string) $value))); })->unique()->sort()->values()->all();
    }
    public static function nextWeeks($loanId, $year, $month, array $selectedWeeks)
    {
        $selectedWeeks = array_values(array_unique(array_filter(array_map('intval', $selectedWeeks)))); $wanted = max(1, count($selectedWeeks));
        $count = LoanCommit::where('loan_payment_id', $loanId)->where('loan_year', $year)->where('payment_month', $month)->count(); $used = array_fill_keys(self::committedWeeks($loanId, $year, $month), true); $result = [];
        for ($i = 0; $i < $wanted; $i++) { $next = null; for ($week = 1; $week <= 5; $week++) { if (!isset($used[$week])) { $next = $week; break; } } if ($next === null || $count + count($result) >= 5) break; $result[] = $next; $used[$next] = true; } return $result;
    }
    public static function nextCommitId()
    {
        $number = ((int) LoanCommit::max(\DB::raw('CAST(SUBSTRING(loan_commit_id, 4) AS UNSIGNED)'))) + 1; do { $id = 'LCN' . str_pad($number++, 3, '0', STR_PAD_LEFT); } while (LoanCommit::where('loan_commit_id', $id)->exists()); return $id;
    }
    public static function summary($loan)
    {
        $paid = (float) LoanCommit::where('loan_payment_id', $loan->loan_ide)->sum('payment_amount'); $percentage = (float) \DB::table('loancategories')->where('id', $loan->loan_category_id)->value('percentage'); $due = (float) $loan->loan_amount * (1 + $percentage / 100);
        $last = LoanCommit::where('loan_payment_id', $loan->loan_ide)->latest('created_at')->first(); $count = $last ? LoanCommit::where('loan_payment_id', $loan->loan_ide)->where('loan_year', $last->loan_year)->where('payment_month', $last->payment_month)->count() : 0;
        return ['totalPaid' => $paid, 'remainingAmount' => max(0, $due - $paid), 'lastPaymentMonth' => $last ? $last->payment_month . ' ' . $last->loan_year : null, 'totalWeeks' => $count, 'lastPaymentCount' => $count, 'loan_category_percentage' => $percentage];
    }
}