<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
/* ===== MODERN VARIABLES - Light Mode ===== */
:root {
    /* Primary Colors */
    --primary: #2563eb;
    --primary-dark: #1d4ed8;
    --primary-light: #3b82f6;
    --primary-soft: #dbeafe;
    
    /* Status Colors */
    --success: #059669;
    --success-light: #d1fae5;
    --danger: #dc2626;
    --danger-light: #fee2e2;
    --warning: #d97706;
    
    /* Backgrounds */
    --bg-body: #f9fafb;
    --bg-card: #ffffff;
    --bg-header: #f3f4f6;
    --bg-row: #ffffff;
    --bg-row-hover: #f3f4f6;
    --bg-input: #ffffff;
    
    /* Text Colors */
    --text-primary: #111827;
    --text-secondary: #4b5563;
    --text-muted: #6b7280;
    --text-light: #9ca3af;
    --text-white: #ffffff;
    
    /* Borders & Shadows */
    --border: #e5e7eb;
    --border-light: #f3f4f6;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
}

/* ===== DARK MODE VARIABLES ===== */
body.dark-mode {
    --primary: #3b82f6;
    --primary-dark: #2563eb;
    --primary-light: #60a5fa;
    --primary-soft: #1e3a5f;
    
    --success: #10b981;
    --success-light: #064e3b;
    --danger: #ef4444;
    --danger-light: #7f1d1d;
    --warning: #f59e0b;
    
    --bg-body: #111827;
    --bg-card: #1f2937;
    --bg-header: #374151;
    --bg-row: #1f2937;
    --bg-row-hover: #374151;
    --bg-input: #374151;
    
    --text-primary: #f9fafb;
    --text-secondary: #e5e7eb;
    --text-muted: #d1d5db;
    --text-light: #9ca3af;
    --text-white: #ffffff;
    
    --border: #4b5563;
    --border-light: #374151;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.3);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.4);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.5);
    
    background-color: var(--bg-body);
    color: var(--text-primary);
}

/* Base Styles */
body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
    background-color: var(--bg-body);
    color: var(--text-primary);
    margin: 0;
    padding: 20px;
    transition: background-color 0.3s ease, color 0.3s ease;
    line-height: 1.5;
}

/* Theme Toggle Button */
.theme-toggle {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    width: 45px;
    height: 45px;
    border-radius: 12px;
    background: var(--bg-card);
    border: 1px solid var(--border);
    color: var(--text-primary);
    font-size: 1.2rem;
    cursor: pointer;
    box-shadow: var(--shadow-md);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.theme-toggle:hover {
    transform: scale(1.05);
    border-color: var(--primary);
    color: var(--primary);
}

/* Container */
.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 15px;
}

/* Premium Card */
.premium-card {
    background: var(--bg-card);
    border-radius: 20px;
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--border);
    overflow: hidden;
    margin-top: 20px;
}

/* Card Header */
.premium-card .card-header {
    background: var(--bg-header);
    padding: 20px 24px;
    border-bottom: 1px solid var(--border);
}

.premium-card .card-header h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.premium-card .card-header h3 i {
    color: var(--primary);
    font-size: 1.5rem;
}

/* Card Body */
.premium-card .card-body {
    padding: 24px;
}

/* DataTables Wrapper */
.dataTables_wrapper {
    color: var(--text-primary);
}

/* Length Menu */
.dataTables_wrapper .dataTables_length {
    margin-bottom: 20px;
    color: var(--text-secondary);
    font-size: 0.95rem;
}

.dataTables_wrapper .dataTables_length select {
    background: var(--bg-input);
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 8px 32px 8px 12px;
    color: var(--text-primary);
    font-size: 0.95rem;
    cursor: pointer;
    outline: none;
    margin: 0 8px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 8px center;
    appearance: none;
}

/* Search Box */
.dataTables_wrapper .dataTables_filter {
    margin-bottom: 20px;
    text-align: right;
}

.dataTables_wrapper .dataTables_filter label {
    color: var(--text-secondary);
    font-size: 0.95rem;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.dataTables_wrapper .dataTables_filter input {
    background: var(--bg-input);
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 8px 12px 8px 36px;
    color: var(--text-primary);
    width: 250px;
    font-size: 0.95rem;
    outline: none;
    transition: all 0.2s ease;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='11' cy='11' r='8'%3E%3C/circle%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'%3E%3C/line%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: left 12px center;
}

.dataTables_wrapper .dataTables_filter input:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px var(--primary-soft);
}

/* Table Styles */
.table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

/* Table Header */
.table thead th {
    background: var(--bg-header);
    color: var(--text-secondary);
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 16px 12px;
    border-bottom: 2px solid var(--border);
    white-space: nowrap;
}

/* Table Body */
.table tbody td {
    padding: 16px 12px;
    color: var(--text-primary);
    font-size: 0.95rem;
    border-bottom: 1px solid var(--border);
    background: var(--bg-row);
}

.table tbody tr:hover td {
    background: var(--bg-row-hover);
}

