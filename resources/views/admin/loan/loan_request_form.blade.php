@php
    $data = DB::table('loancategories')->get();
@endphp
<meta name="csrf-token" content="your-csrf-token-here">

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css"
    integrity="sha512-jG7NmK8Pm8iKEjw8aIWc+GVFBM33O/Ow4U0Xw34D5yyST0fgmlcV6shsghOXexDsAqtE2TCM6WwNy35qX8E6ng=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="card-body">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h1 class="text-center">Loan Commit Form</h1>
    <form action="{{ route('submit-request') }}" method="POST" id="loan-commit-form">
        @csrf

        <div class="row">
            <!-- User Name Field -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control" id="member_name" name="member_name" required>
                    <!-- hidden fields to send ID and duplicate ID -->
                    <input type="hidden" id="member_id" name="member_id">
                    <input type="hidden" id="user_id" name="user_id">

                    <ul id="user-suggestions" class="list-group" style="display:none;"></ul>
                </div>
            </div>


            <!-- Loan Amount Field -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="loanAmount" class="form-label">Loan Amount Requested:</label>
                    <input type="number" name="loan_amount" class="form-control" id="loanAmount"
                        placeholder="Enter loan amount" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <td style="vertical-align: text-top">
                    <label for="loanPurpose" class="form-label">Loan Purpose:</label>
                    <textarea class="form-control" name="loan_purpose" id="loanPurpose" rows="3"
                        placeholder="Describe the purpose of the loan" required></textarea>
            </div>

        </div>
        <!-- Loan Category, Loan Term, Monthly Income -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="loanCategory" class="form-label">Loan Category</label>
                <select id="loanCategory" class="form-select" name="loan_category_id" required>
                    @foreach ($data as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->loan_category ?? '' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label for="loanTerm" class="form-label">Loan Term (Weekly)</label>
                <select class="form-select" id="loanTerm" name="loan_term" required>
                    {{-- <option value="">---select---</option> --}}
                    {{-- <option value="30">Monthly </option>
                    <option value="7">Wekly </option> --}}
                    @for ($i = 1; $i <= 48; $i++)
                        <option value="{{ $i }}">
                            {{ $i }} {{ Str::plural('Week', $i) }}
                        </option>
                    @endfor
                </select>

            </div>

            <div class="col-md-4">
                <label for="monthlyIncome" class="form-label">Monthly Income</label>
                <input type="number" name="monthly_income" class="form-control" id="monthlyIncome"
                    placeholder="Enter monthly income" required>
            </div>
        </div>

        <!-- Other Documents -->
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="otherDocuments" class="form-label">Other Documents (Optional)</label>
                <input type="file" name="other_documents" class="form-control" id="otherDocuments">
            </div>
        </div>

        <!-- Terms and Conditions -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="infoAgreement" required>
                    <label for="infoAgreement" class="form-check-label">
                        I agree that the information provided is true and accurate.
                    </label>
                </div>
            </div>
        </div>




        <div class="mt-4 mb-0">
            <div class="d-grid"><button type="button" onclick="saveFile(this)" class="btn btn-primary btn-block"
                    redirect="{{ route('loan-request-list') }}">Create Loan</button></div>
            {{-- {{route('member-list')}} --}}
        </div>
        <div id="message" style="display: none; color:red;"></div>
    </form>

</div>

<script>
    openDoctorAutocomplete('#member_name', 'member_id');
    $(document).ready(function() {

        $(".data-table").DataTable({
            "ordering": false,
            "bAutoWidth": false,

        });
    });
</script>
