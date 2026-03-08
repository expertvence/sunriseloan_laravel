<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">

<style>
    :root {
        /* Light Mode - Modern Fresh */
        --primary: #2563eb;
        --primary-light: #3b82f6;
        --primary-soft: #dbeafe;
        --secondary: #64748b;
        --success: #16a34a;
        --success-soft: #dcfce7;
        --warning: #ca8a04;
        --warning-soft: #fef9c3;
        --danger: #dc2626;
        --danger-soft: #fee2e2;
        --info: #0891b2;
        --info-soft: #cffafe;
        
        /* Light Mode Backgrounds */
        --bg-card: #ffffff;
        --bg-body: #f1f5f9;
        --bg-header: #f8fafc;
        --bg-hover: #ffffff;
        --bg-stripe: #f8fafc;
        
        /* Light Mode Text */
        --text-primary: #0f172a;
        --text-secondary: #334155;
        --text-muted: #475569;
        --text-light: #64748b;
        
        /* Borders & Shadows */
        --border: #e2e8f0;
        --border-light: #f1f5f9;
        --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05), 0 2px 4px -2px rgb(0 0 0 / 0.05);
        --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.05), 0 4px 6px -4px rgb(0 0 0 / 0.05);
        
        /* Dark Mode */
        --dark-bg-body: #030712;
        --dark-bg-card: #111827;
        --dark-bg-header: #1f2937;
        --dark-bg-hover: #263445;
        --dark-bg-stripe: #1a1f2e;
        --dark-border: #2d3748;
        --dark-border-light: #262f3f;
        
        --dark-text-primary: #f3f4f6;
        --dark-text-secondary: #d1d5db;
        --dark-text-muted: #9ca3af;
        --dark-text-light: #6b7280;
        
        /* Dark Mode Status Colors */
        --dark-primary-soft: #1e3a5f;
        --dark-success-soft: #14532d;
        --dark-warning-soft: #422006;
        --dark-danger-soft: #450a0a;
        --dark-info-soft: #164e63;
    }

    /* ===== BASE STYLES ===== */
    .premium-table-card {
        background: transparent;
        padding: 20px;
    }

    .table-inner {
        background: var(--bg-card);
        border-radius: 28px;
        padding: 1.5rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--border);
        transition: all 0.2s ease;
    }

    /* ===== CARD HEADER ===== */
    .card-header {
        background: transparent;
        padding: 0.5rem 0.75rem 1.5rem 0.75rem;
        border-bottom: 2px dashed var(--border);
        color: var(--text-primary);
        font-weight: 700;
        font-size: 1.4rem;
        display: flex;
        align-items: center;
        gap: 12px;
        letter-spacing: -0.02em;
    }

    .card-header i {
        color: var(--primary);
        font-size: 1.8rem;
        background: var(--primary-soft);
        padding: 12px;
        border-radius: 18px;
    }

    .card-header .badge {
        background: var(--primary-soft) !important;
        color: var(--primary) !important;
        font-weight: 600;
        font-size: 0.9rem;
        padding: 8px 18px !important;
        border-radius: 40px;
        border: 1px solid var(--primary-light);
    }

    /* ===== TABLE STYLES - ULTRA CARD ROWS ===== */
    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 20px; /* Increased gap between rows for card-like appearance */
        margin: 0;
    }

    /* Table Header */
    .table thead th {
        background: transparent;
        color: var(--text-muted);
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 0.75rem 0.75rem;
        border: none;
        border-bottom: 2px solid var(--border);
        white-space: nowrap;
    }

    /* Table Rows - Floating Cards */
    .table tbody tr {
        background: var(--bg-header);
        border-radius: 24px; /* More rounded for premium card look */
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 8px 20px -8px rgba(0, 0, 0, 0.1), 0 2px 6px -2px rgba(0, 0, 0, 0.02);
        border: 1px solid var(--border);
        position: relative;
        backdrop-filter: blur(2px);
    }

    /* Top gradient line animation */
    .table tbody tr::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, transparent, var(--primary-soft), var(--primary-light), var(--primary-soft), transparent);
        border-radius: 24px 24px 0 0;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .table tbody tr:hover::after {
        opacity: 1;
    }

    /* Hover effect - Card lifts up */
    .table tbody tr:hover {
        background: white;
        transform: translateY(-6px) scale(1.002);
        box-shadow: 0 25px 35px -14px rgba(37, 99, 235, 0.3), 0 8px 12px -4px rgba(0, 0, 0, 0.08);
        border-color: var(--primary-light);
        z-index: 10;
    }

    .table tbody td {
        padding: 1.4rem 0.75rem; /* Increased vertical padding */
        border: none;
        color: var(--text-primary);
        font-size: 0.95rem;
        vertical-align: middle;
        background: transparent;
    }

    /* First and last cell rounded corners - maintaining card shape */
    .table tbody tr td:first-child {
        border-top-left-radius: 24px;
        border-bottom-left-radius: 24px;
        padding-left: 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .table tbody tr td:last-child {
        border-top-right-radius: 24px;
        border-bottom-right-radius: 24px;
        padding-right: 1.5rem;
    }

    /* Left accent bar for each card */
    .table tbody td:first-child::before {
        content: '';
        position: absolute;
        left: 0;
        top: 12%;
        height: 76%;
        width: 4px;
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        border-radius: 0 6px 6px 0;
        opacity: 0.4;
        transition: opacity 0.3s ease, height 0.3s ease;
    }

    .table tbody tr:hover td:first-child::before {
        opacity: 1;
        height: 80%;
        top: 10%;
    }

    /* ===== AVATAR ===== */
    .avatar-circle {
        width: 40px;
        height: 40px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        color: white;
        font-weight: 600;
        font-size: 1rem;
        box-shadow: 0 6px 12px -3px var(--primary-light);
        transition: all 0.2s ease;
    }

    .table tbody tr:hover .avatar-circle {
        transform: scale(1.05);
        box-shadow: 0 8px 16px -4px var(--primary);
    }

    /* ===== BADGES ===== */
    .badge.bg-secondary {
        background: var(--primary-soft) !important;
        color: var(--primary) !important;
        font-weight: 600;
        padding: 6px 14px !important;
        border-radius: 30px;
        font-size: 0.85rem;
        border: 1px solid var(--primary-light);
    }

    /* Role Badges */
    .badge.bg-primary {
        background: var(--primary-soft) !important;
        color: var(--primary) !important;
        padding: 6px 16px !important;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .badge.bg-success {
        background: var(--success-soft) !important;
        color: var(--success) !important;
        padding: 6px 16px !important;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.85rem;
    }

    /* ===== STATUS STYLES ===== */
    .status-badge {
        padding: 6px 16px;
        border-radius: 40px;
        font-weight: 600;
        font-size: 0.85rem;
        display: inline-block;
        min-width: 100px;
        text-align: center;
        border: 1px solid transparent;
        transition: all 0.2s ease;
    }

    .status-badge.active {
        background: var(--success-soft);
        color: var(--success);
        border-color: #86efac;
    }

    .status-badge.inactive {
        background: var(--secondary);
        color: white;
        opacity: 0.8;
    }

    .status-badge.rejected {
        background: var(--danger-soft);
        color: var(--danger);
        border-color: #fecaca;
    }

    /* Status Select */
    .status-select {
        padding: 6px 16px;
        border-radius: 40px;
        border: 2px solid transparent;
        font-weight: 600;
        font-size: 0.85rem;
        cursor: pointer;
        outline: none;
        min-width: 120px;
        text-align: center;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 14px;
    }

    .status-select.status-active {
        background-color: var(--success);
        color: white;
        border-color: #4ade80;
    }

    .status-select.status-inactive {
        background-color: var(--secondary);
        color: white;
    }

    .status-select.status-rejected {
        background-color: var(--danger);
        color: white;
        border-color: #f87171;
    }

    .status-select option {
        background: white;
        color: var(--text-primary);
        padding: 10px;
    }

    /* ===== ACTION BUTTONS ===== */
    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    .action-btn {
        width: 40px;
        height: 40px;
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: white;
        color: var(--primary);
        border: 1px solid var(--border);
        transition: all 0.2s ease;
        cursor: pointer;
        box-shadow: var(--shadow);
    }

    .action-btn:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
        transform: scale(0.95);
    }

    .action-btn.view-btn {
        color: var(--success);
    }

    .action-btn.view-btn:hover {
        background: var(--success);
        color: white;
        border-color: var(--success);
    }

    .action-btn.edit-btn {
        color: var(--warning);
    }

    .action-btn.edit-btn:hover {
        background: var(--warning);
        color: white;
        border-color: var(--warning);
    }

    /* ===== EMAIL LINK ===== */
    .table tbody td a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: color 0.2s ease;
    }

    .table tbody td a:hover {
        color: var(--primary-light);
        text-decoration: underline;
    }

    .table tbody td a i {
        font-size: 0.9rem;
        opacity: 0.7;
    }

    /* ===== DATATABLES CUSTOM ===== */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 1.5rem;
    }

    .dataTables_wrapper .dataTables_length label,
    .dataTables_wrapper .dataTables_filter label {
        color: var(--text-secondary);
        font-weight: 500;
        font-size: 0.9rem;
    }

    .dataTables_wrapper .dataTables_filter input {
        border-radius: 40px;
        border: 2px solid var(--border);
        padding: 10px 18px 10px 45px;
        outline: none;
        transition: all 0.2s;
        background: var(--bg-card) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='11' cy='11' r='8'%3E%3C/circle%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'%3E%3C/line%3E%3C/svg%3E") left 15px center no-repeat;
        background-size: 18px;
        width: 280px;
        color: var(--text-primary);
    }

    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px var(--primary-soft);
    }

    .dataTables_wrapper .dataTables_length select {
        border-radius: 30px;
        border: 2px solid var(--border);
        padding: 8px 30px 8px 16px;
        background: var(--bg-card);
        color: var(--text-primary);
        font-weight: 500;
        cursor: pointer;
        margin: 0 8px;
    }

    .dataTables_wrapper .dataTables_info {
        color: var(--text-muted);
        font-size: 0.9rem;
        padding: 1rem 0;
    }

    .dataTables_wrapper .dataTables_paginate {
        padding: 1rem 0;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border-radius: 12px !important;
        padding: 8px 16px !important;
        margin: 0 4px;
        border: 2px solid transparent !important;
        background: transparent !important;
        color: var(--text-secondary) !important;
        font-weight: 600;
        transition: all 0.2s;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: var(--primary) !important;
        color: white !important;
        border: 2px solid var(--primary-light) !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current) {
        background: var(--primary-soft) !important;
        color: var(--primary) !important;
        border-color: var(--primary-light) !important;
    }

    /* ===== DARK MODE ===== */
    body.dark-mode {
        background-color: var(--dark-bg-body);
    }

    body.dark-mode .table-inner {
        background: var(--dark-bg-card);
        border-color: var(--dark-border);
    }

    body.dark-mode .card-header {
        border-bottom-color: var(--dark-border);
        color: var(--dark-text-primary);
    }

    body.dark-mode .card-header i {
        background: var(--dark-primary-soft);
        color: #60a5fa;
    }

    body.dark-mode .card-header .badge {
        background: var(--dark-primary-soft) !important;
        color: #60a5fa !important;
        border-color: #2563eb;
    }

    body.dark-mode .table thead th {
        color: var(--dark-text-muted);
        border-bottom-color: var(--dark-border);
    }

    body.dark-mode .table tbody tr {
        background: var(--dark-bg-header);
        border-color: var(--dark-border);
        box-shadow: 0 8px 20px -8px rgba(0, 0, 0, 0.4);
    }

    body.dark-mode .table tbody tr:hover {
        background: var(--dark-bg-hover);
        border-color: #3b82f6;
        box-shadow: 0 25px 35px -14px rgba(59, 130, 246, 0.3);
    }

    body.dark-mode .table tbody td {
        color: var(--dark-text-primary);
    }

    body.dark-mode .table tbody td:first-child::before {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        opacity: 0.5;
    }

    body.dark-mode .table tbody tr:hover td:first-child::before {
        opacity: 1;
    }

    body.dark-mode .avatar-circle {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
    }

    body.dark-mode .badge.bg-secondary {
        background: var(--dark-primary-soft) !important;
        color: #60a5fa !important;
        border-color: #2563eb;
    }

    body.dark-mode .badge.bg-primary {
        background: var(--dark-primary-soft) !important;
        color: #60a5fa !important;
    }

    body.dark-mode .badge.bg-success {
        background: var(--dark-success-soft) !important;
        color: #86efac !important;
    }

    body.dark-mode .text-secondary {
        color: var(--dark-text-secondary) !important;
    }

    body.dark-mode .table tbody td a {
        color: #60a5fa;
    }

    body.dark-mode .table tbody td a:hover {
        color: #93c5fd;
    }

    body.dark-mode .action-btn {
        background: var(--dark-bg-hover);
        border-color: var(--dark-border);
        color: var(--dark-text-secondary);
    }

    body.dark-mode .action-btn:hover {
        background: var(--primary);
        color: white;
    }

    body.dark-mode .status-select option {
        background: var(--dark-bg-card);
        color: var(--dark-text-primary);
    }

    /* Dark mode DataTables */
    body.dark-mode .dataTables_wrapper .dataTables_length label,
    body.dark-mode .dataTables_wrapper .dataTables_filter label {
        color: var(--dark-text-secondary);
    }

    body.dark-mode .dataTables_wrapper .dataTables_filter input {
        background-color: var(--dark-bg-header);
        border-color: var(--dark-border);
        color: var(--dark-text-primary);
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%239ca3af' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='11' cy='11' r='8'%3E%3C/circle%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'%3E%3C/line%3E%3C/svg%3E");
    }

    body.dark-mode .dataTables_wrapper .dataTables_length select {
        background-color: var(--dark-bg-header);
        border-color: var(--dark-border);
        color: var(--dark-text-primary);
    }

    body.dark-mode .dataTables_wrapper .dataTables_info {
        color: var(--dark-text-muted);
    }

    body.dark-mode .dataTables_wrapper .dataTables_paginate .paginate_button {
        color: var(--dark-text-secondary) !important;
    }

    body.dark-mode .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: var(--primary) !important;
        color: white !important;
    }

    body.dark-mode .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current) {
        background: var(--dark-primary-soft) !important;
        color: #60a5fa !important;
    }

    /* ===== MOBILE RESPONSIVE ===== */
    @media screen and (max-width: 767px) {
        .table-responsive table,
        .table-responsive thead,
        .table-responsive tbody,
        .table-responsive th,
        .table-responsive td,
        .table-responsive tr {
            display: block;
        }

        .table-responsive thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        .table-responsive tbody tr {
            margin-bottom: 1.5rem;
            background: var(--bg-card) !important;
            border: 2px solid var(--border);
            border-radius: 28px;
            padding: 1.2rem;
            box-shadow: var(--shadow-lg);
        }

        body.dark-mode .table-responsive tbody tr {
            background: var(--dark-bg-header) !important;
            border-color: var(--dark-border);
        }

        .table-responsive tbody td {
            display: flex;
            align-items: center;
            padding: 0.8rem !important;
            border: none !important;
            border-bottom: 1px solid var(--border) !important;
            text-align: left !important;
        }

        body.dark-mode .table-responsive tbody td {
            border-bottom-color: var(--dark-border) !important;
        }

        .table-responsive tbody td:last-child {
            border-bottom: none !important;
        }

        .table-responsive tbody td:before {
            content: attr(data-label);
            font-weight: 700;
            width: 110px;
            min-width: 110px;
            color: var(--primary);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        body.dark-mode .table-responsive tbody td:before {
            color: #60a5fa;
        }

        .table-responsive tbody td>* {
            margin-left: auto;
        }

        .dataTables_wrapper .dataTables_filter input {
            width: 100%;
            margin-left: 0;
        }

        .card-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .card-header .badge {
            margin-left: 0 !important;
        }
    }

    @media screen and (max-width: 480px) {
        .table-responsive tbody td:before {
            width: 90px;
            min-width: 90px;
        }
        
        .status-badge,
        .status-select {
            min-width: 90px;
            font-size: 0.8rem;
        }

        .table tbody td {
            padding: 1rem 0.5rem;
        }
    }

    /* ===============================
   FIX SEARCH & PAGINATION POSITION
   =============================== */

/* wrapper full width */
.dataTables_wrapper{
    width:100%;
    overflow:hidden;
}

/* scroll only table */
.table-responsive{
    overflow-x:auto;
    width:100%;
}

/* make table larger than container to allow scroll */
.data-table{
    min-width:1200px;
}

/* keep search right */
.dataTables_wrapper .dataTables_filter{
    float:right !important;
    text-align:right;
}

/* keep pagination right */
.dataTables_wrapper .dataTables_paginate{
    float:right !important;
    text-align:right;
}

/* prevent movement */
.dataTables_wrapper .row{
    margin-left:0 !important;
    margin-right:0 !important;
}
/* ==============================
   MOBILE TABLE SCROLL FIX
   ============================== */

@media screen and (max-width: 767px){

    /* restore normal table layout */
    .table-responsive table{
        display: table !important;
        width: 100%;
        min-width: 1200px; /* same as desktop scroll width */
    }

    .table-responsive thead{
        display: table-header-group !important;
    }

    .table-responsive tbody{
        display: table-row-group !important;
    }

    .table-responsive tr{
        display: table-row !important;
    }

    .table-responsive td,
    .table-responsive th{
        display: table-cell !important;
    }

    /* enable horizontal scroll */
    .table-responsive{
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

}

</style>

<div class="premium-table-card">
    <div class="table-inner">
        <div class="card-header">
            <i class="fas fa-users"></i>
            Member List
            <span class="ms-auto badge rounded-pill px-3 py-2">
                Total: {{ count($data) }} Members
            </span>
        </div>
        <div class="card-body p-0 mt-4">
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-hover w-100 data-table">
                    <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>Email</th>

                            <th>Status</th>
                            <th>Created By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($data) && count($data) > 0)
                            @foreach ($data as $value)
                                <tr>
                                    <td data-label="SL#"><span class="fw-bold">#{{ $loop->iteration }}</span></td>
                                    <td data-label="Code"><span
                                            class="badge bg-secondary bg-opacity-25 py-2 px-3">{{ $value->Uid }}</span>
                                    </td>
                                    <td data-label="Name">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle me-2">
                                                <span class="initials">{{ substr($value->name, 0, 1) }}</span>
                                            </div>
                                            <span class="fw-500">{{ $value->name }}</span>
                                        </div>
                                    </td>
                                    <td data-label="Role">
                                        @if ($value->user_type == 'manager')
                                            <span class="badge bg-primary">
                                                Manager
                                            </span>
                                        @elseif($value->user_type == 'user')
                                            <span class="badge bg-success">
                                                User
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                N/A
                                            </span>
                                        @endif
                                    </td>

                                    <td data-label="Father">{{ $value->fathers_name ?? 'N/A' }}</td>
                                    <td data-label="Mother">{{ $value->mothers_name ?? 'N/A' }}</td>
                                    <td data-label="Email">
                                        <a href="mailto:{{ $value->email }}" class="text-decoration-none">
                                            <i class="fas fa-envelope me-1"></i>
                                            <span class="email-text">{{ $value->email }}</span>
                                        </a>
                                    </td>

                                    <td data-label="Status" class="text-center">
                                        @if (Auth::user()->user_type == 'admin')
                                            <select class="status-select status-{{ $value->status }}"
                                                data-id="{{ $value->id }}" data-tooltip="Change Status">
                                                <option value="active"
                                                    {{ $value->status == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive"
                                                    {{ $value->status == 'inactive' ? 'selected' : '' }}>Inactive
                                                </option>
                                                <option value="rejected"
                                                    {{ $value->status == 'rejected' ? 'selected' : '' }}>Rejected
                                                </option>
                                            </select>
                                        @else
                                            <span class="status-badge {{ $value->status }}">
                                                {{ ucfirst($value->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td data-label="Created By">
                                        <span class="d-flex align-items-center">
                                            <i class="fas fa-user-circle me-1 text-secondary"></i>
                                            <span class="text-secondary">{{ $value->created_by ?? 'System' }}</span>
                                        </span>
                                    </td>
                                    <td data-label="Actions">
                                        <div class="action-buttons">
                                            <a href="{{ route('show-employee', $value->id) }}" target=""
                                                class="action-btn view-btn" data-tooltip="View Profile">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <span class="action-btn edit-btn open-modal"
                                                data-action="{{ route('member-register-form', $value->id) }}"
                                                data-modal="common-modal-md" data-title="Edit Member"
                                                data-id="{{ $value->id }}" data-tooltip="Edit Member">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9" class="text-center">
                                    <div class="empty-state">
                                        <i class="fas fa-users-slash"></i>
                                        <p>No members found</p>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function() {

var table = $(".data-table").DataTable({

    ordering: true,
    bAutoWidth: false,
    responsive: true,

    scrollX: true,   // ADD THIS
    scrollCollapse: true,  // ADD THIS

    dom:
        "<'row align-items-center mb-3'<'col-md-6 d-flex align-items-center'l><'col-md-6 d-flex justify-content-end'f>>" +
        "rt" +
        "<'row align-items-center mt-3'<'col-md-6'i><'col-md-6 d-flex justify-content-end'p>>",

    language: {
        search: "",
        searchPlaceholder: "🔎 Search members...",
        lengthMenu: "Show _MENU_ members",
        info: "Showing _START_ to _END_ of _TOTAL_ members",
        paginate: {
            first: "«",
            last: "»",
            next: "Next ›",
            previous: "‹ Prev"
        }
    },

    columnDefs: [{
        orderable: false,
        targets: [7, 8]
    }],

    pageLength: 10,

    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"]
    ]

});


    // Status color initialize
    $('.status-select').each(function() {
        updateStatusColor($(this));
    });

    // Fix responsive redraw
    $(window).on('resize', function() {
        table.columns.adjust();
    });

});

    // Function to update status select color
    function updateStatusColor(element) {
        element.removeClass('status-active status-inactive status-rejected');

        if (element.val() === 'active') {
            element.addClass('status-active');
        } else if (element.val() === 'inactive') {
            element.addClass('status-inactive');
        } else if (element.val() === 'rejected') {
            element.addClass('status-rejected');
        }
    }

    // Status change handler
    $(document).on('change', '.status-select', function() {
        let $this = $(this);
        let memberId = $this.data('id');
        let status = $this.val();
        let originalValue = $this.data('original-value') || $this.val();

        updateStatusColor($this);
        $this.prop('disabled', true);
        $this.css('opacity', '0.7');

        $.ajax({
            url: "{{ route('member-status-update') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: memberId,
                status: status
            },
            success: function(response) {
                showNotification('Status updated successfully!', 'success');
                $this.data('original-value', status);
            },
            error: function(xhr) {
                $this.val(originalValue);
                updateStatusColor($this);
                showNotification('Error updating status. Please try again.', 'error');
            },
            complete: function() {
                $this.prop('disabled', false);
                $this.css('opacity', '1');
            }
        });
    });

    // Simple notification function (replace with your preferred notification system)
    function showNotification(message, type) {
        if (type === 'success') {
            // You can replace this with toastr, sweetalert, or your preferred notification
            console.log('Success:', message);
        } else {
            console.error('Error:', message);
        }
    }

    // Dark mode detection
    function checkDarkMode() {
        if (localStorage.getItem('theme') === 'dark') {
            $('body').addClass('dark-mode');
        }
    }
    checkDarkMode();
</script>
