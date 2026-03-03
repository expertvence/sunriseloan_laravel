<style>
<<<<<<< HEAD
/* ========================================
   🌈 PREMIUM ASSETS LIST TABLE
   ======================================== */

:root {
    /* Light Mode - Elegant */
    --primary-gradient: linear-gradient(135deg, #0f172a, #1e293b, #334155);
    --primary-color: #0f172a;
    --primary-soft: #f1f5f9;
    
    --card-bg: #ffffff;
    --body-bg: linear-gradient(145deg, #f8fafc 0%, #f1f5f9 100%);
    
    --text-primary: #0f172a;
    --text-secondary: #334155;
    --text-muted: #64748b;
    --text-light: #94a3b8;
    
    --border-color: #e2e8f0;
    --border-focus: #0f172a;
    
    --table-header-bg: linear-gradient(135deg, #f1f5f9, #e2e8f0);
    --table-header-text: #0f172a;
    --table-row-hover: #f8fafc;
    --table-stripe: #ffffff;
    
    --success: #059669;
    --warning: #d97706;
    --danger: #dc2626;
    --info: #2563eb;
    
    --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.03);
    --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.08);
    --shadow-xl: 0 30px 60px rgba(0, 0, 0, 0.12);
    
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --radius-xl: 24px;
    
    --transition: all 0.3s ease;
}

/* Dark Mode - Mysterious */
body.dark-mode {
    --primary-gradient: linear-gradient(135deg, #334155, #1e293b, #0f172a);
    --primary-color: #e2e8f0;
    --primary-soft: #1e293b;
    
    --card-bg: #0f172a;
    --body-bg: linear-gradient(145deg, #020617 0%, #0f172a 100%);
    
    --text-primary: #f1f5f9;
    --text-secondary: #cbd5e1;
    --text-muted: #94a3b8;
    --text-light: #64748b;
    
    --border-color: #334155;
    --border-focus: #94a3b8;
    
    --table-header-bg: linear-gradient(135deg, #1e293b, #2d3a4f);
    --table-header-text: #ffffff;
    --table-row-hover: #1e293b;
    --table-stripe: #0f172a;
    
    --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.4);
    --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.5);
    --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.6);
    --shadow-xl: 0 30px 60px rgba(0, 0, 0, 0.7);
}

/* Base Styles */
body {
    background: var(--body-bg);
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    padding: 20px;
    min-height: 100vh;
    transition: var(--transition);
}

/* ================= PREMIUM CARD ================= */
.premium-card {
    background: var(--card-bg);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    border: 1px solid var(--border-color);
    transition: var(--transition);
    margin-bottom: 2rem;
    position: relative;
}

.premium-card:hover {
    box-shadow: var(--shadow-xl);
    transform: translateY(-2px);
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

/* ================= CARD HEADER ================= */
.card-header-premium {
    background: var(--table-header-bg);
    padding: 20px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 2px solid var(--border-color);
    position: relative;
    overflow: hidden;
}

.card-header-premium h3 {
    margin: 0;
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--table-header-text);
    display: flex;
    align-items: center;
    gap: 12px;
}

.card-header-premium h3 i {
    color: var(--primary-color);
    font-size: 1.6rem;
    background: rgba(255, 255, 255, 0.1);
    padding: 8px;
    border-radius: var(--radius-md);
}

.header-badge {
    background: var(--primary-soft);
    padding: 8px 18px;
    border-radius: 40px;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-primary);
    border: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    gap: 8px;
}

.header-badge i {
    color: var(--primary-color);
}

/* ================= TABLE WRAPPER ================= */
.table-wrapper {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.table-wrapper::-webkit-scrollbar {
    display: none;
}

/* ================= PREMIUM TABLE ================= */
.premium-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 600px;
    background: var(--card-bg);
}

/* Table Headers */
.premium-table thead th {
    background: var(--table-header-bg);
    color: var(--table-header-text);
    font-size: 0.85rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 16px 20px;
    white-space: nowrap;
    border-bottom: 2px solid var(--border-color);
    text-align: left;
}

.premium-table thead th:first-child {
    border-top-left-radius: var(--radius-md);
}

.premium-table thead th:last-child {
    border-top-right-radius: var(--radius-md);
}

/* Table Rows */
.premium-table tbody tr {
    border-bottom: 1px solid var(--border-color);
    transition: var(--transition);
}

.premium-table tbody tr:hover {
    background: var(--table-row-hover);
    transform: scale(1.01);
    box-shadow: var(--shadow-sm);
}

.premium-table tbody td {
    padding: 16px 20px;
    color: var(--text-primary);
    font-size: 0.95rem;
    font-weight: 500;
    vertical-align: middle;
}

