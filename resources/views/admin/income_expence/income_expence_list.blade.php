

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
                    <h3 class="text-center font-weight-light"><strong>Income-Expense list</strong></h3>
                    <!-- <form action="{{route('installment_payment_pdf')}}" method="get" id="search" target="_blank">
                                <table width="100%">
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="member_name" id="member_name"
                                            placeholder="Write....." required="required">
                                        <input type="hidden" name="member_id" id="member_id"
                                            value="">
                                        </td>
                                        <td>
                                            <button type="submit">PDF</button>
                                        </td>
                                    </tr>
                                </table>

                            </form> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered data-table" style="width: 100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Sl.</th>
                                    <th class="text-center"> Date</th>
                                    <th class="text-left"> Description</th>
                                    <th class="text-right">Income</th>
                                    <th class="text-right">Expense</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $income=0;
                                $expense=0;
                                @endphp
                                @if (!empty($income_expense))

                                @foreach ($income_expense as $value)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $value->date != '' ? date('d/m/Y', strtotime($value->date)) : '' }}</td>
                                    <td class="text-left">{{ $value->description }}</td>
                                    <td class="text-right"> {{$value->type=="Income" ? $value->income_expence :'0.00' }}</td>
                                    <td class="text-right">{{$value->type=="Expense" ? $value->income_expence :'0.00' }}</td>
                                    <td class="text-center"> <span class="btn btn-sm  open-modal btnView" data-action="{{route('income-expence-edit', $value->id)}}" data-modal="common-modal-md" data-title=" Member Edit" title="Edit" data-id="{{$value->id}}"><i class="fas fa-edit"></i></span> </td>
                                </tr>
                                @php
                                $income +=$value->type=="Income" ? $value->income_expence :0;
                                $expense +=$value->type=="Expense" ? $value->income_expence :0;
                                @endphp
                                @endforeach

                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="text-right" colspan="3"> <strong>Total= </strong></td>
                                    <td class="text-right"><strong>{{number_format($income,2,'.',',')}}</strong></td>
                                    <td class="text-right"><strong>{{number_format($expense,2,'.',',') }}</strong></td>
                                    <td class="text-center"> </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script>
    $(document).ready(function() {
        $(".data-table").DataTable({
            "ordering": false,
            "bAutoWidth": false,
        });
    });
</script>
