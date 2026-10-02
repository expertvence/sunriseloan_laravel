<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .member-commit-page {
        --commit-ink: #173a3b;
        --commit-muted: #647d79;
        --commit-border: #d7e5e0;
        --commit-surface: #ffffff;
        --commit-soft: #f2f8f5;
        width: min(1480px, calc(100% - 40px));
        margin: 28px auto;
        color: var(--commit-ink);
    }

    .member-commit-heading {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .member-commit-heading h1 { margin: 0; color: var(--commit-ink); font-size: 1.55rem; font-weight: 720; }
    .member-commit-heading p { margin: 0.28rem 0 0; color: var(--commit-muted); font-size: 0.82rem; }
    .member-commit-heading .heading-mark { display: inline-flex; align-items: center; gap: 0.55rem; }
    .member-commit-heading .heading-icon { display: grid; width: 38px; height: 38px; place-items: center; border-radius: 10px; background: #dff1e9; color: #13816e; }

    .member-commit-panel {
        overflow: hidden;
        border: 1px solid var(--commit-border);
        border-radius: 11px;
        background: var(--commit-surface);
        box-shadow: 0 12px 32px rgba(22, 65, 57, 0.07);
    }

    .member-commit-select-area {
        padding: 1.1rem 1.2rem 0.65rem;
        border-bottom: 1px solid var(--commit-border);
        background: linear-gradient(115deg, #eaf5f0, #f7faf8 70%);
    }

    .member-commit-select-area label { display: block; margin-bottom: 0.4rem; color: #45635f; font-size: 0.72rem; font-weight: 700; }
    .member-commit-select-area select { width: min(420px, 100%); min-height: 42px; border: 1px solid #c9ddd5; border-radius: 7px; background: #fff; color: #173a3b; padding: 0.55rem 0.7rem; font-size: 0.82rem; }
    .member-commit-select-area select:focus { border-color: #168573; outline: 0; box-shadow: 0 0 0 3px rgba(22, 133, 115, 0.12); }

    .member-commit-stats { display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); grid-auto-rows: 1fr; gap: 0.65rem; padding: 0.9rem 1.2rem 1.1rem; border-bottom: 1px solid var(--commit-border); }
    .member-commit-stat { min-width: 0; padding: 0.75rem 0.8rem; border: 1px solid #e1ece7; border-radius: 8px; background: var(--commit-soft); }
    .member-commit-stat-label { display: block; color: var(--commit-muted); font-size: 0.63rem; font-weight: 700; letter-spacing: 0.035em; text-transform: uppercase; }
    .member-commit-stat-value { display: block; margin-top: 0.35rem; color: #1a5048; font-size: 0.95rem; font-weight: 720; line-height: 1.25; overflow-wrap: anywhere; }
    .member-commit-stat.remaining .member-commit-stat-value { color: #9a6b20; }

    .member-commit-table-head { display: flex; align-items: center; justify-content: space-between; gap: 0.7rem; padding: 1rem 1.2rem 0.55rem; }
    .member-commit-table-head h2 { margin: 0; color: var(--commit-ink); font-size: 0.92rem; font-weight: 700; }
    .member-commit-table-head span { color: var(--commit-muted); font-size: 0.7rem; }
    .member-commit-table-wrap { overflow-x: auto; padding: 0 1.2rem 1.2rem; }
    .member-commit-table { width: 100%; min-width: 690px; border-collapse: separate; border-spacing: 0; }
    .member-commit-table thead th { padding: 0.7rem 0.75rem; background: #eaf4ef; color: #5a7771; font-size: 0.63rem; font-weight: 750; letter-spacing: 0.04em; text-align: left; text-transform: uppercase; white-space: nowrap; }
    .member-commit-table thead th:first-child { border-radius: 7px 0 0 7px; }
    .member-commit-table thead th:last-child { border-radius: 0 7px 7px 0; }
    .member-commit-table tbody td { padding: 0.78rem 0.75rem; border-bottom: 1px solid #edf2ef; color: #385853; font-size: 0.75rem; vertical-align: middle; }
    .member-commit-table tbody tr:last-child td { border-bottom: 0; }
    .member-commit-table tbody tr:hover { background: #f8fbf9; }
    .member-commit-table tbody td:first-child { color: #839993; }
    .member-commit-table .invoice-code { color: #167565; font-weight: 700; }
    .member-commit-table .payment-amount { color: #126d5c; font-weight: 750; white-space: nowrap; }
    .member-commit-empty { padding: 2.4rem 1rem !important; color: var(--commit-muted) !important; text-align: center; }
    .member-commit-empty i { display: block; margin-bottom: 0.65rem; color: #69aa97; font-size: 1.3rem; }

    body.dark-mode .member-commit-page { --commit-ink: #e4f2ee; --commit-muted: #a2bdb6; --commit-border: #315452; --commit-surface: #102e32; --commit-soft: #14383a; }
    body.dark-mode .member-commit-heading .heading-icon { background: #194844; color: #74d9bb; }
    body.dark-mode .member-commit-panel { box-shadow: 0 12px 32px rgba(0, 0, 0, 0.2); }
    body.dark-mode .member-commit-select-area { background: linear-gradient(115deg, #143b3b, #123236 70%); }
    body.dark-mode .member-commit-select-area label { color: #bdd3ce; }
    body.dark-mode .member-commit-select-area select { border-color: #42625d; background: #0c262a; color: #e4f2ee; }
    body.dark-mode .member-commit-stat { border-color: #315452; }
    body.dark-mode .member-commit-stat-value { color: #b8eadb; }
    body.dark-mode .member-commit-stat.remaining .member-commit-stat-value { color: #f0cc83; }
    body.dark-mode .member-commit-table thead th { background: #1a4140; color: #b3cbc4; }
    body.dark-mode .member-commit-table tbody td { border-bottom-color: #244547; color: #c6d9d4; }
    body.dark-mode .member-commit-table tbody tr:hover { background: #14383a; }
    body.dark-mode .member-commit-table .invoice-code,
    body.dark-mode .member-commit-table .payment-amount { color: #7fdfc2; }
    body.dark-mode .member-commit-empty i { color: #78cdb1; }

    @media (max-width: 900px) {
        .member-commit-stats { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    }

    @media (max-width: 600px) {
        .member-commit-page { width: calc(100% - 20px); margin: 16px auto; }
        .member-commit-heading { align-items: flex-start; }
        .member-commit-heading h1 { font-size: 1.3rem; }
        .member-commit-stats { grid-template-columns: repeat(2, minmax(0, 1fr)); padding: 0.75rem; }
        .member-commit-select-area { padding: 0.9rem 0.75rem 0.65rem; }
        .member-commit-table-head { padding-right: 0.75rem; padding-left: 0.75rem; }
        .member-commit-table-wrap { padding-right: 0.75rem; padding-left: 0.75rem; }
    }
</style>

<main class="member-commit-page">
    <header class="member-commit-heading">
        <div class="heading-mark">
            <span class="heading-icon"><i class="fas fa-money-check-dollar"></i></span>
            <div>
                <h1>Loan Commitments</h1>
                <p>View payment history and remaining balance for your approved loans.</p>
            </div>
        </div>
    </header>

    <section class="member-commit-panel" aria-label="Loan payment history">
        <form id="search" target="_blank" class="member-commit-select-area">
            <label for="loan_id">Select an approved loan</label>
            <select name="loan_id" id="loan_id" {{ $loans->isEmpty() ? 'disabled' : '' }}>
                @if ($loans->isEmpty())
                    <option value="">No approved loans available</option>
                @else
                    <option value="" selected>Select loan reference</option>
                    @foreach ($loans as $loan)
                        <option value="{{ $loan->loan_ide }}">{{ $loan->l_uId }}</option>
                    @endforeach
                @endif
            </select>
        </form>

        <section class="member-commit-stats" aria-label="Selected loan summary">
            <div class="member-commit-stat"><span class="member-commit-stat-label">Loan amount</span><strong id="total_loan" class="member-commit-stat-value">৳0.00</strong></div>
            <div class="member-commit-stat"><span class="member-commit-stat-label">Interest rate</span><strong class="member-commit-stat-value"><span id="interest">0</span>%</strong></div>
            <div class="member-commit-stat"><span class="member-commit-stat-label">Loan term</span><strong id="total_term" class="member-commit-stat-value">—</strong></div>
            <div class="member-commit-stat"><span class="member-commit-stat-label">Total with interest</span><strong id="total_loan_withinterest" class="member-commit-stat-value">৳0.00</strong></div>
            <div class="member-commit-stat remaining"><span class="member-commit-stat-label">Remaining balance</span><strong id="remaining_amount" class="member-commit-stat-value">৳0.00</strong></div>
        </section>

        <div class="member-commit-table-head">
            <h2>Payment history</h2>
            <span>Approved payments</span>
        </div>
        <div class="member-commit-table-wrap">
            <table id="loan_commitments_table" class="member-commit-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Payment date</th>
                        <th>Invoice ID</th>
                        <th>Amount</th>
                        <th>Payment month</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td colspan="6" class="member-commit-empty"><i class="fas fa-arrow-up-from-bracket"></i><span>Select an approved loan to view its payment history.</span></td></tr>
                </tbody>
            </table>
        </div>
    </section>
</main>

<script>
$(document).ready(function() {
    const formatMoney = function(value) {
        return '৳' + new Intl.NumberFormat('en-BD', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(Number(value) || 0);
    };

    const escapeHtml = function(value) {
        return $('<div>').text(value == null ? '' : String(value)).html();
    };

    const showCommitMessage = function(message, iconClass) {
        $('#loan_commitments_table tbody').html(
            `<tr><td colspan="6" class="member-commit-empty"><i class="fas ${iconClass}"></i><span>${escapeHtml(message)}</span></td></tr>`
        );
    };

    const resetLoanSummary = function(remaining = '৳0.00') {
        $('#remaining_amount').text(remaining);
        $('#total_loan').text('৳0.00');
        $('#total_term').text('—');
        $('#total_loan_withinterest').text('৳0.00');
        $('#interest').text('0');
    };

    $('#loan_id').on('change', function() {
        let loanId = $(this).val();
        if (loanId) {
            showCommitMessage('Loading payment history…', 'fa-circle-notch fa-spin');
            $.ajax({
                url: '{{ url("getLoanCommitments") }}',
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { loan_ide: loanId },
                success: function(response) {
                    if (response.success) {
                        let dataHtml = '';
                        response.data.forEach(function(commit, index) {
                            dataHtml += `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${commit.created_at ? escapeHtml(new Date(commit.created_at).toLocaleString()) : '—'}</td>
                                    <td class="invoice-code">${escapeHtml(commit.loan_commit_id)}</td>
                                    <td class="payment-amount">${formatMoney(commit.payment_amount)}</td>
                                    <td>${escapeHtml(commit.payment_month)}</td>
                                    <td>${escapeHtml(commit.loan_year)}</td>
                                </tr>`;
                        });
                        $('#loan_commitments_table tbody').html(dataHtml);
                        $('#remaining_amount').text(formatMoney(response.remaining_amount));
                        $('#total_loan').text(formatMoney(response.loanamount));
                        $('#total_term').text(response.loanterm || '—');
                        $('#total_loan_withinterest').text(formatMoney(response.interestwithloan));
                        $('#interest').text(response.interestRateValue);
                    } else {
                        showCommitMessage('No approved payments are recorded for this loan yet.', 'fa-receipt');
                        resetLoanSummary('—');
                    }
                },
                error: function() {
                    showCommitMessage('Could not load payment history. Please try again.', 'fa-triangle-exclamation');
                }
            });
        } else {
            showCommitMessage('Select an approved loan to view its payment history.', 'fa-arrow-up-from-bracket');
            resetLoanSummary();
        }
    });
});
</script>
