<!DOCTYPE html>
<html>
<head>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
:root{
    --primary:#0a2540;
    --secondary:#1f6feb;
    --light:#f3f6fb;
}

body{
    background:linear-gradient(135deg,#eef3f9,#f8fbff);
    font-family:Inter;
    margin:0;
}

.profile-wrapper{
    display:grid;
    grid-template-columns:280px 1fr;
    gap:25px;
    padding:30px;
}

.left-card,.right-card{
    background:white;
    padding:25px;
    border-radius:20px;
    box-shadow:0 15px 40px rgba(0,0,0,0.08);
}

.profile-avatar{
    width:120px;
    height:120px;
    border-radius:50%;
    object-fit:cover;
    border:4px solid var(--primary);
}

.status-badge{
    display:inline-block;
    padding:6px 16px;
    border-radius:20px;
    font-size:13px;
    margin-top:10px;
}

.pending{background:#f59e0b;color:white;}
.complete{background:#10b981;color:white;}
.rejected{background:#ef4444;color:white;}

.section-title{
    font-size:18px;
    font-weight:700;
    border-left:5px solid var(--primary);
    padding-left:12px;
    margin:25px 0 15px;
}

.info-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:15px;
}

.info-card{
    background:#f8fbff;
    padding:15px;
    border-radius:14px;
    border:1px solid #e5e7eb;
    transition:.3s;
}

.info-card:hover{
    transform:translateY(-5px);
    box-shadow:0 8px 20px rgba(0,0,0,0.06);
}

@media(max-width:900px){
    .profile-wrapper{grid-template-columns:1fr;}
}
</style>

</head>
<body>

<div class="profile-wrapper">

    <!-- LEFT USER CARD -->
    <div class="left-card text-center">

        <img src="{{ !empty($loan->member_photo)
            ? asset('images/member_images/'.$loan->member_photo)
            : asset('images/member_images/avater2.jpg') }}"
            class="profile-avatar">

        <h3>{{ $loan->name }}</h3>

        <div class="status-badge {{ $loan->status }}">
            {{ strtoupper($loan->status) }}
        </div>

        <p style="margin-top:15px;font-size:14px">
            <i class="fa fa-id-card"></i> {{ $loan->l_uId }} <br>
            <i class="fa fa-phone"></i> {{ $loan->mobile }} <br>
            <i class="fa fa-envelope"></i> {{ $loan->email }}
        </p>

    </div>

    <!-- RIGHT DETAILS -->
    <div class="right-card">

        <h3><i class="fa fa-user"></i> User Information</h3>

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
                <p>৳{{ number_format($loan->monthly_income,2) }}</p>
            </div>
        </div>

        <!-- LOAN INFORMATION -->
        <div class="section-title">Loan Information</div>

        <div class="info-grid">

            <div class="info-card">
                <b>Loan ID</b>
                <p>{{ $loan->loan_ide }}</p>
            </div>

            <div class="info-card">
                <b>Loan Amount</b>
                <p>৳{{ number_format($loan->loan_amount,2) }}</p>
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
                <b>Loan Term</b>
                <p>{{ $loan->loan_term }}</p>
            </div>

            <div class="info-card">
                <b>Duration</b>
                <p>
                    @if($loan->repayment_type == 'monthly')
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
                <b>Deposit</b>
                <p>৳{{ number_format($loan->deposit ?? 0,2) }}</p>
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
