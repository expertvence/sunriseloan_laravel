<style>
/* ========================================
   🌈 UNIQUE SOFT COLORFUL FINTECH THEME
   ======================================== */

:root {
    /* 🌞 Light Mode - Soft & Colorful */
    --primary-gradient: linear-gradient(135deg, #4f46e5, #7c3aed, #ec4899);
    --primary-soft: rgba(79, 70, 229, 0.08);
    --primary-color: #4f46e5;
    --primary-dark: #3730a3;
    
    --card-bg: #ffffff;
    --body-bg: linear-gradient(180deg, #f8fafc, #eef2ff);
    
    --text-primary: #0f172a;
    --text-secondary: #334155;
    --text-muted: #475569;
    --border-color: #e2e8f0;
    
    --success: #059669;
    --success-bg: rgba(5, 150, 105, 0.1);
    --warning: #d97706;
    --warning-bg: rgba(217, 119, 6, 0.1);
    --danger: #dc2626;
    --danger-bg: rgba(220, 38, 38, 0.1);
    
    --shadow-soft: 0 10px 30px rgba(79, 70, 229, 0.08);
    --shadow-hover: 0 20px 40px rgba(79, 70, 229, 0.18);
    
    --radius-xl: 28px;
    --transition: all 0.3s ease;
    
    /* Table Specific */
    --table-header-bg: #f1f5f9;
    --table-header-text: #0f172a;
    --table-row-hover: #f8fafc;
    --table-stripe: #ffffff;
}

/* 🌙 Dark Mode - High Contrast */
body.dark-mode {
    --primary-gradient: linear-gradient(135deg, #818cf8, #c084fc, #f9a8d4);
    --primary-soft: rgba(129, 140, 248, 0.2);
    --primary-color: #a5b4fc;
    --primary-dark: #818cf8;
    
    --card-bg: #0f172a;  /* Dark Navy */
    --body-bg: linear-gradient(180deg, #020617, #0f172a);
    
    --text-primary: #ffffff;  /* Pure White */
    --text-secondary: #f1f5f9;  /* Almost White */
    --text-muted: #cbd5e1;  /* Light Gray */
    --border-color: #334155;
    
    --success: #4ade80;
    --success-bg: rgba(74, 222, 128, 0.2);
    --warning: #fcd34d;
    --warning-bg: rgba(252, 211, 77, 0.2);
    --danger: #fca5a5;
    --danger-bg: rgba(252, 165, 165, 0.2);
    
    --shadow-soft: 0 10px 30px rgba(0, 0, 0, 0.5);
    --shadow-hover: 0 20px 40px rgba(0, 0, 0, 0.7);
    
    /* Table Specific - Dark Mode High Contrast */
    --table-header-bg: #1e293b;
    --table-header-text: #ffffff;
    --table-row-hover: #263445;
    --table-stripe: #0f172a;
}

/* Base Styles */
body {
    background: var(--body-bg);
    font-family: 'Inter', sans-serif;
    padding: 25px;
    margin: 0;
    min-height: 100vh;
    color: var(--text-primary);
    transition: var(--transition);
}

/* ================= CARD ================= */
.premium-card {
    background: var(--card-bg);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-soft);
    overflow: hidden;
    border: 1px solid var(--border-color);
    transition: var(--transition);
}

/* ================= HEADER ================= */
.card-header-premium {
    background: var(--primary-gradient);
    padding: 22px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
    position: relative;
}

.card-header-premium h3 {
    font-weight: 700;
    font-size: 20px;
    display: flex;
    gap: 10px;
    align-items: center;
    margin: 0;
    color: white;
}

.card-header-premium h3 i {
    color: white;
}

.header-badge {
    background: rgba(255, 255, 255, 0.2);
    padding: 6px 18px;
    border-radius: 50px;
    font-size: 13px;
    backdrop-filter: blur(10px);
    color: white;
}

/* ================= TABLE ================= */
.table-responsive {
    overflow-x: auto;
    margin: 0;
}

.premium-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px;
    padding: 20px;
}

/* Table Headers - High Contrast */
.premium-table thead th {
    background: var(--table-header-bg);
    color: var(--table-header-text);
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 15px 12px;
    font-weight: 700;  /* Bold */
    border: none;
    white-space: nowrap;
}

/* Dark mode table headers */
body.dark-mode .premium-table thead th {
    color: #ffffff;
    background: #1e293b;
}

.premium-table thead th:first-child {
    border-top-left-radius: 16px;
    border-bottom-left-radius: 16px;
}

.premium-table thead th:last-child {
    border-top-right-radius: 16px;
    border-bottom-right-radius: 16px;
}

/* Table Rows */
.premium-table tbody tr {
    background: var(--card-bg);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    transition: var(--transition);
    border-radius: 16px;
}

.premium-table tbody tr:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 30px rgba(79, 70, 229, 0.12);
    background: var(--table-row-hover);
}

/* Table Cells - High Contrast */
.premium-table tbody td {
    padding: 18px 14px;
    font-size: 14px;
    color: var(--text-primary);
    border: none;
    background: var(--card-bg);
    font-weight: 500;  /* Medium weight for better readability */
}

/* Dark mode table cells */
body.dark-mode .premium-table tbody td {
    color: #ffffff;
}

.premium-table tbody td:first-child {
    border-top-left-radius: 16px;
    border-bottom-left-radius: 16px;
}

.premium-table tbody td:last-child {
    border-top-right-radius: 16px;
    border-bottom-right-radius: 16px;
}

/* Bold Text */
.fw-bold {
    font-weight: 700;
    color: var(--text-primary);
}

body.dark-mode .fw-bold {
    color: #ffffff;
}

/* ================= BADGES - Dark Mode Improved ================= */
.status-badge {
    padding: 6px 14px;
    border-radius: 30px;
    font-size: 11px;
    font-weight: 700;  /* Bold */
    letter-spacing: 0.4px;
    display: inline-block;
    border: 1px solid transparent;
}

/* Dark mode badges - High Contrast */
body.dark-mode .status-badge.pending {
    background: #fbbf24;
    color: #0f172a;
    border: 1px solid #f59e0b;
}

body.dark-mode .status-badge.complete {
    background: #34d399;
    color: #0f172a;
    border: 1px solid #10b981;
}

body.dark-mode .status-badge.rejected {
    background: #f87171;
    color: #0f172a;
    border: 1px solid #ef4444;
}

/* Light mode badges */
.status-badge.pending {
    background: #fef3c7;
    color: #92400e;
}

.status-badge.complete {
    background: #d1fae5;
    color: #065f46;
}

.status-badge.rejected {
    background: #fee2e2;
    color: #991b1b;
}

/* ================= STATUS SELECT - Dark Mode Improved ================= */
.status-select {
    border-radius: 30px;
    padding: 8px 12px;
    font-size: 12px;
    font-weight: 600;
    border: 2px solid var(--border-color);
    background: var(--card-bg);
    color: var(--text-primary);
    cursor: pointer;
    transition: var(--transition);
    width: 100%;
    min-width: 100px;
}

/* Dark mode selects */
body.dark-mode .status-select {
    background: #1e293b;
    color: #ffffff;
    border-color: #475569;
}

body.dark-mode .status-select option {
    background: #1e293b;
    color: #ffffff;
}

.status-select.pending {
    background: #fef3c7;
    color: #92400e;
}

.status-select.complete {
    background: #d1fae5;
    color: #065f46;
}

.status-select.rejected {
    background: #fee2e2;
    color: #991b1b;
}

/* Dark mode selected options */
body.dark-mode .status-select.pending {
    background: #fbbf24;
    color: #0f172a;
}

body.dark-mode .status-select.complete {
    background: #34d399;
    color: #0f172a;
}

body.dark-mode .status-select.rejected {
    background: #f87171;
    color: #0f172a;
}

/* ================= ACTION MENU ================= */
.action-wrapper {
    position: relative;
    display: inline-block;
}

.action-toggle {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: none;
    background: var(--primary-soft);
    color: var(--primary-color);
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    align-items: center;
    justify-content: center;
}

body.dark-mode .action-toggle {
    background: rgba(129, 140, 248, 0.3);
    color: #a5b4fc;
}

.action-dropdown {
    position: absolute;
    right: 0;
    top: 48px;
    width: 220px;
    background: var(--card-bg);
    border-radius: 18px;
    padding: 10px 0;
    display: none;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    animation: fadeIn 0.25s ease;
    z-index: 1000;
    border: 1px solid var(--border-color);
}

/* Dark mode dropdown */
body.dark-mode .action-dropdown {
    background: #1e293b;
    border-color: #475569;
}

.action-dropdown .dropdown-item {
    padding: 12px 20px;
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 14px;
    transition: var(--transition);
    cursor: pointer;
    color: var(--text-primary);
}

body.dark-mode .action-dropdown .dropdown-item {
    color: #ffffff;
}

/* ================= AVATAR ================= */
.avatar-circle {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: var(--primary-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 14px;
}

/* ================= EMAIL LINK ================= */
.email-link {
    color: var(--primary-color);
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: 500;
    transition: var(--transition);
}

body.dark-mode .email-link {
    color: #a5b4fc;
}

/* ================= DATE TEXT ================= */
.date-text {
    color: var(--text-secondary);
    font-size: 12px;
    display: flex;
    flex-direction: column;
    gap: 4px;
}

body.dark-mode .date-text {
    color: #e2e8f0;
}

.date-text i {
    color: var(--primary-color);
}

body.dark-mode .date-text i {
    color: #a5b4fc;
}

/* ================= DATATABLES - Dark Mode ================= */
.dataTables_wrapper {
    padding: 15px 25px;
    color: var(--text-primary);
}

body.dark-mode .dataTables_wrapper {
    color: #ffffff;
}

.dataTables_length select,
.dataTables_filter input {
    border-radius: 30px;
    border: 2px solid var(--border-color);
    padding: 8px 14px;
    background: var(--card-bg);
    color: var(--text-primary);
}

body.dark-mode .dataTables_length select,
body.dark-mode .dataTables_filter input {
    background: #1e293b;
    color: #ffffff;
    border-color: #475569;
}

.dataTables_info {
    color: var(--text-secondary);
}

body.dark-mode .dataTables_info {
    color: #cbd5e1;
}

.dataTables_paginate .paginate_button {
    border-radius: 30px !important;
    border: 2px solid var(--border-color) !important;
    margin: 0 4px;
    padding: 8px 16px !important;
    background: var(--card-bg) !important;
    color: var(--text-primary) !important;
}

body.dark-mode .dataTables_paginate .paginate_button {
    background: #1e293b !important;
    color: #ffffff !important;
    border-color: #475569 !important;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 768px) {
    body {
        padding: 15px;
    }
    
    .card-header-premium {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    
    .premium-table {
        border-spacing: 0 6px;
        padding: 10px;
    }
    
    .premium-table thead th {
        font-size: 11px;
        padding: 12px 8px;
    }
    
    .premium-table tbody td {
        padding: 14px 8px;
        font-size: 13px;
    }
}

@media (max-width: 576px) {
    .premium-table thead th {
        font-size: 10px;
        padding: 10px 6px;
    }
    
    .premium-table tbody td {
        padding: 12px 6px;
        font-size: 12px;
    }
    
    .status-select {
        min-width: 80px;
        padding: 6px 8px;
    }
    
    .action-toggle {
        width: 34px;
        height: 34px;
    }
}
</style>

<<<<<<< HEAD
<!-- 📦 Main Container -->
<div class="premium-card">
    <!-- 👑 Card Header -->
    <div class="card-header-premium">
        <h3>
            <i class="fas fa-file-invoice"></i>
            Loan Commitments
        </h3>
        <span class="header-badge">
            <i class="fas fa-database"></i>
            Total: {{ count($data) }} Records
        </span>
=======
                <tbody>
                    @if (!empty($data))
                        @foreach ($data as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->loan_commit_id }}</td>
                                <td>{{ $value->user_name }}</td>
                                
                                <td>{{ $value->payment_amount }}</td>
                                <td>{{ $value->payment_month }}</td>
                                <td>{{ $value->loan_year }}</td>

                                 <!-- Status Update -->
                                <td class="text-center">

                                    @if (auth()->user()->user_type == 'admin')
                                        <!-- Admin can change status -->
                                        <select id="statusDropdown{{ $value->id }}"
                                            onchange="updateStatus({{ $value->id }})"
                                            class="form-control 
                @if ($value->status == 'pending') text-danger 
                @elseif($value->status == 'approved') text-success 
                @elseif($value->status == 'rejected') text-danger @endif">

                                            <option value="pending"
                                                {{ $value->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approved"
                                                {{ $value->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="rejected"
                                                {{ $value->status == 'rejected' ? 'selected' : '' }}>Rejected</option>

                                        </select>
                                    @else
                                        <!-- Other users can only see status -->
                                        <span
                                            class="
                                            @if ($value->status == 'pending') text-danger 
                                            @elseif($value->status == 'approved') text-success 
                                            @elseif($value->status == 'rejected') text-danger @endif">

                                            {{ ucfirst($value->status) }}

                                        </span>
                                    @endif

                                </td>

                                <td>
                                    @if ($value->loan_term == 30)
                                        <span class="badge bg-success">Yearly</span>
                                    @elseif($value->loan_term == 7)
                                        <span class="badge bg-primary">Weekly</span>
                                    @else
                                        <span class="badge bg-secondary">Custom</span>
                                    @endif
                                </td>
                                @if (auth()->user()->user_type == 'admin')
                                    <td>{{ $value->payment_schedule }}</td>
                                    <td>
                                        <img src="{{ $value->other_documents
                                            ? asset('images/loan_documents/' . $value->other_documents)
                                            : asset('default/default.jpg') }}"
                                            width="80" style="object-fit:cover; border-radius:6px;">
                                    </td>
                                @endif
                                <td>{{ $value->user ? $value->user->email : 'no email' }}</td>
                                <td>{{ $value->created_at->format('Y-m-d H:i:s') }}</td>

                               


                                {{-- <td>
                                    <a href="#" target="_blank" rel="noopener noreferrer"><i
                                            class="fas fa-user"></i></a>
                                    @if (auth()->user()->user_type == 'admin')
                                        <span class="btn btn-sm open-modal btnView"
                                            data-action="{{ url('show-edit', $value->loan_ide) }}"
                                            data-modal="common-modal-md" data-title=" Member Edit" title="Edit"
                                            data-id="{{ $value->loan_ide }}">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    @endif
                                </td> --}}

                                <td style="position:relative;">

    <!-- Modern Three Dot Button -->
    <div class="action-wrapper">
        <button type="button" class="btn btn-light btn-sm action-toggle">
            <i class="fas fa-ellipsis-v"></i>
        </button>

        <!-- Dropdown Action Box -->
        <div class="action-dropdown shadow-lg">

            <a href="{{ url('show-view', $value->loan_ide) }}" 
               class="dropdown-item text-info">
                <i class="fas fa-eye me-2"></i> View
            </a>

            @if (auth()->user()->user_type == 'admin')

                <span class="dropdown-item text-warning open-modal btnView"
                      data-action="{{ url('show-edit', $value->loan_ide) }}"
                      data-modal="common-modal-md"
                      data-title="Member Edit"
                      data-id="{{ $value->loan_ide }}">
                    <i class="fas fa-edit me-2"></i> Edit
                </span>

                <button type="button"
                        class="dropdown-item text-danger btnDelete"
                        data-id="{{ $value->loan_ide }}">
                    <i class="fas fa-trash me-2"></i> Delete
                </button>

            @endif
        </div>
>>>>>>> 5e5667e0c6862e3a926cf645ff55d7af2e8340a8
    </div>

    <!-- 📊 Table -->
    <div class="table-responsive">
        <table id="datatablesSimple" class="premium-table" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Serial No</th>
                    <th>User Name</th>
                    <th>Loan ID</th>
                    <th>Amount</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th>Terms</th>
                    @if (auth()->user()->user_type == 'admin')
                        <th>Schedule</th>
                        <th>Documents</th>
                    @endif
                    <th>Email</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($data))
                    @foreach ($data as $value)
                        <tr>
                            <td><span class="fw-bold">#{{ $loop->iteration }}</span></td>
                            <td>{{ $value->user_name ?? 'N/A' }}</td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <div class="avatar-circle">
                                        {{ substr($value->user_name ?? 'U', 0, 1) }}
                                    </div>
                                    <span class="fw-bold">{{ $value->loan_commit_id ?? 'N/A' }}</span>
                                </div>
                            </td>
                            <td><span class="fw-bold">৳ {{ number_format($value->payment_amount, 2) }}</span></td>
                            <td>{{ $value->payment_month ?? 'N/A' }}</td>
                            <td>{{ $value->loan_year ?? 'N/A' }}</td>
                            
                            <td>
                                @if (auth()->user()->user_type == 'admin')
                                    <select id="statusDropdown{{ $value->loan_ide }}"
                                            onchange="updateStatus({{ $value->loan_ide }})"
                                            class="status-select {{ $value->status }}">
                                        <option value="pending" {{ $value->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="complete" {{ $value->status == 'complete' ? 'selected' : '' }}>Accepted</option>
                                        <option value="rejected" {{ $value->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                @else
                                    <span class="status-badge {{ $value->status }}">
                                        {{ ucfirst($value->status) }}
                                    </span>
                                @endif
                            </td>

                            <td>
                                @if ($value->loan_term == 30)
                                    <span class="status-badge complete">Yearly</span>
                                @elseif($value->loan_term == 7)
                                    <span class="status-badge pending">Weekly</span>
                                @else
                                    <span class="status-badge" style="background:#e2e8f0; color:#334155;">Custom</span>
                                @endif
                            </td>

                            @if (auth()->user()->user_type == 'admin')
                                <td>{{ $value->payment_schedule ?? 'N/A' }}</td>
                                <td>
                                    <img src="{{ $value->other_documents ? asset('images/loan_documents/' . $value->other_documents) : asset('default/default.jpg') }}"
                                         class="doc-image"
                                         onclick="window.open(this.src, '_blank')">
                                </td>
                            @endif

                            <td>
                                <a href="mailto:{{ $value->user ? $value->user->email : '' }}" 
                                   class="email-link">
                                    <i class="fas fa-envelope"></i>
                                    {{ $value->user ? $value->user->email : 'No Email' }}
                                </a>
                            </td>

                            <td>
                                <div class="date-text">
                                    <span><i class="fas fa-calendar"></i> {{ $value->created_at->format('Y-m-d') }}</span>
                                    <span><i class="fas fa-clock"></i> {{ $value->created_at->format('H:i:s') }}</span>
                                </div>
                            </td>

                            <td style="position:relative;">
                                <div class="action-wrapper">
                                    <button type="button" class="action-toggle">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>

                                    <div class="action-dropdown">
                                        <a href="{{ url('show-view', $value->loan_ide) }}" 
                                           class="dropdown-item">
                                            <i class="fas fa-eye" style="color:#2563eb;"></i>
                                            View Details
                                        </a>

                                        @if (auth()->user()->user_type == 'admin')
                                            <span class="dropdown-item open-modal btnView"
                                                  data-action="{{ url('show-edit', $value->loan_ide) }}"
                                                  data-modal="common-modal-md"
                                                  data-title="Edit Loan"
                                                  data-id="{{ $value->loan_ide }}">
                                                <i class="fas fa-edit" style="color:#d97706;"></i>
                                                Edit Record
                                            </span>

                                            <button type="button"
                                                    class="dropdown-item btnDelete"
                                                    data-id="{{ $value->loan_ide }}">
                                                <i class="fas fa-trash" style="color:#dc2626;"></i>
                                                Delete Record
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- Scripts -->
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $(".premium-table").DataTable({
        "ordering": true,
        "bAutoWidth": true,
        "responsive": true,
        "language": {
            "search": "🔍 Search:",
            "lengthMenu": "Show _MENU_ entries",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "paginate": {
                "first": "«",
                "last": "»",
                "next": "›",
                "previous": "‹"
            }
        }
    });

    // Action Menu Toggle
    $(document).on('click', '.action-toggle', function(e){
        e.stopPropagation();
        $(".action-dropdown").not($(this).next()).hide();
        $(this).next('.action-dropdown').toggle();
    });

    // Click outside to close
    $(document).on('click', function(){
        $(".action-dropdown").hide();
    });
});

<<<<<<< HEAD
// Status Update Function
function updateStatus(loan_ide) {
    let statuschange = $("#statusDropdown" + loan_ide).val();

    $.ajax({
        url: "{{ route('update-status') }}",
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            loan_ide: loan_ide,
            status: statuschange,
        },
        success: function(response) {
            if (response.success) {
                let select = $("#statusDropdown" + loan_ide);
                select.removeClass('pending complete rejected').addClass(statuschange);
                
                // Optional success message
                console.log('Status updated successfully');
            } else {
                alert(response.message || 'Error updating status');
=======
        $.ajax({
            url: "{{ route('update-approval-status') }}",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token for security
                loan_ide: loan_ide, // The ID of the loan
                status: statuschange, // The new status selected
            },

            success: function(response) {
                // On success, you could show a message, update the UI, etc.
                if (response.success) {
                    if (statuschange === 'pending') {
                        $("#statusDropdown" + loan_ide).removeClass('text-success text-danger').addClass(
                            'text-danger');
                    } else if (statuschange === 'approved') {
                        $("#statusDropdown" + loan_ide).removeClass('text-danger text-success').addClass(
                            'text-success');
                    } else if (statuschange === 'rejected') {
                        $("#statusDropdown" + loan_ide).removeClass('text-success text-danger').addClass(
                            'text-danger');
                    }
                } else {
                    alert(response.message || 'Error updating status');
                }
            },
            error: function() {
                // Handle any AJAX errors
                alert('An error occurred while updating the status');
>>>>>>> 5e5667e0c6862e3a926cf645ff55d7af2e8340a8
            }
        },
        error: function() {
            alert('An error occurred while updating the status');
        }
    });
}
</script>