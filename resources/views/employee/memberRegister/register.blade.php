<style>
.employee-member-page{padding:1.25rem}.employee-member-page .employee-member-page-heading{align-items:center;display:flex;gap:1rem;margin:0 auto 1.1rem;max-width:1180px}.employee-member-page .employee-member-page-icon{align-items:center;background:#e7eef6;border-radius:13px;color:#174d79;display:inline-flex;height:46px;justify-content:center;width:46px}.employee-member-page h1{color:#132b45;font-size:1.45rem;font-weight:750;margin:0}.employee-member-page .employee-member-page-heading p{color:#64748b;font-size:.86rem;margin:.25rem 0 0}
</style>
<div class="employee-member-page">
    <header class="employee-member-page-heading">
        <span class="employee-member-page-icon"><i class="fas fa-user-plus" aria-hidden="true"></i></span>
        <span><h1>Add member</h1><p>Create a member profile and add their contact and nominee information.</p></span>
    </header>
    @include('employee/memberRegister/reg_create_form')
</div>
