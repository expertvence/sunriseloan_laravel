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
    --text-primary: #0f172a;      /* Dark text for light mode */
    --text-secondary: #334155;     /* Slightly lighter for secondary text */
    --text-muted: #475569;         /* Muted text */
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
    --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    
    /* Dark mode variables - high contrast */
    --dark-bg-primary: #0f172a;
    --dark-bg-secondary: #1e293b;
    --dark-bg-tertiary: #2d3a4f;
    --dark-text-primary: #ffffff;     /* Pure white for primary text */
    --dark-text-secondary: #e2e8f0;   /* Very light gray for secondary */
    --dark-text-muted: #cbd5e1;       /* Light gray for muted text */
    --dark-border: #334155;
    --dark-card-bg: #1e293b;
    --dark-hover: #2d3a4f;
    --dark-table-stripe: #1e293b;
    --dark-table-hover: #2d3a4f;
}

/* Premium Card Styles */
.premium-table-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 3px;
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

/* Dark Mode Styles - High Contrast */
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
    font-weight: 600;
    border-bottom: 2px solid var(--dark-border);
}

body.dark-mode .table tbody td {
    border-color: var(--dark-border);
    background-color: transparent;
    color: var(--dark-text-primary);
}

body.dark-mode .table tbody tr:nth-of-type(odd) {
    background-color: rgba(255, 255, 255, 0.02);
}

body.dark-mode .table tbody tr:hover td {
    background-color: var(--dark-table-hover);
}

body.dark-mode .table tbody tr:hover {
    background-color: var(--dark-table-hover);
}

/* Dark mode text colors for specific elements */
body.dark-mode .badge.bg-secondary {
    color: var(--dark-text-primary) !important;
}

body.dark-mode .fw-bold,
body.dark-mode .fw-500 {
    color: var(--dark-text-primary);
}

body.dark-mode a {
    color: #a5b4fc;
}

body.dark-mode a:hover {
    color: #c7d2fe;
}

body.dark-mode .text-secondary {
    color: var(--dark-text-secondary) !important;
}

body.dark-mode .text-primary {
    color: #a5b4fc !important;
}

body.dark-mode .text-dark {
    color: var(--dark-text-primary) !important;
}

/* DataTables dark mode */
body.dark-mode .dataTables_wrapper .dataTables_length,
body.dark-mode .dataTables_wrapper .dataTables_filter,
body.dark-mode .dataTables_wrapper .dataTables_info,
body.dark-mode .dataTables_wrapper .dataTables_paginate {
    color: var(--dark-text-primary);
}

body.dark-mode .dataTables_wrapper .dataTables_length label,
body.dark-mode .dataTables_wrapper .dataTables_filter label {
    color: var(--dark-text-primary);
}

body.dark-mode .dataTables_wrapper .dataTables_length select {
    background-color: var(--dark-bg-tertiary);
    border-color: var(--dark-border);
    color: var(--dark-text-primary);
}

body.dark-mode .dataTables_wrapper .dataTables_filter input {
    background-color: var(--dark-bg-tertiary);
    border-color: var(--dark-border);
    color: var(--dark-text-primary);
}

body.dark-mode .dataTables_wrapper .dataTables_filter input::placeholder {
    color: var(--dark-text-muted);
}

body.dark-mode .dataTables_wrapper .dataTables_filter input:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.2);
}

body.dark-mode .dataTables_wrapper .dataTables_paginate .paginate_button {
    color: var(--dark-text-primary) !important;
    background: var(--dark-bg-tertiary);
    border-color: var(--dark-border);
}

body.dark-mode .dataTables_wrapper .dataTables_paginate .paginate_button.current,
body.dark-mode .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white !important;
    border-color: transparent;
}

body.dark-mode .dataTables_wrapper .dataTables_info {
    color: var(--dark-text-secondary);
}

/* Light mode text colors - high contrast */
.table tbody td {
    padding: 1rem 0.75rem;
    vertical-align: middle;
    border-bottom: 1px solid var(--border-color);
    color: var(--text-primary);
    font-size: 0.95rem;
    transition: var(--transition);
}

.fw-bold {
    color: var(--text-primary);
    font-weight: 700;
}

.fw-500 {
    color: var(--text-primary);
    font-weight: 500;
}

.badge.bg-secondary.bg-opacity-25 {
    background-color: #e2e8f0 !important;
    color: var(--text-primary) !important;
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
    letter-spacing: 0.5px;
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
    letter-spacing: 0.5px;
    padding: 1rem 0.75rem;
    border: none;
    white-space: nowrap;
}

