<style>
    /* ===== PREMIUM COMMITTED USERS LIST ===== */
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.1);
        --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1);
        --shadow-sm: 0 1px 2px 0 rgba(0,0,0,0.05);
    }

    /* Light Mode */
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

    /* Dark Mode */
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

    .premium-card {
        background: var(--card-bg);
        border-radius: 24px;
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
        margin-bottom: 2rem;
    }

    .premium-card .card-header {
        background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);
        padding: 1.5rem 1.8rem;
        border-bottom: 2px solid var(--border-color);
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .card-header-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .card-header-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        box-shadow: 0 4px 15px rgba(102,126,234,0.4);
    }

    .premium-card .card-header h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .card-header h3 small {
        display: block;
        font-size: 0.8rem;
        font-weight: 400;
        color: var(--text-muted);
        -webkit-text-fill-color: var(--text-muted);
        margin-top: 2px;
    }

    /* Stats Row */
    .stats-row {
        display: flex;
        gap: 15px;
        padding: 1.2rem 1.8rem;
        border-bottom: 1px solid var(--border-color);
        flex-wrap: wrap;
    }

    .stat-chip {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 18px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .stat-chip.purple {
        background: rgba(102,126,234,0.12);
        color: #667eea;
        border: 1px solid rgba(102,126,234,0.25);
    }

    .stat-chip.green {
        background: rgba(16,185,129,0.12);
        color: #10b981;
        border: 1px solid rgba(16,185,129,0.25);
    }

    .stat-chip i {
        font-size: 1rem;
    }

    /* Table */
    .premium-table-container {
        padding: 1.2rem;
        overflow-x: auto;
    }

    .premium-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
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
        text-align: left;
        white-space: nowrap;
    }

    .premium-table tbody tr {
        border-bottom: 1px solid var(--border-color);
        transition: all 0.2s ease;
    }

    .premium-table tbody tr:nth-child(even) {
        background: var(--table-row-even);
    }

    .premium-table tbody tr:nth-child(odd) {
        background: var(--table-row-odd);
    }

    .premium-table tbody tr:hover {
        background: var(--table-row-hover);
        transform: translateX(2px);
    }

    .premium-table tbody td {
        padding: 0.85rem 1rem;
        color: var(--text-secondary);
        font-size: 0.9rem;
        vertical-align: middle;
    }

    /* User Info Cell */
    .user-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 0.9rem;
        flex-shrink: 0;
    }

    .user-name {
        font-weight: 600;
        color: var(--text-primary);
        font-size: 0.92rem;
    }

    .user-uid {
        font-size: 0.78rem;
        color: var(--text-muted);
        margin-top: 1px;
    }

    /* Badges */
    .badge-commits {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        background: rgba(102,126,234,0.12);
        color: #667eea;
        border: 1px solid rgba(102,126,234,0.25);
    }

    .badge-amount {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.82rem;
        font-weight: 700;
        background: rgba(16,185,129,0.12);
        color: #10b981;
        border: 1px solid rgba(16,185,129,0.25);
    }

    .badge-date {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 500;
        background: rgba(245,158,11,0.1);
        color: #f59e0b;
        border: 1px solid rgba(245,158,11,0.2);
    }

    /* View Button */
    .btn-view {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 8px 18px;
        border-radius: 10px;
        background: var(--primary-gradient);
        color: white;
        font-size: 0.82rem;
        font-weight: 600;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: all 0.25s ease;
        box-shadow: 0 3px 10px rgba(102,126,234,0.35);
        white-space: nowrap;
    }

    .btn-view:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102,126,234,0.45);
        color: white;
        text-decoration: none;
    }

    .btn-view:active {
        transform: translateY(0);
    }

    /* DataTables */
    .dataTables_wrapper {
        padding: 0.5rem 0;
    }

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

    .dataTables_filter input {
        min-width: 200px;
    }

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
        cursor: pointer;
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

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--text-muted);
    }

    .empty-state i {
        font-size: 3.5rem;
        margin-bottom: 1rem;
        opacity: 0.4;
    }

    .empty-state p {
        font-size: 1rem;
        margin: 0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .premium-card .card-header {
            flex-direction: column;
            align-items: stretch;
            padding: 1rem;
        }

        .premium-table-container {
            padding: 0.8rem;
        }

        .stats-row {
            padding: 0.8rem 1rem;
        }

        .dataTables_filter input {
            min-width: 100%;
            width: 100%;
            margin-left: 0;
        }
    }
