@php
    $id = isset($income_expence_data) && !empty($income_expence_data) ? $income_expence_data->id : '';
    $transection_date = isset($income_expence_data) && !empty($income_expence_data) && $income_expence_data->date
        ? date('Y-m-d', strtotime($income_expence_data->date))
        : '';
    $income_expence_amt = isset($income_expence_data) && !empty($income_expence_data) ? $income_expence_data->income_expence : '';
    $description = isset($income_expence_data) && !empty($income_expence_data) ? $income_expence_data->description : '';
    $type = isset($income_expence_data) && !empty($income_expence_data) ? $income_expence_data->type : '';
@endphp

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .income-entry-form {
        --entry-ink: #25354a;
        --entry-muted: #738197;
        --entry-line: #dce5e9;
        --entry-surface: #fff;
        --entry-soft: #f5f8fa;
        width: min(1480px, calc(100% - 40px));
        margin: 1.25rem auto;
        overflow: hidden;
        border: 1px solid var(--entry-line);
        border-radius: 11px;
        background: var(--entry-surface);
        color: var(--entry-ink);
        box-shadow: 0 12px 30px rgba(26, 49, 72, 0.07);
    }

    .income-entry-heading {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 1.2rem 1.4rem;
        border-bottom: 1px solid var(--entry-line);
        background: linear-gradient(110deg, #eef5f2, #f8faf9 72%);
    }

    .income-entry-heading-icon { display: grid; width: 40px; height: 40px; flex: 0 0 40px; place-items: center; border-radius: 9px; background: #deeee7; color: #167b68; }
    .income-entry-heading h2 { margin: 0; color: var(--entry-ink); font-size: 1.12rem; font-weight: 720; }
    .income-entry-heading p { margin: 0.24rem 0 0; color: var(--entry-muted); font-size: 0.76rem; }
    .income-entry-body { padding: 1.4rem; }
    .income-entry-grid { display: grid; grid-template-columns: minmax(190px, 0.8fr) minmax(240px, 1.5fr) minmax(180px, 0.8fr) minmax(180px, 0.8fr); gap: 1rem; align-items: start; }
    .income-entry-field label { display: block; margin-bottom: 0.4rem; color: #526477; font-size: 0.72rem; font-weight: 700; }
    .income-entry-field label span { color: #c2574e; }
    .income-entry-field .form-control,
    .income-entry-field .form-select { min-height: 43px; border: 1px solid #cfdbe0; border-radius: 7px; background-color: var(--entry-surface); color: var(--entry-ink); font-size: 0.82rem; box-shadow: none; }
    .income-entry-field .form-control:focus,
    .income-entry-field .form-select:focus { border-color: #188572; box-shadow: 0 0 0 3px rgba(24, 133, 114, 0.12); }
    .income-entry-field .input-group-text { border-color: #cfdbe0; border-radius: 7px 0 0 7px; background: var(--entry-soft); color: var(--entry-muted); }
    .income-entry-field .input-group .form-control { border-radius: 0 7px 7px 0; }
    .income-entry-help { margin-top: 0.35rem; color: var(--entry-muted); font-size: 0.67rem; }
    .income-entry-footer { display: flex; justify-content: flex-end; padding-top: 1.2rem; margin-top: 1.1rem; border-top: 1px solid var(--entry-line); }
    .income-entry-save { display: inline-flex; min-width: 158px; min-height: 42px; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.6rem 1rem; border: 0; border-radius: 7px; background: linear-gradient(105deg, #147c6b, #1c9a7b); color: #fff; font-size: 0.8rem; font-weight: 700; box-shadow: 0 5px 14px rgba(20, 124, 107, 0.2); transition: transform 0.15s ease, filter 0.15s ease; }
    .income-entry-save:hover:not(:disabled) { transform: translateY(-1px); filter: brightness(1.05); }
    .income-entry-save:disabled { cursor: wait; opacity: 0.65; }

    body.dark-mode .income-entry-form { --entry-ink: #e5eeef; --entry-muted: #a4b6ba; --entry-line: #334a50; --entry-surface: #07152b; --entry-soft: #10243a; background: #07152b; box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2); }
    body.dark-mode .income-entry-heading { background: linear-gradient(110deg, #0b1d34, #10243a 72%); }
    body.dark-mode .income-entry-heading-icon { background: #1d4b45; color: #80d8ba; }
    body.dark-mode .income-entry-field label { color: #bfd0d1; }
    body.dark-mode .income-entry-field .form-control,
    body.dark-mode .income-entry-field .form-select { border-color: #334b66; background-color: #0b1d34; color: #e5eeef; }
    body.dark-mode .income-entry-field .input-group-text { border-color: #334b66; background: #10243a; color: #a4b6ba; }

    .common-modal-md .income-entry-form {
        width: 100%;
        max-width: 100%;
        margin: 0;
        border: 0;
        border-radius: 0;
        box-shadow: none;
    }

    .common-modal-md .income-entry-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .common-modal-md .income-entry-body { padding: 1.15rem; }

    @media (max-width: 1000px) { .income-entry-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
    @media (max-width: 600px) {
        .income-entry-form { width: calc(100% - 20px); margin: 0.75rem auto; }
        .income-entry-heading, .income-entry-body { padding: 1rem; }
        .income-entry-grid { grid-template-columns: 1fr; gap: 0.75rem; }
        .income-entry-footer { justify-content: stretch; }
        .income-entry-save { width: 100%; }
    }

    @media (max-width: 600px) {
        .common-modal-md .income-entry-grid { grid-template-columns: minmax(0, 1fr); }
        .common-modal-md .income-entry-heading,
        .common-modal-md .income-entry-body { padding: 0.9rem; }
    }
</style>

<section class="income-entry-form income-expense-surface">
    <header class="income-entry-heading">
        <span class="income-entry-heading-icon"><i class="fas fa-scale-balanced"></i></span>
        <div>
            <h2>{{ $id ? 'Edit financial entry' : 'New income or expense' }}</h2>
            <p>Record a dated transaction and classify it as income or expense.</p>
        </div>
    </header>

    <div class="income-entry-body">
        <form action="{{ route('income-expence-store') }}" method="POST" id="investment"
            data-redirect="{{ route('income-expence-list') }}">
            @csrf
            <input type="hidden" name="id" id="pay_id" value="{{ $id }}">

            <div class="income-entry-grid">
                <div class="income-entry-field">
                    <label for="transection_date">Transaction date <span>*</span></label>
                    <input type="date" class="form-control" name="transection_date" id="transection_date"
                        value="{{ $transection_date }}" autocomplete="off" required>
                </div>
                <div class="income-entry-field">
                    <label for="description">Description <span>*</span></label>
                    <input type="text" class="form-control" name="description" id="description"
                        value="{{ $description }}" placeholder="e.g. Monthly service charge" maxlength="255" required>
                </div>
                <div class="income-entry-field">
                    <label for="income_expence_amt">Amount <span>*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">৳</span>
                        <input type="number" class="form-control" name="income_expence_amt" id="income_expence_amt"
                            value="{{ $income_expence_amt }}" placeholder="0.00" min="0.01" step="0.01" required>
                    </div>
                    <div class="income-entry-help">Enter a positive transaction amount.</div>
                </div>
                <div class="income-entry-field">
                    <label for="type">Transaction type <span>*</span></label>
                    <select class="form-select" name="type" id="type" required>
                        <option value="">Choose type</option>
                        <option value="Income" @if ($type == 'Income') selected @endif>Income</option>
                        <option value="Expense" @if ($type == 'Expense') selected @endif>Expense</option>
                    </select>
                </div>
            </div>

            <div class="income-entry-footer">
                <button type="button" id="save-income-expense" class="income-entry-save">
                    <i class="fas fa-check"></i><span>{{ $id ? 'Update entry' : 'Save entry' }}</span>
                </button>
            </div>
        </form>
    </div>
</section>

<script>
    $(document).ready(function() {
        const form = document.getElementById('investment');
        const saveButton = document.getElementById('save-income-expense');

        saveButton.addEventListener('click', function() {
            if (!form.reportValidity()) return;

            const formData = new FormData(form);
            const type = formData.get('type');
            const amount = new Intl.NumberFormat('en-BD', {
                style: 'currency',
                currency: 'BDT',
                minimumFractionDigits: 2
            }).format(Number(formData.get('income_expence_amt')) || 0);

            Swal.fire({
                title: `Confirm ${type.toLowerCase()}`,
                html: `<div style="text-align:left;line-height:1.8"><div><strong>Date:</strong> ${$('<div>').text(formData.get('transection_date')).html()}</div><div><strong>Description:</strong> ${$('<div>').text(formData.get('description')).html()}</div><div><strong>Type:</strong> ${type}</div><div><strong>Amount:</strong> ${amount}</div></div>`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: formData.get('id') ? 'Update entry' : 'Save entry',
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
                            Swal.fire({
                                title: response.title || 'Could not save entry',
                                text: response.msg || 'Please review the entry and try again.',
                                icon: 'error',
                                confirmButtonColor: '#147c6b'
                            });
                            return;
                        }

                        Swal.fire({
                            title: response.title || 'Saved',
                            text: response.msg || 'The financial entry was saved.',
                            icon: 'success',
                            confirmButtonText: 'View transaction list',
                            confirmButtonColor: '#147c6b',
                            allowOutsideClick: false
                        }).then(function() {
                            window.location.href = form.dataset.redirect;
                        });
                    },
                    error: function(xhr) {
                        saveButton.disabled = false;
                        const message = xhr.responseJSON && (xhr.responseJSON.message || xhr.responseJSON.msg);
                        Swal.fire({
                            title: xhr.status === 422 ? 'Check the form' : 'Save failed',
                            text: message || 'The financial entry could not be saved. Please try again.',
                            icon: 'error',
                            confirmButtonColor: '#147c6b'
                        });
                    }
                });
            });
        });
    });
</script>