/* Status Badge Styles - with proper contrast */
.status-badge {
    padding: 6px 12px;
    border-radius: 30px;
    font-weight: 600;
    font-size: 0.85rem;
    text-transform: capitalize;
    display: inline-block;
    min-width: 80px;
    text-align: center;
    box-shadow: var(--shadow-sm);
    color: white !important; /* Always white text on colored backgrounds */
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
    box-shadow: var(--shadow-sm);
    color: white !important; /* White text for all status selects */
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
    padding: 10px;
}

/* Dark mode select options */
body.dark-mode .status-select option {
    background: var(--dark-bg-tertiary);
    color: var(--dark-text-primary);
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
    border: none;
    cursor: pointer;
    box-shadow: var(--shadow-sm);
    text-decoration: none;
}

.action-btn:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: var(--shadow-lg);
    color: white;
}

.action-btn.view-btn {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
}

.action-btn.edit-btn {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
}

.action-btn i {
    font-size: 1rem;
    color: white;
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
    font-size: 1rem;
    box-shadow: var(--shadow-sm);
}

/* Email links */
a.text-decoration-none {
    color: var(--primary-color);
    transition: var(--transition);
}

a.text-decoration-none:hover {
    color: var(--primary-hover);
}

/* Dark mode email links */
body.dark-mode a.text-decoration-none {
    color: #a5b4fc;
}

body.dark-mode a.text-decoration-none:hover {
    color: #c7d2fe;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 3rem;
    color: var(--text-secondary);
}

.empty-state i {
    font-size: 4rem;
    margin-bottom: 1rem;
    opacity: 0.5;
    color: var(--text-muted);
}

.empty-state p {
    font-size: 1.1rem;
    font-weight: 500;
    color: var(--text-secondary);
}

body.dark-mode .empty-state,
body.dark-mode .empty-state p {
    color: var(--dark-text-secondary);
}

body.dark-mode .empty-state i {
    color: var(--dark-text-muted);
}

/* Scrollbar Styling */
.table-responsive::-webkit-scrollbar {
    height: 8px;
}

.table-responsive::-webkit-scrollbar-track {
    background: var(--light-bg);
    border-radius: 10px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 10px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .table-inner {
        padding: 1rem;
    }
    
    .card-header {
        padding: 1rem;
        font-size: 1.1rem;
    }
    
    .dataTables_wrapper .dataTables_filter input {
        width: 180px;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 6px 12px;
        margin: 0 2px;
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
        padding: 4px 8px;
        font-size: 0.75rem;
        min-width: 70px;
    }
    
    .dataTables_wrapper .dataTables_filter input {
        width: 100%;
    }
}

/* Animations */
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
                <table id="datatablesSimple" class="table table-hover table-striped w-100">
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
                                    <td><span class="fw-bold">#{{ $loop->iteration }}</span></td>
                                    <td><span class="badge bg-secondary bg-opacity-25 py-2 px-3">{{ $value->Uid }}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle me-2">
                                                <span class="initials">{{ substr($value->name, 0, 1) }}</span>
                                            </div>
                                            <span class="fw-500">{{ $value->name }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $value->fathers_mane ?? 'N/A' }}</td>
                                    <td>{{ $value->mothers_mane ?? 'N/A' }}</td>
                                    <td>
                                        <a href="mailto:{{ $value->email }}" class="text-decoration-none">
                                            <i class="fas fa-envelope me-1"></i>
                                            {{ $value->email }}
                                        </a>
                                    </td>
                                    <td class="text-center">
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
                                    <td>
                                        <span class="d-flex align-items-center">
                                            <i class="fas fa-user-circle me-1 text-secondary"></i>
                                            <span class="text-secondary">{{ $value->created_by ?? 'System' }}</span>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('member_profile', $value->id) }}" target="_blank" 
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
    // Initialize DataTable with responsive option
    $(".data-table").DataTable({
        "ordering": true,
        "bAutoWidth": false,
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
        },
        "columnDefs": [
            { "orderable": false, "targets": [7, 8] }
        ]
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
    
    // Optimistic UI update
    updateStatusColor($this);
    
    // Show loading state
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

// Notification function
function showNotification(message, type) {
    // You can implement your own notification system
    console.log(message);
    if (type === 'success') {
        alert(message); // Replace with your notification system
    }
}

// Responsive table adjustment
$(window).on('resize', function() {
    if ($(window).width() <= 768) {
        $('.table-responsive').addClass('mobile-view');
    } else {
        $('.table-responsive').removeClass('mobile-view');
    }
}).trigger('resize');

// Dark mode detection
function checkDarkMode() {
    if (localStorage.getItem('theme') === 'dark') {
        $('body').addClass('dark-mode');
    }
}
checkDarkMode();
</script>