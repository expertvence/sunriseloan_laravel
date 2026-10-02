<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .deposit-list-page {
        --deposit-ink: #e6f0ef;
        --deposit-muted: #a2b6b8;
        --deposit-line: #314a52;
        --deposit-panel: #10243a;
        --deposit-soft: #0b1d34;
        width: min(1480px, calc(100% - 40px));
        min-height: calc(100vh - 120px);
        margin: 0 auto;
        padding: 1.3rem 0;
        color: var(--deposit-ink);
    }

    body.dark-mode #page-content:has(.deposit-list-page) { background: #07152b; }
    body:not(.dark-mode) #page-content:has(.deposit-list-page) { background: #eef3f2; }

    .deposit-list-header { display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 1rem; }
    .deposit-list-title { display: flex; align-items: center; gap: 0.8rem; }
    .deposit-list-title-icon { display: grid; width: 42px; height: 42px; flex: 0 0 42px; place-items: center; border-radius: 10px; background: #17443f; color: #78d8b9; }
    .deposit-list-title h1 { margin: 0; color: var(--deposit-ink); font-size: 1.4rem; font-weight: 720; }
    .deposit-list-title p { margin: 0.25rem 0 0; color: var(--deposit-muted); font-size: 0.77rem; }
    .deposit-add-link { display: inline-flex; min-height: 40px; align-items: center; gap: 0.5rem; padding: 0.55rem 0.8rem; border-radius: 7px; background: linear-gradient(105deg, #147c6b, #1c9a7b); color: #fff; font-size: 0.75rem; font-weight: 700; text-decoration: none; white-space: nowrap; }
    .deposit-add-link:hover { color: #fff; filter: brightness(1.06); text-decoration: none; }

    .deposit-list-panel { overflow: hidden; border: 1px solid var(--deposit-line); border-radius: 10px; background: var(--deposit-panel); box-shadow: 0 12px 32px rgba(0, 5, 18, 0.18); }
    .deposit-summary { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 0.7rem; padding: 0.9rem; border-bottom: 1px solid var(--deposit-line); background: linear-gradient(110deg, #0b1d34, #10243a); }
    .deposit-summary-card { min-width: 0; padding: 0.75rem 0.85rem; border: 1px solid #294455; border-radius: 8px; background: #10243a; }
    .deposit-summary-label { display: flex; align-items: center; gap: 0.4rem; color: var(--deposit-muted); font-size: 0.64rem; font-weight: 700; letter-spacing: 0.04em; text-transform: uppercase; }
    .deposit-summary-label i { color: #78d8b9; }
    .deposit-summary-value { display: block; margin-top: 0.35rem; color: #e7f3f0; font-size: 1.08rem; font-weight: 750; overflow-wrap: anywhere; }
    .deposit-summary-card.deposited .deposit-summary-value { color: #8bdfb1; }
    .deposit-summary-card.released .deposit-summary-value { color: #f1a59d; }
    .deposit-summary-card.balance .deposit-summary-value { color: #88d8d0; }

    .deposit-table-title { display: flex; align-items: center; justify-content: space-between; gap: 0.7rem; padding: 1rem 1.05rem 0.55rem; }
    .deposit-table-title h2 { margin: 0; color: var(--deposit-ink); font-size: 0.9rem; font-weight: 700; }
    .deposit-count { color: var(--deposit-muted); font-size: 0.68rem; }
    .deposit-table-wrap { overflow-x: auto; padding: 0 1.05rem 1rem; }
    .deposit-table { width: 100%; min-width: 800px; border-collapse: separate; border-spacing: 0; }
    .deposit-table thead th { padding: 0.7rem 0.75rem; background: #1a3a3d; color: #b5c9c5; font-size: 0.62rem; font-weight: 750; letter-spacing: 0.04em; text-align: left; text-transform: uppercase; white-space: nowrap; }
    .deposit-table thead th:first-child { border-radius: 7px 0 0 7px; }
    .deposit-table thead th:last-child { border-radius: 0 7px 7px 0; }
    .deposit-table tbody td { padding: 0.75rem; border-bottom: 1px solid #263f43; color: #c5d4d4; font-size: 0.74rem; vertical-align: middle; }
    .deposit-table tbody tr:hover { background: #18343a; }
    .deposit-table tbody tr:last-child td { border-bottom: 0; }
    .deposit-row-number { color: #7f9698 !important; }
    .deposit-member-name { color: #e6f0ef; font-weight: 650; }
    .deposit-description { max-width: 360px; overflow-wrap: anywhere; }
    .deposit-kind { display: inline-flex; align-items: center; gap: 0.35rem; padding: 0.25rem 0.48rem; border-radius: 5px; font-size: 0.63rem; font-weight: 700; }
    .deposit-kind.is-deposit { background: #1b4939; color: #9de0bb; }
    .deposit-kind.is-release { background: #512e32; color: #f0aaa4; }
    .deposit-money { font-weight: 750; white-space: nowrap; }
    .deposit-money.is-deposit { color: #8fdeb6; }
    .deposit-money.is-release { color: #f0a19a; }
    .deposit-edit-button { display: inline-grid; width: 32px; height: 32px; place-items: center; border: 1px solid #36545b; border-radius: 7px; background: #18343a; color: #b6d1ca; cursor: pointer; }
    .deposit-edit-button:hover { border-color: #4d927f; background: #1b493f; color: #a6ecd4; }
    .deposit-empty { padding: 2.5rem 1rem !important; color: var(--deposit-muted) !important; text-align: center; }
    .deposit-empty i { display: block; margin-bottom: 0.6rem; color: #78cdb1; font-size: 1.3rem; }

    .deposit-list-page .dataTables_wrapper { padding: 0 1.05rem 0.9rem; color: var(--deposit-muted); font-size: 0.73rem; }
    .deposit-list-page .dataTables_wrapper .dataTables_length,
    .deposit-list-page .dataTables_wrapper .dataTables_filter { margin: 0.55rem 0 0.75rem; color: var(--deposit-muted); }
    .deposit-list-page .dataTables_wrapper .dataTables_filter input,
    .deposit-list-page .dataTables_wrapper .dataTables_length select { min-height: 34px; margin-left: 0.4rem; padding: 0.35rem 0.55rem; border: 1px solid #36505a; border-radius: 6px; background: #0b1d34; color: var(--deposit-ink); }
    .deposit-list-page .dataTables_wrapper .dataTables_paginate .paginate_button { margin-left: 3px; padding: 0.32rem 0.6rem; border: 1px solid #36505a !important; border-radius: 6px; background: #10243a !important; color: var(--deposit-ink) !important; }
    .deposit-list-page .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .deposit-list-page .dataTables_wrapper .dataTables_paginate .paginate_button:hover { border-color: #16816f !important; background: #16816f !important; color: #fff !important; }

    body:not(.dark-mode) .deposit-list-page { --deposit-ink: #183d39; --deposit-muted: #68817c; --deposit-line: #d5e4de; --deposit-panel: #fff; --deposit-soft: #f4f9f6; }
    body:not(.dark-mode) .deposit-list-title-icon { background: #d8eee5; color: #147b69; }
    body:not(.dark-mode) .deposit-list-panel { box-shadow: 0 10px 28px rgba(26, 72, 58, 0.07); }
    body:not(.dark-mode) .deposit-summary { border-bottom-color: var(--deposit-line); background: linear-gradient(110deg, #e9f4ef, #f7faf8); }
    body:not(.dark-mode) .deposit-summary-card { border-color: var(--deposit-line); background: #fff; }
    body:not(.dark-mode) .deposit-summary-value { color: #183d39; }
    body:not(.dark-mode) .deposit-summary-card.deposited .deposit-summary-value { color: #167750; }
    body:not(.dark-mode) .deposit-summary-card.released .deposit-summary-value { color: #b05248; }
    body:not(.dark-mode) .deposit-summary-card.balance .deposit-summary-value { color: #176f68; }
    body:not(.dark-mode) .deposit-table thead th { background: #eaf4ef; color: #5a7771; }
    body:not(.dark-mode) .deposit-table tbody td { border-bottom-color: #edf1f4; color: #435269; }
    body:not(.dark-mode) .deposit-table tbody tr:hover { background: #f8fbfa; }
    body:not(.dark-mode) .deposit-member-name { color: #25354a; }
    body:not(.dark-mode) .deposit-kind.is-deposit { background: #e3f4eb; color: #19734e; }
    body:not(.dark-mode) .deposit-kind.is-release { background: #fbeceb; color: #ac4d45; }
    body:not(.dark-mode) .deposit-money.is-deposit { color: #167750; }
    body:not(.dark-mode) .deposit-money.is-release { color: #b05248; }
    body:not(.dark-mode) .deposit-edit-button { border-color: var(--deposit-line); background: #f4f8f6; color: #53687d; }
    body:not(.dark-mode) .deposit-edit-button:hover { border-color: #9bcdbd; background: #e7f4ef; color: #147b69; }
    body:not(.dark-mode) .deposit-list-page .dataTables_wrapper .dataTables_filter input,
    body:not(.dark-mode) .deposit-list-page .dataTables_wrapper .dataTables_length select { border-color: var(--deposit-line); background: #fff; color: var(--deposit-ink); }
    body:not(.dark-mode) .deposit-list-page .dataTables_wrapper .dataTables_paginate .paginate_button { border-color: var(--deposit-line) !important; background: #fff !important; color: var(--deposit-ink) !important; }
    body:not(.dark-mode) .deposit-list-page .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    body:not(.dark-mode) .deposit-list-page .dataTables_wrapper .dataTables_paginate .paginate_button:hover { border-color: #16816f !important; background: #16816f !important; color: #fff !important; }

    @media (max-width: 700px) {
        .deposit-list-page { width: calc(100% - 20px); padding: 0.8rem 0; }
        .deposit-list-header { align-items: flex-start; flex-direction: column; }
        .deposit-add-link { width: 100%; justify-content: center; }
        .deposit-summary { grid-template-columns: 1fr; padding: 0.7rem; }
        .deposit-summary-card { display: flex; align-items: center; justify-content: space-between; gap: 0.75rem; }
        .deposit-summary-value { margin-top: 0; font-size: 0.95rem; text-align: right; }
        .deposit-table-title { padding-right: 0.75rem; padding-left: 0.75rem; }
        .deposit-table-wrap { padding-right: 0.75rem; padding-left: 0.75rem; }
        .deposit-list-page .dataTables_wrapper { padding-right: 0.75rem; padding-left: 0.75rem; }
    }
</style>

<main class="deposit-list-page">
    <header class="deposit-list-header">
        <div class="deposit-list-title">
            <span class="deposit-list-title-icon"><i class="fas fa-money-bill-transfer"></i></span>
            <div>
                <h1>Member Deposits</h1>
                <p>Review deposits, releases, and current net balance.</p>
            </div>
        </div>
        <a href="{{ route('deposite-add-form') }}" class="deposit-add-link"><i class="fas fa-plus"></i> Add transaction</a>
    </header>

    <section class="deposit-list-panel" aria-label="Member deposit records">
        <div class="deposit-summary">
            <article class="deposit-summary-card deposited"><span class="deposit-summary-label"><i class="fas fa-arrow-down"></i> Total deposits</span><strong class="deposit-summary-value">৳<span id="deposit-total">0.00</span></strong></article>
            <article class="deposit-summary-card released"><span class="deposit-summary-label"><i class="fas fa-arrow-up"></i> Total released</span><strong class="deposit-summary-value">৳<span id="release-total">0.00</span></strong></article>
            <article class="deposit-summary-card balance"><span class="deposit-summary-label"><i class="fas fa-scale-balanced"></i> Net balance</span><strong class="deposit-summary-value">৳<span id="net-balance">0.00</span></strong></article>
        </div>

        <div class="deposit-table-title">
            <h2>Transaction history</h2>
            <span class="deposit-count">{{ count($deposit ?? []) }} entries</span>
        </div>

        <div class="deposit-table-wrap">
            <table id="member-deposit-table" class="deposit-table data-table">
                <thead>
                    <tr><th>#</th><th>Date</th><th>Member</th><th>Description</th><th>Type</th><th>Deposit</th><th>Released</th><th>Action</th></tr>
                </thead>
                <tbody>
                    @forelse ($deposit as $value)
                        <tr>
                            <td class="deposit-row-number">{{ $loop->iteration }}</td>
                            <td>{{ $value->deposit_date ? date('d M Y', strtotime($value->deposit_date)) : '—' }}</td>
                            <td class="deposit-member-name">{{ $value->member_name }}</td>
                            <td class="deposit-description">{{ $value->description ?: '—' }}</td>
                            <td>
                                <span class="deposit-kind {{ $value->deposit_type === 'deposite' ? 'is-deposit' : 'is-release' }}">
                                    <i class="fas {{ $value->deposit_type === 'deposite' ? 'fa-arrow-down' : 'fa-arrow-up' }}"></i>
                                    {{ $value->deposit_type === 'deposite' ? 'Deposit' : 'Release' }}
                                </span>
                            </td>
                            <td class="deposit-money is-deposit">{{ $value->deposit_type === 'deposite' ? '৳' . number_format((float) $value->deposite_amount, 2) : '—' }}</td>
                            <td class="deposit-money is-release">{{ $value->deposit_type === 'relesed' ? '৳' . number_format((float) $value->deposite_amount, 2) : '—' }}</td>
                            <td>
                                <button type="button" class="deposit-edit-button open-modal btnView"
                                    data-action="{{ route('deposit-edit', $value->id) }}"
                                    data-modal="common-modal-md" data-title="Edit deposit" data-id="{{ $value->id }}"
                                    aria-label="Edit deposit" title="Edit transaction">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="deposit-empty"><i class="fas fa-receipt"></i>No deposit transactions found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</main>

<script>
    $(document).ready(function() {
        let depositTotal = 0;
        let releaseTotal = 0;

        $('#member-deposit-table tbody tr').each(function() {
            const type = $(this).find('.deposit-kind').text().trim();
            const amountSelector = type === 'Deposit' ? '.deposit-money.is-deposit' : '.deposit-money.is-release';
            const amount = Number($(this).find(amountSelector).text().replace(/[^0-9.-]/g, '')) || 0;

            if (type === 'Deposit') depositTotal += amount;
            if (type === 'Release') releaseTotal += amount;
        });

        const formatAmount = value => new Intl.NumberFormat('en-BD', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(value);
        $('#deposit-total').text(formatAmount(depositTotal));
        $('#release-total').text(formatAmount(releaseTotal));
        $('#net-balance').text(formatAmount(depositTotal - releaseTotal));

        if ($.fn.DataTable && !$.fn.DataTable.isDataTable('#member-deposit-table')) {
            $('#member-deposit-table').DataTable({
                ordering: false,
                autoWidth: false,
                scrollX: true,
                pageLength: 10,
                language: {
                    search: 'Search',
                    searchPlaceholder: 'Member or description...',
                    lengthMenu: 'Show _MENU_',
                    emptyTable: 'No deposit transactions found.',
                    zeroRecords: 'No matching transactions found.'
                }
            });
        }
    });
</script>
