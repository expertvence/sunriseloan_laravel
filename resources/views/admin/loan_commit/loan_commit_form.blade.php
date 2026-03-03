

<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Premium Styles -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css"
    integrity="sha512-jG7NmK8Pm8iKEjw8aIWc+GVFBM33O/Ow4U0Xw34D5yyST0fgmlcV6shsghOXexDsAqtE2TCM6WwNy35qX8E6ng=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
/* Premium Form Styling - Theme Aware */
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --primary-color: #667eea;
    --secondary-color: #764ba2;
    --card-bg: #ffffff;
    --input-bg: #ffffff;
    --text-primary: #0f172a;
    --text-secondary: #64748b;
    --border-color: #e2e8f0;
    --shadow-sm: 0 1px 2px 0 rgba(0,0,0,0.05);
    --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1);
    --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1);
    --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.1);
    --transition: all 0.3s ease;
}

/* Dark Mode Variables */
body.dark-mode {
    --card-bg: #1e293b;
    --input-bg: #0f172a;
    --text-primary: #f1f5f9;
    --text-secondary: #cbd5e1;
    --border-color: #334155;
    background-color: #0f172a !important;
}

<<<<<<< HEAD
/* Full Page Dark Mode */
body.dark-mode,
body.dark-mode #app,
body.dark-mode .mainContant,
body.dark-mode #layoutSidenav,
body.dark-mode #layoutSidenav_content,
body.dark-mode .content-wrapper {
    background-color: #0f172a !important;
}

/* Premium Card Container */
.premium-loan-card {
    background: var(--primary-gradient);
    padding: 3px;
    border-radius: 30px;
    box-shadow: var(--shadow-xl);
    margin: 2rem auto;
    max-width: 1200px;
}

.loan-form-inner {
    background: var(--card-bg);
    border-radius: 28px;
    padding: 2rem;
    transition: var(--transition);
}

/* Page Header */
.page-header-premium {
    text-align: center;
    margin-bottom: 2.5rem;
    position: relative;
    padding-bottom: 1.5rem;
}

.page-header-premium::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 3px;
    background: var(--primary-gradient);
    border-radius: 3px;
}

.page-header-premium h1 {
    font-size: 2.2rem;
    font-weight: 800;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin: 0;
    letter-spacing: -0.5px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
}

.page-header-premium h1 i {
    font-size: 2.5rem;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Form Sections */
.form-section {
    background: rgba(102, 126, 234, 0.03);
    border-radius: 20px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    border: 1px solid var(--border-color);
    transition: var(--transition);
}

.section-title {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 1.5rem;
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--text-primary);
}

.section-title i {
    color: var(--primary-color);
    font-size: 1.3rem;
    background: rgba(102, 126, 234, 0.1);
    padding: 8px;
    border-radius: 10px;
}

/* Premium Form Groups */
.premium-form-group {
    margin-bottom: 1.2rem;
    position: relative;
}

.premium-form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: var(--text-primary);
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.premium-form-group label i {
    color: var(--primary-color);
    margin-right: 5px;
}

/* Premium Inputs */
.premium-input {
    width: 100%;
    padding: 0.8rem 1rem;
    border: 2px solid var(--border-color);
    border-radius: 16px;
    background: var(--input-bg);
    color: var(--text-primary);
    font-size: 1rem;
    transition: var(--transition);
    box-shadow: var(--shadow-sm);
}

.premium-input:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    outline: none;
    transform: translateY(-2px);
}

.premium-input[readonly] {
    background: rgba(102, 126, 234, 0.05);
    border-color: rgba(102, 126, 234, 0.2);
    cursor: not-allowed;
    color: var(--text-secondary);
}

/* Premium Select */
.premium-select {
    width: 100%;
    padding: 0.8rem 1rem;
    border: 2px solid var(--border-color);
    border-radius: 16px;
    background: var(--input-bg);
    color: var(--text-primary);
    font-size: 1rem;
    transition: var(--transition);
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    padding-right: 2.5rem;
}

.premium-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    outline: none;
}

.premium-select option {
    background: var(--card-bg);
    color: var(--text-primary);
    padding: 10px;
}

/* Suggestions Dropdown */
.suggestions-list {
    position: absolute;
    z-index: 1000;
    width: 100%;
    max-height: 250px;
    overflow-y: auto;
    background: var(--card-bg);
    border: 2px solid var(--border-color);
    border-radius: 16px;
    margin-top: 5px;
    box-shadow: var(--shadow-lg);
    display: none;
}

