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
        --table-row-hover: #f1f5f9;
        --table-row-even: #ffffff;
        --table-row-odd: #fafbfc;
        --text-primary: #0f172a;
        --text-secondary: #334155;
        --text-muted: #64748b;
        --border-color: #e2e8f0;
        --border-focus: #667eea;
        --badge-pending: #f59e0b;
        --badge-approved: #10b981;
        --badge-rejected: #ef4444;
        --badge-yearly: #10b981;
        --badge-weekly: #3b82f6;
        --badge-custom: #64748b;
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
        --border-focus: #818cf8;
        --badge-pending: #fbbf24;
        --badge-approved: #34d399;
        --badge-rejected: #f87171;
        --badge-yearly: #34d399;
        --badge-weekly: #60a5fa;
        --badge-custom: #94a3b8;
        --action-bg: #1e293b;
        --action-hover: #2d3a4f;
        --input-bg: #0f172a;
        --input-text: #f1f5f9;
        --pagination-bg: #1e293b;
        --pagination-text: #cbd5e1;
        --pagination-hover: #818cf8;
        --pagination-hover-text: #ffffff;
        --search-border: #475569;
    }

    body {
        background: var(--bg-body);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        margin: 0;
        padding: 20px;
        min-height: 100vh;
        transition: background 0.3s ease;
    }

    /* Premium Card */
    .premium-card {
        background: var(--card-bg);
        border-radius: 24px;
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
        margin-bottom: 2rem;
        max-width: 100%;
    }

    .premium-card .card-header {
        background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);
        padding: 1.2rem 1.5rem;
        border-bottom: 2px solid var(--border-color);
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .premium-card .card-header h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Search Form - FIXED FOR MOBILE */
    .search-form {
        background: var(--bg-secondary);
        border-radius: 50px;
        padding: 5px;
        border: 2px solid var(--border-color);
        display: flex;
        align-items: center;
        max-width: 500px;
        width: 100%;
    }

    .search-input-wrapper {
        position: relative;
        flex: 1;
        min-width: 0; /* Important for flex children */
    }

    .search-input-wrapper i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #667eea;
        font-size: 0.9rem;
        z-index: 1;
    }

    .search-input {
        width: 100%;
        padding: 10px 15px 10px 40px;
        border: none;
        border-radius: 50px;
        background: transparent;
        color: var(--input-text);
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
    }

    .search-input::placeholder {
        color: var(--text-muted);
    }

    .search-btn {
        background: var(--primary-gradient);
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        white-space: nowrap;
        margin-left: 5px;
        flex-shrink: 0; /* Prevents button from shrinking */
    }

    .search-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-sm);
    }

    .search-btn i {
        font-size: 0.9rem;
    }

    /* Table Container */
    .premium-table-container {
        padding: 1.2rem;
        overflow-x: auto;
    }

    /* Premium Table */
    .premium-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1200px;
        font-size: 0.9rem;
    }

    .premium-table thead tr {
        background: var(--table-header-bg);
        border-bottom: 2px solid var(--border-color);
    }

    .premium-table thead th {
        padding: 0.8rem 1rem;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.3px;
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
    }

    .premium-table tbody td {
        padding: 0.8rem 1rem;
        color: var(--text-secondary);
        font-size: 0.9rem;
        vertical-align: middle;
    }

    /* Status Badges - Smaller */
    .status-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.8rem;
        text-align: center;
        min-width: 80px;
    }

    .status-pending {
        background: rgba(245, 158, 11, 0.15);
        color: var(--badge-pending);
        border: 1px solid var(--badge-pending);
    }

    .status-approved {
        background: rgba(16, 185, 129, 0.15);
        color: var(--badge-approved);
        border: 1px solid var(--badge-approved);
    }

    .status-rejected {
        background: rgba(239, 68, 68, 0.15);
        color: var(--badge-rejected);
        border: 1px solid var(--badge-rejected);
    }

    /* Status Dropdown - Smaller */
    .status-select {
        padding: 6px 10px;
        border-radius: 30px;
        border: 2px solid var(--border-color);
        background: var(--input-bg);
        color: var(--input-text);
        font-weight: 500;
        font-size: 0.8rem;
        cursor: pointer;
        outline: none;
        min-width: 100px;
    }

    .status-select option {
        background: var(--input-bg);
        color: var(--input-text);
    }

    /* Term Badges - Smaller */
    .term-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .term-yearly {
        background: rgba(16, 185, 129, 0.15);
        color: var(--badge-yearly);
        border: 1px solid var(--badge-yearly);
    }

    .term-weekly {
        background: rgba(59, 130, 246, 0.15);
        color: var(--badge-weekly);
        border: 1px solid var(--badge-weekly);
    }

    .term-custom {
        background: rgba(100, 116, 139, 0.15);
        color: var(--badge-custom);
        border: 1px solid var(--badge-custom);
    }

    /* Document Image - Smaller */
    .doc-image {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid var(--border-color);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .doc-image:hover {
        transform: scale(1.1);
        border-color: #667eea;
    }

    /* Action Wrapper */
    .action-wrapper {
        position: relative;
        display: inline-block;
    }

    .action-toggle-premium {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        background: transparent;
        border: 2px solid var(--border-color);
        color: var(--text-secondary);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .action-toggle-premium:hover {
        background: var(--primary-gradient);
        border-color: transparent;
        color: white;
    }

    .action-dropdown-premium {
        position: absolute;
        top: 40px;
        right: 0;
        min-width: 160px;
        background: var(--action-bg);
        border-radius: 12px;
        padding: 6px;
        display: none;
        z-index: 1000;
        box-shadow: var(--shadow-lg);
        border: 2px solid var(--border-color);
        animation: slideDown 0.2s ease;
    }

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

    .action-dropdown-premium .dropdown-item {
        padding: 8px 12px;
        border-radius: 8px;
        color: var(--text-primary);
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all 0.2s ease;
        cursor: pointer;
        text-decoration: none;
    }

    .action-dropdown-premium .dropdown-item:hover {
        background: var(--action-hover);
        transform: translateX(3px);
    }

    .action-dropdown-premium .dropdown-item i {
        width: 16px;
        font-size: 0.9rem;
    }

    .action-dropdown-premium .dropdown-item.text-warning i { color: #f59e0b; }
    .action-dropdown-premium .dropdown-item.text-danger i { color: #ef4444; }

    /* DataTables Customization - Smaller */
    .dataTables_wrapper {
        padding: 0.5rem 0;
    }

    .dataTables_length, .dataTables_filter {
        margin-bottom: 0.8rem;
    }

    .dataTables_length label, .dataTables_filter label {
        color: var(--text-primary);
        font-weight: 500;
        font-size: 0.85rem;
    }

    .dataTables_length select, .dataTables_filter input {
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
        margin-top: 0.8rem;
        padding: 0.3rem;
        font-size: 0.85rem;
    }

    .dataTables_paginate {
        margin-top: 0.8rem;
    }

    .dataTables_paginate .paginate_button {
        border: 2px solid var(--border-color);
        border-radius: 8px;
        padding: 6px 12px;
        margin: 0 2px;
        color: var(--pagination-text);
        background: var(--pagination-bg);
        cursor: pointer;
        font-weight: 500;
        font-size: 0.8rem;
        transition: all 0.2s ease;
    }

    .dataTables_paginate .paginate_button.current {
        background: var(--primary-gradient);
        color: white;
        border-color: transparent;
    }

    .dataTables_paginate .paginate_button:hover {
        background: var(--pagination-hover);
        color: var(--pagination-hover-text);
        border-color: transparent;
    }

    /* ===== MOBILE FIXES - PDF Button visible ===== */
    @media (max-width: 768px) {
        .premium-card .card-header {
            flex-direction: column;
            align-items: stretch;
            padding: 1rem;
        }
        
        .premium-card .card-header h3 {
            text-align: center;
            margin-bottom: 5px;
        }
        
        /* FIX: Search form full width */
        .search-form {
            max-width: 100%;
            width: 100%;
        }
        
        /* FIX: Input takes remaining space */
        .search-input-wrapper {
            flex: 1;
        }
        
        .search-input {
            padding: 10px 15px 10px 40px;
            font-size: 0.9rem;
            width: 100%;
        }
        
        /* FIX: Button visible with proper size */
        .search-btn {
            padding: 10px 15px;
            font-size: 0.85rem;
            margin-left: 5px;
            flex-shrink: 0;
        }
        
        .search-btn i {
            font-size: 0.85rem;
        }
        
        .premium-table-container {
            padding: 0.8rem;
        }
        
        .premium-table thead th {
            padding: 0.6rem 0.8rem;
            font-size: 0.8rem;
        }
        
        .premium-table tbody td {
            padding: 0.6rem 0.8rem;
            font-size: 0.8rem;
        }
        
        .status-select {
            min-width: 90px;
            padding: 4px 6px;
        }
        
        .dataTables_filter {
            float: none;
            text-align: left;
        }
        
        .dataTables_filter input {
            min-width: 100%;
            width: 100%;
            margin-left: 0;
            margin-top: 5px;
        }
        
        .dataTables_length {
            float: none;
            text-align: left;
            margin-bottom: 10px;
        }
        
        .dataTables_paginate {
            float: none;
            text-align: center;
            margin-top: 1rem;
        }
        
        .dataTables_paginate .paginate_button {
            padding: 4px 8px;
            font-size: 0.75rem;
        }
    }

    /* Extra small devices */
    @media (max-width: 480px) {
        .search-btn span {
            display: none; /* Hide text on very small screens */
        }
        
        .search-btn i {
            margin: 0; /* Remove gap when text hidden */
        }
        
        .search-btn {
            padding: 10px 15px;
        }
        
        .status-badge {
            min-width: 70px;
            padding: 3px 6px;
            font-size: 0.75rem;
        }
    }
</style>

<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<div class="premium-card">
    <div class="card-header">
        <h3>Loan Commit List</h3>
        
        <form action="{{ route('committed-list-pdf') }}" method="get" id="search" target="_blank" class="search-form">
            <div class="search-input-wrapper">
                <i class="fas fa-search"></i>
                <input type="text" class="search-input" name="member_name" id="member_name"
                    placeholder="Search by member name..." required="required" autocomplete="off">
                <input type="hidden" name="member_id" id="member_id" value="">
            </div>
            <button type="submit" class="search-btn">
                <i class="fas fa-file-pdf"></i> <span>PDF</span>
            </button>
        </form>
    </div>

    <div class="premium-table-container">
        <table id="datatablesSimple" class="premium-table" width="100%">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Serial No</th>
                    <th>User Name</th>
                    <th>Loan Amt</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th>Terms</th>
                    @if (auth()->user()->user_type == 'admin')
                        <th>Schedule</th>
                        <th>Docs</th>
                    @endif
                    <th>Email</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @if (!empty($data))
                    @foreach ($data as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="status-badge" style="background: rgba(102, 126, 234, 0.15); color: #667eea;">{{ $value->loan_commit_id }}</span></td>
                            <td><strong style="color: var(--text-primary); font-size: 0.9rem;">{{ $value->user_name }}</strong></td>
                            <td><span class="status-badge" style="background: rgba(16, 185, 129, 0.15); color: var(--badge-approved);">${{ number_format($value->payment_amount, 2) }}</span></td>
                            <td>{{ $value->payment_month }}</td>
                            <td>{{ $value->loan_year }}</td>

                            <!-- Status Column -->
                            <td>
                                @if (auth()->user()->user_type == 'admin')
                                    <select id="statusDropdown{{ $value->id }}"
                                        onchange="updateStatus({{ $value->id }})"
                                        class="status-select">
                                        <option value="pending" {{ $value->status == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                        <option value="approved" {{ $value->status == 'approved' ? 'selected' : '' }}>✅ Approved</option>
                                        <option value="rejected" {{ $value->status == 'rejected' ? 'selected' : '' }}>❌ Rejected</option>
                                    </select>
                                @else
                                    <span class="status-badge 
                                        @if($value->status == 'pending') status-pending
                                        @elseif($value->status == 'approved') status-approved
                                        @elseif($value->status == 'rejected') status-rejected @endif">
                                        {{ ucfirst($value->status) }}
                                    </span>
                                @endif
                            </td>

                            <!-- Loan Terms -->
                            <td>
                                @if ($value->loan_term == 30)
                                    <span class="term-badge term-yearly">Yearly</span>
                                @elseif($value->loan_term == 7)
                                    <span class="term-badge term-weekly">Weekly</span>
                                @else
                                    <span class="term-badge term-custom">{{ $value->loan_term }}d</span>
                                @endif
                            </td>

                            @if (auth()->user()->user_type == 'admin')
                                <td>{{ $value->payment_schedule }}</td>
                                <td>
                                    <img src="{{ $value->other_documents ? asset('images/loan_documents/' . $value->other_documents) : asset('default/default.jpg') }}"
                                         class="doc-image" onclick="window.open(this.src, '_blank')">
                                </td>
                            @endif

                            <td style="max-width: 150px; overflow: hidden; text-overflow: ellipsis;">{{ $value->user ? $value->user->email : 'no email' }}</td>
                            <td>{{ $value->created_at->format('d M, Y') }}</td>

                            <!-- Action Column -->
                            <td style="position:relative;">
                                <div class="action-wrapper">
                                    <button type="button" class="action-toggle-premium">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>

                                    <div class="action-dropdown-premium">
                                        @if (auth()->user()->user_type == 'admin')
                                            <span class="dropdown-item text-warning open-modal btnView"
                                                data-action="{{ url('show-edit', $value->loan_ide) }}"
                                                data-modal="common-modal-md" data-title="Member Edit"
                                                data-id="{{ $value->loan_ide }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </span>

                                            <button type="button" class="dropdown-item text-danger btnDelete"
                                                data-id="{{ $value->loan_ide }}">
                                                <i class="fas fa-trash"></i> Delete
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
    openDoctorAutocomplete('#member_name', 'member_id');
    
    $(document).ready(function() {
        // Destroy existing DataTable if any
        if ($.fn.DataTable.isDataTable('#datatablesSimple')) {
            $('#datatablesSimple').DataTable().destroy();
        }

        // Initialize DataTable with compact settings
        $(".premium-table").DataTable({
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

        // Premium Three Dot Menu
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
            url: "{{ route('update-approval-status') }}",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                loan_ide: loan_ide,
                status: statuschange,
            },
            success: function(response) {
                if (response.success) {
                    let selectEl = $("#statusDropdown" + loan_ide);
                    selectEl.removeClass('text-danger text-success');
                    
                    if (statuschange === 'pending') {
                        selectEl.addClass('text-danger');
                    } else if (statuschange === 'approved') {
                        selectEl.addClass('text-success');
                    } else if (statuschange === 'rejected') {
                        selectEl.addClass('text-danger');
                    }
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