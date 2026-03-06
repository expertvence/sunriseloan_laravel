<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">

<style>
/* Premium Table Styling - Full Dark Mode Support */
:root {
    --table-header-bg: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --table-row-hover: rgba(99, 102, 241, 0.05);
    --table-border: #e2e8f0;
    --table-stripe: #f8fafc;
    --card-bg: #ffffff;
    --text-primary: #0f172a;
    --text-secondary: #64748b;
    --border-color: #e2e8f0;
    --input-bg: #ffffff;
    --shadow-color: rgba(0, 0, 0, 0.1);
    --primary: #2563eb;
    --primary-light: #3b82f6;
    --primary-soft: #dbeafe;
}

/* Dark Mode Variables - Full Dark */
body.dark-mode {
    --table-header-bg: linear-gradient(135deg, #1e293b 0%, #2d3a4f 100%);
    --table-row-hover: rgba(129, 140, 248, 0.15);
    --table-border: #334155;
    --table-stripe: #1e293b;
    --card-bg: #1e293b;
    --text-primary: #f1f5f9;
    --text-secondary: #cbd5e1;
    --border-color: #334155;
    --input-bg: #0f172a;
    --shadow-color: rgba(0, 0, 0, 0.5);
    
    /* Background colors for full page dark */
    background-color: #0f172a !important;
}

/* Ensure full page dark */
body.dark-mode,
body.dark-mode #app,
body.dark-mode .mainContant,
body.dark-mode #layoutSidenav,
body.dark-mode #layoutSidenav_content,
body.dark-mode .content-wrapper {
    background-color: #0f172a !important;
}

/* Premium Card */
.premium-table-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 3px;
    border-radius: 24px;
    box-shadow: 0 20px 25px -5px var(--shadow-color);
    margin-bottom: 2rem;
    transition: all 0.3s ease;
}

.table-inner {
    background: var(--card-bg);
    border-radius: 22px;
    padding: 1.5rem;
    overflow: hidden;
    transition: all 0.3s ease;
}

/* Card Header */
.card-header-premium {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid var(--border-color);
}

.card-header-premium .header-title {
    display: flex;
    align-items: center;
    gap: 12px;
}

.card-header-premium .header-title i {
    font-size: 1.8rem;
    color: #667eea;
    background: rgba(102, 126, 234, 0.1);
    padding: 10px;
    border-radius: 12px;
}

.card-header-premium .header-title h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
}

.card-header-premium .badge-count {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 0.5rem 1.2rem;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.9rem;
    box-shadow: 0 4px 6px -1px var(--shadow-color);
}

/* DataTables Wrapper - ENSURE VISIBILITY */
.dataTables_wrapper {
    padding: 1rem 0;
    color: var(--text-primary);
    width: 100%;
    position: relative;
    z-index: 1;
}

/* Length menu - TOP LEFT */
.dataTables_wrapper .dataTables_length {
    float: left;
    margin-bottom: 1.5rem;
    color: var(--text-secondary);
    font-size: 0.9rem;
    position: relative;
    z-index: 2;
}

.dataTables_wrapper .dataTables_length label {
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.dataTables_wrapper .dataTables_length select {
    background: var(--input-bg);
    border: 2px solid var(--border-color);
    border-radius: 30px;
    padding: 0.5rem 2rem 0.5rem 1rem;
    color: var(--text-primary);
    cursor: pointer;
    outline: none;
    margin: 0 5px;
    font-size: 0.9rem;
    min-width: 70px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 10px center;
    appearance: none;
}

/* Search box - TOP RIGHT */
.dataTables_wrapper .dataTables_filter {
    float: right;
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 2;
}

.dataTables_wrapper .dataTables_filter label {
    color: var(--text-secondary);
    position: relative;
    display: inline-flex;
    align-items: center;
}

.dataTables_wrapper .dataTables_filter input {
    background: var(--input-bg);
    border: 2px solid var(--border-color);
    border-radius: 30px;
    padding: 0.5rem 1rem 0.5rem 2.5rem;
    color: var(--text-primary);
    width: 280px;
    outline: none;
    transition: all 0.3s ease;
    margin-left: 10px;
    font-size: 0.95rem;
}

.dataTables_wrapper .dataTables_filter input:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.dataTables_wrapper .dataTables_filter label::before {
    content: '\f002';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    position: absolute;
    left: 1.2rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-secondary);
    z-index: 3;
    pointer-events: none;
    font-size: 0.9rem;
}

/* Table Info - BOTTOM LEFT */
.dataTables_wrapper .dataTables_info {
    float: left;
    color: var(--text-secondary);
    padding: 1.2rem 0;
    font-size: 0.9rem;
    clear: both;
}

