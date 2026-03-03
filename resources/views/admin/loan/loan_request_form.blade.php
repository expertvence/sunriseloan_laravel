@php
    $data = DB::table('loancategories')->get();
@endphp
<<<<<<< HEAD
=======

>>>>>>> 5e5667e0c6862e3a926cf645ff55d7af2e8340a8
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Styles -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<<<<<<< HEAD
<style>
/* 🎨 প্রিমিয়াম ডিজাইন সিস্টেম */
:root {
    /* Light Mode - Elegant & Clean */
    --primary-gradient: linear-gradient(135deg, #405DE6, #5B51D8, #833AB4);
    --primary-color: #405DE6;
    --secondary-color: #833AB4;
    --accent-color: #FD1D1D;
    
    --card-bg: #ffffff;
    --body-bg: #f5f7fa;
    --input-bg: #ffffff;
    --text-primary: #1a1f2e;
    --text-secondary: #4a5568;
    --text-muted: #718096;
    
    --border-color: #e2e8f0;
    --border-focus: #405DE6;
    
    --section-bg: #f8fafc;
    --shadow-sm: 0 2px 8px rgba(0,0,0,0.05);
    --shadow-md: 0 4px 16px rgba(0,0,0,0.08);
    --shadow-lg: 0 8px 24px rgba(0,0,0,0.1);
    --shadow-xl: 0 12px 32px rgba(0,0,0,0.12);
    
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* 🌙 Dark Mode - Rich & Deep */
body.dark-mode {
    --primary-gradient: linear-gradient(135deg, #818cf8, #a78bfa, #c084fc);
    --primary-color: #818cf8;
    --secondary-color: #a78bfa;
    --accent-color: #f87171;
    
    --card-bg: #1e293b;
    --body-bg: #0f172a;
    --input-bg: #0f172a;
    --text-primary: #ffffff;
    --text-secondary: #e2e8f0;
    --text-muted: #94a3b8;
    
    --border-color: #334155;
    --border-focus: #818cf8;
    
    --section-bg: #1a2635;
    --shadow-sm: 0 2px 8px rgba(0,0,0,0.4);
    --shadow-md: 0 4px 16px rgba(0,0,0,0.5);
    --shadow-lg: 0 8px 24px rgba(0,0,0,0.6);
    --shadow-xl: 0 12px 32px rgba(0,0,0,0.7);
}

/* Base Styles */
body {
    font-family: 'Inter', sans-serif;
    background: var(--body-bg);
    margin: 0;
    min-height: 100vh;
    padding: 20px;
    color: var(--text-primary);
    transition: var(--transition);
    width: 100%;
}

/* 📦 Premium Container */
.premium-container {
    margin: 0 auto;
}

/* 💎 Premium Card */
.premium-card {
    background: var(--card-bg);
    border-radius: 5px;
    padding: 40px;
    box-shadow: var(--shadow-xl);
    position: relative;
    overflow: hidden;
    border: 1px solid var(--border-color);
}

.premium-card::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200px;
    height: 200px;
    background: var(--primary-gradient);
    border-radius: 50%;
    opacity: 0;
    filter: blur(60px);
    animation: float 15s ease-in-out infinite;
}

.premium-card::after {
    content: '';
    position: absolute;
    bottom: -50%;
    left: -50%;
    width: 300px;
    height: 300px;
    background: linear-gradient(135deg, #833AB4, #FD1D1D);
    border-radius: 50%;
    opacity: 0;
    filter: blur(60px);
    animation: float 20s ease-in-out infinite reverse;
}

@keyframes float {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -30px) scale(1.1); }
    66% { transform: translate(-30px, 30px) scale(0.9); }
}

/* 👑 Header */
.premium-header {
    text-align: center;
    margin-bottom: 40px;
    position: relative;
    z-index: 1;
}

.header-icon {
    width: 80px;
    height: 80px;
    background: var(--primary-gradient);
    border-radius: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    box-shadow: 0 15px 30px -10px var(--primary-color);
    animation: bounce 3s ease-in-out infinite;
}

.header-icon i {
    font-size: 40px;
    color: white;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}

.premium-header h1 {
    font-size: 42px;
    font-weight: 800;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin: 0 0 10px 0;
    letter-spacing: -1px;
}

.premium-header p {
    color: var(--text-secondary);
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.premium-header p i {
    color: var(--accent-color);
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.7; transform: scale(1.1); }
}

/* 📝 Premium Form */
.premium-form {
    position: relative;
    z-index: 1;
}

/* 🎯 Premium Row */
.premium-row {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 20px;
    margin-bottom: 24px;
}

.col-6 { grid-column: span 6; }
.col-4 { grid-column: span 4; }
.col-12 { grid-column: span 12; }

/* ✨ Premium Form Group */
.premium-group {
    margin-bottom: 0;
}

.premium-group label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 10px;
    font-size: 14px;
    font-weight: 600;
    color: var(--text-primary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    background: rgba(64, 93, 230, 0.05);
    padding: 6px 16px;
    border-radius: 30px;
    border: 1px solid var(--border-color);
}

.premium-group label i {
    color: var(--primary-color);
    font-size: 14px;
}

/* 💫 Premium Inputs */
.premium-input,
.premium-select,
.premium-textarea {
    width: 100%;
    padding: 14px 18px;
    font-size: 15px;
    color: var(--text-primary);
    background: var(--input-bg);
    border: 2px solid var(--border-color);
    border-radius: 20px;
    transition: var(--transition);
    font-family: 'Inter', sans-serif;
    box-shadow: inset 0 2px 4px rgba(0,0,0,0.02);
}

.premium-textarea {
    resize: vertical;
    min-height: 100px;
}

.premium-input:hover,
.premium-select:hover,
.premium-textarea:hover {
    border-color: var(--primary-color);
    background: var(--card-bg);
}

.premium-input:focus,
.premium-select:focus,
.premium-textarea:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(64, 93, 230, 0.15);
    background: var(--card-bg);
    transform: translateY(-2px);
}

