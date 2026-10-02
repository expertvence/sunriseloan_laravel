<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Loan Requests | Sunrise</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { color-scheme: light; --ink: #173a3b; --muted: #68817f; --line: #d8e5e1; --surface: #fff; --canvas: #edf4f2; --accent: #087e72; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; background: linear-gradient(145deg, #f7faf9, var(--canvas)); color: var(--ink); font: 14px/1.5 'Segoe UI', sans-serif; }
        .page { width: min(1120px, calc(100% - 32px)); margin: 34px auto; }
        .topbar { display: flex; align-items: center; justify-content: space-between; gap: 16px; margin-bottom: 22px; }
        .brand { color: var(--ink); font-size: 13px; font-weight: 800; letter-spacing: .06em; text-transform: uppercase; }
        .top-actions { display: flex; gap: 8px; }
        .button { display: inline-flex; min-height: 38px; align-items: center; justify-content: center; gap: 8px; padding: 8px 13px; border: 1px solid var(--line); border-radius: 7px; background: var(--surface); color: var(--ink); font-size: 12px; font-weight: 650; text-decoration: none; }
        .button.primary { border-color: var(--accent); background: var(--accent); color: #fff; }
        .heading { margin-bottom: 18px; }
        .heading h1 { margin: 0; font-size: 25px; line-height: 1.25; }
        .heading p { margin: 5px 0 0; color: var(--muted); font-size: 13px; }
        .panel { overflow: hidden; border: 1px solid var(--line); border-radius: 10px; background: var(--surface); box-shadow: 0 12px 30px rgba(22, 65, 57, .07); }
        .panel-head { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 14px 17px; border-bottom: 1px solid var(--line); }
        .panel-head h2 { margin: 0; font-size: 14px; }
        .request-count { color: var(--muted); font-size: 12px; }
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { padding: 11px 14px; background: #f3f8f6; color: #5d7773; font-size: 10px; font-weight: 750; letter-spacing: .05em; text-transform: uppercase; white-space: nowrap; }
        td { padding: 13px 14px; border-top: 1px solid #edf2f0; font-size: 12px; vertical-align: middle; }
        tbody tr:hover { background: #f9fcfb; }
        .loan-code { color: #126c63; font-weight: 700; }
        .amount { font-weight: 700; white-space: nowrap; }
        .purpose { max-width: 260px; color: var(--muted); overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .status { display: inline-flex; padding: 4px 8px; border-radius: 20px; font-size: 10px; font-weight: 750; }
        .status.pending { background: #fff5df; color: #916312; }
        .status.complete { background: #e1f5ed; color: #167351; }
        .status.rejected { background: #fde9e9; color: #a63e45; }
        .empty { padding: 46px 20px; text-align: center; }
        .empty-icon { display: grid; width: 48px; height: 48px; margin: 0 auto 12px; place-items: center; border-radius: 14px; background: #e8f4f0; color: var(--accent); font-size: 18px; }
        .empty h3 { margin: 0; font-size: 15px; }
        .empty p { margin: 5px 0 16px; color: var(--muted); font-size: 12px; }
        body.dark-mode { color-scheme: dark; --ink: #e5f3f0; --muted: #a2bdb8; --line: #315452; --surface: #102e32; --canvas: #0b252b; --accent: #159985; background: linear-gradient(145deg, #0c282d, #102e32); }
        body.dark-mode th { background: #14383a; color: #aec9c3; }
        body.dark-mode td { border-color: #244447; }
        body.dark-mode tbody tr:hover { background: #15383a; }
        body.dark-mode .button:not(.primary) { background: #14383a; color: var(--ink); }
        body.dark-mode .empty-icon { background: #174540; }
        @media (max-width: 640px) {
            .page { width: min(100% - 20px, 1120px); margin: 14px auto; }
            .topbar { align-items: flex-start; flex-direction: column; }
            .top-actions { width: 100%; }
            .top-actions .button { flex: 1; }
            .heading h1 { font-size: 22px; }
            table { min-width: 700px; }
        }
    </style>
<style>
    .page { width:min(1480px,calc(100% - 40px)); margin:1.25rem auto; }
    .panel { border-color:#d5e4de; border-radius:10px; box-shadow:0 10px 28px rgba(26,72,58,.07); }
    .panel-head { background:linear-gradient(110deg,#e9f4ef,#f7faf8); border-color:#d5e4de; }
    th { background:#eaf4ef; color:#5a7771; }
    td { border-color:#edf1f4; color:#435269; }
    tbody tr:hover { background:#f8fbfa; }
    .button.primary { border-color:#147c6b; background:linear-gradient(105deg,#147c6b,#1c9a7b); }
    .loan-code { color:#147b69; }
    body.dark-mode { --ink:#e6f0ef; --muted:#a2b6b8; --line:#314a52; --surface:#10243a; --canvas:#07152b; --accent:#16816f; background:#07152b; }
    body.dark-mode .panel { border-color:var(--line); }
    body.dark-mode .panel-head { background:linear-gradient(110deg,#0b1d34,#10243a); border-color:var(--line); }
    body.dark-mode th { background:#1a3a3d; color:#b5c9c5; }
    body.dark-mode td { border-color:#263f43; color:#c5d4d4; }
    body.dark-mode tbody tr:hover { background:#18343a; }
    body.dark-mode .button:not(.primary) { border-color:#36505a; background:#10243a; color:#e6f0ef; }
</style>

</head>
<body>
    <main class="page">
        <div class="topbar">
            <div class="brand">Sunrise Loan</div>
            <nav class="top-actions" aria-label="Member navigation">
                <a class="button" href="{{ route('userDashboard') }}"><i class="fas fa-arrow-left"></i> Dashboard</a>
                <a class="button primary" href="{{ route('loan-request') }}"><i class="fas fa-plus"></i> New request</a>
            </nav>
        </div>

        <header class="heading">
            <h1>My Loan Requests</h1>
            <p>Review the status and details of your loan applications.</p>
        </header>

        <section class="panel" aria-labelledby="request-list-title">
            <div class="panel-head">
                <h2 id="request-list-title">Request history</h2>
                <span class="request-count">{{ $loans->count() }} {{ \Illuminate\Support\Str::plural('request', $loans->count()) }}</span>
            </div>
            @if ($loans->isEmpty())
                <div class="empty">
                    <div class="empty-icon"><i class="fas fa-file-circle-plus"></i></div>
                    <h3>No loan requests yet</h3>
                    <p>Your submitted loan applications will appear here.</p>
                    <a class="button primary" href="{{ route('loan-request') }}"><i class="fas fa-plus"></i> Create a request</a>
                </div>
            @else
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr><th>Request ID</th><th>Requested amount</th><th>Purpose</th><th>Repayment</th><th>Submitted</th><th>Status</th></tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $loan)
                                <tr>
                                    <td class="loan-code">{{ $loan->l_uId }}</td>
                                    <td class="amount">৳{{ number_format($loan->loan_amount, 2) }}</td>
                                    <td class="purpose" title="{{ $loan->loan_purpose }}">{{ $loan->loan_purpose }}</td>
                                    <td>{{ ucfirst($loan->repayment_type) }} · {{ $loan->repayment_type === 'monthly' ? $loan->monthly_duration . ' months' : $loan->weekly_duration . ' weeks' }}</td>
                                    <td>{{ optional($loan->created_at)->format('d M Y') }}</td>
                                    <td><span class="status {{ $loan->status }}">{{ $loan->status === 'complete' ? 'Accepted' : ucfirst($loan->status) }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>
    </main>
    <script>
        if (localStorage.getItem('global_theme') === 'dark') {
            document.body.classList.add('dark-mode');
        }
    </script>
</body>
</html>

