<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css" integrity="sha512-jG7NmK8Pm8iKEjw8aIWc+GVFBM33O/Ow4U0Xw34D5yyST0fgmlcV6shsghOXexDsAqtE2TCM6WwNy35qX8E6ng==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <h3 class="text-center font-weight-light my-4">Investment list</h3>
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
                                    <th class="text-center">Invest Uid</th>
                                    <th class="text-left">Invest To</th>
                                    <th class="text-left">Mobile</th>
                                    <th class="text-left">Invest Date</th>
                                    <th class="text-right">Amount</th>
                                    <th class="text-left">Refered Name</th>
                                    <th class="text-left">Status</th>
                                    <th class="text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($payment_list))
                                @foreach ($payment_list as $value)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="text-center">{{ $value->uid }}</td>
                                    <td class="text-left">{{ $value->investment_to }}</td>
                                    <td class="text-left">{{ $value->mobile }}</td>
                                    <td class="text-center">
                                        {{ $value->start_date != '' ? date('d/m/Y', strtotime($value->start_date)) : '' }}
                                    </td>
                                    <td class="text-right">{{ $value->invest_amount }}</td>
                                    <td class="text-left">{{ $value->reference_name }}</td>
                                    <td class="text-center">{{ $value->is_publish ==1 ? 'Active': 'Inactive' }}</td>
                                    <td> <span class="btn btn-sm  open-modal btnView" data-action="{{route('investment-edit', $value->id)}}" data-modal="common-modal-md" data-title=" Member Edit" title="Edit" data-id="{{$value->id}}"><i class="fas fa-edit"></i></span> </td>


                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js" integrity="sha512-lEb9Vp/rkl9g2E/LdHIMFTqz21+LA79f84gqP75fbimHqVTu6483JG1AwJlWLLQ8ezTehty78fObKupq3HSHPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    openDoctorAutocomplete('#member_name', 'member_id');
    $(document).ready(function() {

        $(".data-table").DataTable({
            "ordering": false,
            "bAutoWidth": false,

        });
    });
</script>