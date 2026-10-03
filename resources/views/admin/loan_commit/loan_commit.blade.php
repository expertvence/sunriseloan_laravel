
<link rel="stylesheet" href="{{ asset('datepicker/dist/css/bootstrap-datepicker.min.css') }}">

<style>
    td {
        padding: 5px;
    }
</style>

        <div class="loan-commit-entry">
            <div class="container-fluid px-3">
            <div class="form-row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow-lg border-0 rounded-lg ">
                       
                        <div class="card-body">
                        @include('admin/loan_commit/loan_commit_form')
                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
  

            </div>
<script type="application/javascript" src="{{ asset('datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $('.date_picker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            clearBtn: true

        });
      
    </script>

<style>
    .loan-commit-entry { --deposit-ink:#e6f0ef; --deposit-muted:#a2b6b8; --deposit-line:#314a52; --deposit-panel:#10243a; --deposit-soft:#0b1d34; width:min(1480px,calc(100% - 40px)); margin:1.25rem auto; overflow:hidden; border:1px solid var(--deposit-line); border-radius:11px; background:#07152b; color:var(--deposit-ink); box-shadow:0 14px 34px rgba(0,5,18,.22); }
    .loan-commit-entry .card-body { padding:0; }
    .loan-commit-entry h1 { margin:0; padding:1.2rem 1.4rem; border-bottom:1px solid var(--deposit-line); background:linear-gradient(110deg,#0b1d34,#10243a 72%); color:var(--deposit-ink); font-size:1.12rem; font-weight:720; text-align:left!important; }
    .loan-commit-entry form { padding:1.4rem; }
    .loan-commit-entry .form-group { margin-bottom:1rem; }
    .loan-commit-entry label { display:block; margin-bottom:.4rem; color:#c1d2d4; font-size:.74rem; font-weight:700; }
    .loan-commit-entry .form-control,.loan-commit-entry .form-select { min-height:42px; border:1px solid #344e59; border-radius:7px; background:#0b1d34; color:#e6f0ef; font-size:.82rem; box-shadow:none; }
    .loan-commit-entry select[multiple] { min-height:125px; }
    .loan-commit-entry .form-control:focus,.loan-commit-entry .form-select:focus { border-color:#29a78b; box-shadow:0 0 0 3px rgba(41,167,139,.15); }
    .loan-commit-entry .btn-primary { border:0; border-radius:7px; background:linear-gradient(105deg,#147c6b,#1c9a7b); font-weight:700; }
    .loan-commit-entry #message { margin-top:.75rem; color:#f19b8e!important; }
    body:not(.dark-mode) .loan-commit-entry { --deposit-ink:#183d39; --deposit-muted:#68817c; --deposit-line:#d5e4de; --deposit-panel:#fff; --deposit-soft:#f4f9f6; background:#fff; box-shadow:0 10px 28px rgba(26,72,58,.07); }
    body:not(.dark-mode) .loan-commit-entry h1 { background:linear-gradient(110deg,#e9f4ef,#f7faf8); }
    body:not(.dark-mode) .loan-commit-entry label { color:#435c58; }
    body:not(.dark-mode) .loan-commit-entry .form-control,body:not(.dark-mode) .loan-commit-entry .form-select { border-color:#d5e4de; background:#fff; color:#183d39; }
    @media(max-width:700px) { .loan-commit-entry { width:calc(100% - 20px); margin:.8rem auto; } .loan-commit-entry form { padding:.8rem; } .loan-commit-entry h1 { padding:1rem; } }
</style>