/* Pagination - BOTTOM RIGHT */
.dataTables_wrapper .dataTables_paginate {
    float: right;
    padding: 1rem 0;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 0.5rem 1rem;
    margin: 0 3px;
    border-radius: 30px;
    border: 2px solid var(--border-color);
    background: var(--card-bg);
    color: var(--text-primary) !important;
    font-weight: 500;
    transition: all 0.3s ease;
    cursor: pointer;
    display: inline-block;
    font-size: 0.9rem;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current,
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white !important;
    border-color: transparent;
    transform: translateY(-2px);
}

.dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
    opacity: 0.5;
    cursor: not-allowed;
    pointer-events: none;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
    background: transparent;
    color: var(--text-primary) !important;
    border-color: var(--border-color);
    transform: none;
}

/* Clear floats */
.dataTables_wrapper:after {
    content: "";
    display: table;
    clear: both;
}

/* Table Styles */
.table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 8px;
    margin: 1rem 0;
    clear: both;
}

.table thead th {
    background: var(--table-header-bg);
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 1rem 0.75rem;
    border: none;
    white-space: nowrap;
}

.table thead th:first-child {
    border-top-left-radius: 12px;
}

.table thead th:last-child {
    border-top-right-radius: 12px;
}

/* ===== DARK MODE TABLE ROWS - FIXED ===== */
body.dark-mode .table tbody tr {
    background-color: #1e293b !important;
    border: 1px solid #334155 !important;
}

body.dark-mode .table tbody tr:hover {
    background-color: #263445 !important;
}

body.dark-mode .table tbody td {
    background-color: transparent !important;
    color: #f1f5f9 !important;
    border-bottom: 1px solid #334155 !important;
}

/* Fix DataTable odd/even row colors */
body.dark-mode .table tbody tr.odd,
body.dark-mode .table tbody tr.even {
    background-color: #1e293b !important;
}

body.dark-mode .table tbody tr.odd td,
body.dark-mode .table tbody tr.even td {
    background-color: transparent !important;
}

/* Fix hover state */
body.dark-mode .table tbody tr:hover td {
    background-color: transparent !important;
}

/* Fix last row border */
body.dark-mode .table tbody tr:last-child td {
    border-bottom: none !important;
}

/* Table tbody td general styles (light mode) */
.table tbody td {
    padding: 1rem 0.75rem;
    vertical-align: middle;
    color: var(--text-primary);
    font-size: 0.95rem;
    border-bottom: 1px solid var(--border-color);
    transition: all 0.2s ease;
    background-color: transparent;
}

.table tbody tr:hover td {
    background: var(--table-row-hover);
}

.table tbody tr:last-child td {
    border-bottom: none;
}

/* Status Badge Styles */
.status-badge {
    padding: 0.4rem 1rem;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.85rem;
    text-transform: capitalize;
    display: inline-block;
    min-width: 90px;
    text-align: center;
    color: white !important;
    box-shadow: 0 1px 2px 0 var(--shadow-color);
}

.status-badge.active {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
}

.status-badge.inactive {
    background: linear-gradient(135deg, #64748b 0%, #475569 100%);
}

.status-badge.rejected {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
}

/* Status Select Dropdown */
.status-select {
    padding: 0.4rem 1.8rem 0.4rem 1rem;
    border-radius: 30px;
    border: 2px solid transparent;
    font-weight: 600;
    font-size: 0.85rem;
    cursor: pointer;
    outline: none;
    transition: all 0.3s ease;
    min-width: 120px;
    text-transform: capitalize;
    color: white !important;
    box-shadow: 0 1px 2px 0 var(--shadow-color);
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 10px center;
    appearance: none;
}

.status-select.status-active {
    background-color: #10b981;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
}

.status-select.status-inactive {
    background-color: #64748b;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
}

.status-select.status-rejected {
    background-color: #dc2626;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
}

.status-select option {
    background: var(--card-bg);
    color: var(--text-primary);
    padding: 8px;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 8px;
    justify-content: center;
}

.action-btn {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    cursor: pointer;
    text-decoration: none;
    color: white;
    box-shadow: 0 1px 2px 0 var(--shadow-color);
}

.action-btn.view-btn {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
}

.action-btn.edit-btn {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
}

.action-btn.delete-btn {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
}

.action-btn:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 10px 15px -3px var(--shadow-color);
}

.action-btn i {
    font-size: 1rem;
    color: white;
}

/* Code Badge */
.code-badge {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 0.3rem 0.8rem;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.85rem;
    display: inline-block;
    box-shadow: 0 1px 2px 0 var(--shadow-color);
}

/* Created by badge */
.created-by {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: rgba(102, 126, 234, 0.1);
    padding: 0.3rem 1rem;
    border-radius: 30px;
    font-size: 0.85rem;
    color: var(--text-primary);
}

