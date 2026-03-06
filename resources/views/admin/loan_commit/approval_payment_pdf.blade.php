<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            /* margin: 100px 25px; */
            size: a4 portrait;
        }

        body {
            margin-top: 1cm;
            font-family: Monospace, sans-serif;
            /* margin-left: 0.5cm;
            margin-right: 0.5cm;
            margin-bottom: 2cm; */
        }

        footer {
            position: fixed;
            bottom: -50px;
            height: 50px;
            z-index: 999999999;
            /* text-align: center; */
            border-top: 1px solid gray;
            font-size: 11px;
            width: 100%;
        }

        header {
            position: fixed;
            top: -25px;
            /* height: 80px; */
            text-align: center;
            /* line-height: 35px; */
            z-index: 999999999;
            font-size: 11px;
            width: 100%;
        }

        .list_table {
            border-collapse: collapse;
            font-family: sans-serif;
            font-size: 11px;
        }

        .list_table th,
        .list_table td {
            padding: 5px;
            font-family: Monospace, sans-serif;

        }

        .list_table th {
            background-color: rgb(204, 196, 196);

        }

        .list_table td {
            border-top: 1px dotted black;

        }

        /* tr.last {
            border-bottom: 1px solid black;
        } */
    </style>
</head>

<body>
    <header>
        <table style="width: 100%; border:1px solid black;border-radius: 5px;padding:10px !important" class="">
            <tr style="">
                <td style="">
                    <strong>Name </strong>
                </td>
                <td style="">
                    : {{ !empty($member_info->name) ? $member_info->name : '' }}
                </td>
                <td style="">
                    <strong>Loan ID </strong>
                </td>
                <td style="">
                    : {{ !empty($loan_info->l_uId) ? $loan_info->l_uId : '' }}
                </td>
            </tr>
            <tr style="">
                <td style="">
                    <strong>Loan Amount </strong>
                </td>
                <td style="">
                    : {{ !empty($loan_info->loan_amount) ? $loan_info->loan_amount : '' }}
                </td>
                <td style="">
                    <strong>Rate </strong>
                </td>
                <td style="">
                    : {{ !empty($percentage) ? rtrim(rtrim($percentage, '0'), '.') . '%' : '' }}
                </td>

            </tr>
        </table>
    </header>
    <footer>
        <table style="width: 100%">
            <tr>
                <td>
                    Printed Date : {{ date('d-m-Y h:i a') }}
                </td>
                <td style="text-align:right">
                    Powered By : SunriseLoan
                </td>
            </tr>
        </table>
    </footer>

    <main>
        <p style="text-align:center"> <strong> Statement</strong></p>

        <table class="list_table" style="width: 100%;">
            <thead>
                <tr>
                    <th class="text-center">SL#</th>
                    <th class="text-center">Payment Date & Time</th>
                    <th class="text-center">Invoice No</th>
                    <!-- <th class="text-center">Member Code</th> -->
                    <!-- <th>Member Name</th> -->
                    <th> Month</th>
                    <th>Year</th>
                    <th class="text-center">Entry By</th>
                    <th class="text-right"> Payment Amt.</th>
                    <th class="text-right"> Total Amt.</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total_amt = $payment_list->sum('payment_amount');
                @endphp
                @if (!empty($payment_list))

                    @foreach ($payment_list as $value)
                        @php

                        @endphp
                        <tr>
                            <td style="text-align:center">
                                {{ $loop->iteration }}
                            </td>
                            <td style="text-align:center">
                                {{ $value->created_at != '' ? date('d/m/Y h:i a', strtotime($value->created_at)) : '' }}
                            </td>
                            <td style="text-align:center">{{ $value->loan_commit_id }}</td>
                            <!-- <td style="text-align:center">{{ $value->member_code_no }}</td> -->
                            <!-- <td>{{ $value->member_name }}</td> -->
                            <td>{{ $value->payment_month }}</td>
                            <td>{{ $value->loan_year }}</td>
                            <td style="text-align:center">{{ $value->emp_name }}</td>
                            <td style="text-align:right">{{ $value->payment_amount }}</td>
                            <td style="text-align:right">{{ $value->payment_amount }}</td>

                        </tr>
                    @endforeach

                @endif
            </tbody>
            <tfoot>
                <tr>
                <tr>
                    <td style="text-align:right;  font-family: Monospace, sans-serif;" colspan="7"><strong> Total
                            =</strong></td>
                    <td style="text-align:right;  font-family: Monospace, sans-serif;"><strong>
                            {{ $total_amt }}</strong></td>
                </tr>
                </tr>
            </tfoot>
        </table>
    </main>
</body>

</html>