/* Sl. No. */
.table tbody td:first-child {
    font-weight: 600;
    color: var(--text-secondary);
}

/* Date */
.table tbody td:nth-child(2) {
    font-family: 'Courier New', monospace;
    font-weight: 500;
    color: var(--text-secondary);
}

/* Description */
.table tbody td:nth-child(3) {
    max-width: 300px;
    white-space: normal;
    word-break: break-word;
    color: var(--text-primary);
    font-weight: 400;
}

/* Income Amount */
.table tbody td:nth-child(4) {
    font-family: 'Courier New', monospace;
    font-weight: 600;
    color: var(--success);
    text-align: right;
}

/* Expense Amount */
.table tbody td:nth-child(5) {
    font-family: 'Courier New', monospace;
    font-weight: 600;
    color: var(--danger);
    text-align: right;
}

/* Action Button */
.btnView {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 8px;
    background: var(--bg-input);
    border: 1px solid var(--border);
    color: var(--text-secondary);
    cursor: pointer;
    transition: all 0.2s ease;
}

.btnView:hover {
    background: var(--primary);
    border-color: var(--primary);
    color: white;
}

.btnView i {
    font-size: 1rem;
}

/* Table Footer */
.table tfoot tr {
    background: var(--bg-header);
}

.table tfoot td {
    padding: 16px 12px;
    font-weight: 600;
    border-top: 2px solid var(--border);
    color: var(--text-primary);
}

.table tfoot td:nth-child(4),
.table tfoot td:nth-child(5),
.table tfoot td:nth-child(6) {
    font-family: 'Courier New', monospace;
}

.table tfoot td:nth-child(4) {
    color: var(--success);
}

.table tfoot td:nth-child(5) {
    color: var(--danger);
}

.table tfoot td:nth-child(6) {
    color: var(--primary);
    font-weight: 700;
}

/* DataTables Info */
.dataTables_wrapper .dataTables_info {
    color: var(--text-muted);
    font-size: 0.9rem;
    padding: 16px 0;
}

/* Pagination */
.dataTables_wrapper .dataTables_paginate {
    padding: 16px 0;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 8px 14px;
    margin: 0 3px;
    border-radius: 6px;
    border: 1px solid var(--border);
    background: var(--bg-input);
    color: var(--text-secondary) !important;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: var(--primary);
    border-color: var(--primary);
    color: white !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current) {
    background: var(--bg-row-hover);
    border-color: var(--border);
    color: var(--text-primary) !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

/* ===== MODAL STYLES (ADDED/FIXED) ===== */
.modal {
    display: none;
    position: fixed;
    z-index: 10000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(5px);
}

.modal-content {
    background: var(--bg-card);
    margin: 5% auto;
    padding: 0;
    border-radius: 20px;
    width: 500px;
    max-width: 90%;
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--border);
    animation: modalSlideIn 0.3s ease;
}