/* 📋 Suggestions Dropdown */
.suggestions-premium {
    position: absolute;
    z-index: 1000;
    width: 100%;
    max-height: 250px;
    overflow-y: auto;
    background: var(--card-bg);
    border: 2px solid var(--border-color);
    border-radius: 20px;
    margin-top: 8px;
    box-shadow: var(--shadow-lg);
    display: none;
}

.suggestion-item {
    padding: 14px 20px;
    cursor: pointer;
    color: var(--text-primary);
    border-bottom: 1px solid var(--border-color);
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 12px;
}

.suggestion-item:last-child {
    border-bottom: none;
}

.suggestion-item:hover {
    background: var(--primary-gradient);
    color: white;
    padding-left: 28px;
}

.suggestion-item i {
    color: var(--primary-color);
    font-size: 14px;
}

.suggestion-item:hover i {
    color: white;
}

/* ✅ Checkbox Styling */
.premium-checkbox {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 16px 20px;
    background: var(--section-bg);
    border: 2px solid var(--border-color);
    border-radius: 20px;
    transition: var(--transition);
}

.premium-checkbox:hover {
    border-color: var(--primary-color);
    background: var(--card-bg);
}

.premium-checkbox input[type="checkbox"] {
    width: 22px;
    height: 22px;
    cursor: pointer;
    accent-color: var(--primary-color);
}

.premium-checkbox label {
    font-size: 15px;
    color: var(--text-primary);
    cursor: pointer;
    flex: 1;
}

.premium-checkbox i {
    color: var(--primary-color);
    font-size: 18px;
    opacity: 0.7;
}

/* 🚀 Premium Button */
.btn-premium {
    background: var(--primary-gradient);
    color: white;
    border: none;
    border-radius: 50px;
    padding: 18px 32px;
    font-size: 18px;
    font-weight: 700;
    width: 100%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    transition: var(--transition);
    box-shadow: 0 15px 30px -8px var(--primary-color);
    margin-top: 32px;
    border: 2px solid rgba(255,255,255,0.2);
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
    overflow: hidden;
}

.btn-premium::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s ease;
}

.btn-premium:hover::before {
    left: 100%;
}

