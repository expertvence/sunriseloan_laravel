<style>
.employee-members-page{--emp-ink:#132b45;--emp-muted:#64748b;--emp-primary:#1c5b88;--emp-border:#e2e8f0;--emp-surface:#fff;background:#f4f7fb;border-radius:18px;margin:1rem;padding:clamp(.9rem,2vw,1.5rem)}.employee-members-page *{box-sizing:border-box}.employee-members-page .members-heading{align-items:center;display:flex;justify-content:space-between;margin-bottom:1rem}.employee-members-page .members-heading h1{color:var(--emp-ink);font-size:1.45rem;font-weight:750;margin:0}.employee-members-page .members-heading p{color:var(--emp-muted);font-size:.84rem;margin:.3rem 0 0}.employee-members-page .members-heading-icon{align-items:center;background:#e2edf7;border-radius:13px;color:var(--emp-primary);display:inline-flex;height:46px;justify-content:center;margin-right:.8rem;width:46px}.employee-members-page .members-heading-title{align-items:center;display:flex}.employee-members-page .members-total{background:#e5eef7;border:1px solid #d3e1ee;border-radius:30px;color:#174d79;font-size:.78rem;font-weight:750;padding:.45rem .8rem;white-space:nowrap}.employee-members-page .members-table-card{background:var(--emp-surface);border:1px solid var(--emp-border);border-radius:16px;box-shadow:0 8px 24px rgba(15,35,60,.05);overflow:hidden;padding:1rem}.employee-members-page .members-table-card .dataTables_wrapper{color:var(--emp-muted);font-size:.83rem}.employee-members-page .dataTables_wrapper .dataTables_filter input,.employee-members-page .dataTables_wrapper .dataTables_length select{border:1px solid #d5dfeb;border-radius:8px;margin:0 .3rem;padding:.45rem .6rem}.employee-members-page table.dataTable{border-collapse:collapse!important;border-spacing:0!important;width:100%!important}.employee-members-page table.dataTable thead th{background:#f1f5f9;border-bottom:1px solid #dfe7f0;color:#51647a;font-size:.7rem;font-weight:750;letter-spacing:.06em;padding:.85rem .7rem;text-transform:uppercase;white-space:nowrap}.employee-members-page table.dataTable tbody td{border-bottom:1px solid #edf1f5;color:#34465a;font-size:.82rem;padding:.8rem .7rem;vertical-align:middle}.employee-members-page table.dataTable tbody tr:hover{background:#f7faff}.employee-members-page .member-name{color:#173c60;font-weight:700}.employee-members-page .member-code{background:#eef3f8;border-radius:6px;color:#536b82;font-size:.75rem;padding:.25rem .45rem}.employee-members-page .member-status{border-radius:30px;display:inline-block;font-size:.7rem;font-weight:750;padding:.3rem .58rem}.employee-members-page .member-status-active{background:#dcf4e8;color:#16734b}.employee-members-page .member-status-inactive{background:#edf0f4;color:#596b7d}.employee-members-page .member-status-rejected{background:#fde7e7;color:#ae3f42}.employee-members-page .member-actions{display:flex;gap:.4rem;white-space:nowrap}.employee-members-page .member-action{align-items:center;border:1px solid #dfe6ee;border-radius:8px;display:inline-flex;height:34px;justify-content:center;text-decoration:none;width:36px}.employee-members-page .member-action-view{background:#edf5fb;color:#1c5b88}.employee-members-page .member-action-edit{background:#fff5df;color:#9a6712;cursor:pointer}.employee-members-page .member-action:hover{filter:brightness(.96)}.employee-members-page .dataTables_wrapper .dataTables_paginate .paginate_button.current{background:#1c5b88!important;border:1px solid #1c5b88!important;border-radius:7px;color:#fff!important}.employee-members-page .dataTables_wrapper .dataTables_paginate .paginate_button{border-radius:7px}.employee-members-page .dataTables_empty{padding:2rem!important}.employee-members-page .table-responsive{border-radius:10px}@media(max-width:640px){.employee-members-page{margin:.5rem;padding:.75rem}.employee-members-page .members-heading{align-items:flex-start;gap:.5rem}.employee-members-page .members-heading h1{font-size:1.2rem}.employee-members-page .members-total{font-size:.7rem}.employee-members-page .members-table-card{padding:.65rem}}
</style>
<section class="employee-members-page">
    <header class="members-heading">
        <div class="members-heading-title"><span class="members-heading-icon"><i class="fas fa-users" aria-hidden="true"></i></span><span><h1>Member directory</h1><p>Search member profiles and manage registration details.</p></span></div>
        <span class="members-total"><i class="fas fa-user-group" aria-hidden="true"></i> {{ count($data ?? []) }} members</span>
    </header>
    <div class="members-table-card">
        <div class="table-responsive">
            <table id="datatablesSimple" class="data-table table" width="100%">
                <thead><tr><th>#</th><th>Member code</th><th>Name</th><th>Father's name</th><th>Mother's name</th><th>Email</th><th>Status</th><th>Created by</th><th>Actions</th></tr></thead>
                <tbody>
                    @foreach ($data ?? [] as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="member-code">{{ $value->Uid ?: '—' }}</span></td>
                            <td class="member-name">{{ $value->name }}</td>
                            <td>{{ $value->fathers_name ?: '—' }}</td>
                            <td>{{ $value->mothers_name ?: '—' }}</td>
                            <td>{{ $value->email ?: '—' }}</td>
                            <td>
                                @if ($value->status == 'active')<span class="member-status member-status-active">Active</span>
                                @elseif ($value->status == 'inactive')<span class="member-status member-status-inactive">Inactive</span>
                                @else<span class="member-status member-status-rejected">{{ ucfirst($value->status ?: 'Unknown') }}</span>@endif
                            </td>
                            <td>{{ $value->created_by ?: '—' }}</td>
                            <td><div class="member-actions">
                                <a href="{{ route('show-employee', $value->id) }}" target="_blank" rel="noopener" class="member-action member-action-view" aria-label="View {{ $value->name }}" title="View profile"><i class="fas fa-eye" aria-hidden="true"></i></a>
                                <button type="button" class="member-action member-action-edit open-modal btnView" data-action="{{ route('employee-mem-register-form', $value->id) }}" data-modal="common-modal-md" data-title="Edit member" data-id="{{ $value->id }}" aria-label="Edit {{ $value->name }}" title="Edit member"><i class="fas fa-pen" aria-hidden="true"></i></button>
                            </div></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
$(function () {
    if ($.fn.DataTable && !$.fn.DataTable.isDataTable('#datatablesSimple')) {
        $('#datatablesSimple').DataTable({ ordering: true, autoWidth: false, pageLength: 10, language: { search: '', searchPlaceholder: 'Search members…', emptyTable: 'No members have been added yet.' } });
    }
});
</script>

