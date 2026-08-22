<style>
    /* ===== USER COMMIT DETAILS VIEW ===== */
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1);
        --shadow-sm: 0 1px 2px 0 rgba(0,0,0,0.05);
    }

    [data-theme="light"] {
        --bg-body: #f8fafc;
        --card-bg: #ffffff;
        --table-header-bg: #f1f5f9;
        --table-row-hover: #f1f5f9;
        --table-row-even: #ffffff;
        --table-row-odd: #fafbfc;
        --text-primary: #0f172a;
        --text-secondary: #334155;
        --text-muted: #64748b;
        --border-color: #e2e8f0;
        --input-bg: #ffffff;
        --input-text: #0f172a;
        --pagination-bg: #ffffff;
        --pagination-text: #0f172a;
        --pagination-hover: #667eea;
        --pagination-hover-text: #ffffff;
    }

    body.dark-mode {
        --bg-body: #0f172a;
        --card-bg: #1e293b;
        --table-header-bg: #0f172a;
        --table-row-hover: #2d3a4f;
        --table-row-even: #1e293b;
        --table-row-odd: #1a2534;
        --text-primary: #f1f5f9;
        --text-secondary: #cbd5e1;
        --text-muted: #94a3b8;
        --border-color: #334155;
        --input-bg: #0f172a;
        --input-text: #f1f5f9;
        --pagination-bg: #1e293b;
        --pagination-text: #cbd5e1;
        --pagination-hover: #818cf8;
        --pagination-hover-text: #ffffff;
    }

    /* Back Button */
    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 20px;
        border-radius: 10px;
        background: transparent;
        color: var(--text-secondary);
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        border: 2px solid var(--border-color);
        cursor: pointer;
        transition: all 0.25s ease;
        margin-bottom: 1.5rem;
        display: inline-flex;
    }

    .back-btn:hover {
        background: var(--primary-gradient);
        color: white;
        border-color: transparent;
        text-decoration: none;
    }

    /* Profile Card */
    .profile-card {
        background: var(--card-bg);
        border-radius: 20px;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--border-color);
        margin-bottom: 1.5rem;
        overflow: hidden;
    }

    .profile-header {
        background: var(--primary-gradient);
        padding: 2rem;
        display: flex;
        align-items: center;
        gap: 20px;
        position: relative;
        overflow: hidden;
    }

    .profile-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 250px;
        height: 250px;
        background: rgba(255,255,255,0.06);
        border-radius: 50%;
    }

    .profile-header::after {
        content: '';
        position: absolute;
        bottom: -60%;
        right: 5%;
        width: 180px;
        height: 180px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
    }

    .profile-avatar-lg {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: rgba(255,255,255,0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 800;
        font-size: 2rem;
        border: 3px solid rgba(255,255,255,0.5);
        flex-shrink: 0;
        position: relative;
        z-index: 1;
    }

    .profile-info {
        position: relative;
        z-index: 1;
    }

    .profile-info h2 {
        color: white;
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0 0 4px 0;
    }

    .profile-info .profile-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-top: 8px;
    }

    .profile-meta-item {
        display: flex;
        align-items: center;
        gap: 6px;
        color: rgba(255,255,255,0.85);
        font-size: 0.85rem;
    }

    .profile-meta-item i {
        font-size: 0.9rem;
        color: rgba(255,255,255,0.7);
    }

    /* Summary Stats */
    .summary-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1px;
        background: var(--border-color);
    }

    .summary-stat-item {
        background: var(--card-bg);
        padding: 1.2rem 1.5rem;
        text-align: center;
    }

    .stat-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        margin: 0 auto 0.6rem;
    }

    .stat-icon.blue { background: rgba(102,126,234,0.12); color: #667eea; }
    .stat-icon.green { background: rgba(16,185,129,0.12); color: #10b981; }
    .stat-icon.orange { background: rgba(245,158,11,0.12); color: #f59e0b; }
    .stat-icon.purple { background: rgba(139,92,246,0.12); color: #8b5cf6; }

    .stat-value {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--text-primary);
        line-height: 1;
    }

    .stat-label {
        font-size: 0.78rem;
        color: var(--text-muted);
        margin-top: 4px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Commits Table Card */
    .commits-card {
        background: var(--card-bg);
        border-radius: 20px;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--border-color);
        overflow: hidden;
    }

    .commits-card-header {
        background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);
        padding: 1.2rem 1.5rem;
        border-bottom: 2px solid var(--border-color);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }

    .commits-card-header h4 {
        font-size: 1.1rem;
        font-weight: 700;
        margin: 0;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .commits-card-header h4 i {
        -webkit-text-fill-color: #667eea;
    }

    /* Table */
    .premium-table-container {
        padding: 1.2rem;
        overflow-x: auto;
    }

    .premium-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 850px;
        font-size: 0.9rem;
    }

    .premium-table thead tr {
        background: var(--table-header-bg);
        border-bottom: 2px solid var(--border-color);
    }

    .premium-table thead th {
        padding: 0.9rem 1rem;
        font-weight: 600;
        font-size: 0.82rem;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        color: var(--text-primary);
        border: none;
        white-space: nowrap;
    }

    .premium-table tbody tr {
        border-bottom: 1px solid var(--border-color);
        transition: all 0.2s ease;
    }

    .premium-table tbody tr:nth-child(even) { background: var(--table-row-even); }
    .premium-table tbody tr:nth-child(odd) { background: var(--table-row-odd); }
    .premium-table tbody tr:hover { background: var(--table-row-hover); }

    .premium-table tbody td {
        padding: 0.85rem 1rem;
        color: var(--text-secondary);
        font-size: 0.9rem;
        vertical-align: middle;
    }

    /* Badges */
    .badge-serial {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: rgba(102,126,234,0.12);
        color: #667eea;
        font-weight: 700;
        font-size: 0.8rem;
    }

    .badge-commit-id {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 8px;
        background: rgba(102,126,234,0.12);
        color: #667eea;
        font-size: 0.78rem;
        font-weight: 700;
        font-family: monospace;
        letter-spacing: 0.5px;
    }

    .badge-amount {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 5px 12px;
        border-radius: 50px;
        background: rgba(16,185,129,0.12);
        color: #10b981;
        border: 1px solid rgba(16,185,129,0.25);
        font-weight: 700;
        font-size: 0.85rem;
    }

    .badge-month {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 12px;
        border-radius: 50px;
        background: rgba(139,92,246,0.1);
        color: #8b5cf6;
        border: 1px solid rgba(139,92,246,0.2);
        font-size: 0.8rem;
        font-weight: 600;
    }

    .badge-status {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.78rem;
        font-weight: 600;
    }

    .status-pending { background: rgba(245,158,11,0.12); color: #f59e0b; border: 1px solid rgba(245,158,11,0.25); }
    .status-approved { background: rgba(16,185,129,0.12); color: #10b981; border: 1px solid rgba(16,185,129,0.25); }
    .status-rejected { background: rgba(239,68,68,0.12); color: #ef4444; border: 1px solid rgba(239,68,68,0.25); }

    .date-display {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .date-main {
        font-weight: 600;
        color: var(--text-primary);
        font-size: 0.88rem;
    }

    .date-time {
        font-size: 0.75rem;
        color: var(--text-muted);
    }

    .repayment-badge {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        background: rgba(59,130,246,0.1);
        color: #3b82f6;
        border: 1px solid rgba(59,130,246,0.2);
    }

    /* DataTables */
    .dataTables_length label,
    .dataTables_filter label {
        color: var(--text-primary);
        font-weight: 500;
        font-size: 0.85rem;
    }

    .dataTables_length select,
    .dataTables_filter input {
        border: 2px solid var(--border-color);
        border-radius: 8px;
        padding: 6px 10px;
        background: var(--input-bg);
        color: var(--input-text);
        margin: 0 5px;
        font-size: 0.85rem;
    }

    .dataTables_filter input { min-width: 200px; }

    .dataTables_info {
        color: var(--text-secondary);
        font-size: 0.85rem;
    }

    .dataTables_paginate .paginate_button {
        border: 2px solid var(--border-color);
        border-radius: 8px;
        padding: 6px 12px;
        margin: 0 2px;
        color: var(--pagination-text) !important;
        background: var(--pagination-bg) !important;
        font-weight: 500;
        font-size: 0.8rem;
        transition: all 0.2s ease;
    }

    .dataTables_paginate .paginate_button.current {
        background: var(--primary-gradient) !important;
        color: white !important;
        border-color: transparent !important;
    }

    .dataTables_paginate .paginate_button:hover {
        background: var(--pagination-hover) !important;
        color: var(--pagination-hover-text) !important;
        border-color: transparent !important;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .profile-header { flex-direction: column; text-align: center; }
        .profile-info .profile-meta { justify-content: center; }
        .summary-stats { grid-template-columns: repeat(2, 1fr); }
        .premium-table-container { padding: 0.8rem; }
        .dataTables_filter input { min-width: 100%; margin-left: 0; margin-top: 5px; }
    }

    @media (max-width: 480px) {
        .summary-stats { grid-template-columns: 1fr 1fr; }
    }
</style>

<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


{{-- Profile Card --}}
<div style="padding: 1.5rem;">
<div class="profile-card">
    <div class="profile-header">
        <div class="profile-avatar-lg">
            {{ strtoupper(substr($userInfo->member_name ?? $userInfo->committed_user_name ?? 'U', 0, 1)) }}
        </div>
        <div class="profile-info">
            <h2>{{ $userInfo->member_name ?? $userInfo->committed_user_name ?? 'Unknown User' }}</h2>
            <div class="profile-meta">
                @if($userInfo->member_uid)
                    <div class="profile-meta-item">
                        <i class="fas fa-id-badge"></i>
                        ID: {{ $userInfo->member_uid }}
                    </div>
                @endif
                @if($userInfo->member_email)
                    <div class="profile-meta-item">
                        <i class="fas fa-envelope"></i>
                        {{ $userInfo->member_email }}
                    </div>
                @endif
                @if($userInfo->member_mobile)
                    <div class="profile-meta-item">
                        <i class="fas fa-phone-alt"></i>
                        {{ $userInfo->member_mobile }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Summary Stats --}}
    <div class="summary-stats">
        <div class="summary-stat-item">
            <div class="stat-icon blue">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <div class="stat-value">{{ $totalCommits }}</div>
            <div class="stat-label">মোট কমিট</div>
        </div>
        <div class="summary-stat-item">
            <div class="stat-icon green">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <div class="stat-value">৳{{ number_format($totalPaid, 2) }}</div>
            <div class="stat-label">মোট পরিশোধ</div>
        </div>
        <div class="summary-stat-item">
            <div class="stat-icon orange">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-value">{{ $commits->where('status', 'approved')->count() }}</div>
            <div class="stat-label">Approved</div>
        </div>
        <div class="summary-stat-item">
            <div class="stat-icon purple">
                <i class="fas fa-clock"></i>
            </div>
            <div class="stat-value">{{ $commits->where('status', 'pending')->count() }}</div>
            <div class="stat-label">Pending</div>
        </div>
    </div>
</div>

{{-- Commits Table --}}
<div class="commits-card">
    <div class="commits-card-header">
        <h4>
            <i class="fas fa-history"></i>
            সকল Commit তালিকা (তারিখ সহ)
        </h4>
        <span style="font-size: 0.82rem; color: var(--text-muted);">
            মোট <strong style="color: var(--text-primary);">{{ $totalCommits }}</strong> টি রেকর্ড
        </span>
    </div>

    <div class="premium-table-container">
        @if($commits->count() > 0)
        <table id="userCommitsTable" class="premium-table" width="100%">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Commit ID</th>
                    <th>ঋণ আইডি</th>
                    <th>সদস্যের নাম</th>
                    <th>পরিশোধ পরিমাণ</th>
                    <th>মাস</th>
                    <th>বছর</th>
                    <th>পরিশোধ প্রকার</th>
                    <th>Status</th>
                    <th>তারিখ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commits as $commit)
                <tr>
                    <td>
                        <span class="badge-serial">{{ $loop->iteration }}</span>
                    </td>

                    <td>
                        <span class="badge-commit-id">{{ $commit->loan_commit_id }}</span>
                    </td>

                    <td>
                        <span style="font-size: 0.82rem; color: var(--text-muted); font-family: monospace;">
                            {{ $commit->loan_payment_id }}
                        </span>
                    </td>

                    <td>
                        <strong style="color: var(--text-primary); font-size: 0.9rem;">
                            {{ $commit->member_name ?? '—' }}
                        </strong>
                        @if($commit->member_uid)
                            <br><small style="color: var(--text-muted); font-size: 0.75rem;">{{ $commit->member_uid }}</small>
                        @endif
                    </td>

                    <td>
                        <span class="badge-amount">
                            ৳{{ number_format($commit->payment_amount, 2) }}
                        </span>
                    </td>

                    <td>
                        <span class="badge-month">
                            <i class="far fa-calendar"></i>
                            {{ $commit->payment_month }}
                        </span>
                    </td>

                    <td>
                        <strong style="color: var(--text-primary);">{{ $commit->loan_year }}</strong>
                    </td>

                    <td>
                        @if($commit->repayment_type)
                            <span class="repayment-badge">
                                {{ ucfirst($commit->repayment_type) }}
                            </span>
                        @else
                            <span style="color: var(--text-muted);">—</span>
                        @endif
                    </td>

                    <td>
                        <span class="badge-status
                            @if($commit->status == 'pending') status-pending
                            @elseif($commit->status == 'approved') status-approved
                            @elseif($commit->status == 'rejected') status-rejected
                            @endif">
                            @if($commit->status == 'pending') ⏳ Pending
                            @elseif($commit->status == 'approved') ✅ Approved
                            @elseif($commit->status == 'rejected') ❌ Rejected
                            @else {{ ucfirst($commit->status ?? 'N/A') }}
                            @endif
                        </span>
                    </td>

                    <td>
                        <div class="date-display">
                            <span class="date-main">
                                <i class="far fa-calendar-check" style="color: #667eea; font-size: 0.8rem; margin-right: 4px;"></i>
                                {{ \Carbon\Carbon::parse($commit->created_at)->format('d M, Y') }}
                            </span>
                            <span class="date-time">
                                {{ \Carbon\Carbon::parse($commit->created_at)->format('h:i A') }}
                            </span>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: right; font-weight: 700; color: var(--text-primary); padding: 1rem;">
                        মোট:
                    </td>
                    <td colspan="6" style="padding: 1rem;">
                        <span class="badge-amount" style="font-size: 1rem;">
                            ৳{{ number_format($totalPaid, 2) }}
                        </span>
                    </td>
                </tr>
            </tfoot>
        </table>
        @else
            <div style="text-align: center; padding: 3rem; color: var(--text-muted);">
                <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.4; display: block;"></i>
                <p>কোনো commit পাওয়া যায়নি।</p>
            </div>
        @endif
    </div>
</div>
</div>{{-- end modal wrapper padding --}}

<script>
    if (typeof jQuery !== 'undefined') {
        setTimeout(function() {
            if ($.fn.DataTable && $('#userCommitsTable').length) {
                if ($.fn.DataTable.isDataTable('#userCommitsTable')) {
                    $('#userCommitsTable').DataTable().destroy();
                }
                $('#userCommitsTable').DataTable({
                    "ordering": true,
                    "bAutoWidth": false,
                    "responsive": false,
                    "scrollX": true,
                    "pageLength": 10,
                    "order": [[9, "desc"]],
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    "language": {
                        "search": "🔍",
                        "lengthMenu": "_MENU_",
                        "info": "_START_-_END_ of _TOTAL_",
                        "paginate": {
                            "first": "«", "last": "»",
                            "next": "›", "previous": "‹"
                        }
                    }
                });
            }
        }, 200);
    }
</script>