.created-by i {
    color: #667eea;
}

/* Avatar Circle */
.avatar-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
    margin-right: 8px;
}

.name-with-avatar {
    display: flex;
    align-items: center;
}

/* Email Link */
.email-link {
    color: #667eea;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: all 0.3s ease;
}

.email-link:hover {
    color: #764ba2;
    transform: translateX(2px);
}

.email-link i {
    font-size: 0.9rem;
}

/* Dark Mode Specific Overrides - Full Dark */
body.dark-mode .table-inner {
    background: #1e293b !important;
}

body.dark-mode .card-header-premium {
    border-bottom-color: #334155;
}

body.dark-mode .card-header-premium .header-title i {
    background: rgba(129, 140, 248, 0.15);
    color: #a5b4fc;
}

body.dark-mode .card-header-premium .header-title h3 {
    color: #f1f5f9;
}

body.dark-mode .table thead th {
    background: linear-gradient(135deg, #1e293b 0%, #2d3a4f 100%);
}

body.dark-mode .created-by {
    background: rgba(129, 140, 248, 0.15);
    color: #f1f5f9;
}

body.dark-mode .created-by i {
    color: #a5b4fc;
}

body.dark-mode .code-badge {
    background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
}

body.dark-mode .email-link {
    color: #a5b4fc;
}

body.dark-mode .email-link:hover {
    color: #c7d2fe;
}

/* Dark Mode DataTables */
body.dark-mode .dataTables_wrapper .dataTables_length,
body.dark-mode .dataTables_wrapper .dataTables_filter,
body.dark-mode .dataTables_wrapper .dataTables_info {
    color: #cbd5e1;
}

body.dark-mode .dataTables_wrapper .dataTables_length select,
body.dark-mode .dataTables_wrapper .dataTables_filter input {
    background: #0f172a;
    border-color: #334155;
    color: #f1f5f9;
}

body.dark-mode .dataTables_wrapper .dataTables_length select {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%239ca3af' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
}

body.dark-mode .dataTables_wrapper .dataTables_paginate .paginate_button {
    background: #1e293b !important;
    border-color: #334155;
    color: #f1f5f9 !important;
}

body.dark-mode .dataTables_wrapper .dataTables_paginate .paginate_button.current,
body.dark-mode .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%) !important;
    color: white !important;
}

/* Responsive Design */
@media (max-width: 768px) {
    .table-inner {
        padding: 1rem;
    }
    
    .card-header-premium {
        flex-direction: column;
        gap: 1rem;
        align-items: start;
    }
    
    .dataTables_wrapper .dataTables_length {
        float: none;
        margin-bottom: 1rem;
        text-align: left;
    }
    
    .dataTables_wrapper .dataTables_filter {
        float: none;
        margin-bottom: 1rem;
        text-align: left;
    }
    
    .dataTables_wrapper .dataTables_filter input {
        width: 100%;
        margin-left: 0;
        margin-top: 8px;
    }
    
    .dataTables_wrapper .dataTables_filter label {
        display: block;
    }
    
    .dataTables_wrapper .dataTables_filter label::before {
        top: 2.2rem;
        left: 1rem;
    }
    
    .dataTables_wrapper .dataTables_info {
        float: none;
        text-align: center;
    }
    
    .dataTables_wrapper .dataTables_paginate {
        float: none;
        text-align: center;
    }
    
    .action-buttons {
        gap: 5px;
    }
    
    .action-btn {
        width: 32px;
        height: 32px;
    }
}

@media (max-width: 576px) {
    .table thead th {
        font-size: 0.8rem;
        padding: 0.75rem 0.5rem;
    }
    
    .table tbody td {
        font-size: 0.85rem;
        padding: 0.75rem 0.5rem;
    }
    
    .status-badge,
    .status-select {
        min-width: 80px;
        font-size: 0.8rem;
        padding: 0.3rem 0.5rem;
    }
    
    .dataTables_wrapper .dataTables_length select {
        padding: 0.4rem 1.5rem 0.4rem 0.8rem;
    }
}

/* Animation */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.premium-table-card {
    animation: slideIn 0.5s ease-out;
}

/* Empty state styling */
.text-center.py-5 {
    text-align: center;
    padding: 3rem 0;
}
</style>

