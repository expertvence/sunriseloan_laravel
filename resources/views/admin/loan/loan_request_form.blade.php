@php
    $data = DB::table('loancategories')->get();
    $authenticatedUser = Auth::user();
    $isMemberUser = $authenticatedUser && $authenticatedUser->user_type === 'user';
    $loanRequestsUrl = $isMemberUser ? route('my-loan-requests') : route('loan-request-list');
@endphp

<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .loan-request-card {
        --request-ink: #173a3b;
        --request-muted: #607c7b;
        --request-line: #d7e5e1;
        width: 100%;
        max-width: 1480px;
        margin: 1.5rem auto;
        overflow: hidden;
        border: 1px solid var(--request-line);
        border-radius: 14px;
        background: #fff;
        box-shadow: 0 16px 42px rgba(15, 55, 48, 0.1);
    }

    .loan-request-heading {
        padding: 1.5rem 1.75rem;
        border-bottom: 1px solid var(--request-line);
        background: linear-gradient(110deg, #eaf6f2, #f5faf8 62%, #edf5f4);
    }

    .loan-request-heading h2 {
        margin: 0;
        color: var(--request-ink);
        font-size: 1.35rem;
        font-weight: 700;
    }

    .loan-request-heading p {
        margin: 0.35rem 0 0;
        color: var(--request-muted);
        font-size: 0.84rem;
    }

    .loan-request-card .card-body { padding: 1.5rem 1.75rem; }

    .loan-request-card .loan-form-section-title {
        margin: 0 0 1rem;
        color: var(--request-ink);
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .loan-request-card .loan-form-field { margin-bottom: 1.15rem; }

    .loan-request-card .loan-form-field > label,
    .loan-request-card .loan-form-label {
        display: block;
        margin-bottom: 0.4rem;
        color: #385b59;
        font-size: 0.78rem;
        font-weight: 650;
    }

    .loan-request-card .form-control,
    .loan-request-card .form-select {
        min-height: 44px;
        border: 1px solid #cfddd9;
        border-radius: 7px;
        background-color: #fbfdfc;
        color: #173a3b;
        font-size: 0.86rem;
        box-shadow: none;
    }

    .loan-request-card textarea.form-control { min-height: 92px; }

    .loan-request-card .form-control:focus,
    .loan-request-card .form-select:focus {
        border-color: #168573;
        background-color: #fff;
        box-shadow: 0 0 0 3px rgba(22, 133, 115, 0.12);
    }

    .loan-request-card .repayment-options { display: flex; flex-wrap: wrap; gap: 0.5rem; }

    .loan-request-card .repayment-option {
        display: inline-flex;
        min-height: 42px;
        align-items: center;
        gap: 0.5rem;
        padding: 0.55rem 0.8rem;
        border: 1px solid #cfddd9;
        border-radius: 7px;
        background: #fbfdfc;
        color: #385b59;
        cursor: pointer;
        font-size: 0.82rem;
        transition: background 0.15s ease, border-color 0.15s ease;
    }

    .loan-request-card .repayment-option:has(input:checked) {
        border-color: #168573;
        background: #eaf6f2;
        color: #12675c;
    }

    .loan-request-card .form-check-input:checked { border-color: #168573; background-color: #168573; }

    .loan-request-card .loan-form-help {
        margin-top: 0.35rem;
        color: #708986;
        font-size: 0.72rem;
    }

    .loan-request-card .loan-submit-button {
        display: inline-flex;
        width: 100%;
        min-height: 48px;
        align-items: center;
        justify-content: center;
        gap: 0.55rem;
        border: 0;
        border-radius: 8px;
        background: linear-gradient(105deg, #087e72, #0a9a7c);
        color: #fff;
        font-size: 0.9rem;
        font-weight: 700;
        box-shadow: 0 7px 17px rgba(8, 126, 114, 0.2);
        transition: filter 0.15s ease, transform 0.15s ease, box-shadow 0.15s ease;
    }

    .loan-request-card .loan-submit-button:hover:not(:disabled) {
        transform: translateY(-1px);
        filter: brightness(1.05);
        box-shadow: 0 10px 20px rgba(8, 126, 114, 0.24);
    }

    .loan-request-card .loan-submit-button:disabled { cursor: wait; opacity: 0.72; }

    .member-request-nav {
        display: flex;
        width: 100%;
        max-width: 1480px;
        justify-content: flex-end;
        gap: 0.5rem;
        margin: 1rem auto -0.75rem;
    }

    .member-request-nav a {
        display: inline-flex;
        min-height: 36px;
        align-items: center;
        gap: 0.45rem;
        padding: 0.45rem 0.7rem;
        border: 1px solid #cfddd9;
        border-radius: 7px;
        background: #fff;
        color: #315b56;
        font-size: 0.74rem;
        font-weight: 650;
        text-decoration: none;
    }

    .member-request-nav a:hover { border-color: #168573; color: #087e72; }

    body.dark-mode .loan-request-card {
        --request-ink: #e6f4f1;
        --request-muted: #a2bfba;
        --request-line: #315452;
        background: #102e32;
        box-shadow: 0 16px 42px rgba(0, 0, 0, 0.22);
    }

    body.dark-mode .loan-request-heading { background: linear-gradient(110deg, #143c3d, #123236 62%, #16383a); }
    body.dark-mode .loan-request-card .loan-form-field > label,
    body.dark-mode .loan-request-card .loan-form-label { color: #c0d8d3; }
    body.dark-mode .loan-request-card .form-control,
    body.dark-mode .loan-request-card .form-select,
    body.dark-mode .loan-request-card .repayment-option { border-color: #426260; background-color: #0e252a; color: #e6f4f1; }
    body.dark-mode .loan-request-card .form-control:focus,
    body.dark-mode .loan-request-card .form-select:focus { background-color: #102e32; }
    body.dark-mode .loan-request-card .repayment-option:has(input:checked) { border-color: #45bba0; background: #174540; color: #b9f1df; }
    body.dark-mode .loan-request-card .loan-form-help { color: #9bb8b3; }

    @media (max-width: 600px) {
        .loan-request-card { margin: 0.75rem auto; border-radius: 10px; }
        .loan-request-heading, .loan-request-card .card-body { padding: 1rem; }
    }
</style>

@if ($isMemberUser)
    <nav class="member-request-nav" aria-label="Member navigation">
        <a href="{{ route('userDashboard') }}"><i class="fas fa-arrow-left"></i> Dashboard</a>
        <a href="{{ route('my-loan-requests') }}"><i class="fas fa-list-check"></i> My Requests</a>
    </nav>
@endif

<div class="card loan-request-card">
    <div class="loan-request-heading">
        <h2>Loan Request</h2>
        <p>Enter your requested amount and repayment preferences. Your application will be reviewed by the loan team.</p>
    </div>
    <div class="card-body">
        <form action="{{ route('submit-request') }}" method="POST" id="loan-commit-form"
            data-member-user="{{ $isMemberUser ? '1' : '0' }}"
            data-requests-url="{{ $loanRequestsUrl }}"
            enctype="multipart/form-data">
            @csrf

            <!-- User & Loan Amount -->
            <h3 class="loan-form-section-title">Applicant and request</h3>
            <div class="row mb-3">
                <div class="col-md-4 loan-form-field">
                    <label for="member_name">Member name</label>
                    <input type="text" class="form-control" id="member_name" name="member_name"
                        value="{{ $isMemberUser ? $authenticatedUser->name : '' }}"
                        {{ $isMemberUser ? 'readonly' : '' }} required>
                    <input type="hidden" id="member_id" name="member_id"
                        value="{{ $isMemberUser ? $authenticatedUser->member_id : '' }}">
                    <input type="hidden" id="user_id" name="user_id"
                        value="{{ $authenticatedUser->id ?? '' }}">
                </div>

                <div class="col-md-4 loan-form-field">
                    <label for="loan_amount">Loan amount requested</label>
                    <input type="number" name="loan_amount" class="form-control"
                        id="loan_amount" placeholder="Enter loan amount" min="1" step="0.01" required>
                </div>

                <!-- Monthly Income -->
                <div class="col-md-4 loan-form-field">
                    <label for="monthly_income">Monthly income</label>
                    <input type="number" name="monthly_income" class="form-control"
                        id="monthly_income" placeholder="Enter monthly income" min="0" step="0.01" required>
                </div>
            </div>

            <!-- Loan Purpose -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label class="loan-form-label" for="loan_purpose">Loan purpose</label>
                    <textarea class="form-control" name="loan_purpose" rows="3"
                        id="loan_purpose" placeholder="Describe the purpose of the loan" maxlength="1000" required></textarea>
                </div>
            </div>

            <!-- Loan Category + Repayment + Income -->
            <div class="row mb-3">

                <!-- Loan Category -->
                <div class="col-md-4 loan-form-field">
                    <label for="loan_category_id">Loan category</label>
                    <select class="form-select" name="loan_category_id" id="loan_category_id" required>
                        <option value="" selected disabled>Select a category</option>
                        @foreach ($data as $cat)
                            <option value="{{ $cat->id }}">
                                {{ $cat->loan_category ?? '' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Repayment Type -->
                <div class="col-md-4 loan-form-field">
                    <label class="loan-form-label">Repayment type</label>

                    <div class="repayment-options">
                    <label class="repayment-option" for="monthlyOption">
                        <input class="form-check-input" type="radio" name="repayment_type"
                            id="monthlyOption" value="monthly" required>
                        <span>Monthly</span>
                    </label>

                    <label class="repayment-option" for="weeklyOption">
                        <input class="form-check-input" type="radio" name="repayment_type"
                            id="weeklyOption" value="weekly">
                        <span>Weekly</span>
                    </label>
                    </div>
                </div>

                

            </div>

            <!-- Monthly Duration -->
            <div class="row mb-3 d-none" id="monthlySection">
                <div class="col-md-6 loan-form-field">
                    <label for="monthly_duration">Monthly duration</label>
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
                <div class="col-md-6 loan-form-field">
                    <label for="weekly_duration">Weekly duration</label>
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
                <div class="col-md-6 loan-form-field">
                    <label for="other_documents">Supporting document (optional)</label>
                    <input type="file" id="other_documents" name="other_documents" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                    <div class="loan-form-help">PDF, JPG, or PNG. Maximum file size: 2 MB.</div>
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
                <button type="button" id="submit-loan-request" class="loan-submit-button">
                    <i class="fas fa-paper-plane"></i><span>Submit loan request</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Scripts -->
<script>
    const loanForm = document.getElementById('loan-commit-form');
    const isMemberUser = loanForm.dataset.memberUser === '1';
    const loanRequestsUrl = loanForm.dataset.requestsUrl;

    const initializeLoanMemberAutocomplete = function() {
        if (!isMemberUser && typeof window.openDoctorAutocomplete === 'function') {
            window.openDoctorAutocomplete('#member_name', 'member_id');
        }
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeLoanMemberAutocomplete, { once: true });
    } else {
        initializeLoanMemberAutocomplete();
    }

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

        const submitButton = document.getElementById('submit-loan-request');

        submitButton.addEventListener('click', function() {
            if (!loanForm.reportValidity()) {
                return;
            }

            if (!document.getElementById('member_id').value) {
                Swal.fire({
                    title: 'Select a member',
                    text: 'Choose a member from the name suggestions before submitting.',
                    icon: 'info',
                    confirmButtonColor: '#087e72'
                });
                document.getElementById('member_name').focus();
                return;
            }

            const formData = new FormData(loanForm);
            const amount = Number(formData.get('loan_amount') || 0);
            const amountLabel = new Intl.NumberFormat('en-BD', {
                style: 'currency',
                currency: 'BDT',
                maximumFractionDigits: 2
            }).format(amount);
            const repaymentType = formData.get('repayment_type');
            const duration = repaymentType === 'monthly'
                ? `${formData.get('monthly_duration')} months`
                : `${formData.get('weekly_duration')} weeks`;

            Swal.fire({
                title: 'Submit this loan request?',
                html: `<div style="text-align:left;line-height:1.8"><div><strong>Member:</strong> ${$('<div>').text($('#member_name').val()).html()}</div><div><strong>Requested amount:</strong> ${amountLabel}</div><div><strong>Repayment:</strong> ${repaymentType.charAt(0).toUpperCase() + repaymentType.slice(1)} over ${duration}</div></div>`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Submit request',
                cancelButtonText: 'Review details',
                confirmButtonColor: '#087e72',
                cancelButtonColor: '#64748b',
                reverseButtons: true,
                focusCancel: true
            }).then(function(result) {
                if (!result.isConfirmed) {
                    return;
                }

                submitButton.disabled = true;

                $.ajax({
                    url: loanForm.action,
                    type: loanForm.method,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json'
                    },
                    success: function(response) {
                        if (response.title !== 'Success') {
                            submitButton.disabled = false;
                            Swal.fire({
                                title: response.title || 'Request not submitted',
                                text: response.msg || 'Please review the form and try again.',
                                icon: 'error',
                                confirmButtonColor: '#087e72'
                            });
                            return;
                        }

                        Swal.fire({
                            title: 'Request submitted',
                            text: response.msg || 'Your loan request has been submitted for review.',
                            icon: 'success',
                            confirmButtonText: 'View my requests',
                            confirmButtonColor: '#087e72',
                            allowOutsideClick: false
                        }).then(function() {
                            window.location.href = loanRequestsUrl;
                        });
                    },
                    error: function(xhr) {
                        submitButton.disabled = false;
                        const message = xhr.responseJSON && xhr.responseJSON.message;
                        Swal.fire({
                            title: xhr.status === 422 ? 'Check the form' : 'Request failed',
                            text: message || 'The request could not be submitted. Please review the details and try again.',
                            icon: 'error',
                            confirmButtonColor: '#087e72'
                        });
                    }
                });
            });
        });

    });
</script>
<style>
    .loan-request-card { --request-ink:#183d39; --request-muted:#68817c; --request-line:#d5e4de; margin:1.25rem auto; border-radius:11px; box-shadow:0 10px 28px rgba(26,72,58,.07); }
    .loan-request-heading { background:linear-gradient(110deg,#e9f4ef,#f7faf8); }
    .loan-request-card .loan-form-section-title { color:#183d39; }
    .loan-request-card .form-control,.loan-request-card .form-select,.loan-request-card .repayment-option { border-color:#d5e4de; background:#f8fbfa; color:#183d39; }
    .loan-request-card .form-control:focus,.loan-request-card .form-select:focus { border-color:#168573; box-shadow:0 0 0 3px rgba(22,133,115,.12); }
    .loan-request-card .repayment-option:has(input:checked) { border-color:#168573; background:#eaf6f2; color:#12675c; }
    .loan-request-card .loan-submit-button { background:linear-gradient(105deg,#147c6b,#1c9a7b); }
    body.dark-mode .loan-request-card { --request-ink:#e6f0ef; --request-muted:#a2b6b8; --request-line:#314a52; background:#10243a; }
    body.dark-mode .loan-request-heading { background:linear-gradient(110deg,#0b1d34,#10243a 72%); }
    body.dark-mode .loan-request-card .loan-form-section-title { color:#e6f0ef; }
    body.dark-mode .loan-request-card .form-control,body.dark-mode .loan-request-card .form-select,body.dark-mode .loan-request-card .repayment-option { border-color:#344e59; background:#0b1d34; color:#e6f0ef; }
    body.dark-mode .loan-request-card .repayment-option:has(input:checked) { border-color:#45bba0; background:#174540; color:#b9f1df; }
</style>
