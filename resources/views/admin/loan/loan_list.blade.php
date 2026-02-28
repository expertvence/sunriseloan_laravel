<style>
/* ========================================
   🌈 PREMIUM FINTECH THEME
   ======================================== */

:root {
    /* 🌞 Light Mode */
    --primary-gradient: linear-gradient(135deg, #4f46e5, #7c3aed, #ec4899);
    --primary-color: #4f46e5;
    --primary-soft: rgba(79, 70, 229, 0.08);
    
    --card-bg: #ffffff;
    --body-bg: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%);
    
    --text-primary: #0f172a;
    --text-secondary: #334155;
    --text-muted: #64748b;
    --border-color: #e2e8f0;
    --border-light: #f1f5f9;
    
    --success: #059669;
    --success-bg: #d1fae5;
    --warning: #d97706;
    --warning-bg: #fef3c7;
    --danger: #dc2626;
    --danger-bg: #fee2e2;
    --info: #2563eb;
    --info-bg: #dbeafe;
    
    --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.03);
    --shadow-md: 0 8px 24px rgba(79, 70, 229, 0.12);
    --shadow-lg: 0 20px 40px rgba(79, 70, 229, 0.18);
    
    --radius-md: 12px;
    --radius-lg: 20px;
    --radius-xl: 28px;
    
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* 🌙 Dark Mode - High Contrast */
body.dark-mode {
    --primary-gradient: linear-gradient(135deg, #818cf8, #c084fc, #f9a8d4);
    --primary-color: #a5b4fc;
    --primary-soft: rgba(129, 140, 248, 0.15);
    
    --card-bg: #0f172a;
    --body-bg: linear-gradient(135deg, #020617 0%, #0f172a 100%);
    
    --text-primary: #ffffff;
    --text-secondary: #e2e8f0;
    --text-muted: #94a3b8;
    --border-color: #334155;
    --border-light: #1e293b;
    
    --success: #4ade80;
    --success-bg: rgba(74, 222, 128, 0.15);
    --warning: #fbbf24;
    --warning-bg: rgba(251, 191, 36, 0.15);
    --danger: #f87171;
    --danger-bg: rgba(248, 113, 113, 0.15);
    --info: #93c5fd;
    --info-bg: rgba(147, 197, 253, 0.15);
    
    --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.5);
    --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.6);
    --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.7);
}

/* Base Styles */
body {
    background: var(--body-bg);
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    margin: 0;
    min-height: 100vh;
    padding: 24px;
    color: var(--text-primary);
    transition: var(--transition);
}

/* ================= PREMIUM CARD ================= */
.premium-card {
    background: var(--card-bg);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    overflow: hidden;
    border: 1px solid var(--border-color);
    transition: var(--transition);
    position: relative;
}

.premium-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--primary-gradient);
    opacity: 0.5;
}

.premium-card:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-2px);
}

/* ================= CARD HEADER ================= */
.card-header-premium {
    background: var(--primary-gradient);
    padding: 20px 28px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: white;
    position: relative;
    overflow: hidden;
}

.card-header-premium::after {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    pointer-events: none;
}

.card-header-premium h3 {
    margin: 0;
    font-size: 1.4rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 12px;
    position: relative;
    z-index: 1;
}

.card-header-premium h3 i {
    font-size: 1.6rem;
    color: white;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
}

.header-badge {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(8px);
    padding: 6px 18px;
    border-radius: 40px;
    font-size: 0.85rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    position: relative;
    z-index: 1;
}

/* ================= TABLE ================= */
.table-responsive {
    overflow-x: auto;
    margin: 0;
    border-radius: 0 0 var(--radius-xl) var(--radius-xl);
}

.premium-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 8px;
    padding: 20px;
}

/* Table Headers */
.premium-table thead th {
    background: transparent;
    color: var(--text-secondary);
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 12px 16px;
    white-space: nowrap;
    border-bottom: 2px solid var(--border-color);
}

