@php
    $id = isset($data) && !empty($data) ? $data->id : '';
    $assets = isset($data) && !empty($data) ? $data->assets : '';
    $date = isset($data) && !empty($data) ? $data->date : date('Y-m-d');
@endphp

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .asset-entry-page {
        --asset-ink: #e6f0ef;
        --asset-muted: #a2b6b8;
        --asset-line: #314a52;
        width: min(1480px, calc(100% - 40px));
        margin: 1.25rem auto;
        overflow: hidden;
        border: 1px solid var(--asset-line);
        border-radius: 11px;
        background: #07152b;
        color: var(--asset-ink);
        box-shadow: 0 14px 34px rgba(0, 5, 18, 0.22);
    }

    .asset-entry-header { display: flex; align-items: center; gap: 0.8rem; padding: 1.2rem 1.4rem; border-bottom: 1px solid var(--asset-line); background: linear-gradient(110deg, #0b1d34, #10243a 72%); }
    .asset-entry-icon { display: grid; width: 40px; height: 40px; flex: 0 0 40px; place-items: center; border-radius: 9px; background: #17443f; color: #78d8b9; }
    .asset-entry-header h2 { margin: 0; color: var(--asset-ink); font-size: 1.12rem; font-weight: 720; }
    .asset-entry-header p { margin: 0.24rem 0 0; color: var(--asset-muted); font-size: 0.76rem; }
    .asset-entry-body { padding: 1.4rem; }
    .asset-entry-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; }
    .asset-entry-field label { display: block; margin-bottom: 0.4rem; color: #c1d2d4; font-size: 0.72rem; font-weight: 700; }
    .asset-entry-field label .required { color: #f19b8e; }
    .asset-entry-field .form-control { min-height: 44px; border: 1px solid #344e59; border-radius: 7px; background: #0b1d34; color: #e6f0ef; font-size: 0.84rem; box-shadow: none; }
    .asset-entry-field .form-control:focus { border-color: #29a78b; box-shadow: 0 0 0 3px rgba(41, 167, 139, 0.15); }
    .asset-entry-help { margin-top: 0.35rem; color: var(--asset-muted); font-size: 0.67rem; }
    .asset-entry-footer { display: flex; justify-content: flex-end; padding-top: 1.15rem; margin-top: 1.1rem; border-top: 1px solid var(--asset-line); }
    .asset-save-button { display: inline-flex; min-width: 155px; min-height: 43px; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.6rem 1rem; border: 0; border-radius: 7px; background: linear-gradient(105deg, #147c6b, #1c9a7b); color: #fff; font-size: 0.8rem; font-weight: 700; box-shadow: 0 5px 14px rgba(20, 124, 107, 0.2); cursor: pointer; transition: transform 0.15s ease, filter 0.15s ease; }
    .asset-save-button:hover:not(:disabled) { transform: translateY(-1px); filter: brightness(1.06); }
    .asset-save-button:disabled { cursor: wait; opacity: 0.65; }

    .common-modal-md .asset-entry-page { width: 100%; max-width: 100%; margin: 0; border: 0; border-radius: 0; box-shadow: none; }
    .common-modal-md .asset-entry-body { padding: 1.1rem; }
    body:not(.dark-mode) .asset-entry-page { --asset-ink: #183d39; --asset-muted: #68817c; --asset-line: #d3e4dd; background: #eef3f2; color: var(--asset-ink); box-shadow: 0 12px 30px rgba(26, 72, 58, 0.08); }
    body:not(.dark-mode) .asset-entry-header { background: linear-gradient(110deg, #e3f2eb, #f4f8f6 72%); }
    body:not(.dark-mode) .asset-entry-icon { background: #d8eee5; color: #147b69; }
    body:not(.dark-mode) .asset-entry-field label { color: #526b66; }
    body:not(.dark-mode) .asset-entry-field .form-control { border-color: #cdded8; background: #fff; color: #183d39; }
    @media (max-width: 600px) {
        .asset-entry-page { width: calc(100% - 20px); margin: 0.75rem auto; }
        .asset-entry-header, .asset-entry-body { padding: 1rem; }
        .asset-entry-grid { grid-template-columns: 1fr; gap: 0.75rem; }
        .asset-entry-footer { justify-content: stretch; }
        .asset-save-button { width: 100%; }
    }
</style>

<section class="asset-entry-page">
    <header class="asset-entry-header">
        <span class="asset-entry-icon"><i class="fas fa-building-columns"></i></span>
        <div>
            <h2>{{ $id ? 'Edit asset record' : 'Add asset record' }}</h2>
            <p>Record the organization’s asset value and its effective date.</p>
        </div>
    </header>

    <div class="asset-entry-body">
        <form method="POST" id="categories_create" action="{{ route('store-assets') }}"
            data-redirect="{{ route('show-assets') }}">
            @csrf
            <input type="hidden" name="assets_id" id="assets_id" value="{{ $id }}">
            <div class="asset-entry-grid">
                <div class="asset-entry-field">
                    <label for="assets">Asset amount <span class="required">*</span></label>
                    <input type="number" min="0" step="0.01" name="assets" value="{{ $assets }}" id="assets"
                        class="form-control" placeholder="Enter asset amount" required>
                    <div class="asset-entry-help">Enter the recorded value in taka.</div>
                </div>
                <div class="asset-entry-field">
                    <label for="date">Record date</label>
                    <input type="date" name="date" value="{{ $date }}" id="date" class="form-control">
                    <div class="asset-entry-help">Optional date associated with this asset entry.</div>
                </div>
            </div>
            <div class="asset-entry-footer">
                <button type="button" id="save-asset-entry" class="asset-save-button">
                    <i class="fas fa-check"></i><span>{{ $id ? 'Update asset' : 'Save asset' }}</span>
                </button>
            </div>
        </form>
    </div>
</section>

<script>
    $(document).ready(function() {
        const form = document.getElementById('categories_create');
        const saveButton = document.getElementById('save-asset-entry');
        if (!form || !saveButton) return;

        saveButton.addEventListener('click', function() {
            if (!form.reportValidity()) return;
            if (typeof Swal === 'undefined') {
                window.alert('Confirmation dialog is unavailable. Please refresh and try again.');
                return;
            }

            const formData = new FormData(form);
            const amount = new Intl.NumberFormat('en-BD', { style: 'currency', currency: 'BDT', minimumFractionDigits: 2 })
                .format(Number(formData.get('assets')) || 0);
            const date = formData.get('date') || 'Not specified';

            Swal.fire({
                title: formData.get('assets_id') ? 'Confirm asset update' : 'Confirm new asset',
                html: `<div style="text-align:left;line-height:1.8"><div><strong>Asset amount:</strong> ${amount}</div><div><strong>Date:</strong> ${date}</div></div>`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: formData.get('assets_id') ? 'Update asset' : 'Save asset',
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
                            Swal.fire({ title: response.title || 'Could not save asset', text: response.msg || 'Please review the entry and try again.', icon: 'error', confirmButtonColor: '#147c6b' });
                            return;
                        }

                        Swal.fire({
                            title: response.title || 'Saved',
                            text: response.msg || 'Asset record saved successfully.',
                            icon: 'success',
                            confirmButtonText: 'View asset list',
                            confirmButtonColor: '#147c6b',
                            allowOutsideClick: false
                        }).then(function() {
                            window.location.href = form.dataset.redirect;
                        });
                    },
                    error: function(xhr) {
                        saveButton.disabled = false;
                        const message = xhr.responseJSON && (xhr.responseJSON.message || xhr.responseJSON.msg);
                        Swal.fire({ title: xhr.status === 422 ? 'Check the form' : 'Save failed', text: message || 'The asset record could not be saved. Please try again.', icon: 'error', confirmButtonColor: '#147c6b' });
                    }
                });
            });
        });
    });
</script>
