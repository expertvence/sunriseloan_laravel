<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css"
    integrity="sha512-jG7NmK8Pm8iKEjw8aIWc+GVFBM33O/Ow4U0Xw34D5yyST0fgmlcV6shsghOXexDsAqtE2TCM6WwNy35qX8E6ng=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="card-body">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h1 class="text-center">Loan Commit Form</h1>
    <form action="{{ route('loan-commit-submit') }}" method="POST" id="loan-commit-form">
        @csrf

        <div class="row">
            <!-- User Name Field -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control" id="member_name" name="member_name" required>
                    <input type="hidden" id="member_id" name="member_id">
                    <input type="hidden" id="repayment_type" name="repayment_type">
                    <ul id="user-suggestions" class="list-group" style="display:none;"></ul>
                </div>
            </div>

            <!-- Loan Amount Field -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="loan_id">Loan Code</label>
                    <select class="form-select" name="loan_payment_id" id="loan_id">
                        <option value="">Select Loan</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Month Dropdown -->
            <div class="col-md-6">
                <label for="from_month"><strong>Month</strong></label>
                <select name="from_month[]" id="from_month" class="form-control" multiple required>
                    <!-- Populated dynamically -->
                </select>
            </div>

            <!-- Week Dropdown (Weekly Loans) -->
            <div class="col-md-6" id="week-container" style="display:none;">
                <label for="from_week"><strong>Week</strong></label>
                <select id="from_week" name="from_week[]" class="form-control" multiple>
                    <!-- Populated dynamically -->
                </select>
            </div>
        </div>

        <div class="row mt-2">
            <!-- Year Dropdown -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="loan_year">Year</label>
                    <select class="form-control" id="loan_year" name="loan_year" required>
                        <option value="">Select Year</option>
                    </select>
                </div>
            </div>

            <!-- No of Months -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="no_of_month"><strong>No Of Month</strong></label>
                    <input type="text" class="form-control" id="no_of_month" name="no_of_month" readonly>
                </div>
            </div>
            <!-- No of Months -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="no_of_month"><strong>Total Amount</strong></label>
                    <input type="text" class="form-control" id="total_amount" name="total_amount" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="no_of_month"><strong>Total Week</strong></label>
                    <input type="text" class="form-control" id="total_week" name="total_week" readonly>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <!-- Payment Amount -->
            <div class="col-md-3">
                <div class="form-group">
                    <label for="payment_amount">Payment Amount</label>
                    <input type="number" class="form-control" id="payment_amount" name="payment_amount" required
                        min="1" step="0.01" readonly>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="successfull_payment">Successfully Paid</label>
                    <input type="number" class="form-control" id="successfull_payment" name="successfull_payment"
                        readonly>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="last_payment_month">Last Payment Month</label>
                    <input  class="form-control" id="last_payment_month" name="last_payment_month"
                        readonly>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="remaining_amount">Remaining Amount</label>
                    <input type="number" class="form-control" id="remaining_amount" name="remaining_amount"
                        readonly>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="d-grid">
                    <button type="button" onclick="saveFile(this)" class="btn btn-primary btn-block"
                        redirect="{{ route('comitted-list') }}">Submit</button>
                </div>
                <div id="message" style="display: none; color:red;"></div>
            </div>
        </div>

    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"
    integrity="sha512-lEb9Vp/rkl9g2E/LdHIMFTqz21+LA79f84gqP75fbimHqVTu6483JG1AwJlWLLQ8ezTehty78fObKupq3HSHPQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    // --- Autocomplete for member_name ---
    openDoctorAutocomplete('#member_name', 'member_id', '', '', memberInfo);

    function memberInfo(item, obj) {
        $('#no_of_share').val(item.share_no);
        $('#share_amt').val(item.share_amt);

        // Highlight current year
        const currentYear = new Date().getFullYear();
        $('#loan_year option').each(function () {
            if (parseInt($(this).val()) === currentYear) {
                $(this).css({ 'background-color': '#d1e7dd', 'font-weight': 'bold' });
            } else {
                $(this).css({ 'background-color': '', 'font-weight': '' });
            }
        });

        fetchLoansForUser(item.user_id);

        // Fetch repayment type
        $.ajax({
            url: `/get-repayment-type/${item.user_id}`,
            method: 'GET',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                $('#repayment_type').val(response.repayment_type);

                if (response.repayment_type === 'weekly') {
                    $('#week-container').show();
                    populateWeekDropdown(4, response.committed_weeks || []); 
                } else {
                    $('#week-container').hide();
                }
            },
            error: function() {
                $('#week-container').hide();
            }
        });
    }

    // --- Fetch loans for user ---
    function fetchLoansForUser(userId) {
        $('#loan_id').empty().append('<option>Loading...</option>');

        $.ajax({
            url: `/get-loans-for-user/${userId}`,
            method: 'GET',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                $('#loan_id').empty();
                if (response.length > 0) {
                    $('#loan_id').append('<option value="">Select Loan</option>');
                    response.forEach(function(loan) {
                        $('#loan_id').append(`<option value="${loan.loan_ide}">${loan.l_uId}</option>`);
                    });
                } else {
                    $('#loan_id').append('<option>No loans found</option>');
                }
            }
        });
    }

    // --- Populate month dropdown with blocked months ---
    function populateMonthDropdown(committedMonths = []) {
        const months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        let monthSelect = $('#from_month');
        monthSelect.empty();

        months.forEach(month => {
            let option = $('<option></option>').val(month).text(month);
            if (committedMonths.includes(month)) {
                option.prop('disabled', true).css('background-color', '#f8d7da');
            }
            monthSelect.append(option);
        });
    }

    // --- Populate week dropdown for weekly repayment ---
    function populateWeekDropdown(totalWeeks = 4, committedWeeks = []) {
        const weekSelect = $('#from_week');
        weekSelect.empty();

        for (let i = 1; i <= totalWeeks; i++) {
            let option = $('<option></option>').val(i).text('Week ' + i);
            if (committedWeeks.includes(i)) {
                option.prop('disabled', true).css('background-color', '#f8d7da');
            }
            weekSelect.append(option);
        }
    }

    // --- Populate year dropdown ---
    function populateYearDropdown() {
        const yearSelect = $('#loan_year');
        const currentYear = new Date().getFullYear();
        const startYear = currentYear - 5;

        for (let y = startYear; y <= currentYear; y++) {
            yearSelect.append(new Option(y, y));
        }
    }

    // --- Update total amount when months change ---
    $('#from_month').on('change', function() {
        let selectedMonths = $(this).val() || [];
        $('#no_of_month').val(selectedMonths.length);

        const perMonthAmount = parseFloat($('#payment_amount').val()) || 0;
        $('#total_amount').val((perMonthAmount * selectedMonths.length).toFixed(2));
    });

    // --- When loan is selected ---
    $('#loan_id').on('change', function() {
        let loanIde = $(this).val();
        if (!loanIde) return;

        // Fetch loan details
        $.ajax({
            url: `/get-loan-details/${loanIde}`,
            method: 'GET',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                if (!response) return;

                let loanAmount = parseFloat(response.loan_amount);
                let percentage = parseFloat(response.loan_category_percentage);
                let loanTerm = parseInt(response.loan_term);

                // Payment calculation
                let interest = (loanAmount * percentage) / 100;
                let amountWithInterest = loanAmount + interest;
                let paymentAmount = amountWithInterest / loanTerm;
                $('#payment_amount').val(paymentAmount.toFixed(2));

                // Block previous months
                populateMonthDropdown(response.committed_months || []);

                // Weekly repayment
                if (response.repayment_type === 'weekly') {
                    $('#week-container').show();
                    populateWeekDropdown(4, response.committed_weeks || []);
                } else {
                    $('#week-container').hide();
                }

                // Update totals for selected months
                let selectedMonths = $('#from_month').val() || [];
                $('#no_of_month').val(selectedMonths.length);
                $('#total_amount').val((paymentAmount * selectedMonths.length).toFixed(2));
            }
        });

        // Fetch total paid
        $.ajax({
            url: `/get-total-paid/${loanIde}`,
            method: 'GET',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(res) {
                $('#successfull_payment').val(parseFloat(res.totalPaid || 0).toFixed(2));
                $('#remaining_amount').val(parseFloat(res.remainingAmount || 0).toFixed(2));
               $('#last_payment_month').val(res.lastPaymentMonth || '');
               $('#total_week').val(res.totalWeeks || 0);
               console.log('Last Payment Month:', res.lastPaymentMonth);

            }
        });
    });

    // --- Validate weekly selection ---
    $('#loan-commit-form').on('submit', function(e) {
        const repaymentType = $('#repayment_type').val();
        const selectedWeeks = $('#from_week').val() || [];

        if (repaymentType === 'weekly' && selectedWeeks.length > 4) {
            e.preventDefault();
            alert('You cannot select more than 4 weeks per month!');
        }
    });

    // --- Initial load ---
    $(document).ready(function() {
        populateMonthDropdown();
        populateYearDropdown();
    });


    // --- Show committed months/weeks visually for the selected year ---
