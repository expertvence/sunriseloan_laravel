    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css"
        integrity="sha512-jG7NmK8Pm8iKEjw8aIWc+GVFBM33O/Ow4U0Xw34D5yyST0fgmlcV6shsghOXexDsAqtE2TCM6WwNy35qX8E6ng=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
    <style>
        td {
            padding: 5px;
        }

        /* #datatablesSimple td ,th{
                            border: 1px solid rgb(97, 93, 93);
                            padding: 5px;
                        } */
    </style>
    @php
        // use Carbon\Carbon;
        $month = [];
        for ($m = 1; $m <= 12; $m++) {
            $month[] = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
        }
        $payment_data = isset($payment_data) && !empty($payment_data) ? $payment_data : [];
        $id = isset($payment_data->id) ? $payment_data->id : '';
        $member_id_fk = isset($payment_data->member_id_fk) ? $payment_data->member_id_fk : '';
        $from_month = isset($payment_data->from_month) ? $payment_data->from_month : '';
        $to_month = isset($payment_data->to_month) ? $payment_data->to_month : '';
        $year = isset($payment_data->year) ? $payment_data->year : '';
        $no_of_share = isset($payment_data->no_of_share) ? $payment_data->no_of_share : '';
        $share_amount = isset($payment_data->share_amount) ? $payment_data->share_amount : '';

    @endphp
    <main>
        <div class="container">
            <div class="form-row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg ">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light "> <strong> Installment Payment</strong></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('installment_payment_store') }}" method="POST" id="payment">
                                @csrf
                                <input type="hidden" name="id" id="pay_id" value="{{ $id }}">
                                <table style="width: 100%">
                                    <tr>
                                        <td> <label for="member_name"> <strong> Member Name</strong></label></td>
                                        <td colspan="3">

                                            <input type="text" class="form-control" name="member_name" id="member_name"
                                                placeholder="Write....." required="required" autocomplete="off">
                                            <input type="hidden" name="member_id" id="member_id"
                                                value="{{ $member_id_fk }}">


                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <label for="no_of_share"> <strong> No Of Share</strong></label></td>
                                        <td><input type="text" class="form-control" name="no_of_share" id="no_of_share"
                                                placeholder="0" value="{{ $no_of_share }}" readonly></td>
                                        <td> <label for="share_amt"> <strong> Share Amount</strong></label></td>
                                        <td><input type="text" class="form-control" name="share_amt" id="share_amt"
                                                placeholder="0.00" value="{{ $share_amount }}" readonly=""></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: text-top"> <label for="from_month"><strong> Month</strong></label></td>
                                        <td>

                                            <select name="from_month[]" id="from_month" class="form-control "
                                                onclick="monthSelect(this)" multiple required="required">

                                                @foreach ($month as $value)
                                                    <option value="{{ $value }}"
                                                        @if ($from_month == $value) 'selected' @endif>
                                                        {{ $value }}</option>
                                                @endforeach

                                            </select>

                                        </td>

                                        <td style="vertical-align: text-top"> <label for="year"> <strong> Year</strong></label></td>
                                        <td style="vertical-align: text-top">
                                            @php
                                                $date = date('Y');
                                            @endphp
                                            <select name="year" id="year" class="form-control" required="required">
                                                <option value="">select</option>
                                                @for ($i = $date - 8; $i < $date + 3; $i++)
                                                    <option value="{{ $i }}"
                                                        @if ($year == $i) 'selected' @endif>
                                                        {{ $i }}</option>
                                                @endfor
                                            </select>

                                        </td>

                                    </tr>
                                    <tr>
                                        <td style="vertical-align: text-top"> <label for="no_of_month"> <strong> No Of Month</strong></label>
                                        </td>
                                        <td><input type="text" class="form-control" name="no_of_month" id="no_of_month"
                                                value="" readonly></td>
                                        <td style="vertical-align: text-top"> <label for="payable_amt"> <strong> Payable
                                                Amount</strong></label></td>
                                        <td><input type="text" class="form-control" name="payable_amt" id="payable_amt"
                                                value="" readonly></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="border: 1px dotted blue">
                                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo"><strong> Extra Payment</strong></button>
                                            <div id="demo" class="collapse form-row  m-2" >
                                                <div class="col-md-6">
                                                    <select name="extra_payment_year" id="extra_payment_year" class="form-control" >
                                                        <option value="">select Year</option>
                                                        @for ($i = $date - 8; $i < $date + 3; $i++)
                                                            <option value="{{ $i }}"
                                                                @if ($year == $i) 'selected' @endif>
                                                                {{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="extra_payment_amt" id="extra_payment_amt"
                                                    value="" placeholder="0.00" >
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            {{-- {{route('installment_payment')}} --}}
                                            <div class="d-grid"><button type="submit" onclick="save(this)"
                                                    class="btn btn-primary btn-block" redirect="{{route('installment_payment_list')}}">Paid Amount</button>
                                            </div>
                                        </td>
                                    </tr>

                                </table>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Payment list</h3>
                        </div>
                        <div class="card-body">
                            @include('admin/payment/installment_payment_list')
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"
        integrity="sha512-lEb9Vp/rkl9g2E/LdHIMFTqz21+LA79f84gqP75fbimHqVTu6483JG1AwJlWLLQ8ezTehty78fObKupq3HSHPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>


        openDoctorAutocomplete('#member_name', 'member_id', '', '', memberInfo);

        function memberInfo(item, obj) {
            $('#no_of_share').val(item.share_no);
            $('#share_amt').val(item.share_amt);
            // var conceptName = $('#from_month').find(":selected").val();

        }

        function monthSelect(element) {
            var share_no = $('#no_of_share').val();
            var share_amt = $('#share_amt').val();
            var month = 0;
            $("#from_month :selected").map(function(i, el) {
                month += 1;
            }).get();
            var payable_amt = (share_no * share_amt) * month;
            $('#payable_amt').val(payable_amt)
            $('#no_of_month').val(month)
            console.log(payable_amt);
        }
    </script>