.btn-premium:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 20px 40px -10px var(--primary-color);
}

.btn-premium i {
    font-size: 20px;
    transition: transform 0.3s;
}

.btn-premium:hover i {
    transform: translateX(5px) rotate(360deg);
}

/* 📢 Message Box */
.message-box {
    background: rgba(253, 29, 29, 0.1);
    border-left: 6px solid #FD1D1D;
    border-radius: 20px;
    padding: 16px 24px;
    margin-top: 24px;
    display: none;
    color: var(--text-primary);
    font-weight: 500;
    animation: slideIn 0.3s ease;
}

.message-box i {
    color: #FD1D1D;
    font-size: 20px;
    margin-right: 12px;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* 🎨 Dark Mode Specific Overrides */
body.dark-mode .premium-input,
body.dark-mode .premium-select,
body.dark-mode .premium-textarea {
    background: #1e293b;
    border-color: #334155;
}

body.dark-mode .premium-input:focus,
body.dark-mode .premium-select:focus,
body.dark-mode .premium-textarea:focus {
    background: #263445;
    box-shadow: 0 0 0 4px rgba(129, 140, 248, 0.2);
}

body.dark-mode .premium-group label {
    background: rgba(129, 140, 248, 0.15);
    border-color: #334155;
}

body.dark-mode .premium-checkbox {
    background: #1e293b;
}

body.dark-mode .suggestions-premium {
    background: #1e293b;
    border-color: #334155;
}

body.dark-mode .suggestion-item {
    border-bottom-color: #334155;
}

/* 📱 Responsive Design */
@media (max-width: 992px) {
    .premium-row {
        gap: 16px;
    }
}

@media (max-width: 768px) {
    .premium-card {
        padding: 24px;
        border-radius: 32px;
    }
    
    .premium-row {
        grid-template-columns: 1fr;
    }
    
    .col-6, .col-4, .col-12 {
        grid-column: span 1;
    }
    
    .premium-header h1 {
        font-size: 32px;
    }
    
    .header-icon {
        width: 64px;
        height: 64px;
    }
    
    .header-icon i {
        font-size: 32px;
    }
}

@media (max-width: 480px) {
    .premium-card {
        padding: 16px;
        border-radius: 28px;
    }
    
    .premium-header h1 {
        font-size: 28px;
    }
    
    .btn-premium {
        padding: 16px 24px;
        font-size: 16px;
    }
    
    .premium-group label {
        font-size: 12px;
    }
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: var(--border-color);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: var(--primary-gradient);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    opacity: 0.8;
}

/* Loading Animation */
@keyframes shimmer {
    0% { background-position: -1000px 0; }
    100% { background-position: 1000px 0; }
}

.loading {
    animation: shimmer 2s infinite linear;
    background: linear-gradient(to right, transparent 0%, rgba(255,255,255,0.2) 50%, transparent 100%);
    background-size: 1000px 100%;
}
</style>

<!-- 📦 Main Container -->
<div class="premium-container">
    <!-- 💎 Premium Card -->
    <div class="premium-card">
        <!-- 👑 Header -->
        <div class="premium-header">
            <div class="header-icon">
                <i class="fas fa-file-signature"></i>
            </div>
            <h1>Loan Request</h1>
            <p>
                <i class="fas fa-sparkle"></i>
                Complete your loan application
                <i class="fas fa-sparkle"></i>
            </p>
        </div>

        <!-- 📝 Form -->
        <form action="{{ route('submit-request') }}" method="POST" id="loan-commit-form" enctype="multipart/form-data" class="premium-form">
            @csrf

            <!-- Row 1: User Name & Loan Amount -->
            <div class="premium-row">
                <div class="col-6">
                    <div class="premium-group">
                        <label>
                            <i class="fas fa-user"></i>
                            User Name
                        </label>
                        <input type="text" class="premium-input" id="member_name" name="member_name" 
                               placeholder="Search member by name..." required>
                        <input type="hidden" id="member_id" name="member_id">
                        <input type="hidden" id="user_id" name="user_id">
                        <div class="suggestions-premium" id="user-suggestions"></div>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="premium-group">
                        <label>
                            <i class="fas fa-coins"></i>
                            Loan Amount
                        </label>
                        <input type="number" name="loan_amount" class="premium-input" id="loanAmount"
                               placeholder="Enter amount (BDT)" required>
                    </div>
                </div>
            </div>

            <!-- Row 2: Loan Purpose -->
            <div class="premium-row">
                <div class="col-12">
                    <div class="premium-group">
                        <label>
                            <i class="fas fa-pen"></i>
                            Loan Purpose
                        </label>
                        <textarea class="premium-textarea" name="loan_purpose" id="loanPurpose" 
                                  placeholder="Describe the purpose of your loan..." required></textarea>
                    </div>
                </div>
            </div>

            <!-- Row 3: Loan Category, Term & Income -->
            <div class="premium-row">
                <div class="col-4">
                    <div class="premium-group">
                        <label>
                            <i class="fas fa-tag"></i>
                            Category
                        </label>
                        <select id="loanCategory" class="premium-select" name="loan_category_id" required>
                            @foreach ($data as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->loan_category ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-4">
                    <div class="premium-group">
                        <label>
                            <i class="fas fa-calendar"></i>
                            Term
                        </label>
                        <select class="premium-select" id="loanTerm" name="loan_term" required>
                            <option value="">Select term</option>
                            <option value="30">Monthly</option>
                            <option value="7">Weekly</option>
                        </select>
                    </div>
                </div>

                <div class="col-4">
                    <div class="premium-group">
                        <label>
                            <i class="fas fa-chart-line"></i>
                            Monthly Income
                        </label>
                        <input type="number" name="monthly_income" class="premium-input" id="monthlyIncome"
                               placeholder="Enter monthly income" required>
=======
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
>>>>>>> 5e5667e0c6862e3a926cf645ff55d7af2e8340a8
                    </div>
                </div>
            </div>

<<<<<<< HEAD
            <!-- Row 4: Documents -->
            <div class="premium-row">
                <div class="col-12">
                    <div class="premium-group">
                        <label>
                            <i class="fas fa-file"></i>
                            Other Documents (Optional)
                        </label>
                        <input type="file" name="other_documents" class="premium-input" id="otherDocuments">
                    </div>
                </div>
            </div>

            <!-- Row 5: Terms & Conditions -->
            <div class="premium-row">
                <div class="col-12">
                    <div class="premium-checkbox">
                        <input type="checkbox" class="form-check-input" id="infoAgreement" required>
                        <label for="infoAgreement">
                            I agree that the information provided is true and accurate
                        </label>
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>

            <!-- Message Box -->
            <div class="message-box" id="message">
                <i class="fas fa-exclamation-circle"></i>
                <span></span>
            </div>

            <!-- Submit Button -->
            <button type="button" onclick="saveFile(this)" class="btn-premium" 
                    redirect="{{ route('loan-request-list') }}">
                <i class="fas fa-paper-plane"></i>
                Submit Loan Request
                <i class="fas fa-arrow-right"></i>
            </button>
=======
            <!-- Submit -->
            <div class="mt-4 mb-0">
                <div class="d-grid"><button type="button" onclick="saveFile(this)"
                        class="btn btn-primary btn-block" redirect="{{ route('loan-request-list') }}">Create
                        Loan</button></div>
                {{-- {{route('member-list')}} --}}
            </div>
>>>>>>> 5e5667e0c6862e3a926cf645ff55d7af2e8340a8
        </form>
    </div>
</div>

<!-- Scripts -->
<<<<<<< HEAD
<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"
    integrity="sha512-lEb9Vp/rkl9g2E/LdHIMFTqz21+LA79f84gqP75fbimHqVTu6483JG1AwJlWLLQ8ezTehty78fObKupq3HSHPQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    // Your existing JavaScript functions remain exactly the same
    openDoctorAutocomplete('#member_name', 'member_id');
    
    $(document).ready(function() {
        $(".data-table").DataTable({
            "ordering": false,
            "bAutoWidth": false,
=======
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

>>>>>>> 5e5667e0c6862e3a926cf645ff55d7af2e8340a8
        });

    });
</script>
