<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css"
    integrity="sha512-jG7NmK8Pm8iKEjw8aIWc+GVFBM33O/Ow4U0Xw34D5yyST0fgmlcV6shsghOXexDsAqtE2TCM6WwNy35qX8E6ng=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    /* ===== PREMIUM VARIABLES ===== */
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.1);
        --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1);
        --shadow-sm: 0 1px 2px 0 rgba(0,0,0,0.05);
    }

    /* Light Mode */
    [data-theme="light"] {
        --bg-body: #f8fafc;
        --card-bg: #ffffff;
        --input-bg: #ffffff;
        --text-primary: #0f172a;
        --text-secondary: #334155;
        --text-muted: #64748b;
        --border-color: #e2e8f0;
        --border-focus: #667eea;
        --bg-secondary: #f1f5f9;
        --label-color: #1e293b;
        --placeholder-color: #94a3b8;
    }

    /* Dark Mode */
    body.dark-mode {
        --bg-body: #0f172a;
        --card-bg: #1e293b;
        --input-bg: #0f172a;
        --text-primary: #f1f5f9;
        --text-secondary: #cbd5e1;
        --text-muted: #94a3b8;
        --border-color: #334155;
        --border-focus: #a5b4fc;
        --bg-secondary: #1e293b;
        --label-color: #f1f5f9;
        --placeholder-color: #64748b;
    }

    body {
        background: var(--bg-body);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        margin: 0;
        padding: 20px;
        min-height: 100vh;
        transition: background 0.3s ease;
    }

    /* Premium Form Card */
    .premium-form-card {
        background: var(--primary-gradient);
        padding: 4px;
        border-radius: 24px;
        box-shadow: var(--shadow-xl);
        margin-bottom: 2rem;
        transition: all 0.3s ease;
        margin-top: 1.2rem;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .form-inner {
        background: var(--card-bg);
        border-radius: 22px;
        padding: 2rem;
        transition: all 0.3s ease;
    }

    /* Page Header */
    .page-header-custom {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--border-color);
    }

    .page-header-custom h1 {
        font-size: 1.8rem;
        font-weight: 700;
        margin: 0;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .page-header-custom i {
        font-size: 2rem;
        color: #667eea;
        background: rgba(102, 126, 234, 0.1);
        padding: 10px;
        border-radius: 12px;
    }

    /* Premium Input Groups */
    .premium-input-group {
        margin-bottom: 1.2rem;
        position: relative;
    }

    .premium-input-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: var(--label-color) !important;
        font-size: 0.95rem;
    }

    .premium-input-group label i {
        color: #667eea;
        margin-right: 8px;
        width: 18px;
    }

    .premium-input-group label .required {
        color: #f72585;
        margin-left: 4px;
    }

    .premium-input-group .form-control,
    .premium-input-group .form-select {
        border: 2px solid var(--border-color);
        border-radius: 14px;
        padding: 12px 16px;
        height: auto;
        min-height: 50px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: var(--input-bg);
        color: var(--text-primary) !important;
        box-shadow: var(--shadow-sm);
        width: 100%;
        font-weight: 400;
    }

    .premium-input-group .form-control:focus,
    .premium-input-group .form-select:focus {
        border-color: var(--border-focus);
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
        outline: none;
    }

    .premium-input-group .form-control::placeholder {
        color: var(--placeholder-color);
        font-weight: 400;
        opacity: 1;
        font-size: 0.9rem;
    }

    /* Select arrow fix */
    .premium-input-group select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        background-size: 16px;
    }

    /* Multiple Select Styling */
    .premium-input-group select[multiple] {
        min-height: 120px;
        padding: 8px;
        background-image: none;
    }

    .premium-input-group select[multiple] option {
        padding: 8px 12px;
        border-radius: 8px;
        margin: 2px 0;
        background: var(--input-bg);
        color: var(--text-primary);
    }

    .premium-input-group select[multiple] option:hover {
        background: var(--bg-secondary);
    }

    .premium-input-group select[multiple] option:checked {
        background: var(--primary-gradient);
        color: white;
    }

    /* Readonly Fields */
    .premium-input-group input[readonly] {
        background: var(--bg-secondary);
        cursor: not-allowed;
        opacity: 0.8;
    }

    /* User Suggestions */
    #user-suggestions {
        position: absolute;
        z-index: 1000;
        width: 100%;
        max-height: 200px;
        overflow-y: auto;
        background: var(--card-bg);
        border: 2px solid var(--border-color);
        border-radius: 14px;
        margin-top: 4px;
        box-shadow: var(--shadow-lg);
        list-style: none;
        padding: 5px;
    }

    #user-suggestions li {
        padding: 10px 15px;
        cursor: pointer;
        color: var(--text-primary) !important;
        border-radius: 8px;
    }

    #user-suggestions li:hover {
        background: var(--bg-secondary);
    }

    /* Week Container */
    #week-container {
        transition: all 0.3s ease;
    }

    /* Message Alert */
    #message {
        margin-top: 1rem;
        padding: 1rem;
        border-radius: 14px;
        font-weight: 600;
        text-align: center;
        display: none;
    }

    #message.error {
        background: rgba(247, 37, 133, 0.1);
        color: #f72585;
        border: 2px solid #f72585;
        display: block;
    }

    #message.success {
        background: rgba(76, 201, 240, 0.1);
        color: #4cc9f0;
        border: 2px solid #4cc9f0;
        display: block;
    }

    /* Submit Button */
    .btn-premium-submit {
        background: var(--primary-gradient);
        border: none;
        border-radius: 14px;
        padding: 14px 24px;
        font-weight: 600;
        font-size: 1rem;
        color: white;
        transition: all 0.3s ease;
        width: 100%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .btn-premium-submit:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .btn-premium-submit i {
        font-size: 1rem;
        transition: transform 0.3s ease;
    }

    .btn-premium-submit:hover i {
        transform: translateX(5px);
    }

    .btn-premium-submit:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        background: linear-gradient(135deg, #94a3b8 0%, #64748b 100%);
    }

    /* Loading State */
    .loading {
        position: relative;
        pointer-events: none;
        opacity: 0.8;
    }

    .loading::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        top: 50%;
        left: 50%;
        margin-left: -10px;
        margin-top: -10px;
        border: 3px solid white;
        border-top-color: transparent;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* Helper Text */
    .helper-text {
        display: block;
        margin-top: 4px;
        font-size: 0.8rem;
        color: var(--text-muted);
    }

    /* Responsive Grid */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-grid .full-width {
        grid-column: span 2;
    }

    @media (max-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
        
        .form-grid .full-width {
            grid-column: span 1;
        }
        
        .form-inner {
            padding: 1.5rem;
        }
        
        .page-header-custom {
            flex-direction: column;
            text-align: center;
            gap: 10px;
        }
        
        .page-header-custom h1 {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 576px) {
        .form-inner {
            padding: 1rem;
        }
    }

    /* Dark Mode Specific */
    body.dark-mode .premium-input-group select[multiple] option:hover {
        background: var(--bg-secondary);
    }

    body.dark-mode .premium-input-group input[readonly] {
        background: var(--bg-secondary);
    }
</style>

<div class="premium-form-card">
    <div class="form-inner">
        <!-- Page Header -->
        <div class="page-header-custom">
            <i class="fas fa-hand-holding-usd"></i>
            <h1>Loan Commit Form</h1>
        </div>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <form action="{{ route('loan-commit-submit') }}" method="POST" id="loan-commit-form">
            @csrf
            <input type="hidden" id="member_id" name="member_id">
            <input type="hidden" id="repayment_type" name="repayment_type">

            <!-- Row 1: User Name and Loan Code -->
            <div class="form-grid">
                <div class="premium-input-group full-width">
                    <label>
                        <i class="fas fa-user"></i> User Name <span class="required">*</span>
                    </label>
                    <input type="text" class="form-control" id="member_name" name="member_name" 
                           placeholder="Enter user name" required>
                    <ul id="user-suggestions" style="display:none;"></ul>
                </div>

                <div class="premium-input-group">
                    <label>
                        <i class="fas fa-qrcode"></i> Loan Code <span class="required">*</span>
                    </label>
                    <select class="form-select" name="loan_payment_id" id="loan_id" required>
                        <option value="">Select Loan</option>
                    </select>
                </div>

                <!-- Hidden fields for other data -->
                <div class="premium-input-group">
                    <label>
                        <i class="fas fa-coins"></i> Loan Amount
                    </label>
                    <input type="text" class="form-control" id="loan_amount" readonly placeholder="0.00">
                </div>

                <div class="premium-input-group">
                    <label>
                        <i class="fas fa-clock"></i> Loan Term
                    </label>
                    <input type="text" class="form-control" id="loan_term" readonly placeholder="0">
                </div>
            </div>

            <!-- Row 2: Month and Week -->
            <div class="form-grid">
                <div class="premium-input-group">
                    <label>
                        <i class="fas fa-calendar-alt"></i> Month <span class="required">*</span>
                    </label>
                    <select name="from_month[]" id="from_month" class="form-select" multiple required>
                        <!-- Populated dynamically by JavaScript -->
                    </select>
                    <span class="helper-text">Hold Ctrl/Cmd to select multiple months</span>
                </div>

                <div class="premium-input-group" id="week-container" style="display:none;">
                    <label>
                        <i class="fas fa-calendar-week"></i> Week
                    </label>
                    <select id="from_week" name="from_week[]" class="form-select" multiple>
                        <!-- Populated dynamically -->
                    </select>
                    <span class="helper-text">Maximum 4 weeks can be selected</span>
                </div>
            </div>

            <!-- Row 3: Year, No of Months, Total Amount -->
            <div class="form-grid">
                <div class="premium-input-group">
                    <label>
                        <i class="fas fa-calendar"></i> Year <span class="required">*</span>
                    </label>
                    <select class="form-control" id="loan_year" name="loan_year" required>
                        <option value="">Select Year</option>
                    </select>
                </div>

                <div class="premium-input-group">
                    <label>
                        <i class="fas fa-sort-numeric-up"></i> No Of Months
                    </label>
                    <input type="text" class="form-control" id="no_of_month" name="no_of_month" readonly placeholder="0">
                </div>

                <div class="premium-input-group">
                    <label>
                        <i class="fas fa-calculator"></i> Total Amount
                    </label>
                    <input type="text" class="form-control" id="total_amount" name="total_amount" readonly placeholder="0.00">
                </div>

                <div class="premium-input-group">
                    <label>
                        <i class="fas fa-money-bill-wave"></i> Payment Amount
                    </label>
                    <input type="number" class="form-control" id="payment_amount" name="payment_amount" 
                           required min="1" step="0.01" readonly placeholder="0.00">
                </div>
            </div>

            <!-- Row 4: Payment History -->
            <div class="form-grid">
                <div class="premium-input-group">
                    <label>
                        <i class="fas fa-check-circle"></i> Successfully Paid
                    </label>
                    <input type="number" class="form-control" id="successfull_payment" name="successfull_payment" 
                           readonly placeholder="0.00">
                </div>

                <div class="premium-input-group">
                    <label>
                        <i class="fas fa-clock"></i> Remaining Amount
                    </label>
                    <input type="number" class="form-control" id="remaining_amount" name="remaining_amount" 
                           readonly placeholder="0.00">
                </div>

                <div class="premium-input-group">
                    <label>
                        <i class="fas fa-history"></i> Last Payment Month
                    </label>
                    <input type="date" class="form-control" id="last_payment_month" name="last_payment_month" readonly>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-4">
                <button type="button" onclick="saveFile(this)" class="btn-premium-submit" id="createLoanButton" redirect="{{ route('comitted-list') }}">
                    <i class="fas fa-save me-2"></i>
                    Submit Commitment
                    <i class="fas fa-arrow-right ms-2"></i>
                </button>
                <div id="message"></div>
            </div>
        </form>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"
    integrity="sha512-lEb9Vp/rkl9g2E/LdHIMFTqz21+LA79f84gqP75fbimHqVTu6483JG1AwJlWLLQ8ezTehty78fObKupq3HSHPQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    // ========== FIX: Months Dropdown Population (একবারই ডিফাইন) ==========
    function populateMonthDropdown() {
        const months = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"];
        const monthSelect = document.getElementById('from_month');
        if (!monthSelect) return;
        
        monthSelect.innerHTML = '';
        months.forEach(function(month) {
            let option = document.createElement('option');
            option.value = month;
            option.textContent = month;
            monthSelect.appendChild(option);
        });
        console.log('Months dropdown populated successfully');
    }

    function populateYearDropdown() {
        const yearSelect = document.getElementById('loan_year');
        if (!yearSelect) return;
        
        const currentYear = new Date().getFullYear();
        yearSelect.innerHTML = '<option value="">Select Year</option>';
        for (let y = currentYear - 2; y <= currentYear + 3; y++) {
            let option = document.createElement('option');
            option.value = y;
            option.textContent = y;
            yearSelect.appendChild(option);
        }
        console.log('Year dropdown populated successfully');
    }

    // Call both functions when page loads - একবারই কল
    $(document).ready(function () {
        populateMonthDropdown();
        populateYearDropdown();
    });

    // Typeahead / Autocomplete for member_name
    if (typeof openDoctorAutocomplete === 'function') {
        openDoctorAutocomplete('#member_name', 'member_id', '', '', memberInfo);
    }

    function memberInfo(item, obj) {
        $('#member_id').val(item.id);
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
                    populateWeekDropdown(response.remaining_weeks, response.committed_weeks); 
                } else {
                    $('#week-container').hide();
                }
            },
            error: function() {
                $('#week-container').hide();
            }
        });
    }

    function fetchLoansForUser(userId) {
        $('#loan_id').empty().append('<option value="">Loading...</option>');

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
                    $('#loan_id').append('<option>No loans found for this user</option>');
                }
            }
        });
    }

    // --- Sequential Week Dropdown Logic ---
    function populateWeekDropdown(totalWeeks = 4, committedWeeks = []) {
        const weekSelect = $('#from_week');
        weekSelect.empty();

        committedWeeks.sort((a, b) => a - b);

        let nextWeek = 1;
        for (let i = 1; i <= totalWeeks; i++) {
            if (!committedWeeks.includes(i)) {
                nextWeek = i;
                break;
            }
        }

        if (nextWeek <= totalWeeks) {
            weekSelect.append(`<option value="${nextWeek}">Week ${nextWeek}</option>`);
        }
    }

    // Update number of months and total amount
    $('#from_month').on('change', function() {
        const selectedMonths = $(this).val() || [];
        $('#no_of_month').val(selectedMonths.length);

        const perMonthAmount = parseFloat($('#payment_amount').val()) || 0;
        $('#total_amount').val((perMonthAmount * selectedMonths.length).toFixed(2));
    });

    // Validate weekly selection before submit
    $('#loan-commit-form').on('submit', function(e) {
        const repaymentType = $('#repayment_type').val();
        const selectedWeeks = $('#from_week').val() || [];

        if (repaymentType === 'weekly' && selectedWeeks.length > 4) {
            e.preventDefault();
            alert('You cannot select more than 4 weeks per month!');
        }
    });

    // Fetch the loan details when a loan_ide is selected
    $('#loan_id').on('change', function() {
        let loanIde = $(this).val();

        if (loanIde) {
            $.ajax({
                url: `/get-loan-details/${loanIde}`,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Loan details:', response);

                    let loanAmount = parseFloat(response.loan_amount);
                    let percentage = parseFloat(response.loan_category_percentage);
                    let loanTerm = parseInt(response.loan_term);

                    if (response && response.loan_amount && response.loan_term && response.loan_category_percentage) {
                        $('#loan_amount').val(loanAmount.toFixed(2));
                        $('#loan_term').val(loanTerm);

                        let interest = (loanAmount * percentage) / 100;
                        let amountWithInterest = loanAmount + interest;
                        let paymentAmount = amountWithInterest / loanTerm;
                        
                        $('#payment_amount').val(paymentAmount.toFixed(2));
                    } else {
                        alert('No loan details found for this loan_ide');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching loan details:", error);
                    alert("Error fetching loan details. Please try again.");
                }
            });

            // Fetch total paid for selected loan
            $.ajax({
                url: `/get-total-paid/${loanIde}`,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    let totalPaid = parseFloat(response.totalPaid) || 0;
                    let remainingAmount = parseFloat(response.remainingAmount) || 0;

                    $('#successfull_payment').val(totalPaid.toFixed(2));
                    $('#remaining_amount').val(remainingAmount.toFixed(2));
                    $('#last_payment_month').val(response.lastPaymentData || '');

                    if (remainingAmount === 0) {
                        $('#createLoanButton').prop('disabled', true);
                        $('#message').text('Your loan commitment is completed. Create a new commitment.')
                                      .removeClass('success').addClass('error').show();
                    } else {
                        $('#createLoanButton').prop('disabled', false);
                        $('#message').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching total payments:", error);
                    alert("Error fetching total payments. Please try again.");
                }
            });
        }
    });

    // ========== FIX: Save Function with Redirect ==========
    function saveFile(button) {
        // Basic validation
        const memberName = document.getElementById('member_name').value;
        const loanId = document.getElementById('loan_id').value;
        const selectedMonths = document.getElementById('from_month').selectedOptions.length;
        const loanYear = document.getElementById('loan_year').value;

        if (!memberName) {
            alert('Please select a user');
            return;
        }

        if (!loanId) {
            alert('Please select a loan');
            return;
        }

        if (selectedMonths === 0) {
            alert('Please select at least one month');
            return;
        }

        if (!loanYear) {
            alert('Please select a year');
            return;
        }

        // Show loading state
        button.classList.add('loading');
        button.innerHTML = '<i class="fas fa-spinner"></i> Processing...';

        // Get the redirect URL from button attribute
        const redirectUrl = button.getAttribute('redirect');
        
        // Submit the form with AJAX
        $.ajax({
            url: $('#loan-commit-form').attr('action'),
            type: 'POST',
            data: $('#loan-commit-form').serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Success response:', response);
                
                // Remove loading state
                button.classList.remove('loading');
                
                // Show success message
                $('#message').text(response.msg || 'Loan Commit(s) created successfully')
                            .removeClass('error').addClass('success').show();
                
                // Redirect after 1.5 seconds
                setTimeout(function() {
                    window.location.href = redirectUrl;
                }, 1500);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                
                // Remove loading state
                button.classList.remove('loading');
                button.innerHTML = '<i class="fas fa-save me-2"></i> Submit Commitment <i class="fas fa-arrow-right ms-2"></i>';
                
                // Show error message
                let errorMsg = 'An error occurred';
                if (xhr.responseJSON && xhr.responseJSON.msg) {
                    errorMsg = xhr.responseJSON.msg;
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                $('#message').text(errorMsg).removeClass('success').addClass('error').show();
            }
        });
    }
</script>