<!DOCTYPE html>
<html>

<head>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary: #0f172a;
            --secondary: #2563eb;
            --bg: #f1f5f9;
        }

        body {
            background: var(--bg);
            font-family: Inter;
            margin: 0;
        }

        .profile-wrapper {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 25px;
            padding: 35px;
        }

        .left-card,
        .right-card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .left-card {
            text-align: center;
        }

        .profile-avatar {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid var(--secondary);
            margin-bottom: 15px;
        }

        .user-name {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary);
        }

        .status-badge {
            display: inline-block;
            padding: 6px 18px;
            border-radius: 25px;
            font-size: 12px;
            margin-top: 10px;
            font-weight: 600;
        }

        .pending {
            background: #f59e0b;
            color: white;
        }

        .complete {
            background: #10b981;
            color: white;
        }

        .rejected {
            background: #ef4444;
            color: white;
        }

        .contact {
            margin-top: 20px;
            font-size: 14px;
            color: #475569;
            line-height: 1.8;
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--primary);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 18px;
        }

        .info-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 16px;
            border-radius: 12px;
            transition: .3s;
        }

        .info-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        }

        .info-card b {
            font-size: 13px;
            color: #64748b;
        }

        .info-card p {
            margin: 6px 0 0;
            font-weight: 600;
            color: #0f172a;
        }

        .loan-summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .summary-card {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            padding: 18px;
            border-radius: 12px;
        }

        .summary-card h4 {
            margin: 0;
            font-size: 14px;
        }

        .summary-card p {
            font-size: 20px;
            font-weight: 700;
            margin-top: 6px;
        }

        @media(max-width:900px) {
            .profile-wrapper {
                grid-template-columns: 1fr;
            }

            .loan-summary {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div class="profile-wrapper">

        <!-- LEFT PROFILE -->
        <div class="left-card">

            <img src="{{ !empty($loan->member_photo)
                ? asset('images/member_images/' . $loan->member_photo)
                : asset('images/member_images/avater2.jpg') }}"
                class="profile-avatar">

            <div class="user-name">{{ $loan->name }}</div>

            <div class="status-badge {{ $loan->status }}">
                {{ strtoupper($loan->status) }}
            </div>

            <div class="contact">
                <i class="fa fa-id-card"></i> {{ $loan->l_uId }} <br>
                <i class="fa fa-phone"></i> {{ $loan->mobile }} <br>
                <i class="fa fa-envelope"></i> {{ $loan->email }}
            </div>

        </div>

        <!-- RIGHT CONTENT -->
        <div class="right-card">

            <!-- LOAN SUMMARY -->
            <div class="loan-summary">

                <div class="summary-card">
                    <h4>Loan Amount</h4>
                    <p>৳{{ number_format($loan->loan_amount, 2) }}</p>
                </div>

                <div class="summary-card">
                    <h4>Deposit</h4>
                    <p>৳{{ number_format($loan->deposit ?? 0, 2) }}</p>
                </div>

                <div class="summary-card">
                    <h4>Loan Term</h4>
                    <p>{{ $loan->loan_term }}</p>
                </div>

            </div>

            <h3 class="section-title"><i class="fa fa-user"></i> User Information</h3>

            <div class="info-grid">

                <div class="info-card">
                    <b>User ID</b>
                    <p>{{ $loan->user_id }}</p>
                </div>

                <div class="info-card">
                    <b>Member ID</b>
                    <p>{{ $loan->Uid }}</p>
                </div>

                <div class="info-card">
                    <b>Monthly Income</b>
                    <p>৳{{ number_format($loan->monthly_income, 2) }}</p>
                </div>

            </div>

            <h3 class="section-title"><i class="fa fa-coins"></i> Loan Information</h3>

            <div class="info-grid">

                <div class="info-card">
                    <b>Loan ID</b>
                    <p>{{ $loan->loan_ide }}</p>
                </div>

                <div class="info-card">
                    <b>Loan Category</b>
                    <p>{{ $loan->loan_category_id }}</p>
                </div>

                <div class="info-card">
                    <b>Repayment Type</b>
                    <p>{{ ucfirst($loan->repayment_type) }}</p>
                </div>

                <div class="info-card">
                    <b>Duration</b>
                    <p>
                        @if ($loan->repayment_type == 'monthly')
                            {{ $loan->monthly_duration }} Month(s)
                        @else
                            {{ $loan->weekly_duration }} Week(s)
                        @endif
                    </p>
                </div>

                <div class="info-card">
                    <b>Payment Schedule</b>
                    <p>{{ $loan->payment_schedule }}</p>
                </div>

                <div class="info-card">
                    <b>Loan Purpose</b>
                    <p>{{ $loan->loan_purpose }}</p>
                </div>

                <div class="info-card">
                    <b>Created By</b>
                    <p>{{ $loan->created_by }}</p>
                </div>

                <div class="info-card">
                    <b>Created Date</b>
                    <p>{{ date('d M Y', strtotime($loan->created_at)) }}</p>
                </div>

            </div>

        </div>

    </div>

</body>

</html>