</style>

<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<div class="premium-card">
    <div class="card-header">
        <div class="card-header-left">
            <div class="card-header-icon">
                <i class="fas fa-users"></i>
            </div>
            <h3>
                Committed Users List
                <small>All comitted users list</small>
            </h3>
        </div>
        <a href="{{ route('comitted-list') }}" class="btn-view" style="background: linear-gradient(135deg, #f59e0b, #ef4444);">
            <i class="fas fa-list"></i> All Commits
        </a>
    </div>

    <!-- Stats Row -->
    <div class="stats-row">
        <div class="stat-chip purple">
            <i class="fas fa-user-check"></i>
            Total User: <strong>{{ $users->count() }}</strong>
        </div>
        <div class="stat-chip green">
            <i class="fas fa-money-bill-wave"></i>
            Total Comitted: <strong>৳{{ number_format($users->sum('total_paid'), 2) }}</strong>
        </div>
    </div>

    <div class="premium-table-container">
        @if($users->count() > 0)
        <table id="committedUsersTable" class="premium-table" width="100%">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>User's Information</th>
                    <th>Phone</th>
                    <th>Total Comitted</th>
                    <th>Total Paid</th>
                    <th>Last Comitted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <div class="user-info">
                            <div class="user-avatar">
                                {{ strtoupper(substr($user->member_name ?? $user->committed_user_name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="user-name">{{ $user->member_name ?? $user->committed_user_name }}</div>
                                <!-- @if($user->member_uid)
                                    <div class="user-uid">ID: {{ $user->member_uid }}</div>
                                @endif -->
                            </div>
                        </div>
                    </td>

                    <td>
                        @if($user->member_mobile)
                            <span style="color: var(--text-secondary);">
                                <i class="fas fa-phone-alt" style="color: #667eea; font-size: 0.8rem; margin-right: 4px;"></i>
                                {{ $user->member_mobile }}
                            </span>
                        @else
                            <span style="color: var(--text-muted);">—</span>
                        @endif
                    </td>

                    <td>
                        <span class="badge-commits">
                            <i class="fas fa-file-invoice"></i>
                            {{ $user->total_commits }} 
                        </span>
                    </td>

                    <td>
                        <span class="badge-amount">
                            ৳{{ number_format($user->total_paid, 2) }}
                        </span>
                    </td>

                    <td>
                        <span class="badge-date">
                            <i class="far fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($user->last_commit_date)->format('d M, Y') }}
                        </span>
                    </td>

                    <td>
                        <span class="btn-view open-modal"
                              data-action="{{ url('user-commit-details/' . ($user->member_id ?? $user->committed_user_id)) }}"
                              data-modal="common-modal-xl"
                              data-title="{{ $user->member_name ?? $user->committed_user_name }} — Commit History"
                              data-id="{{ $user->member_id ?? $user->committed_user_id }}"
                              style="cursor:pointer;">
                            <i class="fas fa-eye"></i> View
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <div class="empty-state">
                <i class="fas fa-users-slash"></i>
                <p>No comitted yet!</p>
            </div>
        @endif
    </div>
</div>

<script>
    $(document).ready(function () {
        if ($.fn.DataTable.isDataTable('#committedUsersTable')) {
            $('#committedUsersTable').DataTable().destroy();
        }

        $('#committedUsersTable').DataTable({
            "ordering": true,
            "bAutoWidth": false,
            "responsive": false,
            "scrollX": true,
            "pageLength": 25,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "language": {
                "search": "🔍",
                "lengthMenu": "_MENU_",
                "info": "_START_-_END_ of _TOTAL_",
                "paginate": {
                    "first": "«",
                    "last": "»",
                    "next": "›",
                    "previous": "‹"
                }
            }
        });
    });
</script>

