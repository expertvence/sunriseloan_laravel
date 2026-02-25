
<link rel="stylesheet" href="{{ asset('datepicker/dist/css/bootstrap-datepicker.min.css') }}">

<style>
    td {
        padding: 5px;
    }
</style>

        <div class="container">
            <div class="form-row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg ">
                       
                        <div class="card-body">
                        @include('admin/loan_commit/loan_commit_form')
                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
  

    <script type="application/javascript" src="{{ asset('datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $('.date_picker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            clearBtn: true

        });
      
    </script>