<div class="premium-table-card">
    <div class="table-inner">
        <!-- Premium Card Header -->
        <div class="card-header-premium">
            <div class="header-title">
                <i class="fas fa-users"></i>
                <h3>Manager List</h3>
            </div>
            <div class="badge-count">
                <i class="fas fa-database me-2"></i>Total: {{ count($data) }} Managers
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table id="datatablesSimple" class="table" width="100%">
                <thead>
                    <tr>
                        <th>SL#</th>
                        <th>Name</th>
                        <th>Designation</th>
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
                                <td>
                                    <span class="fw-bold">#{{ $loop->iteration }}</span>
                                </td>
                                
                                <td>
                                    <div class="name-with-avatar">
                                        <div class="avatar-circle">
                                            {{ substr($value->name, 0, 1) }}
                                        </div>
                                        <span>{{ $value->name }}</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-primary">{{ $value->user_type ?? 'N/A' }}</span></td>
                                <td>{{ $value->fathers_name ?? 'N/A' }}</td>
                                <td>{{ $value->mothers_name ?? 'N/A' }}</td>
                                <td>
                                    <a href="mailto:{{ $value->email }}" class="email-link">
                                        <i class="fas fa-envelope"></i>
                                        {{ $value->email }}
                                    </a>
                                </td>
                                <td>
                                    @if (Auth::user()->user_type == 'admin')
                                        <select class="status-select status-{{ $value->status }}" data-id="{{ $value->id }}">
                                            <option value="active" {{ $value->status == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ $value->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            <option value="rejected" {{ $value->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    @else
                                        <span class="status-badge {{ $value->status }}">
                                            {{ ucfirst($value->status) }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <span class="created-by">
                                        <i class="fas fa-user-circle"></i>
                                        {{ $value->created_by ?? 'System' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('member_profile', $value->id) }}" target="" class="action-btn view-btn" title="View Profile">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <span class="action-btn edit-btn open-modal" 
                                              data-action="{{ route('manager-create-form', $value->id) }}"
                                              data-modal="common-modal-md" 
                                              data-title="Edit Manager" 
                                              data-id="{{ $value->id }}" 
                                              title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <!-- Delete Button -->
                                        <span class="action-btn delete-btn" 
                                            data-id="{{ $value->id }}" 
                                            data-url="{{ route('manager-destroy', $value->id) }}" 
                                            title="Delete Manager">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <div style="text-align: center; padding: 3rem;">
                                    <i class="fas fa-users-slash" style="font-size: 4rem; color: var(--text-secondary); opacity: 0.5; margin-bottom: 1rem;"></i>
                                    <p style="color: var(--text-secondary); font-size: 1.1rem;">No managers found</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Dark mode check - force apply
    function applyDarkMode() {
        if (localStorage.getItem('theme') === 'dark' || $('body').hasClass('dark-mode')) {
            $('body').addClass('dark-mode');
        }
    }

    // Apply dark mode immediately
    applyDarkMode();

    // Initialize DataTable
    var table = $("#datatablesSimple").DataTable({
        "ordering": false,
        "bAutoWidth": false,
        "responsive": true,
        "dom": 'lfrtip',
        "language": {
            "search": "",
            "searchPlaceholder": "Search members...",
            "lengthMenu": "Show _MENU_ entries",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "Showing 0 to 0 of 0 entries",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "paginate": {
                "first": "«",
                "last": "»",
                "next": "›",
                "previous": "‹"
            }
        },
        "pageLength": 10,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "drawCallback": function(settings) {
            // Re-apply dark mode after each draw
            applyDarkMode();
        }
    });

    // Initialize status colors
    $('.status-select').each(function() {
        updateStatusColor($(this));
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
        url: "{{ route('manager-status-update') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            id: memberId,
            status: status
        },
        success: function(response) {
            console.log('Status updated successfully');
            $this.data('original-value', status);
        },
        error: function(xhr) {
            $this.val(originalValue);
            updateStatusColor($this);
            alert('Error updating status. Please try again.');
        },
        complete: function() {
            $this.prop('disabled', false);
            $this.css('opacity', '1');
        }
    });
});

function confirmDelete(title = "Are you sure?", text = "You won't be able to revert this!") {
    return Swal.fire({
        title: title,
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#10b981',
        cancelButtonColor: '#ef4444',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    });
}

function deleteItem(url, rowElement) {
    $.ajax({
        url: url,
        type: 'DELETE',
        data: {
            _token: "{{ csrf_token() }}"
        },
        success: function(response) {
            if (rowElement) {
                rowElement.closest('tr').remove();
            }
            Swal.fire(
                'Deleted!',
                response.msg ?? 'Item deleted successfully.',
                'success'
            );
        },
        error: function(xhr) {
            Swal.fire(
                'Error!',
                xhr.responseJSON?.message || 'Something went wrong. Please try again.',
                'error'
            );
        }
    });
}

$(document).on('click', '.delete-btn', function() {
    let $this = $(this);
    let url = $this.data('url');

    confirmDelete().then((result) => {
        if (result.isConfirmed) {
            deleteItem(url, $this);
        }
    });
});

// Dark mode toggle function (if you have a toggle button)
function toggleDarkMode() {
    $('body').toggleClass('dark-mode');
    if ($('body').hasClass('dark-mode')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>