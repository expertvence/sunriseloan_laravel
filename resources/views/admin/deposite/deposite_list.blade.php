

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<style>
    td {
        padding: 5px;
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

<div class="container">
    <div class="form-row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-lg mt-5">

                <div class="card-header">
                    <h3 class="text-center font-weight-light">
                        <strong>Member Deposit List</strong>
                    </h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered data-table" style="width: 100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Sl.</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-left">Member Name</th>
                                    <th class="text-left">Description</th>
                                    <th class="text-right">Deposit</th>
                                    <th class="text-right">Released</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @php
                                    $totalDeposit = 0;
                                    $totalReleased = 0;
                                @endphp

                                @forelse ($deposit as $value)

                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>

                                        <td class="text-center">
                                            {{ $value->deposit_date ? date('d/m/Y', strtotime($value->deposit_date)) : '' }}
                                        </td>

                                        <td class="text-left">
                                            {{ $value->member_name }}
                                        </td>

                                        <td class="text-left">
                                            {{ $value->description }}
                                        </td>

                                        <!-- Deposit Column -->
                                        <td class="text-right text-success">
                                            @if($value->deposit_type == 'deposite')
                                                {{ number_format($value->deposite_amount,2) }}
                                                @php $totalDeposit += $value->deposite_amount; @endphp
                                            @else
                                                0.00
                                            @endif
                                        </td>

                                        <!-- Released Column -->
                                        <td class="text-right text-danger">
                                            @if($value->deposit_type == 'relesed')
                                                {{ number_format($value->deposite_amount,2) }}
                                                @php $totalReleased += $value->deposite_amount; @endphp
                                            @else
                                                0.00
                                            @endif
                                        </td>

                                        <td class="text-center"> <span class="btn btn-sm  open-modal btnView" data-action="{{route('deposit-edit', $value->id)}}" data-modal="common-modal-md" data-title=" Member Edit" title="Edit" data-id="{{$value->id}}"><i class="fas fa-edit"></i></span> </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-danger">
                                            No Data Found
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right">
                                        <strong>Total = </strong>
                                    </td>

                                    <td class="text-right text-success">
                                        <strong>{{ number_format($totalDeposit,2) }}</strong>
                                    </td>

                                    <td class="text-right text-danger">
                                        <strong>{{ number_format($totalReleased,2) }}</strong>
                                    </td>

                                    <td></td>
                                </tr>
                            </tfoot>

                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".data-table").DataTable({
            ordering: false,
            bAutoWidth: false,
            "responsive": false,
            "scrollX": true,
        });
    });

    
</script>