.suggestions-list .list-group-item {
    padding: 12px 16px;
    cursor: pointer;
    color: var(--text-primary);
    background: var(--card-bg);
    border: none;
    border-bottom: 1px solid var(--border-color);
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 10px;
}

.suggestions-list .list-group-item:last-child {
    border-bottom: none;
}

.suggestions-list .list-group-item:hover {
    background: rgba(102, 126, 234, 0.1);
    padding-left: 20px;
}

.suggestions-list .list-group-item i {
    color: var(--primary-color);
    font-size: 0.9rem;
}

/* Multiple Select Styling */
select[multiple] {
    height: auto;
    min-height: 150px;
    padding: 0.5rem;
}

select[multiple] option {
    padding: 10px 12px;
    border-radius: 8px;
    margin: 2px 0;
    background: var(--input-bg);
    color: var(--text-primary);
}

select[multiple] option:checked {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

/* Premium Button */
.btn-premium {
    background: var(--primary-gradient);
    border: none;
    border-radius: 40px;
    padding: 1rem 2rem;
    font-weight: 700;
    font-size: 1.1rem;
    color: white;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
    width: 100%;
    box-shadow: var(--shadow-lg);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    border: 2px solid rgba(255, 255, 255, 0.2);
    margin-top: 2rem;
}

.btn-premium::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s ease;
    z-index: 1;
}

.btn-premium:hover::before {
    left: 100%;
}

.btn-premium:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-xl);
}

.btn-premium i {
    font-size: 1.2rem;
    transition: transform 0.3s ease;
    z-index: 2;
}

.btn-premium:hover i {
    transform: translateX(5px);
}

/* Message Box */
.message-box {
    background: rgba(239, 68, 68, 0.1);
    border-left: 4px solid #ef4444;
    border-radius: 12px;
    padding: 1rem;
    margin-top: 1rem;
    display: none;
}

.message-box i {
    color: #ef4444;
    margin-right: 10px;
}

.message-box span {
    color: var(--text-primary);
    font-weight: 500;
}

/* Stats Cards */
.stats-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    margin: 1.5rem 0;
}

.stat-card {
    background: rgba(102, 126, 234, 0.05);
    border: 1px solid var(--border-color);
    border-radius: 20px;
    padding: 1.2rem;
    text-align: center;
    transition: var(--transition);
}

.stat-card:hover {
    transform: translateY(-5px);
    border-color: var(--primary-color);
    box-shadow: var(--shadow-lg);
}

.stat-icon {
    width: 48px;
    height: 48px;
    background: var(--primary-gradient);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: white;
    font-size: 1.3rem;
}

.stat-label {
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: var(--text-secondary);
    margin-bottom: 0.3rem;
}

.stat-value {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-primary);
}

/* Dark Mode Specific */
body.dark-mode .premium-input,
body.dark-mode .premium-select {
    background: var(--input-bg);
    border-color: var(--border-color);
    color: var(--text-primary);
}

body.dark-mode .form-section {
    background: rgba(129, 140, 248, 0.03);
}

body.dark-mode .stat-card {
    background: rgba(129, 140, 248, 0.05);
}

body.dark-mode select[multiple] option {
    background: var(--input-bg);
    color: var(--text-primary);
}

body.dark-mode select[multiple] option:checked {
    background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
}

