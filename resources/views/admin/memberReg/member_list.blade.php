<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">

<style>
:root {
    --primary-color: #4361ee;
    --primary-hover: #3730a3;
    --secondary-color: #64748b;
    --success-color: #10b981;
    --danger-color: #ef4444;
    --warning-color: #f59e0b;
    --dark-bg: #1e293b;
    --light-bg: #f8fafc;
    --border-color: #e2e8f0;
    --text-primary: #0f172a;
    --text-secondary: #334155;
    --text-muted: #475569;
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
    --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    
    /* Dark mode variables */
    --dark-bg-primary: #0f172a;
    --dark-bg-secondary: #1e293b;
    --dark-bg-tertiary: #2d3a4f;
    --dark-text-primary: #ffffff;
    --dark-text-secondary: #e2e8f0;
    --dark-text-muted: #cbd5e1;
    --dark-border: #334155;
    --dark-card-bg: #1e293b;
    --dark-hover: #2d3a4f;
    --dark-table-stripe: #1e293b;
    --dark-table-hover: #2d3a4f;
}

/* Premium Card Styles */
.premium-table-card {
    background: transparent;
    padding: 25px;
    border-radius: 24px;
    box-shadow: var(--shadow-xl);
    margin-bottom: 2rem;
    transition: var(--transition);
}

.premium-table-card:hover {
    box-shadow: 0 25px 50px -12px rgba(102, 126, 234, 0.5);
}

.table-inner {
    background: white;
    border-radius: 22px;
    padding: 1.5rem;
    overflow: hidden;
    transition: var(--transition);
}

/* Dark Mode Styles */
body.dark-mode {
    background-color: var(--dark-bg-primary);
}

body.dark-mode .premium-table-card .table-inner {
    background: var(--dark-card-bg);
}

body.dark-mode .card-header {
    background: linear-gradient(135deg, #1e293b 0%, #2d3a4f 100%);
    border-bottom: 2px solid var(--dark-border);
    color: var(--dark-text-primary);
}

body.dark-mode .card-header .badge {
    background: var(--dark-text-primary) !important;
    color: var(--dark-bg-primary) !important;
}

body.dark-mode .table {
    color: var(--dark-text-primary);
}

body.dark-mode .table thead th {
    background: linear-gradient(135deg, #2d3a4f 0%, #1e293b 100%);
    color: var(--dark-text-primary);
}

body.dark-mode .table tbody td {
    border-color: var(--dark-border);
    color: var(--dark-text-primary);
}

body.dark-mode .table tbody tr:hover td {
    background-color: var(--dark-table-hover);
}

/* Card Header */
.card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 1.25rem 1.5rem;
    border-bottom: none;
    border-radius: 18px 18px 0 0;
    color: white;
    font-weight: 600;
    font-size: 1.25rem;
    display: flex;
    align-items: center;
    gap: 10px;
}

.card-header .badge {
    background: rgba(255, 255, 255, 0.2) !important;
    color: white !important;
    backdrop-filter: blur(10px);
}

/* Table Header */
.table thead th {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    padding: 1rem 0.75rem;
    border: none;
    white-space: nowrap;
}

/* Status Badge Styles */
.status-badge {
    padding: 6px 12px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.85rem;
    text-transform: capitalize;
    display: inline-block;
    min-width: 80px;
    text-align: center;
    color: white !important;
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
    padding: 8px 16px;
    border-radius: 30px;
    border: 2px solid transparent;
    font-weight: 600;
    font-size: 0.85rem;
    cursor: pointer;
    outline: none;
    transition: var(--transition);
    min-width: 120px;
    text-transform: capitalize;
    color: white !important;
}

.status-select.status-active {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
}

.status-select.status-inactive {
    background: linear-gradient(135deg, #64748b 0%, #475569 100%);
}

.status-select.status-rejected {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
}

.status-select option {
    background: white;
    color: var(--text-primary);
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 10px;
    justify-content: center;
}

.action-btn {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    transition: var(--transition);
    cursor: pointer;
}

.action-btn.view-btn {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
}

.action-btn.edit-btn {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
}

/* Avatar Circle */
.avatar-circle {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    font-weight: 600;
}

/* ========== MOBILE RESPONSIVE STYLES ========== */
@media screen and (max-width: 767px) {
    /* Force table to not be like a table */
    .table-responsive table,
    .table-responsive thead,
    .table-responsive tbody,
    .table-responsive th,
    .table-responsive td,
    .table-responsive tr {
        display: block;
    }
    
    /* Hide table headers */
    .table-responsive thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
    }
    
    /* Make each row a card */
    .table-responsive tbody tr {
        margin-bottom: 1.5rem;
        border: 2px solid var(--border-color);
        border-radius: 16px;
        padding: 1rem;
        background: white;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
    }
    
    body.dark-mode .table-responsive tbody tr {
        background: var(--dark-bg-secondary);
        border-color: var(--dark-border);
    }
    
    /* Style each cell as a row in the card */
    .table-responsive tbody td {
        display: flex;
        align-items: center;
        padding: 0.75rem !important;
        border: none !important;
        border-bottom: 1px solid var(--border-color) !important;
        text-align: left !important;
        font-size: 0.95rem;
    }
    
    .table-responsive tbody td:last-child {
        border-bottom: none !important;
    }
    
    body.dark-mode .table-responsive tbody td {
        border-bottom-color: var(--dark-border) !important;
    }
    
    /* Add labels before each cell */
    .table-responsive tbody td:before {
        content: attr(data-label);
        font-weight: 700;
        width: 110px;
        min-width: 110px;
        color: var(--primary-color);
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    body.dark-mode .table-responsive tbody td:before {
        color: #a5b4fc;
    }
    
    /* Special styling for specific columns */
    .table-responsive tbody td:first-child:before {
        content: "SL#";
    }
    
    .table-responsive tbody td:nth-child(2):before {
        content: "Code";
    }
    
    .table-responsive tbody td:nth-child(3):before {
        content: "Name";
    }
    
    .table-responsive tbody td:nth-child(4):before {
        content: "Father";
    }
    
    .table-responsive tbody td:nth-child(5):before {
        content: "Mother";
    }
    
    .table-responsive tbody td:nth-child(6):before {
        content: "Email";
    }
    
    .table-responsive tbody td:nth-child(7):before {
        content: "Status";
    }
    
    .table-responsive tbody td:nth-child(8):before {
        content: "Created By";
    }
    
    .table-responsive tbody td:nth-child(9):before {
        content: "Actions";
    }
    
    /* Adjust content alignment */
    .table-responsive tbody td > * {
        margin-left: auto;
    }
    
    /* Status badge and select in mobile */
    .table-responsive tbody td .status-badge,
    .table-responsive tbody td .status-select {
        margin-left: auto;
        min-width: 100px;
    }
    
    /* Action buttons in mobile */
    .table-responsive tbody td .action-buttons {
        margin-left: auto;
        justify-content: flex-end;
    }
    
    /* Avatar in mobile */
    .table-responsive tbody td .d-flex {
        margin-left: auto;
    }
    
    /* Email link in mobile */
    .table-responsive tbody td a.text-decoration-none {
        margin-left: auto;
        text-align: right;
        word-break: break-all;
    }
    
    /* Badge in mobile */
    .table-responsive tbody td .badge {
        margin-left: auto;
    }
    
    /* Card header adjustments */
    .card-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
        padding: 1rem;
    }
    
    .card-header .badge {
        margin-left: 0 !important;
        align-self: flex-start;
    }
    
    /* DataTables controls mobile */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        text-align: left;
        margin-bottom: 1rem;
    }
    
    .dataTables_wrapper .dataTables_filter input {
        width: 100%;
        margin-left: 0;
        margin-top: 0.5rem;
    }
    
    .dataTables_wrapper .dataTables_info {
        text-align: center;
        padding: 1rem 0;
    }
    
    .dataTables_wrapper .dataTables_paginate {
        text-align: center;
        padding: 1rem 0;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 6px 10px;
        margin: 0 2px;
    }
}

