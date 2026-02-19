<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\InstallmentPayment;
use App\InstallmentLateFine;
use DB;

class CalculateDueMonths extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */


    /**
     * The console command description.
     *
     * @var string
     */
    protected $signature = 'calculate:due-months';
    protected $description = 'Calculate due months and fines at the end of the month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currentMonth = Carbon::now()->format('m'); // Current month in `m` format (01-12)
        $currentYear = Carbon::now()->year; // Current year
        $membersLastPayments = DB::table('installment_payment as ip')
            ->select(
                'ip.member_id_fk',
                'ip.member_code_no',
                'ip.member_name',
                'ip.share_amount',
                'ip.no_of_share',
                DB::raw(
                    '
                    MAX(
                        CONCAT(
                            CASE 
                                WHEN ip.from_month = "January" THEN "01"
                                WHEN ip.from_month = "February" THEN "02"
                                WHEN ip.from_month = "March" THEN "03"
                                WHEN ip.from_month = "April" THEN "04"
                                WHEN ip.from_month = "May" THEN "05"
                                WHEN ip.from_month = "June" THEN "06"
                                WHEN ip.from_month = "July" THEN "07"
                                WHEN ip.from_month = "August" THEN "08"
                                WHEN ip.from_month = "September" THEN "09"
                                WHEN ip.from_month = "October" THEN "10"
                                WHEN ip.from_month = "November" THEN "11"
                                WHEN ip.from_month = "December" THEN "12"
                            END, 
                            "-", ip.year
                        )
                    ) as payment_date'
                )
            )
            ->groupBy(
                'ip.member_id_fk',
                'ip.member_code_no',
                'ip.member_name',
                'ip.share_amount',
                'ip.no_of_share'
            )
            ->orderBy('payment_date', 'desc')
            ->get();
        $missingMonthsAllMembers = [];
        // Now let's calculate the missing months

        foreach ($membersLastPayments as $member) {
            // Convert the payment_date to Carbon date
            $lastPaymentDate = Carbon::createFromFormat('m-Y', $member->payment_date); // Corrected format: 'm-Y'

            $missingMonths = []; // Hold missing months for the current member

            // Loop through months between the last payment and the current date
            while ($lastPaymentDate->lte(Carbon::now()->subMonth())) {  // Subtract 1 month from current date
                $lastPaymentDate->addMonth(); // Move to the next month

                // Check if the month is still less than the current month and year (excluding current month)
                // if ($lastPaymentDate->month < $currentMonth || ($lastPaymentDate->month == $currentMonth && $lastPaymentDate->year < $currentYear)) {
                    // Store the missing month data for the current member
                    $missingMonths[] = [
                        'member_id_fk' => $member->member_id_fk,
                        'member_code_no' => $member->member_code_no,
                        'member_name' => $member->member_name,
                        'share_amount' => $member->share_amount,
                        'no_of_share' => $member->no_of_share,
                        'from_month' => $lastPaymentDate->format('F'), // Get full month name
                        'year' => $lastPaymentDate->year,
                    ];
                // }
            }

            // If there are missing months for this member, add them to the all members array
            if (!empty($missingMonths)) {
                $missingMonthsAllMembers = array_merge($missingMonthsAllMembers, $missingMonths);
            }
        }
        // dd($membersLastPayments, $missingMonthsAllMembers);
        foreach ($missingMonthsAllMembers as $record) {
            $finePercent = 10.0; // Example fine percentage
            $fineAmount = (($record['share_amount'] * $record['no_of_share']) * $finePercent) / 100;

            // Insert record into installment_late_fines
            InstallmentLateFine::create([
                'member_id_fk' => $record['member_id_fk'],
                'from_month' => $record['from_month'],
                'year' => $record['year'],
                'share_amount' => $record['share_amount'],
                'total_amount' => $record['share_amount'] * $record['no_of_share'],
                'fine_percent' => $finePercent,
                'fine_amount' => $fineAmount,
                'payment_ind' => 0, // Mark as unpaid fine
            ]);
        }

        echo 'Due months and fines calculated successfully.';
    }
}
