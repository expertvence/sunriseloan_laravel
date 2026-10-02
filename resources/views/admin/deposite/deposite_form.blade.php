@php
    $id = isset($deposit_data) && !empty($deposit_data) ? $deposit_data->id : '';
    $member_name = isset($deposit_data) && !empty($deposit_data) ? $deposit_data->member_name : '';
    $member_id = isset($deposit_data) && !empty($deposit_data) ? $deposit_data->member_id : '';
    $transaction_date = isset($deposit_data) && !empty($deposit_data) && $deposit_data->deposit_date
        ? date('Y-m-d', strtotime($deposit_data->deposit_date))
        : date('Y-m-d');
    $amount = isset($deposit_data) && !empty($deposit_data) ? $deposit_data->deposite_amount : '';
    $description = isset($deposit_data) && !empty($deposit_data) ? $deposit_data->description : '';
    $type = isset($deposit_data) && !empty($deposit_data) ? $deposit_data->deposit_type : '';
@endphp

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .deposit-entry-page {
        --deposit-ink: #e6f0ef;
        --deposit-muted: #a2b6b8;
        --deposit-line: #314a52;
        --deposit-surface: #10243a;
        --deposit-soft: #0b1d34;
        width: min(1480px, calc(100% - 40px));
        margin: 1.25rem auto;
        overflow: hidden;
        border: 1px solid var(--deposit-line);
        border-radius: 11px;
        background: #07152b;
        color: var(--deposit-ink);
        box-shadow: 0 14px 34px rgba(0, 5, 18, 0.22);
    }

    .deposit-entry-header { display: flex; align-items: center; gap: 0.8rem; padding: 1.2rem 1.4rem; border-bottom: 1px solid var(--deposit-line); background: linear-gradient(110deg, #0b1d34, #10243a 72%); }
    .deposit-entry-icon { display: grid; width: 40px; height: 40px; flex: 0 0 40px; place-items: center; border-radius: 9px; background: #17443f; color: #78d8b9; }
    .deposit-entry-header h2 { margin: 0; color: var(--deposit-ink); font-size: 1.12rem; font-weight: 720; }
    .deposit-entry-header p { margin: 0.24rem 0 0; color: var(--deposit-muted); font-size: 0.76rem; }
    .deposit-entry-body { padding: 1.4rem; }
    .deposit-entry-grid { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 1rem; align-items: start; }
    .deposit-entry-field { min-width: 0; }
    .deposit-entry-field.description-field { grid-column: 1 / -1; }
    .deposit-entry-field label { display: block; margin-bottom: 0.4rem; color: #c1d2d4; font-size: 0.72rem; font-weight: 700; }
    .deposit-entry-field label .required { color: #f19b8e; }
    .deposit-entry-field .form-control,
    .deposit-entry-field .form-select { min-height: 43px; border: 1px solid #344e59; border-radius: 7px; background: #0b1d34; color: #e6f0ef; font-size: 0.82rem; box-shadow: none; }
    .deposit-entry-field .form-control:focus,
    .deposit-entry-field .form-select:focus { border-color: #29a78b; box-shadow: 0 0 0 3px rgba(41, 167, 139, 0.15); }
    .deposit-entry-field textarea.form-control { min-height: 132px; height: 150px; resize: vertical; line-height: 1.5; }
    .deposit-entry-field .input-group-text { border-color: #344e59; border-radius: 7px 0 0 7px; background: #142b40; color: #a8bbbe; }
    .deposit-entry-field .input-group .form-control { border-radius: 0 7px 7px 0; }
    .deposit-entry-help { margin-top: 0.35rem; color: var(--deposit-muted); font-size: 0.67rem; }
    .deposit-entry-footer { display: flex; justify-content: flex-end; padding-top: 1.15rem; margin-top: 1.1rem; border-top: 1px solid var(--deposit-line); }
    .deposit-save-button { display: inline-flex; min-width: 165px; min-height: 43px; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.6rem 1rem; border: 0; border-radius: 7px; background: linear-gradient(105deg, #147c6b, #1c9a7b); color: #fff; font-size: 0.8rem; font-weight: 700; box-shadow: 0 5px 14px rgba(20, 124, 107, 0.2); cursor: pointer; transition: transform 0.15s ease, filter 0.15s ease; }
    .deposit-save-button:hover:not(:disabled) { transform: translateY(-1px); filter: brightness(1.06); }
    .deposit-save-button:disabled { cursor: wait; opacity: 0.65; }

    .deposit-entry-page .tt-menu { z-index: 1080; background: #10243a; color: #e6f0ef; border: 1px solid #344e59; border-radius: 7px; }
    @media (max-width: 1000px) { .deposit-entry-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
    @media (max-width: 600px) {
        .deposit-entry-page { width: calc(100% - 20px); margin: 0.75rem auto; }
        .deposit-entry-header, .deposit-entry-body { padding: 1rem; }
        .deposit-entry-grid { grid-template-columns: 1fr; gap: 0.75rem; }
        .deposit-entry-field.description-field { grid-column: auto; }
        .deposit-entry-footer { justify-content: stretch; }
        .deposit-save-button { width: 100%; }
    }

    body:not(.dark-mode) .deposit-entry-page { --deposit-ink: #183d39; --deposit-muted: #68817c; --deposit-line: #d3e4dd; --deposit-surface: #ffffff; --deposit-soft: #f4f9f6; background: #eef3f2; color: var(--deposit-ink); box-shadow: 0 12px 30px rgba(26, 72, 58, 0.08); }
    body:not(.dark-mode) .deposit-entry-header { background: linear-gradient(110deg, #e3f2eb, #f4f8f6 72%); }
    body:not(.dark-mode) .deposit-entry-icon { background: #d8eee5; color: #147b69; }
    body:not(.dark-mode) .deposit-entry-field label { color: #526b66; }
    body:not(.dark-mode) .deposit-entry-field .form-control,
    body:not(.dark-mode) .deposit-entry-field .form-select { border-color: #cdded8; background: #fff; color: #183d39; }
    body:not(.dark-mode) .deposit-entry-field .input-group-text { border-color: #cdded8; background: #f1f7f4; color: #68817c; }
    body:not(.dark-mode) .deposit-entry-page .tt-menu { background: #fff; color: #183d39; border-color: #cdded8; }

    .common-modal-md .deposit-entry-page { width: 100%; max-width: 100%; margin: 0; border: 0; border-radius: 0; box-shadow: none; }
    .common-modal-md .deposit-entry-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    @media (max-width: 600px) { .common-modal-md .deposit-entry-grid { grid-template-columns: 1fr; } }
</style>

<section class="deposit-entry-page">
    <header class="deposit-entry-header">
        <span class="deposit-entry-icon"><i class="fas fa-money-bill-transfer"></i></span>
        <div>
            <h2>{{ $id ? 'Edit deposit transaction' : 'New deposit transaction' }}</h2>
            <p>Record a member deposit or release with a date and description.</p>
        </div>
    </header>

    <div class="deposit-entry-body">
        <form action="{{ route('submit-deposit') }}" method="POST" id="depositForm"
            data-redirect="{{ route('deposit-list') }}">
            @csrf
            <input type="hidden" name="id" id="id" value="{{ $id }}">

            <div class="deposit-entry-grid">
                <div class="deposit-entry-field">
                    <label for="member_name">Member <span class="required">*</span></label>
                    <input type="text" class="form-control" id="member_name" name="member_name"
                        placeholder="Search member name" value="{{ $member_name }}" autocomplete="off" required>
                    <input type="hidden" id="member_id" name="member_id" value="{{ $member_id }}">
                    <div class="deposit-entry-help">Choose a member from the search suggestions.</div>
                </div>
                <div class="deposit-entry-field">
                    <label for="transection_date">Transaction date <span class="required">*</span></label>
                    <input type="date" class="form-control" name="transection_date" id="transection_date"
                        value="{{ $transaction_date }}" required>
                </div>
                <div class="deposit-entry-field">
                    <label for="income_expence_amt">Amount <span class="required">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">৳</span>
                        <input type="number" step="0.01" min="0.01" class="form-control"
                            name="income_expence_amt" id="income_expence_amt" value="{{ $amount }}"
                            placeholder="0.00" required>
                    </div>
                </div>
                <div class="deposit-entry-field">
                    <label for="type">Transaction type <span class="required">*</span></label>
                    <select class="form-select" name="type" id="type" required>
                        <option value="">Choose type</option>
                        <option value="deposite" {{ $type == 'deposite' ? 'selected' : '' }}>Deposit</option>
                        <option value="relesed" {{ $type == 'relesed' ? 'selected' : '' }}>Release</option>
                    </select>
                </div>
                <div class="deposit-entry-field description-field">
                    <label for="description">Description <span class="required">*</span></label>
                    <textarea class="form-control" name="description" id="description" rows="5"
                        placeholder="Add a short note for this transaction" required>{{ $description }}</textarea>
                </div>
            </div>

            <div class="deposit-entry-footer">
                <button type="button" id="save-deposit-entry" class="deposit-save-button">
                    <i class="fas fa-check"></i><span>{{ $id ? 'Update transaction' : 'Save transaction' }}</span>
                </button>
            </div>
        </form>
    </div>
</section>

<script>
    const initializeDepositMemberAutocomplete = function() {
        if (typeof window.openDoctorAutocomplete === 'function') {
            window.openDoctorAutocomplete('#member_name', 'member_id');
        }
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeDepositMemberAutocomplete, { once: true });
    } else {
        initializeDepositMemberAutocomplete();
    }

    $(document).ready(function() {
        const form = document.getElementById('depositForm');
        const saveButton = document.getElementById('save-deposit-entry');
        if (!form || !saveButton) return;

        saveButton.addEventListener('click', function() {
            if (!form.reportValidity()) return;

            if (!document.getElementById('member_id').value) {
                if (typeof Swal === 'undefined') {
                    window.alert('Choose a member from the suggestions before saving.');
                    return;
                }
                Swal.fire({ title: 'Select a member', text: 'Choose a member from the suggestions before saving.', icon: 'info', confirmButtonColor: '#147c6b' });
                document.getElementById('member_name').focus();
                return;
            }

            if (typeof Swal === 'undefined') {
                window.alert('Confirmation dialog is unavailable. Please refresh and try again.');
                return;
            }

            const typeSelect = form.elements.type;
            const typeLabel = typeSelect.options[typeSelect.selectedIndex].text;
            const amount = new Intl.NumberFormat('en-BD', { style: 'currency', currency: 'BDT', minimumFractionDigits: 2 }).format(Number(form.elements.income_expence_amt.value) || 0);
            const safeText = value => $('<div>').text(value || '').html();

            Swal.fire({
                title: `Confirm ${typeLabel.toLowerCase()}`,
                html: `<div style="text-align:left;line-height:1.8"><div><strong>Member:</strong> ${safeText(form.elements.member_name.value)}</div><div><strong>Date:</strong> ${safeText(form.elements.transection_date.value)}</div><div><strong>Type:</strong> ${safeText(typeLabel)}</div><div><strong>Amount:</strong> ${amount}</div><div><strong>Description:</strong> ${safeText(form.elements.description.value)}</div></div>`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: form.elements.id.value ? 'Update transaction' : 'Save transaction',
                cancelButtonText: 'Review details',
                confirmButtonColor: '#147c6b',
                cancelButtonColor: '#64748b',
                reverseButtons: true
            }).then(function(result) {
                if (!result.isConfirmed) return;

                saveButton.disabled = true;
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json'
                    },
                    success: function(response) {
                        if (response.title !== 'Success') {
                            saveButton.disabled = false;
                            Swal.fire({ title: response.title || 'Could not save transaction', text: response.msg || 'Review the details and try again.', icon: 'error', confirmButtonColor: '#147c6b' });
                            return;
                        }

                        Swal.fire({
                            title: response.title || 'Saved',
                            text: response.msg || 'The transaction was saved successfully.',
                            icon: 'success',
                            confirmButtonText: 'View deposit list',
                            confirmButtonColor: '#147c6b',
                            allowOutsideClick: false
                        }).then(function() {
                            window.location.href = form.dataset.redirect;
                        });
                    },
                    error: function(xhr) {
                        saveButton.disabled = false;
                        const message = xhr.responseJSON && (xhr.responseJSON.message || xhr.responseJSON.msg);
                        Swal.fire({ title: xhr.status === 422 ? 'Check the form' : 'Save failed', text: message || 'The transaction could not be saved. Please try again.', icon: 'error', confirmButtonColor: '#147c6b' });
                    }
                });
            });
        });
    });
</script>
