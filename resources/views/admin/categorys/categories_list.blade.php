<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<style>
    /* ===============================
   DARK MODE FIXES
   =============================== */

/* Dark mode text visibility */
.dark-mode .data-table,
.dark-mode .data-table tbody,
.dark-mode .data-table thead,
.dark-mode .data-table tfoot,
.dark-mode .data-table tr,
.dark-mode .data-table td,
.dark-mode .data-table th {
    color: #e0e0e0 !important;
    background-color: transparent !important;
}

/* Dark mode card background */
.dark-mode .card {
    background-color: #2d2d2d !important;
    border-color: #404040 !important;
}

.dark-mode .card-header {
    background-color: #363636 !important;
    border-bottom-color: #404040 !important;
}

.dark-mode .card-header h3 {
    color: #ffffff !important;
}

/* Dark mode table header */
.dark-mode .thead-dark th {
    background-color: #1e1e1e !important;
    color: #ffffff !important;
    border-color: #404040 !important;
}

/* Dark mode table borders */
.dark-mode .table-bordered,
.dark-mode .table-bordered td,
.dark-mode .table-bordered th {
    border-color: #404040 !important;
}

/* Dark mode table rows */
.dark-mode .data-table tbody tr {
    background-color: #2d2d2d !important;
}

.dark-mode .data-table tbody tr:hover {
    background-color: #3d3d3d !important;
}

/* Dark mode table footer */
.dark-mode .data-table tfoot {
    background-color: #363636 !important;
}

.dark-mode .data-table tfoot td {
    color: #ffffff !important;
    border-color: #404040 !important;
}

/* Dark mode text colors */
.dark-mode .text-success {
    color: #4caf50 !important;
}

.dark-mode .text-danger {
    color: #f44336 !important;
}

.dark-mode .text-center,
.dark-mode .text-left,
.dark-mode .text-right {
    color: #e0e0e0 !important;
}

/* Dark mode DataTables elements */
.dark-mode .dataTables_wrapper .dataTables_length,
.dark-mode .dataTables_wrapper .dataTables_filter,
.dark-mode .dataTables_wrapper .dataTables_info,
.dark-mode .dataTables_wrapper .dataTables_paginate {
    color: #e0e0e0 !important;
}

/* Dark mode search input */
.dark-mode .dataTables_filter input {
    background-color: #3d3d3d !important;
    color: #ffffff !important;
    border-color: #404040 !important;
}

/* Dark mode pagination */
.dark-mode .dataTables_wrapper .dataTables_paginate .paginate_button {
    color: #e0e0e0 !important;
    background-color: #363636 !important;
    border-color: #404040 !important;
}

.dark-mode .dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background-color: #4a6fa5 !important;
    color: #ffffff !important;
    border-color: #4a6fa5 !important;
}

.dark-mode .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background-color: #4a6fa5 !important;
    color: #ffffff !important;
    border-color: #4a6fa5 !important;
}

/* Dark mode "Showing X to Y entries" text */
.dark-mode .dataTables_info {
    color: #e0e0e0 !important;
}

/* Dark mode "No Data Found" message */
.dark-mode .text-danger {
    color: #f44336 !important;
}

/* Dark mode edit button */
.dark-mode .btn-view,
.dark-mode [class*="btn-"] {
    background-color: #4a6fa5 !important;
    color: #ffffff !important;
    border-color: #4a6fa5 !important;
}

.dark-mode .btn-view:hover,
.dark-mode [class*="btn-"]:hover {
    background-color: #5f7fb5 !important;
}

/* Fix for any remaining white backgrounds */
.dark-mode * {
    background-color: transparent;
}

/* Ensure total row is visible */
.dark-mode .data-table tfoot tr {
    background-color: #363636 !important;
}

.dark-mode .data-table tfoot td strong {
    color: #ffffff !important;
}
</style>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
   Loan Categories List
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatablesSimple" class="data-table table table-bordered " width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th>SL#</th>
                        <th>Name</th>
                        <th>Persentage</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if (!empty($data))
                    @foreach ($data as $value)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$value->loan_category}}</td>
                        <td>{{$value->percentage}}</td>
                        

                        <!-- Status Update -->
                        

                        <td>

                            <span class="btn btn-sm  open-modal btnView" data-action="{{route('show-categories-form', $value->id)}}" data-modal="common-modal-md" data-title=" Member Edit" title="Edit" data-id="{{$value->id}}"><i class="fas fa-edit"></i></span> 
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>


<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script>
    $(document).ready(function() {
        $(".data-table").DataTable({
            "ordering": true,
            "bAutoWidth": true,
            "responsive": false,
            "scrollX": true,
        });
    });
