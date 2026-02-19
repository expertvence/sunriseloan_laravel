<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css" integrity="sha512-jG7NmK8Pm8iKEjw8aIWc+GVFBM33O/Ow4U0Xw34D5yyST0fgmlcV6shsghOXexDsAqtE2TCM6WwNy35qX8E6ng==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{ asset('datepicker/dist/css/bootstrap-datepicker.min.css') }}">

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
   <main>
        <div class="container">
            <div class="form-row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg ">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light "> <strong> Investment</strong></h3>
                        </div>
                        <div class="card-body">
                            @include('admin/payment/investment_system_form')
                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js" integrity="sha512-lEb9Vp/rkl9g2E/LdHIMFTqz21+LA79f84gqP75fbimHqVTu6483JG1AwJlWLLQ8ezTehty78fObKupq3HSHPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="application/javascript" src="{{ asset('datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>


    <script>
        $('.date_picker').datepicker({

            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            clearBtn: true

        });
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