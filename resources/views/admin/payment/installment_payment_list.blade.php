<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css"
integrity="sha512-jG7NmK8Pm8iKEjw8aIWc+GVFBM33O/Ow4U0Xw34D5yyST0fgmlcV6shsghOXexDsAqtE2TCM6WwNy35qX8E6ng=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <h3 class="text-center font-weight-light my-4">Payment list</h3>
                            <form action="{{route('installment_payment_pdf')}}" method="get" id="search" target="_blank">
                                <table width="100%">
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="member_name" id="member_name"
                                            placeholder="Write....." required="required" autocomplete="off">
                                        <input type="hidden" name="member_id" id="member_id"
                                            value="">
                                        </td>
                                        <td>
                                            <button type="submit">PDF</button>
                                        </td>
                                    </tr>
                                </table>

                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="" class="table table-bordered data-table" style="width: 100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center">SL#</th>
                                            <th class="text-center">Payment Date & Time</th>
                                            <th class="text-center">Invoice No</th>
                                            <th class="text-center">Member Code</th>
                                            <th>Member Name</th>
                                            <th>From Month</th>
                                            {{-- <th>To Month</th> --}}
                                            <th>Year</th>
                                            <th class="text-center">Number Of Share</th>
                                            <th class="text-right"> Share Amt.</th>
                                            {{-- <th> Paid Amt.</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($payment_list))
                                            @foreach ($payment_list as $value)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $value->created_at != '' ? date('d/m/Y h:i a', strtotime($value->created_at)) : '' }}
                                                    </td>
                                                    <td class="text-center">{{ $value->invoice_code }}</td>
                                                    <td class="text-center">{{ $value->member_code_no }}</td>
                                                    <td>{{ $value->member_name }}</td>
                                                    <td>{{ $value->from_month }}</td>
                                                    {{-- <td>{{ $value->to_month}}</td> --}}
                                                    <td>{{ $value->year }}</td>
                                                    <td class="text-center">{{ $value->no_of_share }}</td>
                                                    <td class="text-right">{{ $value->share_amount }}</td>
                                                    {{-- <td></td> --}}

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"
integrity="sha512-lEb9Vp/rkl9g2E/LdHIMFTqz21+LA79f84gqP75fbimHqVTu6483JG1AwJlWLLQ8ezTehty78fObKupq3HSHPQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
         openDoctorAutocomplete('#member_name', 'member_id');
        $(document).ready(function() {

            $(".data-table").DataTable({
                "ordering": false,
                "bAutoWidth": false,

            });
        });
    </script>
