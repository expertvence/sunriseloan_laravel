<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .asset-list-page {
        --asset-ink: #e6f0ef;
        --asset-muted: #a2b6b8;
        --asset-line: #314a52;
        --asset-panel: #10243a;
        --asset-soft: #0b1d34;
        width: min(1480px, calc(100% - 40px));
        min-height: calc(100vh - 120px);
        margin: 0 auto;
        padding: 1.3rem 0;
        color: var(--asset-ink);
    }

    body.dark-mode #page-content:has(.asset-list-page) { background: #07152b; }
    body:not(.dark-mode) #page-content:has(.asset-list-page) { background: #eef3f2; }
    .asset-list-header { display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 1rem; }
    .asset-list-heading { display: flex; align-items: center; gap: 0.8rem; }
    .asset-list-icon { display: grid; width: 42px; height: 42px; flex: 0 0 42px; place-items: center; border-radius: 10px; background: #17443f; color: #78d8b9; }
    .asset-list-heading h1 { margin: 0; color: var(--asset-ink); font-size: 1.4rem; font-weight: 720; }
    .asset-list-heading p { margin: 0.25rem 0 0; color: var(--asset-muted); font-size: 0.77rem; }
    .asset-add-link { display: inline-flex; min-height: 40px; align-items: center; gap: 0.5rem; padding: 0.55rem 0.8rem; border-radius: 7px; background: linear-gradient(105deg, #147c6b, #1c9a7b); color: #fff; font-size: 0.75rem; font-weight: 700; text-decoration: none; white-space: nowrap; }
    .asset-add-link:hover { color: #fff; filter: brightness(1.06); text-decoration: none; }

    .asset-overview { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 0.7rem; margin-bottom: 0.9rem; }
    .asset-overview-card { padding: 0.8rem 0.9rem; border: 1px solid var(--asset-line); border-radius: 8px; background: var(--asset-panel); }
    .asset-overview-label { color: var(--asset-muted); font-size: 0.64rem; font-weight: 700; letter-spacing: 0.04em; text-transform: uppercase; }
    .asset-overview-value { display: block; margin-top: 0.32rem; color: var(--asset-ink); font-size: 1.05rem; font-weight: 750; overflow-wrap: anywhere; }
    .asset-overview-card.asset-total .asset-overview-value { color: #8bdfb1; }
    .asset-overview-card.loan-total .asset-overview-value { color: #a8c9f2; }
    .asset-overview-card.remaining-total .asset-overview-value { color: #88d8d0; }
    .asset-overview-card.remaining-total .asset-overview-value.is-negative { color: #f0a19a; }

    .asset-list-panel { overflow: hidden; border: 1px solid var(--asset-line); border-radius: 10px; background: var(--asset-panel); box-shadow: 0 12px 32px rgba(0, 5, 18, 0.18); }
    .asset-table-title { display: flex; align-items: center; justify-content: space-between; gap: 0.7rem; padding: 1rem 1.05rem 0.55rem; }
    .asset-table-title h2 { margin: 0; color: var(--asset-ink); font-size: 0.9rem; font-weight: 700; }
    .asset-entry-count { color: var(--asset-muted); font-size: 0.68rem; }
    .asset-table-wrap { overflow-x: auto; padding: 0 1.05rem 1rem; }
    .asset-table { width: 100%; min-width: 600px; border-collapse: separate; border-spacing: 0; }
    .asset-table thead th { padding: 0.7rem 0.75rem; background: #1a3a3d; color: #b5c9c5; font-size: 0.62rem; font-weight: 750; letter-spacing: 0.04em; text-align: left; text-transform: uppercase; white-space: nowrap; }
    .asset-table thead th:first-child { border-radius: 7px 0 0 7px; }
    .asset-table thead th:last-child { border-radius: 0 7px 7px 0; }
    .asset-table tbody td { padding: 0.75rem; border-bottom: 1px solid #263f43; color: #c5d4d4; font-size: 0.75rem; vertical-align: middle; }
    .asset-table tbody tr:hover { background: #18343a; }
    .asset-table tbody tr:last-child td { border-bottom: 0; }
    .asset-number { color: #7f9698 !important; }
    .asset-amount { color: #9de0bb !important; font-weight: 750; white-space: nowrap; }
    .asset-date { color: var(--asset-muted) !important; white-space: nowrap; }
    .asset-actions { display: flex; justify-content: center; gap: 0.4rem; }
    .asset-icon-button { display: inline-grid; width: 32px; height: 32px; place-items: center; border: 1px solid #36545b; border-radius: 7px; background: #18343a; color: #c3d5d1; cursor: pointer; }
    .asset-icon-button:hover { border-color: #4d927f; background: #1b493f; color: #a6ecd4; }
    .asset-icon-button.delete:hover { border-color: #9c5050; background: #512e32; color: #ffc1bb; }
    .asset-empty { padding: 2.4rem 1rem !important; color: var(--asset-muted) !important; text-align: center; }
    .asset-empty i { display: block; margin-bottom: 0.6rem; color: #78cdb1; font-size: 1.3rem; }

    .asset-list-page .dataTables_wrapper { padding: 0 1.05rem 0.9rem; color: var(--asset-muted); font-size: 0.73rem; }
    .asset-list-page .dataTables_wrapper .dataTables_length,
    .asset-list-page .dataTables_wrapper .dataTables_filter { margin: 0.55rem 0 0.75rem; color: var(--asset-muted); }
    .asset-list-page .dataTables_wrapper .dataTables_filter input,
    .asset-list-page .dataTables_wrapper .dataTables_length select { min-height: 34px; margin-left: 0.4rem; padding: 0.35rem 0.55rem; border: 1px solid #36505a; border-radius: 6px; background: #0b1d34; color: var(--asset-ink); }
    .asset-list-page .dataTables_wrapper .dataTables_paginate .paginate_button { margin-left: 3px; padding: 0.32rem 0.6rem; border: 1px solid #36505a !important; border-radius: 6px; background: #10243a !important; color: var(--asset-ink) !important; }
    .asset-list-page .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .asset-list-page .dataTables_wrapper .dataTables_paginate .paginate_button:hover { border-color: #16816f !important; background: #16816f !important; color: #fff !important; }

    body:not(.dark-mode) .asset-list-page { --asset-ink: #183d39; --asset-muted: #68817c; --asset-line: #d5e4de; --asset-panel: #fff; --asset-soft: #f4f9f6; }
    body:not(.dark-mode) .asset-list-page .asset-list-icon { background: #d8eee5; color: #147b69; }
    body:not(.dark-mode) .asset-add-link { color: #fff; }
    body:not(.dark-mode) .asset-overview-card { background: #fff; }
    body:not(.dark-mode) .asset-overview-card.asset-total .asset-overview-value { color: #167750; }
    body:not(.dark-mode) .asset-overview-card.loan-total .asset-overview-value { color: #436b9b; }
    body:not(.dark-mode) .asset-overview-card.remaining-total .asset-overview-value { color: #176f68; }
    body:not(.dark-mode) .asset-overview-card.remaining-total .asset-overview-value.is-negative { color: #b05248; }
    body:not(.dark-mode) .asset-list-panel { box-shadow: 0 10px 28px rgba(26, 72, 58, 0.07); }
    body:not(.dark-mode) .asset-table thead th { background: #eaf4ef; color: #5a7771; }
    body:not(.dark-mode) .asset-table tbody td { border-bottom-color: #edf1f4; color: #435269; }
    body:not(.dark-mode) .asset-table tbody tr:hover { background: #f8fbfa; }
    body:not(.dark-mode) .asset-amount { color: #167750 !important; }
    body:not(.dark-mode) .asset-icon-button { border-color: var(--asset-line); background: #f4f8f6; color: #53687d; }
    body:not(.dark-mode) .asset-icon-button:hover { border-color: #9bcdbd; background: #e7f4ef; color: #147b69; }
    body:not(.dark-mode) .asset-icon-button.delete:hover { border-color: #edb7b1; background: #fbeceb; color: #ac4d45; }
    body:not(.dark-mode) .asset-list-page .dataTables_wrapper .dataTables_filter input,
    body:not(.dark-mode) .asset-list-page .dataTables_wrapper .dataTables_length select { border-color: var(--asset-line); background: #fff; color: var(--asset-ink); }
    body:not(.dark-mode) .asset-list-page .dataTables_wrapper .dataTables_paginate .paginate_button { border-color: var(--asset-line) !important; background: #fff !important; color: var(--asset-ink) !important; }
    body:not(.dark-mode) .asset-list-page .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    body:not(.dark-mode) .asset-list-page .dataTables_wrapper .dataTables_paginate .paginate_button:hover { border-color: #16816f !important; background: #16816f !important; color: #fff !important; }

    @media (max-width: 700px) {
        .asset-list-page { width: calc(100% - 20px); padding: 0.8rem 0; }
        .asset-list-header { align-items: flex-start; flex-direction: column; }
        .asset-add-link { width: 100%; justify-content: center; }
        .asset-overview { grid-template-columns: 1fr; }
        .asset-overview-card { display: flex; align-items: center; justify-content: space-between; gap: 0.75rem; }
        .asset-overview-value { margin-top: 0; font-size: 0.95rem; text-align: right; }
        .asset-table-title { padding-right: 0.75rem; padding-left: 0.75rem; }
        .asset-table-wrap { padding-right: 0.75rem; padding-left: 0.75rem; }
        .asset-list-page .dataTables_wrapper { padding-right: 0.75rem; padding-left: 0.75rem; }
    }
</style>

<main class="asset-list-page">
    <header class="asset-list-header">
        <div class="asset-list-heading">
            <span class="asset-list-icon"><i class="fas fa-building-columns"></i></span>
            <div>
                <h1>Asset Records</h1>
                <p>Track recorded asset values and compare them with current loan exposure.</p>
            </div>
        </div>
        <a href="{{ route('index') }}" class="asset-add-link"><i class="fas fa-plus"></i> Add asset</a>
    </header>

    <section class="asset-overview" aria-label="Asset overview">
        <article class="asset-overview-card asset-total"><span class="asset-overview-label">Total assets</span><strong class="asset-overview-value">৳{{ number_format((float) $total_assets, 2) }}</strong></article>
        <article class="asset-overview-card loan-total"><span class="asset-overview-label">Loan exposure</span><strong class="asset-overview-value">৳{{ number_format((float) $totalCommite, 2) }}</strong></article>
        <article class="asset-overview-card remaining-total"><span class="asset-overview-label">Loan less assets</span><strong class="asset-overview-value {{ $remainingAmount < 0 ? 'is-negative' : '' }}">৳{{ number_format((float) $remainingAmount, 2) }}</strong></article>
    </section>

    <section class="asset-list-panel" aria-label="Asset entries">
        <div class="asset-table-title"><h2>Asset history</h2><span class="asset-entry-count">{{ count($data ?? []) }} records</span></div>
        <div class="asset-table-wrap">
            <table id="asset-records-table" class="asset-table data-table">
                <thead><tr><th>#</th><th>Asset amount</th><th>Record date</th><th>Actions</th></tr></thead>
                <tbody>
                    @forelse ($data as $value)
                        <tr>
                            <td class="asset-number">{{ $loop->iteration }}</td>
                            <td class="asset-amount">৳{{ number_format((float) $value->assets, 2) }}</td>
                            <td class="asset-date">{{ $value->date ? \Carbon\Carbon::parse($value->date)->format('d M Y') : '—' }}</td>
                            <td>
                                <div class="asset-actions">
                                    <button type="button" class="asset-icon-button open-modal btnView"
                                        data-action="{{ route('edit-assets', $value->id) }}" data-modal="common-modal-md"
                                        data-title="Edit asset" title="Edit asset" aria-label="Edit asset" data-id="{{ $value->id }}">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <button type="button" class="asset-icon-button delete delete-btn"
                                        data-id="{{ $value->id }}" data-url="{{ route('delete-asset', $value->id) }}"
                                        title="Delete asset" aria-label="Delete asset">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="asset-empty"><i class="fas fa-box-open"></i>No asset records found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</main>

<script>
    $(document).ready(function() {
        if ($.fn.DataTable && !$.fn.DataTable.isDataTable('#asset-records-table')) {
            $('#asset-records-table').DataTable({
                ordering: false,
                autoWidth: false,
                pageLength: 10,
                language: {
                    search: 'Search',
                    searchPlaceholder: 'Filter asset records...',
                    lengthMenu: 'Show _MENU_',
                    emptyTable: 'No asset records found.',
                    zeroRecords: 'No matching asset records found.'
                }
            });
        }

        $(document).on('click', '.asset-list-page .delete-btn', function() {
            const button = $(this);
            const row = button.closest('tr');

            Swal.fire({
                title: 'Delete this asset record?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete record',
                cancelButtonText: 'Keep record',
                confirmButtonColor: '#c94c45',
                cancelButtonColor: '#64748b',
                reverseButtons: true
            }).then(function(result) {
                if (!result.isConfirmed) return;
                button.prop('disabled', true);

                $.ajax({
                    url: button.data('url'),
                    type: 'DELETE',
                    data: { _token: $('meta[name="csrf-token"]').attr('content') },
                    headers: { 'Accept': 'application/json' },
                    success: function(response) {
                        if (response.title !== 'Success') {
                            button.prop('disabled', false);
                            Swal.fire('Delete failed', response.msg || 'The asset record could not be deleted.', 'error');
                            return;
                        }
                        $('#asset-records-table').DataTable().row(row).remove().draw(false);
                        Swal.fire('Deleted', response.msg || 'Asset record deleted.', 'success');
                    },
                    error: function(xhr) {
                        button.prop('disabled', false);
                        const message = xhr.responseJSON && (xhr.responseJSON.message || xhr.responseJSON.msg);
                        Swal.fire('Delete failed', message || 'The asset record could not be deleted.', 'error');
                    }
                });
            });
        });
    });
</script>
