
<link rel="stylesheet" href="{{ asset('datepicker/dist/css/bootstrap-datepicker.min.css') }}">

<style>
    td {
        padding: 5px;
    }
</style>

        <div class="container-fluid income-expense-surface">
            <div class="form-row justify-content-center">
                <div class="col-lg-12">
                    <div class="card income-expense-shell shadow-lg border-0 rounded-lg ">
                       
                        <div class="card-body">
                            @include('admin/income_expence/income_expence_form')
                           
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
