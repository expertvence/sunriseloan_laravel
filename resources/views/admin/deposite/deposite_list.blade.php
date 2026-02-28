

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<style>
    td {
        padding: 5px;
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
        });
    });
</script>