function highlightCommittedMonthsAndWeeks(loanId, year) {
    $.ajax({
        url: `/get-committed-months-weeks/${loanId}/${year}`,
        method: 'GET',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(response) {
            // Response example: { committed_months: ["January","March"], committed_weeks: [1,3] }

            // Highlight months
            const monthSelect = $('#from_month');
            monthSelect.find('option').each(function() {
                const month = $(this).val();
                if (response.committed_months.includes(month)) {
                    $(this).prop('disabled', true).css({'background-color':'#f8d7da', 'color':'#721c24'});
                    $(this).text(`${month} (Already Paid)`);
                } else {
                    $(this).prop('disabled', false).css({'background-color':'', 'color':''});
                    $(this).text(month);
                }
            });

            // Highlight weeks if weekly repayment
            if ($('#repayment_type').val() === 'weekly') {
                $('#week-container').show();
                const weekSelect = $('#from_week');
                weekSelect.find('option').each(function() {
                    const week = parseInt($(this).val());
                    if (response.committed_weeks.includes(week)) {
                        $(this).prop('disabled', true).css({'background-color':'#f8d7da', 'color':'#721c24'});
                        $(this).text(`Week ${week} (Already Paid)`);
                    } else {
                        $(this).prop('disabled', false).css({'background-color':'', 'color':''});
                        $(this).text('Week ' + week);
                    }
                });
            } else {
                $('#week-container').hide();
            }
        }
    });
}

// --- Call this after selecting loan or year ---
$('#loan_id, #loan_year').on('change', function() {
    const loanId = $('#loan_id').val();
    const year = $('#loan_year').val();
    if(loanId && year){
        highlightCommittedMonthsAndWeeks(loanId, year);
    }
});

</script>