/* Responsive Design */
@media (max-width: 992px) {
    .stats-row {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .loan-form-inner {
        padding: 1.5rem;
    }
    
    .page-header-premium h1 {
        font-size: 1.8rem;
    }
    
    .page-header-premium h1 i {
        font-size: 2rem;
    }
    
    .form-section {
        padding: 1rem;
    }
    
    .stats-row {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 576px) {
    .loan-form-inner {
        padding: 1rem;
    }
    
    .page-header-premium h1 {
        font-size: 1.5rem;
        flex-direction: column;
        gap: 5px;
    }
    
    .page-header-premium h1 i {
        font-size: 1.8rem;
    }
    
    .btn-premium {
        padding: 0.875rem 1.5rem;
        font-size: 1rem;
    }
}

/* Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.premium-loan-card {
    animation: fadeInUp 0.6s ease-out;
}
</style>

<div class="premium-loan-card">
    <div class="loan-form-inner">
        <!-- Page Header -->
        <div class="page-header-premium">
            <h1>
                <i class="fas fa-hand-holding-usd"></i>
                Loan Commit Form
            </h1>
        </div>

        <form action="{{ route('loan-commit-submit') }}" method="POST" id="loan-commit-form">
            @csrf

            <!-- User Information Section -->
            <div class="form-section">
                <div class="section-title">
                    <i class="fas fa-user-circle"></i>
                    <span>User Information</span>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="premium-form-group">
                            <label><i class="fas fa-user"></i> Member Name</label>
                            <input type="text" class="premium-input" id="member_name" name="member_name" placeholder="Type member name..." required>
                            <input type="hidden" id="member_id" name="member_id">
                            <div class="suggestions-list" id="user-suggestions"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Loan Selection Section -->
            <div class="form-section">
                <div class="section-title">
                    <i class="fas fa-file-invoice"></i>
                    <span>Loan Details</span>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="premium-form-group">
                            <label><i class="fas fa-barcode"></i> Loan Code</label>
                            <select class="premium-select" name="loan_payment_id" id="loan_id">
                                <option value="">Select Loan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Payment Stats -->
                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-label">Successfully Paid</div>
                        <div class="stat-value" id="successfull_payment">0.00</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-label">Last Payment</div>
                        <div class="stat-value" id="last_payment_month">-</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-coins"></i>
                        </div>
                        <div class="stat-label">Remaining</div>
                        <div class="stat-value" id="remaining_amount">0.00</div>
                    </div>
                </div>
            </div>

            <!-- Payment Schedule Section -->
            <div class="form-section">
                <div class="section-title">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Payment Schedule</span>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="premium-form-group">
                            <label><i class="fas fa-calendar"></i> Select Months</label>
                            <select name="from_month[]" id="from_month" class="premium-select" onclick="monthSelect(this)" multiple required></select>
                            <small style="color: var(--text-secondary); display: block; margin-top: 5px;">Hold Ctrl/Cmd to select multiple months</small>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="premium-form-group">
                            <label><i class="fas fa-calendar-alt"></i> Year</label>
                            <select class="premium-select" id="loan_year" name="loan_year" required>
                                <option value="">Select Year</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Calculation Section -->
            <div class="form-section">
                <div class="section-title">
                    <i class="fas fa-calculator"></i>
                    <span>Payment Calculation</span>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="premium-form-group">
                            <label><i class="fas fa-sort-numeric-up"></i> No. of Months</label>
                            <input type="text" class="premium-input" name="no_of_month" id="no_of_month" readonly>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="premium-form-group">
                            <label><i class="fas fa-money-bill-wave"></i> Payable Amount</label>
                            <input type="text" class="premium-input" name="payable_amt" id="payable_amt" readonly>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="premium-form-group">
                            <label><i class="fas fa-piggy-bank"></i> Deposit</label>
                            <input type="text" class="premium-input" name="deposit" id="deposit" readonly>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="premium-form-group">
                            <label><i class="fas fa-hand-holding-usd"></i> Payment Amount with Deposit</label>
                            <input type="number" class="premium-input" id="payment_amount" name="payment_amount" required min="1" step="0.01" readonly>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="premium-form-group">
                            <label><i class="fas fa-calendar-check"></i> Last Payment Month</label>
                            <input type="date" class="premium-input" id="last_payment_month_input" name="last_payment_month" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Message Box -->
            <div class="message-box" id="message">
                <i class="fas fa-exclamation-triangle"></i>
                <span></span>
            </div>

            <!-- Submit Button -->
            <button type="button" onclick="saveFile(this)" class="btn-premium" redirect="{{ route('loan-request-list') }}">
                <i class="fas fa-save"></i>
                Create Loan Commitment
                <i class="fas fa-arrow-right"></i>
            </button>
        </form>
    </div>
=======
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
            <div class="col-md-4">
                <div class="form-group">
                    <label for="loan_year">Year</label>
                    <select class="form-control" id="loan_year" name="loan_year" required>
                        <option value="">Select Year</option>
                    </select>
                </div>
            </div>

            <!-- No of Months -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="no_of_month"><strong>No Of Month</strong></label>
                    <input type="text" class="form-control" id="no_of_month" name="no_of_month" readonly>
                </div>
            </div>
            <!-- No of Months -->
            <div class="col-md-4">
                <div class="form-group">
                    <label for="no_of_month"><strong>Total Amount</strong></label>
                    <input type="text" class="form-control" id="total_amount" name="total_amount" readonly>
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
                    <input type="date" class="form-control" id="last_payment_month" name="last_payment_month"
                        readonly>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="remaining_amount">Remaining Amount</label>
                    <input type="number" class="form-control" id="remaining_amount" name="remaining_amount" readonly>
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
>>>>>>> 5e5667e0c6862e3a926cf645ff55d7af2e8340a8
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"
    integrity="sha512-lEb9Vp/rkl9g2E/LdHIMFTqz21+LA79f84gqP75fbimHqVTu6483JG1AwJlWLLQ8ezTehty78fObKupq3HSHPQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    // Typeahead / Autocomplete for member_name
    openDoctorAutocomplete('#member_name', 'member_id', '', '', memberInfo);

    function memberInfo(item, obj) {
        $('#no_of_share').val(item.share_no);
        $('#share_amt').val(item.share_amt);
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

    // Sort committed weeks
    committedWeeks.sort((a, b) => a - b);

    // Determine next available week
    let nextWeek = 1;
    for (let i = 1; i <= totalWeeks; i++) {
        if (!committedWeeks.includes(i)) {
            nextWeek = i;
            break;
        }
    }

    // Only allow selection of the next week
    if (nextWeek <= totalWeeks) {
        weekSelect.append(`<option value="${nextWeek}">Week ${nextWeek}</option>`);
    }
}



    // Populate months
    function populateMonthDropdown() {
        const months = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"];
        const monthSelect = document.getElementById('from_month');
        monthSelect.innerHTML = '';
        months.forEach(m => monthSelect.append(new Option(m, m)));
    }

    function populateYearDropdown() {
        const yearSelect = document.getElementById('loan_year');
        const currentYear = new Date().getFullYear();
        for (let y = currentYear - 5; y <= currentYear; y++) {
            yearSelect.append(new Option(y, y));
        }
    }

    window.onload = function() {
        populateMonthDropdown();
        populateYearDropdown();
    };

    // Update number of months and payable amount
    $('#from_month').on('change', function() {
        const selectedMonths = $(this).val() || [];
        $('#no_of_month').val(selectedMonths.length);

        const perMonthAmount = parseFloat($('#payment_amount').val()) || 0;
        
        $('#total_amount').val((perMonthAmount * selectedMonths.length).toFixed(2));
        const totalAmount = parseFloat($('#total_amount').val()) || 0;
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
        let loanIde = $(this).val(); // Get the selected loan_ide

        // If a loan_ide is selected
        if (loanIde) {
            // Fetch loan details for the selected loan_ide
            $.ajax({
                url: `/get-loan-details/${loanIde}`, // The route to get loan details
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Ensure CSRF token is included
                },
                success: function(response) {
                    console.log('Loan details:',
                    response); // Debug: Check the loan details returned

                    let loanAmount = parseFloat(response.loan_amount); // Loan amount as a float
                    let percentage = parseFloat(response
                    .loan_category_percentage); // Loan category as a percentage (float)
                    let loanTerm = parseInt(response.loan_term); // Loan term as an integer
                    // let deposit = parseFloat(response.deposit);
                    // console.log("Deposit:", deposit);
                    // Check if response has loan details
                    if (response && response.loan_amount && response.loan_term && response
                        .loan_category_percentage) {
                        // Populate the form fields with the loan details
                        $('#loan_amount').val(response.loan_amount); // Populate loan amount
                        $('#loan_term').val(response.loan_term); // Populate loan term

                        // $('#deposit').val(response.deposit);
                        // Calculate the payment amount (loan_amount / loan_term)
                        // Calculate the interest as a percentage of the loan amount
                        let interest = (loanAmount * percentage) / 100; // Interest = loan_amount * (loan_category_id / 100)

                        // Calculate the amount with interest
                        let amountWithInterest = loanAmount + interest;
                        
                            // consol.log(amountWithInterest);
                        // Calculate the payment amount (amount with interest divided by loan term)
                        let paymentAmount = amountWithInterest / loanTerm ;
                        
                        let withDeposit = paymentAmount;
                        // Set the calculated payment amount in the input field, formatted to two decimal places
                        $('#payment_amount').val(withDeposit.toFixed(
                        2)); // Set payment amount with two decimal places

                    } else {
                        // If no loan details found for the selected loan_ide
                        alert('No loan details found for this loan_ide');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching loan details:", error);
                    alert("Error fetching loan details. Please try again.");
                }
            });
        }
    });

</script>
<script>
    openDoctorAutocomplete('#member_name', 'member_id', '', '', memberInfo);

    function memberInfo(item, obj) {
        $('#no_of_share').val(item.share_no);
        $('#share_amt').val(item.share_amt);
        // var conceptName = $('#from_month').find(":selected").val();

        fetchLoansForUser(item.user_id);
    }

    // This function fetches the loans for the selected user and populates the loan dropdown
    function fetchLoansForUser(userId) {
        $('#loan_id').empty();
        $('#loan_id').append('<option value="">Loading...</option>');

        $.ajax({
            url: `/get-loans-for-user/${userId}`,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#loan_id').empty();

                if (response.length > 0) {
                    $('#loan_id').append('<option value="">Select Loan</option>');
                    response.forEach(function(loan) {
                        // Use loan_ide as value, l_uId as displayed text
                        $('#loan_id').append(`
                        <option value="${loan.loan_ide}">${loan.l_uId}</option>
                    `);
                    });
                } else {
                    $('#loan_id').append('<option>No loans found for this user</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching loans:", error);
                alert("Error fetching loans. Please try again.");
            }
        });
    }



   



    populateMonthDropdown();
    // Function to dynamically populate the months dropdown
    // Function to populate the months dropdown
    function populateMonthDropdown() {
        const months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        let monthSelect = document.getElementById('from_month'); // Get the select element

        // Clear any existing options in the dropdown
        monthSelect.innerHTML = '';

        // Loop through the months array and add each month as an option
        months.forEach(function(month) {
            let option = document.createElement('option');
            option.value = month; // The value of the option (you can use the month name or number)
            option.textContent = month; // The text displayed in the dropdown
            monthSelect.appendChild(option); // Add the option to the select element
        });
    }

    // Function to handle selected months and update the payable amount
    function monthSelect() {
        const fromMonthSelect = document.getElementById('from_month');

        // Get the number of selected months
        const selectedMonths = fromMonthSelect.selectedOptions.length;

        // Update the "No of Months" field
        document.getElementById('no_of_month').value = selectedMonths;

        // Log the selected months count for debugging
        console.log("Selected months: ", selectedMonths);

        // Update the payable amount based on selected months
        updatePayableAmount(selectedMonths);
    }

    // Function to update the payable amount based on the selected months
    function updatePayableAmount(selectedMonths) {
        // Get the per month amount (assuming it's in an input field with id 'payment_amount')
        const perMonthAmount = parseFloat(document.getElementById('payment_amount').value) || 0;

        const deposit    = parseFloat(document.getElementById('deposit').value) || 0;

        // Log the per month amount for debugging
        console.log("Per Month Amount: ", perMonthAmount);

        // If perMonthAmount or selectedMonths is invalid, set payable amount to 0
        if (isNaN(perMonthAmount) || selectedMonths === 0) {
            console.log("Invalid input detected. Setting payable amount to 0.00");
            document.getElementById('payable_amt').value = "0.00"; // Default to 0 if any value is invalid
        } else {
            // Calculate the payable amount
            const payableAmount = selectedMonths * perMonthAmount;

            // Log the calculated payable amount for debugging
            console.log("Calculated payable amount: ", payableAmount);

            // Update the input field with the calculated amount
            document.getElementById('payable_amt').value = payableAmount.toFixed(2);
        }
    }

    // Populate months dropdown when the page loads
    populateMonthDropdown();
    populateYearDropdown();
    // Function to populate the year dropdown dynamically
    function populateYearDropdown() {
        const yearSelect = document.getElementById('loan_year');
        const currentYear = new Date().getFullYear(); // Get the current year
        const startYear = currentYear - 5; // Start from 5 years ago

        // Populate the year options dynamically
        for (let year = startYear; year <= currentYear; year++) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearSelect.appendChild(option);
        }
    }

    // Call the functions to populate the dropdowns when the page loads
    window.onload = function() {
        populateMonthDropdown(); // Populate months dropdown
        populateYearDropdown(); // Populate years dropdown
    };
    //end


    // $(document).ready(function() {
    //     $('#loan-commit-form').on('submit', async function(event) {
    //         event.preventDefault(); // Prevent default form submission

    //         // Get form data
    //         let selectedMonths = $('#from_month').val(); // Get selected months as an array
    //         let loanIde = $('#loan_id').val(); // Get the loan ID
    //         let paymentAmount = $('#payment_amount').val(); // Get the payment amount
    //         let loanYear = $('#loan_year').val(); // Get the loan year

    //         let duplicateMonths = []; // Array to collect duplicate months
    //         let successfulRequests = 0;

    //         // Loop through selected months and check for duplicates
    //         for (let month of selectedMonths) {
    //             let formData = {
    //                 loan_payment_id: loanIde,
    //                 payment_amount: paymentAmount,
    //                 loan_year: loanYear,
    //                 from_month: [month], // Send each month as an array with one element
    //             };

    //             try {
    //                 // Send AJAX request to check for duplicates
    //                 await $.ajax({
    //                     url: '/loan-commit-submit', // Backend URL to check duplicate
    //                     method: 'POST',
    //                     data: formData,
    //                     headers: {
    //                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
    //                             'content') // CSRF token for security
    //                     },
    //                     success: function(response) {
    //                         // If no duplicate found, proceed with the submission
    //                         successfulRequests++;

    //                     },
    //                     error: function(xhr, status, error) {
    //                         // If duplicate found, add the month to the duplicateMonths array
    //                         if (xhr.status === 400) {
    //                             let duplicateMonth = xhr.responseJSON
    //                             .duplicate_month; // Get duplicate month from response
    //                             duplicateMonths.push(
    //                             duplicateMonth); // Add duplicate month to the array
    //                         } else {
    //                             console.error('Error submitting for month:', month,
    //                                 error);
    //                         }
    //                     }
    //                 });
    //             } catch (error) {
    //                 console.error('Error during AJAX request:', error);
    //             }
    //         }

    //         // After all AJAX requests, check if there are any duplicates
    //         if (duplicateMonths.length > 0) {
    //             // Show all duplicate months in one alert
    //             alert('Duplicate entry for the following months: ' + duplicateMonths.join(', ') +
    //                 ' in year ' + loanYear);
    //             return; // Stop further processing if duplicates are found
    //         }

    //         // If all requests are successful, submit the form
    //         if (successfulRequests === selectedMonths.length) {
    //             // Show success message if all months were processed successfully
    //             alert('Loan Commit(s) created successfully!');

    //             // Optionally, reset the form
    //             $('#loan-commit-form')[0].reset(); // Reset all form fields

    //             // Enable the submit button (if it was disabled)
    //             $('#loan-commit-form button').prop('disabled', false);
    //         }
    //     });
    // });



    $('#loan_id').on('change', function() {
        let loanIde = $(this).val(); // Get the selected loan ID
        console.log("Selected Loan ID:", loanIde); // Debugging statement to check the loan ID

        // If a loan is selected
        if (loanIde) {
            console.log("Making AJAX request to fetch total paid for loan ID:", loanIde);
            $('#createLoanButton').prop('disabled',
            false); // Enable the button every time a new loan ID is selected
            $('#createLoanButton').css('background-color', ''); // Reset button color to default
            $('#createLoanButton').css('border-color', ''); // Reset border color

            // Hide the message in case it's shown from a previous selection
            $('#message').hide();

            // AJAX request to fetch the total paid for the selected loan
            $.ajax({
                url: `/get-total-paid/${loanIde}`, // Ensure this URL is correct
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // CSRF token for security
                },
                success: function(response) {
                    let totalPaid = parseFloat(response.totalPaid) || 0;
                    let remainingAmount = parseFloat(response.remainingAmount) || 0;

                    $('#successfull_payment').val(totalPaid.toFixed(2));
                    $('#remaining_amount').val(remainingAmount.toFixed(2));

                    $('#last_payment_month').val(response.lastPaymentData || '');

                    if (remainingAmount === 0) {
                        $('#createLoanButton').prop('disabled', true).css({
                            'background-color': 'red',
                            'border-color': 'red'
                        });
                        $('#message').text(
                            'Your loan commitment is completed. Create a new commitment.')
                        .show();
                    } else {
                        $('#createLoanButton').prop('disabled', false);
                        $('#message').hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching total payments:", xhr
                    .responseText); // Log server error
                    alert("Error fetching total payments. Please try again.");
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching total payments:", error); // Log the error
                    alert("Error fetching total payments. Please try again.");
                }
            });
        } else {
            console.log("No loan ID selected.");
        }
    });
</script>


