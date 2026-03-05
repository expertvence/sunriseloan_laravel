@php
    $data = DB::table('loancategories')->get();
@endphp

<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="card shadow-lg">
    <div class="card-body">

        <h3 class="text-center mb-4">Loan Commit Form</h3>

        <form action="{{ route('submit-request') }}" method="POST" id="loan-commit-form"
            enctype="multipart/form-data">
            @csrf

            <!-- User & Loan Amount -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label>User Name</label>
                    <input type="text" class="form-control" id="member_name" name="member_name" required>
                    <input type="hidden" id="member_id" name="member_id">
                    <input type="hidden" id="user_id" name="user_id">
                </div>

                <div class="col-md-4">
                    <label>Loan Amount Requested</label>
                    <input type="number" name="loan_amount" class="form-control"
                        placeholder="Enter loan amount" required>
                </div>

                <!-- Monthly Income -->
                <div class="col-md-4">
                    <label>Monthly Income</label>
                    <input type="number" name="monthly_income" class="form-control"
                        placeholder="Enter monthly income" required>
                </div>
            </div>

            <!-- Loan Purpose -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label>Loan Purpose</label>
                    <textarea class="form-control" name="loan_purpose" rows="3"
                        placeholder="Describe the purpose of the loan" required></textarea>
                </div>
            </div>

            <!-- Loan Category + Repayment + Income -->
            <div class="row mb-3">

                <!-- Loan Category -->
                <div class="col-md-4">
                    <label>Loan Category</label>
                    <select class="form-select" name="loan_category_id" required>
                        @foreach ($data as $cat)
                            <option value="{{ $cat->id }}">
                                {{ $cat->loan_category ?? '' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Repayment Type -->
                <div class="col-md-4">
                    <label class="d-block">Repayment Type</label>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="repayment_type"
                            id="monthlyOption" value="monthly">
                        <label class="form-check-label" for="monthlyOption">Monthly</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="repayment_type"
                            id="weeklyOption" value="weekly">
                        <label class="form-check-label" for="weeklyOption">Weekly</label>
                    </div>
                </div>

                

            </div>

            <!-- Monthly Duration -->
            <div class="row mb-3 d-none" id="monthlySection">
                <div class="col-md-6">
                    <label>Select Month Duration</label>
                    <select class="form-select" name="monthly_duration">
                        <option value="">-- Select Month --</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">
                                {{ $i }} {{ Str::plural('Month', $i) }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>

            <!-- Weekly Duration -->
            <div class="row mb-3 d-none" id="weeklySection">
                <div class="col-md-6">
                    <label>Select Week Duration</label>
                    <select class="form-select" name="weekly_duration">
                        <option value="">-- Select Week --</option>
                        @for ($i = 1; $i <= 48; $i++)
                            <option value="{{ $i }}">
                                {{ $i }} {{ Str::plural('Week', $i) }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>

            <!-- File Upload -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Other Documents (Optional)</label>
                    <input type="file" name="other_documents" class="form-control">
                </div>
            </div>

            <!-- Agreement -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" required>
                        <label class="form-check-label">
                            I agree that the information provided is true and accurate.
                        </label>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="mt-4 mb-0">
                <div class="d-grid"><button type="button" onclick="saveFile(this)"
                        class="btn btn-primary btn-block" redirect="{{ route('loan-request-list') }}">Create
                        Loan</button></div>
                {{-- {{route('member-list')}} --}}
            </div>
        </form>
    </div>
</div>

<!-- Scripts -->
<script>
    openDoctorAutocomplete('#member_name', 'member_id');

    $(document).ready(function() {

        $('input[name="repayment_type"]').on('change', function() {

            if ($(this).val() === 'monthly') {
                $('#monthlySection').removeClass('d-none');
                $('#weeklySection').addClass('d-none');
                $('select[name="weekly_duration"]').val('');
            }

            if ($(this).val() === 'weekly') {
                $('#weeklySection').removeClass('d-none');
                $('#monthlySection').addClass('d-none');
                $('select[name="monthly_duration"]').val('');
            }

        });

    });
</script>