@keyframes modalSlideIn {
    from {
        transform: translateY(-50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.modal-header {
    padding: 20px 24px;
    border-bottom: 1px solid var(--border);
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: var(--bg-header);
    border-radius: 20px 20px 0 0;
}

.modal-header h3 {
    margin: 0;
    color: var(--text-primary);
    font-size: 1.25rem;
    font-weight: 600;
}

.modal-header .close {
    color: var(--text-muted);
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
    transition: color 0.2s ease;
}

.modal-header .close:hover {
    color: var(--danger);
}

.modal-body {
    padding: 24px;
}

.modal-footer {
    padding: 20px 24px;
    border-top: 1px solid var(--border);
    text-align: right;
}

.btn {
    padding: 10px 20px;
    border-radius: 8px;
    border: none;
    font-size: 0.95rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-primary {
    background: var(--primary);
    color: white;
}

.btn-primary:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.btn-secondary {
    background: var(--bg-header);
    color: var(--text-secondary);
    border: 1px solid var(--border);
}

.btn-secondary:hover {
    background: var(--bg-row-hover);
}

/* Form Styles */
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: var(--text-secondary);
    font-weight: 500;
    font-size: 0.95rem;
}

.form-control {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid var(--border);
    border-radius: 8px;
    background: var(--bg-input);
    color: var(--text-primary);
    font-size: 0.95rem;
    transition: all 0.2s ease;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px var(--primary-soft);
}

textarea.form-control {
    resize: vertical;
    min-height: 80px;
}

/* Dark mode modal adjustments */
body.dark-mode .modal-header {
    background: var(--bg-header);
}

body.dark-mode .modal-content {
    background: var(--bg-card);
}

body.dark-mode .btn-secondary {
    background: var(--bg-header);
    color: var(--text-secondary);
}

body.dark-mode .btn-secondary:hover {
    background: var(--bg-row-hover);
}

/* Responsive Design */
@media (max-width: 768px) {
    body {
        padding: 10px;
    }
    
    .premium-card .card-header {
        padding: 16px;
    }
    
    .premium-card .card-header h3 {
        font-size: 1.25rem;
    }
    
    .premium-card .card-body {
        padding: 16px;
    }
    
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        text-align: left;
    }
    
    .dataTables_wrapper .dataTables_filter input {
        width: 100%;
        margin-top: 8px;
    }
    
    .dataTables_wrapper .dataTables_filter label {
        display: block;
    }
    
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        text-align: center;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 6px 10px;
        font-size: 0.85rem;
    }
    
    .modal-content {
        width: 95%;
        margin: 10% auto;
    }
}

@media (max-width: 576px) {
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .table {
        min-width: 600px;
    }
    
    .theme-toggle {
        top: 10px;
        right: 10px;
        width: 40px;
        height: 40px;
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

<!-- Edit Modal (ADDED) -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalTitle">Edit Income/Expense</h3>
            <span class="close" onclick="closeModal()">&times;</span>
        </div>
        <div class="modal-body">
            <form id="editForm" method="POST" action="">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="edit_date">Date</label>
                    <input type="date" class="form-control" id="edit_date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="edit_description">Description</label>
                    <textarea class="form-control" id="edit_description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="edit_type">Type</label>
                    <select class="form-control" id="edit_type" name="type" required>
                        <option value="Income">Income</option>
                        <option value="Expense">Expense</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit_amount">Amount</label>
                    <input type="number" step="0.01" class="form-control" id="edit_amount" name="income_expence" required>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
            <button type="button" class="btn btn-primary" onclick="submitEditForm()">Save Changes</button>
        </div>
    </div>
</div>

<div class="container">
    <div class="premium-card">
        <div class="card-header">
            <h3>
                <i class="fas fa-chart-line"></i>
                Income & Expense List
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="incomeExpenseTable" class="table">
                    <thead>
                        <tr>
                            <th>SL#</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Income (৳)</th>
                            <th>Expense (৳)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $income = 0;
                        $expense = 0;
                        @endphp
                        @if (!empty($income_expense))
                            @foreach ($income_expense as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->date != '' ? date('d/m/Y', strtotime($value->date)) : '' }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td>{{ $value->type == "Income" ? number_format($value->income_expence, 2) : '0.00' }}</td>
                                    <td>{{ $value->type == "Expense" ? number_format($value->income_expence, 2) : '0.00' }}</td>
                                    <td>
                                        <span class="btnView" 
                                              onclick="openEditModal('{{ $value->id }}', '{{ $value->date }}', '{{ addslashes($value->description) }}', '{{ $value->type }}', '{{ $value->income_expence }}')"
                                              title="Edit Entry">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </td>
                                </tr>
                                @php
                                $income += $value->type == "Income" ? $value->income_expence : 0;
                                $expense += $value->type == "Expense" ? $value->income_expence : 0;
                                @endphp
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"><strong>Total:</strong></td>
                            <td><strong>৳ {{ number_format($income, 2) }}</strong></td>
                            <td><strong>৳ {{ number_format($expense, 2) }}</strong></td>
                            <td><strong>Net: ৳ {{ number_format($income - $expense, 2) }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Initialize DataTable
    var table = $("#incomeExpenseTable").DataTable({
        "ordering": false,
        "bAutoWidth": false,
        "responsive": false,
        "scrollX": true,
        "dom": 'lfrtip',
        "language": {
            "search": "",
            "searchPlaceholder": "Search...",
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
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });

    // Load saved theme
    const savedTheme = localStorage.getItem('incomeTheme');
    if (savedTheme === 'dark') {
        $('body').addClass('dark-mode');
        $('#themeToggle i').removeClass('fa-moon').addClass('fa-sun');
    }
});

// Toggle dark mode
function toggleDarkMode() {
    $('body').toggleClass('dark-mode');
    const $icon = $('#themeToggle i');
    
    if ($('body').hasClass('dark-mode')) {
        $icon.removeClass('fa-moon').addClass('fa-sun');
        localStorage.setItem('incomeTheme', 'dark');
    } else {
        $icon.removeClass('fa-sun').addClass('fa-moon');
        localStorage.setItem('incomeTheme', 'light');
    }
}

// ===== MODAL FUNCTIONS (ADDED/FIXED) =====
function openEditModal(id, date, description, type, amount) {
    // Format date for input (YYYY-MM-DD)
    if (date) {
        // Try to parse the date
        let formattedDate = date;
        if (date.includes('/')) {
            const dateParts = date.split('/');
            if (dateParts.length === 3) {
                // Assuming format d/m/Y
                formattedDate = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0];
            }
        }
        document.getElementById('edit_date').value = formattedDate;
    }
    
    document.getElementById('edit_description').value = description;
    document.getElementById('edit_type').value = type;
    document.getElementById('edit_amount').value = amount;
    
    // Set form action URL
    const form = document.getElementById('editForm');
    form.action = "{{ url('income-expense-update') }}/" + id;
    
    // Show modal
    document.getElementById('editModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}

function submitEditForm() {
    document.getElementById('editForm').submit();
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('editModal');
    if (event.target == modal) {
        closeModal();
    }
}
</script>