/* ================= ASSET AMOUNT ================= */
.asset-amount {
    font-weight: 700;
    color: var(--primary-color);
    background: var(--primary-soft);
    padding: 6px 16px;
    border-radius: 40px;
    display: inline-block;
    font-size: 0.95rem;
    border: 1px solid var(--border-color);
}

/* ================= ACTION BUTTONS ================= */
.action-buttons {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}

/* Edit Button */
.edit-btn {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: var(--primary-soft);
    color: var(--primary-color);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition);
    border: 1px solid var(--border-color);
}

.edit-btn:hover {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    transform: rotate(15deg) scale(1.1);
    border-color: transparent;
}

.edit-btn i {
    font-size: 1rem;
}

/* Delete Button */
.delete-btn {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: rgba(220, 38, 38, 0.1);
    color: #dc2626;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition);
    border: 1px solid rgba(220, 38, 38, 0.2);
}

.delete-btn:hover {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    color: white;
    transform: translateY(-3px) scale(1.1);
    border-color: transparent;
    box-shadow: 0 5px 15px rgba(220, 38, 38, 0.3);
}

.delete-btn i {
    font-size: 1rem;
}

/* ================= SERIAL NUMBER ================= */
.serial-number {
    font-weight: 700;
    color: var(--text-primary);
    background: var(--primary-soft);
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    border: 2px solid var(--border-color);
}

/* ================= EMPTY STATE ================= */
.empty-state {
    text-align: center;
    padding: 60px 20px;
}

.empty-state i {
    font-size: 64px;
    color: var(--text-muted);
    opacity: 0.5;
    margin-bottom: 16px;
}

.empty-state h4 {
    color: var(--text-primary);
    font-size: 1.2rem;
    margin-bottom: 8px;
}

.empty-state p {
    color: var(--text-secondary);
    font-size: 0.9rem;
}

/* ================= DATATABLES CUSTOMIZATION ================= */
.dataTables_wrapper {
    padding: 20px;
}

.dataTables_length,
.dataTables_filter {
    margin-bottom: 20px;
    color: var(--text-primary);
}

.dataTables_length select,
.dataTables_filter input {
    padding: 8px 14px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    background: var(--card-bg);
    color: var(--text-primary);
    font-size: 0.9rem;
    margin: 0 5px;
    transition: var(--transition);
}

.dataTables_length select:focus,
.dataTables_filter input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(15, 23, 42, 0.1);
}

.dataTables_filter input {
    min-width: 250px;
}

.dataTables_info {
    color: var(--text-secondary);
    font-size: 0.9rem;
    padding: 16px 0;
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
    font-size: 0.9rem;
    transition: var(--transition);
    cursor: pointer;
    display: inline-block;
}

