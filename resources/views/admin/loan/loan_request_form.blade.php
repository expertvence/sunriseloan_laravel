@php
    $data = DB::table('loancategories')->get();
@endphp

<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
/* ===== INHERIT CATEGORY FORM STYLES ===== */
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.1);
    --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1);
    --shadow-sm: 0 1px 2px 0 rgba(0,0,0,0.05);
}

/* Light Mode Variables */
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

/* Dark Mode Variables - using body.dark-mode class */
body.dark-mode {
    --bg-body: #0f172a;
    --card-bg: #1e293b;
    --input-bg: #0f172a;
    --text-primary: #f1f5f9;
    --text-secondary: #e2e8f0;
    --text-muted: #94a3b8;
    --border-color: #334155;
    --border-focus: #a5b4fc;
    --bg-secondary: #1e293b;
    --label-color: #f1f5f9;
    --placeholder-color: #64748b;
}

/* Premium Card */
.premium-form-card {
    background: var(--primary-gradient);
    padding: 4px;
    border-radius: 24px;
    box-shadow: var(--shadow-xl);
    margin-bottom: 2rem;
    transition: all 0.3s ease;
    margin-top: 1.2rem;
    width: 100%;
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

/* ===== RESPONSIVE GRID SYSTEM ===== */
.form-grid {
    display: grid;
    gap: 1.2rem;
    margin-bottom: 1.2rem;
}

/* Large devices (desktop) - 3 columns */
@media (min-width: 992px) {
    .form-grid {
        grid-template-columns: repeat(3, 1fr);
    }
    
    .form-grid .grid-span-2 {
        grid-column: span 2;
    }
    
    .form-grid .grid-span-3 {
        grid-column: span 3;
    }
}

/* Medium devices (tablet) - 2 columns */
@media (min-width: 576px) and (max-width: 991px) {
    .form-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .form-grid .grid-span-2 {
        grid-column: span 2;
    }
}

/* Small devices (mobile) - 1 column */
@media (max-width: 575px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
}

/* Premium Input Groups */
.premium-input-group {
    position: relative;
}

/* Simple Label Style */
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

/* Input fields */
.premium-input-group .form-control,
.premium-input-group .form-select,
.premium-input-group textarea {
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
    box-sizing: border-box;
}

.premium-input-group textarea {
    min-height: 90px;
    resize: vertical;
}

/* Focus state */
.premium-input-group .form-control:focus,
.premium-input-group .form-select:focus,
.premium-input-group textarea:focus {
    border-color: var(--border-focus);
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
    outline: none;
}

/* Placeholder styling */
.premium-input-group .form-control::placeholder,
.premium-input-group textarea::placeholder {
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

/* Radio Group */
.radio-wrapper {
    display: flex;
    gap: 20px;
    margin-top: 5px;
    padding: 4px 0;
}

.radio-option {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
}

.radio-option input[type="radio"] {
    width: 18px;
    height: 18px;
    cursor: pointer;
    accent-color: #667eea;
}

.radio-option span {
    color: var(--text-primary) !important;
    font-weight: 500;
    font-size: 0.95rem;
}

/* Duration Sections */
.duration-section {
    background: var(--bg-secondary);
    border-radius: 16px;
    padding: 1.2rem;
    margin: 0.5rem 0 1.5rem 0;
    border: 2px solid var(--border-color);
}

.duration-section label {
    font-weight: 600;
    color: var(--label-color) !important;
    margin-bottom: 8px;
    display: block;
    font-size: 0.95rem;
}

.duration-section label i {
    color: #667eea;
    margin-right: 8px;
}

/* File Upload - Simplified */

.file-input-simple input[type="file"] {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
    z-index: 2;
}

/* Prevent file input from overlapping other elements */
.file-input-simple {
    position: relative;
    overflow: hidden;
}

.file-input-simple .file-display {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 16px;
    background: var(--input-bg);
    border: 2px solid var(--border-color);
    border-radius: 14px;
    color: var(--text-primary);
    font-size: 0.95rem;
    cursor: pointer;
}

.file-input-simple .file-display i {
    color: #667eea;
    font-size: 1.2rem;
}

.file-input-simple .file-display .file-name {
    color: var(--text-muted);
    flex: 1;
}

/* Agreement Checkbox - Fixed */
.agreement-simple {
    margin: 1.5rem 0;
}

.agreement-simple .checkbox-item {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    position: relative;
    z-index: 1;
}

.agreement-simple .checkbox-item input[type="checkbox"] {
    width: 18px;
    height: 18px;
    cursor: pointer;
    accent-color: #667eea;
    position: relative;
    z-index: 2;
}

.agreement-simple .checkbox-item span {
    color: var(--text-primary);
    font-size: 0.95rem;
    cursor: pointer;
    user-select: none;
}

.agreement-simple .checkbox-item strong {
    color: #667eea;
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

/* Suggestions Dropdown */
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

/* Dark Mode Fixes */
body.dark-mode .premium-input-group .form-control,
body.dark-mode .premium-input-group .form-select,
body.dark-mode .premium-input-group textarea {
    background: var(--input-bg);
    border-color: var(--border-color);
    color: var(--text-primary);
}

body.dark-mode .premium-input-group .form-control::placeholder,
body.dark-mode .premium-input-group textarea::placeholder {
    color: var(--placeholder-color);
}

body.dark-mode .form-inner {
    background: var(--card-bg);
}

body.dark-mode .page-header-custom h1 {
    background: linear-gradient(135deg, #a5b4fc 0%, #c084fc 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

body.dark-mode .file-input-simple .file-display {
    background: var(--input-bg);
    border-color: var(--border-color);
}
</style>

<div class="premium-form-card">
    <div class="form-inner">
        <!-- Page Header -->
        <div class="page-header-custom">
            <i class="fas fa-hand-holding-usd"></i>
            <h1>Loan Request Form</h1>
        </div>

        <form action="{{ route('submit-request') }}" method="POST" id="loan-commit-form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="user_id" name="user_id">
            <input type="hidden" id="member_id" name="member_id">

            <!-- Grid Layout Start -->
            <div class="form-grid">
                <!-- User Name - Full Width -->
                <div class="premium-input-group grid-span-3">
                    <label>
                        <i class="fas fa-user"></i> User Name <span class="required">*</span>
                    </label>
                    <input type="text" class="form-control" id="member_name" name="member_name" 
                           placeholder="Enter user name" required>
                    <ul id="user-suggestions" style="display:none;"></ul>
                </div>

                <!-- Loan Amount -->
                <div class="premium-input-group">
                    <label>
                        <i class="fas fa-coins"></i> Loan Amount <span class="required">*</span>
                    </label>
                    <input type="number" name="loan_amount" class="form-control" 
                           placeholder="Enter loan amount" required>
                </div>

                <!-- Monthly Income -->
                <div class="premium-input-group">
                    <label>
                        <i class="fas fa-chart-line"></i> Monthly Income <span class="required">*</span>
                    </label>
                    <input type="number" name="monthly_income" class="form-control" 
                           placeholder="Enter monthly income" required>
                </div>

                <!-- Loan Category -->
                <div class="premium-input-group">
                    <label>
                        <i class="fas fa-tags"></i> Loan Category <span class="required">*</span>
                    </label>
                    <select class="form-select" name="loan_category_id" required>
                        <option value="">Select a category</option>
                        @foreach ($data as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->loan_category ?? '' }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Loan Purpose - Full Width -->
                <div class="premium-input-group grid-span-3">
                    <label>
                        <i class="fas fa-pencil-alt"></i> Loan Purpose <span class="required">*</span>
                    </label>
                    <textarea class="form-control" name="loan_purpose" placeholder="Describe the purpose of your loan" required></textarea>
                </div>

                <!-- Repayment Type - Full Width -->
                <div class="premium-input-group grid-span-3">
                    <label>
                        <i class="fas fa-calendar-alt"></i> Repayment Type <span class="required">*</span>
                    </label>
                    <div class="radio-wrapper">
                        <label class="radio-option">
                            <input type="radio" name="repayment_type" value="monthly" checked>
                            <span>Monthly</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="repayment_type" value="weekly">
                            <span>Weekly</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Monthly Duration -->
            <div id="monthlySection" class="duration-section">
                <label>
                    <i class="fas fa-calendar"></i> Select Month Duration
                </label>
                <select class="form-select" name="monthly_duration">
                    <option value="">-- Choose months --</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ $i }} {{ Str::plural('Month', $i) }}</option>
                    @endfor
                </select>
            </div>

            <!-- Weekly Duration -->
            <div id="weeklySection" class="duration-section" style="display: none;">
                <label>
                    <i class="fas fa-calendar-week"></i> Select Week Duration
                </label>
                <select class="form-select" name="weekly_duration">
                    <option value="">-- Choose weeks --</option>
                    @for ($i = 1; $i <= 48; $i++)
                        <option value="{{ $i }}">{{ $i }} {{ Str::plural('Week', $i) }}</option>
                    @endfor
                </select>
            </div>

            <!-- Other Documents -->
            <div class="premium-input-group">
                <label>
                    <i class="fas fa-paperclip"></i> Other Documents (Optional)
                </label>
                <div class="file-input-simple">
                    <div class="file-display" onclick="document.getElementById('other_docs').click()">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <span class="file-name" id="fileName">Choose file</span>
                    </div>
                    <input type="file" id="other_docs" name="other_documents" 
                           onchange="document.getElementById('fileName').textContent = this.files[0]?.name || 'Choose file'">
                </div>
            </div>

            <!-- Agreement - Fixed -->
            <div class="agreement-simple">
                <label class="checkbox-item" onclick="event.stopPropagation()">
                    <input type="checkbox" required onclick="event.stopPropagation()">
                    <span onclick="event.stopPropagation()">
                        I agree that the <strong>information provided</strong> is true and accurate
                    </span>
                </label>
            </div>

            <!-- Submit Button -->
            <button type="button" onclick="saveFile(this)" class="btn-premium-submit" redirect="{{ route('loan-request-list') }}">
                <i class="fas fa-save"></i>
                Submit Loan Request
                <i class="fas fa-arrow-right"></i>
            </button>
        </form>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"></script>

<script>
    // Typeahead Autocomplete
    if (typeof openDoctorAutocomplete === 'function') {
        openDoctorAutocomplete('#member_name', 'member_id', '', '', function(item) {
            $('#user_id').val(item.user_id);
        });
    }

    // Repayment Type Toggle
    $(document).ready(function() {
        $('input[name="repayment_type"]').on('change', function() {
            if ($(this).val() === 'monthly') {
                $('#monthlySection').show();
                $('#weeklySection').hide();
                $('select[name="weekly_duration"]').val('');
            } else {
                $('#weeklySection').show();
                $('#monthlySection').hide();
                $('select[name="monthly_duration"]').val('');
            }
        });
    });

    // Save Function
    function saveFile(button) {
        const required = [
            '#member_name',
            'input[name="loan_amount"]',
            'input[name="monthly_income"]',
            'select[name="loan_category_id"]',
            'textarea[name="loan_purpose"]'
        ];
        
        for (let field of required) {
            if (!$(field).val()) {
                alert('Please fill all required fields');
                $(field).focus();
                return;
            }
        }

        const repaymentType = $('input[name="repayment_type"]:checked').val();
        
        if (repaymentType === 'monthly' && !$('select[name="monthly_duration"]').val()) {
            alert('Please select month duration');
            $('select[name="monthly_duration"]').focus();
            return;
        }
        
        if (repaymentType === 'weekly' && !$('select[name="weekly_duration"]').val()) {
            alert('Please select week duration');
            $('select[name="weekly_duration"]').focus();
            return;
        }

        if (!$('input[type="checkbox"]').is(':checked')) {
            alert('Please agree to the terms');
            return;
        }

        // Show loading
        button.classList.add('loading');
        button.innerHTML = '<i class="fas fa-spinner"></i> Processing...';
        
        // Submit
        document.getElementById('loan-commit-form').submit();
    }
</script>