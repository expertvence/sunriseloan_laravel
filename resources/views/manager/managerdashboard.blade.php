<style>
    .manager-dashboard {
        --manager-ink: #28243f;
        --manager-muted: #77758b;
        --manager-primary: #5545a5;
        --manager-primary-dark: #3d327e;
        --manager-accent: #e5a943;
        --manager-border: #e9e7f0;
        --manager-surface: #ffffff;
        --manager-background: #f5f4fa;
        color: var(--manager-ink);
        background: var(--manager-background);
        border-radius: 20px;
        font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", sans-serif;
        margin: 1.25rem;
        min-height: calc(100vh - 7rem);
        padding: clamp(1rem, 3vw, 2rem);
    }
    .manager-dashboard *, .manager-dashboard *::before, .manager-dashboard *::after { box-sizing: border-box; }
    .manager-dashboard .manager-hero {
        align-items: center;
        background: linear-gradient(120deg, #342b68 0%, #5545a5 58%, #7564bf 100%);
        border-radius: 18px;
        color: #fff;
        display: flex;
        gap: 1.5rem;
        justify-content: space-between;
        margin-bottom: 1.5rem;
        min-height: 190px;
        overflow: hidden;
        padding: clamp(1.4rem, 4vw, 2.5rem);
        position: relative;
    }
    .manager-dashboard .manager-hero::after {
        background: radial-gradient(circle, rgba(255,255,255,.12) 0 2px, transparent 3px);
        background-size: 18px 18px;
        content: "";
        height: 220px;
        opacity: .55;
        position: absolute;
        right: 12%;
        top: -84px;
        transform: rotate(18deg);
        width: 220px;
    }
    .manager-dashboard .manager-hero-copy, .manager-dashboard .manager-clock { position: relative; z-index: 1; }
    .manager-dashboard .manager-eyebrow { color: #e8c984; font-size: .72rem; font-weight: 800; letter-spacing: .16em; margin: 0 0 .65rem; text-transform: uppercase; }
    .manager-dashboard .manager-hero h1 { color: #fff; font-size: clamp(1.7rem, 4vw, 2.5rem); font-weight: 750; letter-spacing: -.04em; line-height: 1.15; margin: 0; }
    .manager-dashboard .manager-hero-copy > p:last-child { color: rgba(255,255,255,.78); font-size: .95rem; margin: .65rem 0 0; max-width: 520px; }
    .manager-dashboard .manager-clock { background: rgba(28,22,64,.24); border: 1px solid rgba(255,255,255,.2); border-radius: 14px; flex: 0 0 auto; min-width: 195px; padding: 1rem 1.15rem; }
    .manager-dashboard .manager-clock-label { color: #e8c984; font-size: .67rem; font-weight: 800; letter-spacing: .13em; text-transform: uppercase; }
    .manager-dashboard .manager-clock time { color: #fff; display: block; font-size: 1.35rem; font-variant-numeric: tabular-nums; font-weight: 700; margin-top: .3rem; }
    .manager-dashboard .manager-clock-date { color: rgba(255,255,255,.75); font-size: .78rem; margin-top: .15rem; }
    .manager-dashboard .manager-section-heading { align-items: end; display: flex; justify-content: space-between; margin: 1.6rem 0 .85rem; }
    .manager-dashboard .manager-section-heading h2 { color: var(--manager-ink); font-size: 1.08rem; font-weight: 750; margin: 0; }
    .manager-dashboard .manager-section-heading p { color: var(--manager-muted); font-size: .8rem; margin: .25rem 0 0; }
    .manager-dashboard .manager-section-kicker { color: var(--manager-primary); font-size: .68rem; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
    .manager-dashboard .manager-actions-grid { display: grid; gap: .9rem; grid-template-columns: repeat(3, minmax(0, 1fr)); }
    .manager-dashboard .manager-action-card {
        align-items: flex-start;
        background: var(--manager-surface);
        border: 1px solid var(--manager-border);
        border-radius: 15px;
        color: var(--manager-ink);
        display: flex;
        gap: .95rem;
        min-height: 138px;
        padding: 1.1rem;
        text-decoration: none;
        transition: border-color .18s ease, box-shadow .18s ease, transform .18s ease;
    }
    .manager-dashboard .manager-action-card:hover, .manager-dashboard .manager-action-card:focus-visible {
        border-color: #b8afe4;
        box-shadow: 0 12px 28px rgba(55, 44, 113, .10);
        color: var(--manager-ink);
        outline: none;
        text-decoration: none;
        transform: translateY(-2px);
    }
    .manager-dashboard .manager-action-icon { align-items: center; background: #efedfa; border-radius: 12px; color: var(--manager-primary); display: inline-flex; flex: 0 0 42px; height: 42px; justify-content: center; }
    .manager-dashboard .manager-action-card:nth-child(3n + 2) .manager-action-icon { background: #fff5df; color: #a36b11; }
    .manager-dashboard .manager-action-card:nth-child(3n) .manager-action-icon { background: #e8f3ef; color: #327b62; }
    .manager-dashboard .manager-action-content { min-width: 0; }
    .manager-dashboard .manager-action-content h3 { color: var(--manager-ink); font-size: .94rem; font-weight: 750; margin: .1rem 0 .35rem; }
    .manager-dashboard .manager-action-content p { color: var(--manager-muted); font-size: .77rem; line-height: 1.5; margin: 0; }
    .manager-dashboard .manager-action-arrow { color: #a6a2b8; margin-left: auto; padding-top: .2rem; }
    .manager-dashboard .manager-workflow { align-items: center; background: #eeecf7; border: 1px solid #e2def2; border-radius: 15px; display: flex; gap: 1rem; margin-top: 1.35rem; padding: 1rem 1.1rem; }
    .manager-dashboard .manager-workflow-icon { align-items: center; background: var(--manager-primary); border-radius: 11px; color: #fff; display: inline-flex; flex: 0 0 40px; height: 40px; justify-content: center; }
    .manager-dashboard .manager-workflow-copy { flex: 1; }
    .manager-dashboard .manager-workflow-copy strong { color: var(--manager-ink); display: block; font-size: .84rem; }
    .manager-dashboard .manager-workflow-copy span { color: var(--manager-muted); display: block; font-size: .75rem; margin-top: .15rem; }
    .manager-dashboard .manager-workflow-link { color: var(--manager-primary-dark); font-size: .78rem; font-weight: 750; text-decoration: none; white-space: nowrap; }
    .manager-dashboard .manager-workflow-link:hover { text-decoration: underline; }
    @media (max-width: 900px) { .manager-dashboard .manager-actions-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
    @media (max-width: 620px) {
        .manager-dashboard { border-radius: 14px; margin: .65rem; padding: .85rem; }
        .manager-dashboard .manager-hero { align-items: flex-start; flex-direction: column; gap: 1.1rem; }
        .manager-dashboard .manager-clock { min-width: 0; width: 100%; }
        .manager-dashboard .manager-actions-grid { grid-template-columns: 1fr; }
        .manager-dashboard .manager-action-card { min-height: auto; }
        .manager-dashboard .manager-workflow { align-items: flex-start; flex-wrap: wrap; }
        .manager-dashboard .manager-workflow-link { margin-left: 3.25rem; }
    }
    @media (prefers-reduced-motion: reduce) { .manager-dashboard .manager-action-card { transition: none; } }
    .manager-dashboard .manager-metrics { display: grid; gap: .85rem; grid-template-columns: repeat(5, minmax(0, 1fr)); margin: 0 0 1.5rem; }
    .manager-dashboard .manager-metric-card { background: linear-gradient(135deg, var(--metric-soft), #fff 88%); border: 1px solid var(--metric-border); border-left: 4px solid var(--metric-accent); border-radius: 14px; color: var(--manager-ink); display: block; min-width: 0; padding: 1rem 1.05rem; text-decoration: none; transition: box-shadow .18s ease, transform .18s ease; }
    .manager-dashboard .manager-metric-card:hover, .manager-dashboard .manager-metric-card:focus-visible { box-shadow: 0 10px 24px rgba(40, 36, 63, .1); color: var(--manager-ink); outline: none; text-decoration: none; transform: translateY(-2px); }
    .manager-dashboard .manager-metric-card.members { --metric-accent: #5545a5; --metric-soft: #f1effb; --metric-border: #ded9f3; }
    .manager-dashboard .manager-metric-card.active-members { --metric-accent: #27815d; --metric-soft: #eaf6ef; --metric-border: #d4ebdc; }
    .manager-dashboard .manager-metric-card.loans { --metric-accent: #2475b8; --metric-soft: #eaf3fb; --metric-border: #d3e5f3; }
    .manager-dashboard .manager-metric-card.pending { --metric-accent: #b57918; --metric-soft: #fff5e3; --metric-border: #f2e2bf; }
    .manager-dashboard .manager-metric-card.amount { --metric-accent: #bd5368; --metric-soft: #fff0f2; --metric-border: #f2d7dc; }
    .manager-dashboard .manager-metric-top { align-items: center; color: var(--manager-muted); display: flex; font-size: .7rem; font-weight: 750; justify-content: space-between; letter-spacing: .045em; text-transform: uppercase; }
    .manager-dashboard .manager-metric-icon { align-items: center; background: color-mix(in srgb, var(--metric-accent) 12%, white); border-radius: 9px; color: var(--metric-accent); display: inline-flex; height: 32px; justify-content: center; width: 32px; }
    .manager-dashboard .manager-metric-value { color: var(--manager-ink); display: block; font-size: clamp(1.3rem, 2vw, 1.75rem); font-variant-numeric: tabular-nums; font-weight: 800; line-height: 1.2; margin-top: .7rem; overflow-wrap: anywhere; }
    .manager-dashboard .manager-metric-hint { color: var(--manager-muted); display: block; font-size: .7rem; margin-top: .25rem; }
    body.dark-mode .manager-dashboard .manager-metric-card { background: linear-gradient(135deg, color-mix(in srgb, var(--metric-accent) 18%, #10162a), #17172c 88%); border-color: color-mix(in srgb, var(--metric-accent) 32%, #29283f); border-left-color: var(--metric-accent); color: #f4f2ff; }
    body.dark-mode .manager-dashboard .manager-metric-top, body.dark-mode .manager-dashboard .manager-metric-hint { color: #aaa7bf; }
    body.dark-mode .manager-dashboard .manager-metric-value { color: #f4f2ff; }
    @media (max-width: 1100px) { .manager-dashboard .manager-metrics { grid-template-columns: repeat(3, minmax(0, 1fr)); } }
    @media (max-width: 620px) { .manager-dashboard .manager-metrics { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: .6rem; } .manager-dashboard .manager-metric-card { padding: .85rem; } }
</style>

<main>
    <div class="manager-dashboard">
        <header class="manager-hero">
            <div class="manager-hero-copy">
                <p class="manager-eyebrow">Manager workspace</p>
                <h1>Welcome, {{ Auth::user()->name ?? 'Manager' }}</h1>
                <p>Manage member records and keep loan applications moving through review.</p>
            </div>
            <div class="manager-clock" aria-label="Current date and time">
                <span class="manager-clock-label">Local time</span>
                <time id="managerCurrentTime">--:--</time>
                <div class="manager-clock-date" id="managerCurrentDate">Loading date…</div>
            </div>
        </header>

        <section class="manager-metrics" aria-label="Your manager activity">
            <a class="manager-metric-card members ajax_link" href="#" data-url="{{ route('employee-member-list') }}">
                <span class="manager-metric-top">Members added <span class="manager-metric-icon"><i class="fas fa-users" aria-hidden="true"></i></span></span>
                <strong class="manager-metric-value">{{ number_format($memberCount ?? 0) }}</strong><span class="manager-metric-hint">Open your member directory <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
            </a>
            <a class="manager-metric-card active-members ajax_link" href="#" data-url="{{ route('employee-member-list', ['status' => 'active']) }}">
                <span class="manager-metric-top">Active members <span class="manager-metric-icon"><i class="fas fa-user-check" aria-hidden="true"></i></span></span>
                <strong class="manager-metric-value">{{ number_format($activeMemberCount ?? 0) }}</strong><span class="manager-metric-hint">View member status <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
            </a>
            <a class="manager-metric-card loans ajax_link" href="#" data-url="{{ url('loan-request-list') }}">
                <span class="manager-metric-top">Loan requests <span class="manager-metric-icon"><i class="fas fa-file-invoice-dollar" aria-hidden="true"></i></span></span>
                <strong class="manager-metric-value">{{ number_format($loanRequestCount ?? 0) }}</strong><span class="manager-metric-hint">Review your submitted requests <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
            </a>
            <a class="manager-metric-card pending ajax_link" href="#" data-url="{{ route('loan-request-list', ['status' => 'pending']) }}">
                <span class="manager-metric-top">Pending review <span class="manager-metric-icon"><i class="fas fa-hourglass-half" aria-hidden="true"></i></span></span>
                <strong class="manager-metric-value">{{ number_format($pendingLoanCount ?? 0) }}</strong><span class="manager-metric-hint">Open your loan request list <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
            </a>
            <a class="manager-metric-card amount ajax_link" href="#" data-url="{{ url('loan-request-list') }}">
                <span class="manager-metric-top">Requested amount <span class="manager-metric-icon"><i class="fas fa-coins" aria-hidden="true"></i></span></span>
                <strong class="manager-metric-value">&#2547;{{ number_format($requestedLoanTotal ?? 0, 2) }}</strong><span class="manager-metric-hint">Total amount in your requests <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
            </a>
        </section>
        <section aria-labelledby="managerActionsTitle">
            <div class="manager-section-heading">
                <div><span class="manager-section-kicker">Quick access</span><h2 id="managerActionsTitle">Your day-to-day work</h2><p>Open a task directly from here.</p></div>
            </div>
            <nav class="manager-actions-grid" aria-label="Manager dashboard actions">
                <a class="manager-action-card ajax_link" href="#" data-url="{{ route('employee-member-register') }}">
                    <span class="manager-action-icon"><i class="fas fa-user-plus" aria-hidden="true"></i></span><span class="manager-action-content"><h3>Register a member</h3><p>Add a new member and enter their account details.</p></span><i class="fas fa-arrow-right manager-action-arrow" aria-hidden="true"></i>
                </a>
                <a class="manager-action-card ajax_link" href="#" data-url="{{ route('employee-member-list') }}">
                    <span class="manager-action-icon"><i class="fas fa-users" aria-hidden="true"></i></span><span class="manager-action-content"><h3>Member directory</h3><p>Find a member and review their registration information.</p></span><i class="fas fa-arrow-right manager-action-arrow" aria-hidden="true"></i>
                </a>
                <a class="manager-action-card ajax_link" href="#" data-url="{{ url('loan-request-list') }}">
                    <span class="manager-action-icon"><i class="fas fa-inbox" aria-hidden="true"></i></span><span class="manager-action-content"><h3>Loan requests</h3><p>Review incoming applications and member requests.</p></span><i class="fas fa-arrow-right manager-action-arrow" aria-hidden="true"></i>
                </a>
                <a class="manager-action-card ajax_link" href="#" data-url="{{ url('loan-commite') }}">
                    <span class="manager-action-icon"><i class="fas fa-file-signature" aria-hidden="true"></i></span><span class="manager-action-content"><h3>Loan commitments</h3><p>Record and manage loan commitment details.</p></span><i class="fas fa-arrow-right manager-action-arrow" aria-hidden="true"></i>
                </a>
                <a class="manager-action-card ajax_link" href="#" data-url="{{ url('loan-request-list') }}">
                    <span class="manager-action-icon"><i class="fas fa-clipboard-check" aria-hidden="true"></i></span><span class="manager-action-content"><h3>Approval list</h3><p>Check the current status of submitted loan applications.</p></span><i class="fas fa-arrow-right manager-action-arrow" aria-hidden="true"></i>
                </a>
                <a class="manager-action-card ajax_link" href="#" data-url="{{ url('manager-profile') }}">
                    <span class="manager-action-icon"><i class="fas fa-user-gear" aria-hidden="true"></i></span><span class="manager-action-content"><h3>Account settings</h3><p>Review your manager profile and account details.</p></span><i class="fas fa-arrow-right manager-action-arrow" aria-hidden="true"></i>
                </a>
            </nav>
        </section>

        <aside class="manager-workflow" aria-label="Loan review workflow">
            <span class="manager-workflow-icon"><i class="fas fa-route" aria-hidden="true"></i></span>
            <div class="manager-workflow-copy"><strong>Loan review workflow</strong><span>Start with requests, record commitments, then check the approval list.</span></div>
            <a class="manager-workflow-link ajax_link" href="#" data-url="{{ url('loan-request-list') }}">View loan requests <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
        </aside>
    </div>
</main>

<script>
(function () {
    function updateManagerClock() {
        var now = new Date();
        var time = document.getElementById('managerCurrentTime');
        var date = document.getElementById('managerCurrentDate');
        if (!time || !date) return;
        time.textContent = new Intl.DateTimeFormat(undefined, { hour: 'numeric', minute: '2-digit' }).format(now);
        date.textContent = new Intl.DateTimeFormat(undefined, { weekday: 'long', month: 'short', day: 'numeric', year: 'numeric' }).format(now);
    }
    updateManagerClock();
    window.setInterval(updateManagerClock, 60000);
})();
</script>