.dataTables_paginate .paginate_button.current,
.dataTables_paginate .paginate_button:hover {
    background: var(--primary-gradient);
    color: white !important;
    border-color: transparent;
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

/* ================= RESPONSIVE ================= */

/* Tablet */
@media (max-width: 768px) {
    .card-header-premium {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    
    .header-badge {
        align-self: flex-start;
    }
    
    .premium-table thead th {
        padding: 14px 16px;
        font-size: 0.8rem;
    }
    
    .premium-table tbody td {
        padding: 14px 16px;
        font-size: 0.9rem;
    }
    
    .dataTables_filter input {
        min-width: 200px;
    }
}

/* Mobile Landscape */
@media (max-width: 576px) {
    body {
        padding: 12px;
    }
    
    .card-header-premium {
        padding: 16px 18px;
    }
    
    .card-header-premium h3 {
        font-size: 1.2rem;
    }
    
    .header-badge {
        padding: 6px 14px;
        font-size: 0.8rem;
    }
    
    .premium-table thead th {
        padding: 12px 14px;
        font-size: 0.75rem;
    }
    
    .premium-table tbody td {
        padding: 12px 14px;
        font-size: 0.85rem;
    }
    
    .asset-amount {
        padding: 4px 12px;
        font-size: 0.85rem;
    }
    
    .edit-btn,
    .delete-btn {
        width: 34px;
        height: 34px;
    }
    
    .dataTables_length,
    .dataTables_filter {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    .dataTables_filter input {
        width: 100%;
        margin-left: 0;
    }
    
    .dataTables_paginate .paginate_button {
        padding: 6px 12px;
        font-size: 0.8rem;
        margin: 0 2px;
    }
}

/* Mobile Portrait */
@media (max-width: 400px) {
    .card-header-premium h3 {
        font-size: 1.1rem;
    }
    
    .premium-table thead th {
        padding: 10px 12px;
    }
    
    .premium-table tbody td {
        padding: 10px 12px;
    }
    
    .asset-amount {
        padding: 3px 10px;
        font-size: 0.8rem;
    }
    
    .edit-btn,
    .delete-btn {
        width: 32px;
        height: 32px;
    }
    
    .serial-number {
        width: 32px;
        height: 32px;
        font-size: 0.8rem;
    }
}

/* ================= ANIMATIONS ================= */
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

.premium-card {
    animation: slideIn 0.5s ease-out;
}

/* ================= CUSTOM SCROLLBAR (HIDDEN) ================= */
* {
    scrollbar-width: none;
    -ms-overflow-style: none;
}

*::-webkit-scrollbar {
    display: none;
}
</style>

<!-- ================= MAIN CONTAINER ================= -->
<div class="premium-card">
    <!-- Card Header -->
    <div class="card-header-premium">
        <h3>
            <i class="fas fa-chart-pie"></i>
            Assets List
        </h3>
        <div class="header-badge">
            <i class="fas fa-database"></i>
            Total: {{ count($data) }} Assets
=======
    td {
        padding: 5px;
    }
</style>
<div class="card mb-4">
    <div class="card-header">
        <!-- <h1>Total Assets: {{ $total_assets }}</h1>
    <h1>Total Loan:{{ $totalCommite }}</h1>
    <h2>Remaining amount:{{ $remainingAmount }}</h2> -->
        <i class="fas fa-table me-1"></i>
        Assets List
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatablesSimple" class="data-table table table-bordered " width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th>SL#</th>
                        <th>Asset</th>
                        <th>Date</th>

                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if (!empty($data))
                        @foreach ($data as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->assets }}</td>
                                <td>{{ \Carbon\Carbon::parse($value->date)->format('d F Y') }}</td>


                                <td>


                                    <div class="action-buttons">
                                        <span class="btn btn-sm  open-modal btnView"
                                            data-action="{{ route('edit-assets', $value->id) }}"
                                            data-modal="common-modal-md" data-title=" Assets Edit" title="Edit"
                                            data-id="{{ $value->id }}"><i class="fas fa-edit"></i></span>


                                        <span class="action-btn delete-btn" data-id="{{ $value->id }}"
                                            data-url="{{ route('delete-asset', $value->id) }}" title="Delete Assets">
                                            <i class="fas fa-trash"></i>
                                        </span>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
>>>>>>> f6f83e1344b366a9f2a80543e9004aa96a99037f
        </div>
    </div>

    <!-- Table Wrapper (No Scrollbar) -->
    <div class="table-wrapper">
        <table id="datatablesSimple" class="premium-table" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Asset Name / Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($data) && count($data) > 0)
                    @foreach ($data as $value)
                        <tr>
                            <td>
                                <span class="serial-number">{{ $loop->iteration }}</span>
                            </td>
                            <td>
                                <span class="asset-amount">
                                    <i class="fas fa-bangladeshi-taka-sign me-1"></i>
                                    {{ number_format($value->assets, 2) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <!-- Edit Button with Modal -->
                                    <span class="edit-btn open-modal btnView" 
                                          data-action="{{ route('edit-assets', $value->id) }}" 
                                          data-modal="common-modal-md" 
                                          data-title="Edit Asset" 
                                          title="Edit Asset"
                                          data-id="{{ $value->id }}">
                                        <i class="fas fa-edit"></i>
                                    </span>

                                    <!-- Delete Form -->
                                    <form action="{{ route('destroy-assets', $value->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this asset?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="empty-state">
                            <i class="fas fa-chart-pie"></i>
                            <h4>No Assets Found</h4>
                            <p>Click the button above to add your first asset</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Inter Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<!-- DataTables Scripts -->
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $(".premium-table").DataTable({
        "ordering": true,
        "bAutoWidth": true,
        "responsive": false, // Using custom responsive
        "language": {
            "search": "🔍 Search:",
            "lengthMenu": "Show _MENU_ entries",
            "info": "Showing _START_ to _END_ of _TOTAL_ assets",
            "infoEmpty": "Showing 0 to 0 of 0 assets",
            "infoFiltered": "(filtered from _MAX_ total assets)",
            "paginate": {
                "first": "«",
                "last": "»",
                "next": "›",
                "previous": "‹"
            }
        }
    });
<<<<<<< HEAD
});
</script>
=======




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
                // Remove the row if provided
                if (rowElement) {
                    rowElement.closest('tr').remove();
                }

                // Show success Swal
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
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
>>>>>>> f6f83e1344b366a9f2a80543e9004aa96a99037f