/* Small phones */
@media screen and (max-width: 480px) {
    .table-responsive tbody td:before {
        width: 90px;
        min-width: 90px;
        font-size: 0.85rem;
    }
    
    .table-responsive tbody td {
        font-size: 0.9rem;
        padding: 0.6rem !important;
    }
    
    .status-badge,
    .status-select {
        min-width: 90px;
        padding: 4px 8px;
        font-size: 0.8rem;
    }
    
    .action-btn {
        width: 32px;
        height: 32px;
    }
    
    .action-btn i {
        font-size: 0.9rem;
    }
    
    .avatar-circle {
        width: 30px;
        height: 30px;
        font-size: 0.9rem;
    }
    
    .card-header {
        font-size: 1.1rem;
    }
}

/* Tablet adjustments */
@media screen and (min-width: 768px) and (max-width: 1024px) {
    .table thead th {
        font-size: 0.8rem;
        padding: 0.75rem 0.5rem;
    }
    
    .table tbody td {
        font-size: 0.9rem;
        padding: 0.75rem 0.5rem;
    }
    
    .status-select {
        min-width: 100px;
        padding: 6px 12px;
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
                <table id="datatablesSimple" class="table table-hover w-100">
                    <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Code</th>
                            <th>Name</th>
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
                                    <td data-label="Code"><span class="badge bg-secondary bg-opacity-25 py-2 px-3">{{ $value->Uid }}</span></td>
                                    <td data-label="Name">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle me-2">
                                                <span class="initials">{{ substr($value->name, 0, 1) }}</span>
                                            </div>
                                            <span class="fw-500">{{ $value->name }}</span>
                                        </div>
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
                                            <select class="status-select status-{{ $value->status }}" data-id="{{ $value->id }}" data-tooltip="Change Status">
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
                                                  data-modal="common-modal-md" 
                                                  data-title="Edit Member" 
                                                  data-id="{{ $value->id }}"
                                                  data-tooltip="Edit Member">
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
    // Initialize DataTable with responsive options
    var table = $(".data-table").DataTable({
        "ordering": true,
        "bAutoWidth": false,
        "responsive": {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function(row) {
                        var data = row.data();
                        return 'Details for ' + data[2]; // Shows name in modal header
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        },
        "language": {
            "search": "🔍 Search:",
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
        "columnDefs": [
            { "orderable": false, "targets": [7, 8] }
        ],
        "pageLength": 10,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });

    // Initialize status colors
    $('.status-select').each(function() {
        updateStatusColor($(this));
    });

    // Handle responsive redraw
    $(window).on('resize', function() {
        table.columns.adjust().draw();
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