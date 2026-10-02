@php
    $income = 0;
    $expense = 0;

@endphp

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<style>
    .finance-list-page {
        --finance-ink: #25354a;
        --finance-muted: #738197;
        --finance-line: #e0e7ee;
        --finance-surface: #ffffff;
        --finance-soft: #f5f8fa;
        --finance-accent: #16816f;
        width: min(1480px, calc(100% - 40px));
        margin: 1.4rem auto;
        color: var(--finance-ink);
    }

    .finance-list-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .finance-list-title { display: flex; align-items: center; gap: 0.8rem; }
    .finance-list-title-icon { display: grid; width: 42px; height: 42px; flex: 0 0 42px; place-items: center; border-radius: 10px; background: #e4f3ed; color: #15816e; }
    .finance-list-title h1 { margin: 0; color: var(--finance-ink); font-size: 1.45rem; font-weight: 720; }
    .finance-list-title p { margin: 0.25rem 0 0; color: var(--finance-muted); font-size: 0.8rem; }

    .finance-list-panel { overflow: hidden; border: 1px solid var(--finance-line); border-radius: 10px; background: var(--finance-surface); box-shadow: 0 10px 28px rgba(28, 49, 72, 0.06); }
    .finance-summary { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 0.75rem; padding: 1rem; border-bottom: 1px solid var(--finance-line); background: linear-gradient(110deg, #f2f7f5, #fafcfc); }
    .finance-summary-card { min-width: 0; padding: 0.8rem 0.9rem; border: 1px solid var(--finance-line); border-radius: 8px; background: var(--finance-surface); }
    .finance-summary-label { display: flex; align-items: center; gap: 0.45rem; color: var(--finance-muted); font-size: 0.67rem; font-weight: 700; letter-spacing: 0.04em; text-transform: uppercase; }
    .finance-summary-label i { color: var(--finance-accent); }
    .finance-summary-value { display: block; margin-top: 0.4rem; color: var(--finance-ink); font-size: 1.2rem; font-weight: 750; line-height: 1.25; overflow-wrap: anywhere; }
    .finance-summary-card.income .finance-summary-value { color: #167750; }
    .finance-summary-card.expense .finance-summary-value { color: #b05248; }
    .finance-summary-card.net .finance-summary-value { color: #176f68; }

    .finance-table-heading { display: flex; align-items: center; justify-content: space-between; gap: 0.7rem; padding: 1rem 1.1rem 0.5rem; }
    .finance-table-heading h2 { margin: 0; color: var(--finance-ink); font-size: 0.9rem; font-weight: 700; }
    .finance-entry-count { color: var(--finance-muted); font-size: 0.7rem; }
    .finance-table-wrap { overflow-x: auto; padding: 0 1.1rem 1.1rem; }
    .finance-list-table { width: 100%; min-width: 760px; border-collapse: separate; border-spacing: 0; }
    .finance-list-table thead th { padding: 0.72rem 0.8rem; background: #eef4f2; color: #647b77; font-size: 0.62rem; font-weight: 750; letter-spacing: 0.045em; text-align: left; text-transform: uppercase; white-space: nowrap; }
    .finance-list-table thead th:first-child { border-radius: 7px 0 0 7px; }
    .finance-list-table thead th:last-child { border-radius: 0 7px 7px 0; }
    .finance-list-table tbody td { padding: 0.78rem 0.8rem; border-bottom: 1px solid #edf1f4; color: #435269; font-size: 0.76rem; vertical-align: middle; }
    .finance-list-table tbody tr:last-child td { border-bottom: 0; }
    .finance-list-table tbody tr:hover { background: #f8fbfa; }
    .finance-list-table .row-number { color: #98a4b3; }
    .finance-list-table .date-cell { color: #64758a; white-space: nowrap; }
    .finance-list-table .description-cell { max-width: 480px; color: var(--finance-ink); overflow-wrap: anywhere; }
    .finance-type-badge { display: inline-flex; align-items: center; gap: 0.38rem; padding: 0.27rem 0.52rem; border-radius: 5px; font-size: 0.65rem; font-weight: 700; }
    .finance-type-badge.income { background: #e3f4eb; color: #19734e; }
    .finance-type-badge.expense { background: #fbeceb; color: #ac4d45; }
    .finance-amount { font-weight: 750; white-space: nowrap; }
    .finance-amount.income { color: #167750; }
    .finance-amount.expense { color: #b05248; }
    .finance-edit-button { display: inline-grid; width: 32px; height: 32px; place-items: center; border: 1px solid var(--finance-line); border-radius: 7px; background: var(--finance-soft); color: #53687d; cursor: pointer; text-decoration: none; transition: background 0.15s ease, color 0.15s ease, border-color 0.15s ease; }
    .finance-edit-button:hover { border-color: #9bcdbd; background: #e7f4ef; color: #147b69; }
    .finance-empty { padding: 2.4rem 1rem !important; color: var(--finance-muted) !important; text-align: center; }
    .finance-empty i { display: block; margin-bottom: 0.6rem; color: #7aab9b; font-size: 1.25rem; }

    .finance-list-page .dataTables_wrapper { padding: 0 1.1rem 1rem; color: var(--finance-muted); font-size: 0.74rem; }
    .finance-list-page .dataTables_wrapper .dataTables_length,
    .finance-list-page .dataTables_wrapper .dataTables_filter { margin: 0.6rem 0 0.8rem; color: var(--finance-muted); }
    .finance-list-page .dataTables_wrapper .dataTables_filter input,
    .finance-list-page .dataTables_wrapper .dataTables_length select { min-height: 34px; margin-left: 0.4rem; padding: 0.35rem 0.55rem; border: 1px solid var(--finance-line); border-radius: 6px; background: var(--finance-surface); color: var(--finance-ink); }
    .finance-list-page .dataTables_wrapper .dataTables_paginate .paginate_button { margin-left: 3px; padding: 0.32rem 0.6rem; border: 1px solid var(--finance-line) !important; border-radius: 6px; background: var(--finance-surface) !important; color: var(--finance-ink) !important; }
    .finance-list-page .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .finance-list-page .dataTables_wrapper .dataTables_paginate .paginate_button:hover { border-color: #16816f !important; background: #16816f !important; color: #fff !important; }

    body.dark-mode .finance-list-page { --finance-ink: #e6f0ef; --finance-muted: #a0b5b4; --finance-line: #334c50; --finance-surface: #132a32; --finance-soft: #18353b; }
    body.dark-mode .finance-list-title-icon { background: #194844; color: #75d5b8; }
    body.dark-mode .finance-list-panel { box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2); }
    body.dark-mode .finance-summary { background: linear-gradient(110deg, #10272e, #152e34); }
    body.dark-mode .finance-summary-card { border-color: var(--finance-line); }
    body.dark-mode .finance-summary-card.income .finance-summary-value { color: #86ddb2; }
    body.dark-mode .finance-summary-card.expense .finance-summary-value { color: #f0a09b; }
    body.dark-mode .finance-summary-card.net .finance-summary-value { color: #79d2c1; }
    body.dark-mode .finance-list-table thead th { background: #1a3a3d; color: #b5c9c5; }
    body.dark-mode .finance-list-table tbody td { border-bottom-color: #263f43; color: #c5d4d4; }
    body.dark-mode .finance-list-table tbody tr:hover { background: #18343a; }
    body.dark-mode .finance-list-table .description-cell { color: #e6f0ef; }
    body.dark-mode .finance-type-badge.income { background: #1b4939; color: #9de0bb; }
    body.dark-mode .finance-type-badge.expense { background: #512e32; color: #f0aaa4; }
    body.dark-mode .finance-amount.income { color: #8fdeb6; }
    body.dark-mode .finance-amount.expense { color: #f0a19a; }
    body.dark-mode .finance-edit-button { border-color: var(--finance-line); background: var(--finance-soft); color: #c3d5d1; }
    body.dark-mode .finance-edit-button:hover { border-color: #4d927f; background: #1b493f; color: #a6ecd4; }
    body.dark-mode .finance-list-page .dataTables_wrapper .dataTables_filter input,
    body.dark-mode .finance-list-page .dataTables_wrapper .dataTables_length select { border-color: var(--finance-line); background: var(--finance-soft); color: var(--finance-ink); }

    @media (max-width: 700px) {
        .finance-list-page { width: calc(100% - 20px); margin: 0.8rem auto; }
        .finance-list-title h1 { font-size: 1.25rem; }
        .finance-summary { grid-template-columns: 1fr; padding: 0.75rem; }
        .finance-summary-card { display: flex; align-items: center; justify-content: space-between; gap: 0.75rem; }
        .finance-summary-value { margin-top: 0; font-size: 1rem; text-align: right; }
        .finance-table-heading { padding-right: 0.75rem; padding-left: 0.75rem; }
        .finance-table-wrap { padding-right: 0.75rem; padding-left: 0.75rem; }
        .finance-list-page .dataTables_wrapper { padding-right: 0.75rem; padding-left: 0.75rem; }
    }
</style>

<main class="finance-list-page income-expense-surface">
    <header class="finance-list-header">
        <div class="finance-list-title">
            <span class="finance-list-title-icon"><i class="fas fa-scale-balanced"></i></span>
            <div>
                <h1>Income &amp; Expense</h1>
                <p>Review recorded financial activity and edit entries when needed.</p>
            </div>
        </div>
    </header>

    <section class="finance-list-panel" aria-label="Income and expense records">
        <div class="finance-summary">
            <article class="finance-summary-card income">
                <span class="finance-summary-label"><i class="fas fa-arrow-down"></i> Total income</span>
                <strong class="finance-summary-value">৳<span id="total-income">0.00</span></strong>
            </article>
            <article class="finance-summary-card expense">
                <span class="finance-summary-label"><i class="fas fa-arrow-up"></i> Total expense</span>
                <strong class="finance-summary-value">৳<span id="total-expense">0.00</span></strong>
            </article>
            <article class="finance-summary-card net">
                <span class="finance-summary-label"><i class="fas fa-scale-balanced"></i> Net balance</span>
                <strong class="finance-summary-value">৳<span id="net-total">0.00</span></strong>
            </article>
        </div>

        <div class="finance-table-heading">
            <h2>Transaction history</h2>
                <span class="finance-entry-count">{{ is_countable($income_expense ?? null) ? count($income_expense) : 0 }} entries</span>
        </div>
        <div class="finance-table-wrap">
            <table id="income-expense-table" class="finance-list-table data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Income</th>
                        <th>Expense</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($income_expense))
                    @foreach ($income_expense as $value)
                        <tr>
                            <td class="row-number">{{ $loop->iteration }}</td>
                            <td class="date-cell">{{ $value->date ? date('d M Y', strtotime($value->date)) : '—' }}</td>
                            <td class="description-cell">{{ $value->description ?: 'No description' }}</td>
                            <td>
                                <span class="finance-type-badge {{ $value->type === 'Income' ? 'income' : 'expense' }}">
                                    <i class="fas {{ $value->type === 'Income' ? 'fa-arrow-down' : 'fa-arrow-up' }}"></i>
                                    {{ $value->type }}
                                </span>
                            </td>
                            <td class="finance-amount income">{{ $value->type === 'Income' ? '৳' . number_format((float) $value->income_expence, 2, '.', ',') : '—' }}</td>
                            <td class="finance-amount expense">{{ $value->type === 'Expense' ? '৳' . number_format((float) $value->income_expence, 2, '.', ',') : '—' }}</td>
                            <td>
                                <button type="button" class="finance-edit-button open-modal btnView"
                                    data-action="{{ route('income-expence-edit', $value->id) }}"
                                    data-modal="common-modal-md" data-title="Edit entry" data-id="{{ $value->id }}"
                                    aria-label="Edit financial entry" title="Edit entry">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <tr><td colspan="7" class="finance-empty"><i class="fas fa-receipt"></i>No income or expense records found.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</main>

<script>
    $(document).ready(function() {
        let incomeTotal = 0;
        let expenseTotal = 0;

        $('#income-expense-table tbody tr').each(function() {
            const type = $(this).find('.finance-type-badge').text().trim();
            const amountText = $(this).find(type === 'Income' ? '.finance-amount.income' : '.finance-amount.expense').text();
            const amount = Number(amountText.replace(/[^0-9.-]/g, '')) || 0;

            if (type === 'Income') incomeTotal += amount;
            if (type === 'Expense') expenseTotal += amount;
        });

        const formatTotal = value => new Intl.NumberFormat('en-BD', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(value);
        $('#total-income').text(formatTotal(incomeTotal));
        $('#total-expense').text(formatTotal(expenseTotal));
        $('#net-total').text(formatTotal(incomeTotal - expenseTotal));

        if ($.fn.DataTable && !$.fn.DataTable.isDataTable('#income-expense-table')) {
            $('#income-expense-table').DataTable({
                ordering: false,
                autoWidth: false,
                pageLength: 10,
                language: {
                    search: 'Search',
                    searchPlaceholder: 'Description or type...',
                    lengthMenu: 'Show _MENU_',
                    emptyTable: 'No income or expense records found.',
                    zeroRecords: 'No matching entries found.'
                }
            });
        }
    });
</script>
