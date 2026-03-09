<style>
    /* ===== PREMIUM TABLE STYLES ===== */
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
        --table-row-hover: #f8fafc;
        --table-row-even: #ffffff;
        --table-row-odd: #fafbfc;
        --text-primary: #0f172a;
        --text-secondary: #334155;
        --text-muted: #64748b;
        --border-color: #e2e8f0;
        --border-focus: #667eea;
        --badge-pending: #f59e0b;
        --badge-complete: #10b981;
        --badge-rejected: #ef4444;
        --action-bg: #ffffff;
        --action-hover: #f1f5f9;
        --input-bg: #ffffff;
        --input-text: #0f172a;
        --pagination-bg: #ffffff;
        --pagination-text: #0f172a;
        --pagination-hover: #667eea;
        --pagination-hover-text: #ffffff;
        --search-border: #e2e8f0;
    }

    /* Dark Mode - সম্পূর্ণ ফিক্স */
    body.dark-mode {
        --bg-body: #0f172a !important;
        --card-bg: #1e293b !important;
        --table-header-bg: #0f172a !important;
        --table-row-hover: #2d3a4f !important;
        --table-row-even: #1e293b !important;
        --table-row-odd: #1a2534 !important;
        --text-primary: #f1f5f9 !important;
        --text-secondary: #cbd5e1 !important;
        --text-muted: #94a3b8 !important;
        --border-color: #334155 !important;
        --border-focus: #818cf8 !important;
        --badge-pending: #fbbf24 !important;
        --badge-complete: #34d399 !important;
        --badge-rejected: #f87171 !important;
        --action-bg: #1e293b !important;
        --action-hover: #2d3a4f !important;
        --input-bg: #0f172a !important;
        --input-text: #f1f5f9 !important;
        --pagination-bg: #1e293b !important;
        --pagination-text: #cbd5e1 !important;
        --pagination-hover: #818cf8 !important;
        --pagination-hover-text: #ffffff !important;
        --search-border: #475569 !important;
    }

    /* Card Styling */
    .premium-card {
        background: var(--card-bg) !important;
        border-radius: 24px;
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        border: 1px solid var(--border-color) !important;
        transition: all 0.3s ease;
    }

    .premium-card .card-header {
        background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%) !important;
        padding: 1.2rem 1.5rem;
        border-bottom: 2px solid var(--border-color) !important;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .premium-card .card-header i {
        font-size: 1.5rem;
        color: #667eea;
        background: rgba(102, 126, 234, 0.1);
        padding: 10px;
        border-radius: 12px;
    }

    .premium-card .card-header h5 {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--text-primary) !important;
        margin: 0;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Table Container */
    .premium-table-container {
        padding: 1.5rem;
        overflow-x: auto;
        background: var(--card-bg) !important;
    }

    /* Premium Table */
    .premium-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1200px;
        background: var(--card-bg) !important;
    }

    .premium-table thead tr {
        background: var(--table-header-bg) !important;
        border-bottom: 3px solid var(--border-color) !important;
    }

    .premium-table thead th {
        padding: 1rem 1.2rem;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--text-primary) !important;
        border: none;
        text-align: left;
        white-space: nowrap;
        background: var(--table-header-bg) !important;
    }

    .premium-table tbody tr {
        border-bottom: 1px solid var(--border-color) !important;
        transition: all 0.2s ease;
        background: var(--table-row-even) !important;
    }

    .premium-table tbody tr:nth-child(even) {
        background: var(--table-row-even) !important;
    }

    .premium-table tbody tr:nth-child(odd) {
        background: var(--table-row-odd) !important;
    }

    .premium-table tbody tr:hover {
        background: var(--table-row-hover) !important;
        transform: scale(1.01);
        box-shadow: var(--shadow-sm);
    }

    .premium-table tbody td {
        padding: 1rem 1.2rem;
        color: var(--text-secondary) !important;
        font-size: 0.95rem;
        vertical-align: middle;
        background: transparent !important;
    }

    /* Status Badges */
    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.85rem;
        text-align: center;
        min-width: 90px;
    }

    .status-pending {
        background: rgba(245, 158, 11, 0.15) !important;
        color: var(--badge-pending) !important;
        border: 1px solid var(--badge-pending) !important;
    }

    .status-complete {
        background: rgba(16, 185, 129, 0.15) !important;
        color: var(--badge-complete) !important;
        border: 1px solid var(--badge-complete) !important;
    }

    .status-rejected {
        background: rgba(239, 68, 68, 0.15) !important;
        color: var(--badge-rejected) !important;
        border: 1px solid var(--badge-rejected) !important;
    }

    /* Status Dropdown for Admin */
    .status-select {
        padding: 8px 12px;
        border-radius: 30px;
        border: 2px solid var(--border-color) !important;
        background: var(--input-bg) !important;
        color: var(--input-text) !important;
        font-weight: 500;
        font-size: 0.85rem;
        cursor: pointer;
        outline: none;
        min-width: 120px;
    }

    .status-select option {
        background: var(--input-bg) !important;
        color: var(--input-text) !important;
    }

    /* Action Wrapper */
    .action-wrapper {
        position: relative;
        display: inline-block;
    }

    .action-toggle-premium {
        width: 38px;
        height: 38px;
        border-radius: 12px;
        background: transparent !important;
        border: 2px solid var(--border-color) !important;
        color: var(--text-secondary) !important;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .action-toggle-premium:hover {
        background: var(--primary-gradient) !important;
        border-color: transparent !important;
        color: white !important;
        transform: rotate(90deg);
        box-shadow: var(--shadow-sm);
    }

    .action-dropdown-premium {
        position: absolute;
        top: 45px;
        right: 0;
        min-width: 180px;
        background: var(--action-bg) !important;
        border-radius: 16px;
        padding: 8px;
        display: none;
        z-index: 1000;
        box-shadow: var(--shadow-lg);
        border: 2px solid var(--border-color) !important;
        animation: slideDown 0.2s ease;
    }

    .action-dropdown-premium .dropdown-item {
        padding: 10px 15px;
        border-radius: 12px;
        color: var(--text-primary) !important;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: all 0.2s ease;
        cursor: pointer;
        text-decoration: none;
        background: transparent !important;
    }

    .action-dropdown-premium .dropdown-item:hover {
        background: var(--action-hover) !important;
        transform: translateX(5px);
    }

    /* Document Image */
    .doc-image {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 12px;
        border: 3px solid var(--border-color) !important;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .doc-image:hover {
        transform: scale(1.1);
        box-shadow: var(--shadow-lg);
        border-color: #667eea !important;
    }

    /* Deposit Amount */
    .deposit-amount {
        font-weight: 600;
        color: var(--text-primary) !important;
        background: var(--table-row-hover) !important;
        padding: 6px 12px;
        border-radius: 30px;
        border: 1px solid var(--border-color) !important;
    }

    /* DataTables Customization - Dark Mode Fix */
    .dataTables_wrapper {
        padding: 1rem 0;
        background: var(--card-bg) !important;
    }

    .dataTables_length, .dataTables_filter {
        margin-bottom: 1rem;
        color: var(--text-primary) !important;
    }

    .dataTables_length label, .dataTables_filter label {
        color: var(--text-primary) !important;
        font-weight: 500;
    }

    .dataTables_length select, .dataTables_filter input {
        border: 2px solid var(--border-color) !important;
        border-radius: 12px !important;
        padding: 8px 12px !important;
        background: var(--input-bg) !important;
        color: var(--input-text) !important;
        margin: 0 8px !important;
    }

    .dataTables_length select option {
        background: var(--input-bg) !important;
        color: var(--input-text) !important;
    }

    .dataTables_filter input {
        border: 2px solid var(--search-border) !important;
    }

    .dataTables_filter input:focus {
        border-color: #667eea !important;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15) !important;
        outline: none !important;
    }

    .dataTables_info {
        color: var(--text-secondary) !important;
        margin-top: 1rem !important;
        padding: 0.5rem !important;
    }

    .dataTables_paginate {
        margin-top: 1rem !important;
    }

    .dataTables_paginate .paginate_button {
        border: 2px solid var(--border-color) !important;
        border-radius: 10px !important;
        padding: 8px 14px !important;
        margin: 0 3px !important;
        color: var(--pagination-text) !important;
        background: var(--pagination-bg) !important;
        cursor: pointer !important;
        font-weight: 500 !important;
        transition: all 0.2s ease !important;
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

    .dataTables_paginate .paginate_button.disabled {
        opacity: 0.5;
        cursor: not-allowed !important;
    }

    .dataTables_paginate .paginate_button.disabled:hover {
        background: var(--pagination-bg) !important;
        color: var(--pagination-text) !important;
        border-color: var(--border-color) !important;
    }

    /* Entries info */
    .dataTables_length select {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E") !important;
        background-repeat: no-repeat;
        background-position: right 8px center;
        background-size: 16px;
        padding-right: 30px !important;
    }

    /* Animation */
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .premium-table-container {
            padding: 1rem;
        }
        
        .premium-card .card-header {
            padding: 1rem;
        }
        
        .premium-table thead th {
            padding: 0.8rem;
            font-size: 0.8rem;
        }
        
        .premium-table tbody td {
            padding: 0.8rem;
            font-size: 0.85rem;
        }
        
        .status-select {
            min-width: 100px;
            padding: 6px 8px;
        }
        
        .dataTables_paginate .paginate_button {
            padding: 5px 10px !important;
            font-size: 0.85rem !important;
        }
    }
</style>

<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
{{-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> --}}

<div class="premium-card">
    <div class="card-header">
        <i class="fas fa-table"></i>
        <h5>Loan Request Management</h5>
    </div>
    <div class="premium-table-container">
        <table id="datatablesSimple" class="premium-table" width="100%">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>NAME</th>
                    <th>LOAN AMOUNT</th>
                    <th>MONTHLY INCOME</th>
                    <th>LOAN TERMS</th>
                    @if (auth()->user()->user_type == 'admin')
                        <th>PAYMENT SCHEDULE</th>
                        <th>DOCUMENTS</th>
                    @endif
                    <th>EMAIL</th>
                    <th>DATE</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
            </thead>

            <tbody>
                @if (!empty($data))
                    @foreach ($data as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong style="color: var(--text-primary) !important;">{{ $value->user ? $value->user->name : 'no user' }}</strong></td>
                            <td><span class="deposit-amount">${{ number_format($value->loan_amount, 2) }}</span></td>
                            <td><span class="deposit-amount">${{ number_format($value->monthly_income, 2) }}</span></td>

                            <td>
                                @if ($value->loan_term == 30)
                                    <span class="status-badge" style="background: rgba(16, 185, 129, 0.15); color: var(--badge-complete) !important;">Yearly</span>
                                @elseif($value->loan_term == 7)
                                    <span class="status-badge" style="background: rgba(59, 130, 246, 0.15); color: #3b82f6 !important;">Weekly</span>
                                @else
                                    <span class="status-badge" style="background: rgba(100, 116, 139, 0.15); color: var(--text-muted) !important;">{{ $value->loan_term }} days</span>
                                @endif
                            </td>

                            @if (auth()->user()->user_type == 'admin')
                                <td style="color: var(--text-secondary) !important;">{{ $value->payment_schedule }}</td>
                                <td>
                                    <img src="{{ $value->other_documents ? asset('images/loan_documents/' . $value->other_documents) : asset('default/default.jpg') }}"
                                         class="doc-image" onclick="window.open(this.src, '_blank')">
                                </td>
                            @endif

                            <td style="color: var(--text-secondary) !important;">{{ $value->user ? $value->user->email : 'no email' }}</td>
                            <td style="color: var(--text-secondary) !important;">{{ $value->created_at->format('d M, Y') }}</td>

                            <!-- Status Column -->
                            <td>
                                @if (auth()->user()->user_type == 'admin')
                                    <select id="statusDropdown{{ $value->loan_ide }}" 
                                            onchange="updateStatus({{ $value->loan_ide }})"
                                            class="status-select">
                                        <option value="pending" {{ $value->status == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                        <option value="complete" {{ $value->status == 'complete' ? 'selected' : '' }}>✅ Accepted</option>
                                        <option value="rejected" {{ $value->status == 'rejected' ? 'selected' : '' }}>❌ Rejected</option>
                                    </select>
                                @else
                                    <span class="status-badge 
                                        @if($value->status == 'pending') status-pending
                                        @elseif($value->status == 'complete') status-complete
                                        @elseif($value->status == 'rejected') status-rejected @endif">
                                        {{ ucfirst($value->status) }}
                                    </span>
                                @endif
                            </td>

                            <!-- Action Column -->
                            <td style="position:relative;">
                                <div class="action-wrapper">
                                    <button type="button" class="action-toggle-premium">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>

                                    <div class="action-dropdown-premium">
                                        <a href="{{ url('loan-request-details', $value->loan_ide) }}" class="dropdown-item">
                                            <i class="fas fa-eye" style="color: #3b82f6;"></i> View Details
                                        </a>

                                        @if (auth()->user()->user_type == 'admin')
                                            <span class="dropdown-item open-modal btnView"
                                                data-action="{{ url('show-edit', $value->loan_ide) }}" 
                                                data-modal="common-modal-md"
                                                data-title="Edit Loan Request" 
                                                data-id="{{ $value->loan_ide }}">
                                                <i class="fas fa-edit" style="color: #f59e0b;"></i> Edit
                                            </span>

                                            <button type="button" class="dropdown-item btnDelete"
                                                data-id="{{ $value->loan_ide }}">
                                                <i class="fas fa-trash" style="color: #ef4444;"></i> Delete
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

<script>
    $(document).ready(function() {
        // Destroy existing DataTable if any
        if ($.fn.DataTable.isDataTable('#datatablesSimple')) {
            $('#datatablesSimple').DataTable().destroy();
        }

        // Initialize DataTable with premium options
        var table = $(".premium-table").DataTable({
            "ordering": true,
            "bAutoWidth": false,
            "responsive": false,
            "scrollX": true,
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

        // Premium Three Dot Menu Toggle
        $(document).on('click', '.action-toggle-premium', function(e) {
            e.stopPropagation();
            $(".action-dropdown-premium").not($(this).next()).hide();
            $(this).next('.action-dropdown-premium').toggle();
        });

        // Click outside to close
        $(document).on('click', function() {
            $(".action-dropdown-premium").hide();
        });
    });

    // Update Status Function
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
                    // Optional: Show success message
                    console.log('Status updated successfully');
                } else {
                    alert(response.message || 'Error updating status');
                }
            },
            error: function() {
                alert('An error occurred while updating the status');
            }
        });
    }
</script>