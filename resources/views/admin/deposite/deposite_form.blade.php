@php
$id = isset($deposit_data) && !empty($deposit_data) ? $deposit_data->id : '';
$member_name = isset($deposit_data) && !empty($deposit_data) ? $deposit_data->member_name : '';
$member_id = isset($deposit_data) && !empty($deposit_data) ? $deposit_data->member_id : '';
$transection_date = isset($deposit_data) && !empty($deposit_data) ? date('d-m-Y', strtotime($deposit_data->deposit_date)) : '';
$income_expence_amt = isset($deposit_data) && !empty($deposit_data) ? $deposit_data->deposite_amount : '';
$description = isset($deposit_data) && !empty($deposit_data) ? $deposit_data->description : '';
$type = isset($deposit_data) && !empty($deposit_data) ? $deposit_data->deposit_type : '';
@endphp

<form action="{{ route('submit-deposit') }}" method="POST" id="depositForm">
    @csrf

    <!-- Hidden ID for Edit -->
    <input type="hidden" name="id" id="id" value="{{ $id }}">

    <div style="border:1px solid gray; padding:10px">
        <p class="text-center" 
           style="font-size: 30px; font-weight: bold; background-color:darkcyan; color:white">
            <span style="border-bottom: 1px dotted white;">
                Member Deposit Entry
            </span>
        </p>

        <div class="form-row" style="padding: 20px;">

            <!-- Member Name -->
            <div class="col-md-4">
                <label><strong> Member Name <span class="text-danger">*</span></strong></label>
                <input type="text" 
                       class="form-control" 
                       id="member_name" 
                       name="member_name"
                       placeholder="Enter member name"
                       value="{{ $member_name }}"
                       required>

                <input type="hidden" 
                       id="member_id" 
                       name="member_id"
                       value="{{ $member_id }}">
            </div>

            <!-- Deposit Date -->
            <div class="col-md-4">
                <label><strong> Deposit Date <span class="text-danger">*</span></strong></label>
                <input type="date" 
                       class="form-control" 
                       name="transection_date" 
                       id="transection_date" 
                       value="{{ $transection_date }}"
                       placeholder="dd-mm-yyyy" 
                       autocomplete="off" 
                       required>
            </div>

            <!-- Amount -->
            <div class="col-md-4">
                <label><strong> Amount <span class="text-danger">*</span></strong></label>
                <input type="number" 
                       step="0.01"
                       class="form-control" 
                       name="income_expence_amt" 
                       id="income_expence_amt"
                       value="{{ $income_expence_amt }}"
                       placeholder="Enter deposit amount" 
                       required>
            </div>

            <!-- Description -->
            <div class="col-md-6 mt-2">
                <label><strong> Description <span class="text-danger">*</span></strong></label>
                <input type="text" 
                       class="form-control" 
                       name="description" 
                       id="description"
                       value="{{ $description }}"
                       placeholder="Write description" 
                       autocomplete="off" 
                       required>
            </div>

            <!-- Type -->
            <div class="col-md-2 mt-2">
                <label><strong> Type <span class="text-danger">*</span></strong></label>
                <select class="form-control" name="type" id="type" required>
                    <option value="">select</option>
                    <option value="relesed" {{ $type == 'relesed' ? 'selected' : '' }}>Relesed</option>
                    <option value="deposite" {{ $type == 'deposite' ? 'selected' : '' }}>Deposite</option>
                </select>
            </div>

        </div>
    </div>

    <div class="d-grid mt-3">
        <button type="submit"
                onclick="save(this)"
                class="btn btn-primary btn-block"
                redirect="{{ route('deposit-list') }}">
            {{ $id ? 'Update' : 'Save' }}
        </button>
    </div>
</form>

<script>
    openDoctorAutocomplete('#member_name', 'member_id');
</script>
 <script type="application/javascript" src="{{ asset('datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $('.date_picker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            clearBtn: true

        });
      
    </script>