/* Table Rows */
.premium-table tbody tr {
    background: var(--card-bg);
    border-radius: var(--radius-lg);
    transition: var(--transition);
    position: relative;
    box-shadow: var(--shadow-sm);
}

.premium-table tbody tr:hover {
    transform: translateY(-2px) scale(1.01);
    box-shadow: var(--shadow-md);
    z-index: 2;
}

.premium-table tbody td {
    padding: 16px 16px;
    color: var(--text-primary);
    font-size: 0.9rem;
    border: none;
    background: var(--card-bg);
    font-weight: 500;
}

.premium-table tbody td:first-child {
    border-top-left-radius: var(--radius-lg);
    border-bottom-left-radius: var(--radius-lg);
}

.premium-table tbody td:last-child {
    border-top-right-radius: var(--radius-lg);
    border-bottom-right-radius: var(--radius-lg);
}

/* ================= STATUS BADGES ================= */
.status-badge {
    padding: 6px 14px;
    border-radius: 40px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-block;
    border: 1px solid transparent;
}

/* Light Mode */
.status-badge.pending { background: var(--warning-bg); color: #b45309; }
.status-badge.complete { background: var(--success-bg); color: #047857; }
.status-badge.rejected { background: var(--danger-bg); color: #b91c1c; }

/* Dark Mode */
body.dark-mode .status-badge.pending { background: #fbbf24; color: #0f172a; }
body.dark-mode .status-badge.complete { background: #4ade80; color: #0f172a; }
body.dark-mode .status-badge.rejected { background: #f87171; color: #0f172a; }

/* ================= STATUS SELECT ================= */
.status-select {
    padding: 6px 12px;
    border-radius: 40px;
    font-size: 0.75rem;
    font-weight: 600;
    border: 2px solid transparent;
    cursor: pointer;
    outline: none;
    width: 100%;
    min-width: 100px;
    transition: var(--transition);
    background: var(--card-bg);
    color: var(--text-primary);
}

.status-select.pending { background: var(--warning-bg); color: #b45309; border-color: #fbbf24; }
.status-select.complete { background: var(--success-bg); color: #047857; border-color: #4ade80; }
.status-select.rejected { background: var(--danger-bg); color: #b91c1c; border-color: #f87171; }

body.dark-mode .status-select.pending { background: #fbbf24; color: #0f172a; }
body.dark-mode .status-select.complete { background: #4ade80; color: #0f172a; }
body.dark-mode .status-select.rejected { background: #f87171; color: #0f172a; }

/* ================= DEPOSIT SECTION ================= */
.deposit-wrapper {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.deposit-display {
    display: flex;
    align-items: center;
    gap: 8px;
}

.deposit-amount {
    font-weight: 700;
    color: var(--text-primary);
    background: var(--primary-soft);
    padding: 4px 12px;
    border-radius: 30px;
    font-size: 0.85rem;
}

.deposit-edit-box {
    display: flex;
    gap: 8px;
    flex-direction: column;
}

.deposit-edit-box input {
    padding: 8px 12px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    background: var(--card-bg);
    color: var(--text-primary);
    font-size: 0.85rem;
}

.deposit-edit-box button {
    padding: 6px 12px;
    border-radius: var(--radius-md);
    border: none;
    background: var(--primary-gradient);
    color: white;
    font-weight: 600;
    cursor: pointer;
}

/* ================= ACTION MENU ================= */
.action-wrapper {
    position: relative;
    display: inline-block;
}

.action-toggle {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 2px solid var(--border-color);
    background: var(--card-bg);
    color: var(--text-primary);
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    align-items: center;
    justify-content: center;
}

.action-toggle:hover {
    background: var(--primary-gradient);
    color: white;
    border-color: transparent;
    transform: rotate(90deg) scale(1.1);
    box-shadow: var(--shadow-md);
}

.action-dropdown {
    position: absolute;
    top: 48px;
    right: 0;
    min-width: 200px;
    background: var(--card-bg);
    border-radius: var(--radius-lg);
    padding: 8px 0;
    display: none;
    z-index: 1000;
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--border-color);
    animation: slideDown 0.2s ease;
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.action-dropdown .dropdown-item {
    padding: 10px 18px;
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--text-primary);
    font-size: 0.85rem;
    transition: var(--transition);
    cursor: pointer;
    background: transparent;
    border: none;
    width: 100%;
    text-align: left;
}

.action-dropdown .dropdown-item:hover {
    background: var(--primary-soft);
    padding-left: 24px;
}

/* ================= DOCUMENT IMAGE ================= */
.doc-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: var(--radius-md);
    border: 2px solid var(--border-color);
    transition: var(--transition);
    cursor: pointer;
}

.doc-image:hover {
    transform: scale(1.1);
    box-shadow: var(--shadow-md);
}

/* ================= DATATABLES ================= */
.dataTables_wrapper {
    padding: 20px;
}

.dataTables_length,
.dataTables_filter {
    margin-bottom: 20px;
}

.dataTables_length select,
.dataTables_filter input {
    padding: 8px 14px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    background: var(--card-bg);
    color: var(--text-primary);
    font-size: 0.85rem;
    transition: var(--transition);
    margin: 0 5px;
}

.dataTables_filter input {
    min-width: 250px;
}

.dataTables_info {
    padding: 16px 0;
    color: var(--text-secondary);
    font-size: 0.85rem;
}

.dataTables_paginate {
    padding: 16px 0;
}

.dataTables_paginate .paginate_button {
    padding: 8px 16px;
    margin: 0 4px;
    border-radius: var(--radius-md);
    border: 2px solid var(--border-color);
    background: var(--card-bg);
    color: var(--text-primary) !important;
    font-weight: 600;
    font-size: 0.85rem;
    transition: var(--transition);
    cursor: pointer;
}

.dataTables_paginate .paginate_button.current,
.dataTables_paginate .paginate_button:hover {
    background: var(--primary-gradient);
    color: white !important;
    border-color: transparent;
    transform: translateY(-2px);
}

/* ================= RESPONSIVE ================= */
@media (max-width: 1200px) {
    .premium-table tbody td { font-size: 0.85rem; }
    .premium-table thead th { font-size: 0.7rem; }
}

@media (max-width: 992px) {
    body { padding: 16px; }
    .card-header-premium { padding: 16px 20px; }
    .card-header-premium h3 { font-size: 1.2rem; }
    .premium-table { padding: 16px; }
}

@media (max-width: 768px) {
    body { padding: 12px; }
    
    .card-header-premium {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    
    .header-badge { align-self: flex-start; }
    
    .premium-table thead th {
        font-size: 0.65rem;
        padding: 10px 8px;
    }
    
    .premium-table tbody td {
        padding: 12px 8px;
        font-size: 0.8rem;
    }
    
    .status-select { min-width: 80px; }
    
    .dataTables_filter input { min-width: 180px; }
}

@media (max-width: 576px) {
    body { padding: 8px; }
    
    .card-header-premium { padding: 14px 16px; }
    .card-header-premium h3 { font-size: 1rem; }
    
    .premium-table { padding: 12px; }
    .premium-table tbody td { padding: 10px 6px; }
    
    .action-toggle { width: 32px; height: 32px; }
    .action-dropdown { min-width: 180px; }
    
    .doc-image { width: 50px; height: 50px; }
    
    .dataTables_filter input { min-width: 100%; }
    .dataTables_paginate .paginate_button { padding: 6px 10px; }
}

/* ================= UTILITIES ================= */
.fw-bold { font-weight: 700; color: var(--text-primary); }
.text-center { text-align: center; }
.d-none { display: none; }
.d-flex { display: flex; }
.align-items-center { align-items: center; }
.gap-2 { gap: 8px; }
.mt-2 { margin-top: 8px; }
</style>

<!-- 📦 Main Container -->
<div class="premium-card">
    <!-- 👑 Card Header -->
    <div class="card-header-premium">
        <h3>
            <i class="fas fa-file-invoice"></i>
            Loan Requests
        </h3>
        <span class="header-badge">
            <i class="fas fa-database"></i>
            Total: {{ count($data) }} Requests
        </span>
    </div>

    <!-- 📊 Table -->
    <div class="table-responsive">
        <table id="datatablesSimple" class="premium-table" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Loan Amount</th>
                    <th>Monthly Income</th>
                    @if(auth()->user()->user_type == 'admin')
                        <th>Deposit</th>
                    @endif
                    <th>Terms</th>
                    @if(auth()->user()->user_type == 'admin')
                        <th>Schedule</th>
                        <th>Documents</th>
                    @endif
                    <th>Email</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $value)
                    <tr>
                        <td><span class="fw-bold">#{{ $loop->iteration }}</span></td>
                        <td>{{ $value->user->name ?? 'No User' }}</td>
                        <td><span class="fw-bold">৳ {{ number_format($value->loan_amount, 2) }}</span></td>
                        <td>৳ {{ number_format($value->monthly_income, 2) }}</td>
                        
                        @if(auth()->user()->user_type == 'admin')
                            <td>
                                <div class="deposit-wrapper" data-id="{{ $value->loan_ide }}">
                                    @if($value->deposit == 0)
                                        <div class="deposit-display">
                                            <button type="button" class="btn btn-sm btn-light addDepositBtn" style="border-radius:30px; padding:4px 12px;">
                                                <i class="fas fa-plus text-success me-1"></i>
                                                Add
                                            </button>
                                        </div>
                                    @else
                                        <div class="deposit-display">
                                            <span class="deposit-amount">৳ {{ number_format($value->deposit, 2) }}</span>
                                            <button type="button" class="btn btn-sm btn-light editDepositBtn" style="border-radius:50%; width:32px; height:32px;">
                                                <i class="fas fa-pen text-primary"></i>
                                            </button>
                                        </div>
                                    @endif
                                    
                                    <div class="deposit-edit-box d-none">
                                        <input type="number" step="0.01" class="depositInput" value="{{ $value->deposit }}" placeholder="Enter amount">
                                        <button class="saveDepositBtn">Submit</button>
                                    </div>
                                </div>
                            </td>
                        @endif
                        
                        <td>
                            @if($value->loan_term == 30)
                                <span class="status-badge complete">Yearly</span>
                            @elseif($value->loan_term == 7)
                                <span class="status-badge pending">Weekly</span>
                            @else
                                <span class="status-badge" style="background:var(--info-bg); color:var(--info);">Custom</span>
                            @endif
                        </td>
                        
                        @if(auth()->user()->user_type == 'admin')
                            <td>{{ $value->payment_schedule ?? 'N/A' }}</td>
                            <td>
                                <img src="{{ $value->other_documents ? asset('images/loan_documents/'.$value->other_documents) : asset('default/default.jpg') }}"
                                     class="doc-image" onclick="window.open(this.src, '_blank')">
                            </td>
                        @endif
                        
                        <td>
                            <a href="mailto:{{ $value->user->email ?? '' }}" style="color:var(--primary-color); text-decoration:none;">
                                <i class="fas fa-envelope me-1"></i>
                                {{ $value->user->email ?? 'No Email' }}
                            </a>
                        </td>
                        
                        <td>
                            <div style="color:var(--text-muted); font-size:0.8rem;">
                                <div><i class="fas fa-calendar"></i> {{ $value->created_at->format('Y-m-d') }}</div>
                                <div><i class="fas fa-clock"></i> {{ $value->created_at->format('H:i:s') }}</div>
                            </div>
                        </td>
                        
                        <td>
                            @if(auth()->user()->user_type == 'admin')
                                <select id="statusDropdown{{ $value->loan_ide }}"
                                        onchange="updateStatus({{ $value->loan_ide }})"
                                        class="status-select {{ $value->status }}">
                                    <option value="pending" {{ $value->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="complete" {{ $value->status == 'complete' ? 'selected' : '' }}>Accepted</option>
                                    <option value="rejected" {{ $value->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            @else
                                <span class="status-badge {{ $value->status }}">{{ ucfirst($value->status) }}</span>
                            @endif
                        </td>
                        
                        <td>
                            <div class="action-wrapper">
                                <button type="button" class="action-toggle">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                
                                <div class="action-dropdown">
                                    <a href="{{ url('show-view', $value->loan_ide) }}" class="dropdown-item">
                                        <i class="fas fa-eye" style="color:#2563eb;"></i> View Details
                                    </a>
                                    
                                    @if(auth()->user()->user_type == 'admin')
                                        <span class="dropdown-item open-modal btnView"
                                              data-action="{{ url('show-edit', $value->loan_ide) }}"
                                              data-modal="common-modal-md"
                                              data-title="Edit Loan"
                                              data-id="{{ $value->loan_ide }}">
                                            <i class="fas fa-edit" style="color:#d97706;"></i> Edit Record
                                        </span>
                                        
                                        <button type="button" class="dropdown-item btnDelete" data-id="{{ $value->loan_ide }}">
                                            <i class="fas fa-trash" style="color:#dc2626;"></i> Delete Record
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="20" class="text-center py-5">
                            <i class="fas fa-inbox" style="font-size:48px; color:var(--text-muted); margin-bottom:16px;"></i>
                            <h4 style="color:var(--text-primary);">No Data Found</h4>
                            <p style="color:var(--text-secondary);">There are no loan requests to display.</p>
                        </td>
                    </tr>
                @endforelse
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
        ordering: true,
        bAutoWidth: true,
        responsive: true,
        language: {
            search: "🔍",
            lengthMenu: "_MENU_",
            info: "Showing _START_ to _END_ of _TOTAL_",
            paginate: { first: "«", last: "»", next: "›", previous: "‹" }
        }
    });
    
    // Action Menu Toggle
    $(document).on('click', '.action-toggle', function(e) {
        e.stopPropagation();
        $('.action-dropdown').not($(this).next()).hide();
        $(this).next('.action-dropdown').toggle();
    });
    
    $(document).on('click', function() {
        $('.action-dropdown').hide();
    });
});

// Status Update
function updateStatus(loan_ide) {
    let status = $("#statusDropdown" + loan_ide).val();
    
    $.ajax({
        url: "{{ route('update-status') }}",
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            loan_ide: loan_ide,
            status: status
        },
        success: function(response) {
            if(response.success) {
                let select = $("#statusDropdown" + loan_ide);
                select.removeClass('pending complete rejected').addClass(status);
            } else {
                alert(response.message || 'Error updating status');
            }
        },
        error: function() {
            alert('Error updating status');
        }
    });
}

// Deposit Management
$(document).on('click', '.addDepositBtn, .editDepositBtn', function() {
    let wrapper = $(this).closest('.deposit-wrapper');
    wrapper.find('.deposit-display').hide();
    wrapper.find('.deposit-edit-box').removeClass('d-none');
});

$(document).on('click', '.saveDepositBtn', function() {
    let wrapper = $(this).closest('.deposit-wrapper');
    let id = wrapper.data('id');
    let amount = wrapper.find('.depositInput').val();
    
    $.ajax({
        url: "{{ route('update-deposit') }}",
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id,
            deposit: amount
        },
        success: function(response) {
            if(response.success) {
                wrapper.find('.deposit-edit-box').addClass('d-none');
                wrapper.find('.deposit-display').html(`
                    <span class="deposit-amount">৳ ${parseFloat(amount).toFixed(2)}</span>
                    <button type="button" class="btn btn-sm btn-light editDepositBtn" style="border-radius:50%; width:32px; height:32px;">
                        <i class="fas fa-pen text-primary"></i>
                    </button>
                `).show();
            } else {
                alert('Error saving deposit');
            }
        }
    });
});
</script>