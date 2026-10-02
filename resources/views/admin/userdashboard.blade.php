<style>
    .user-dashboard {
        --user-ink: #e9f5f3;
        --user-muted: #9bb9b6;
        --user-line: rgba(84, 190, 169, 0.2);
        max-width: none;
        min-height: calc(100vh - 132px);
        padding: 1.25rem;
        color: var(--user-ink);
        background:
            radial-gradient(ellipse at 70% -20%, rgba(10, 148, 123, 0.25), transparent 45%),
            linear-gradient(145deg, #092c31 0%, #0b252d 55%, #102934 100%);
    }

    .user-dashboard .user-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.2rem;
        padding: 0.35rem 0 1rem;
        border-bottom: 1px solid var(--user-line);
    }

    .user-dashboard .user-heading h1 {
        margin: 0;
        color: var(--user-ink);
        font-size: 1.55rem;
        font-weight: 700;
    }

    .user-dashboard .user-heading p {
        margin: 0.25rem 0 0;
        color: var(--user-muted);
        font-size: 0.82rem;
    }

    .user-dashboard .user-datetime {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .user-dashboard .user-date,
    .user-dashboard .user-time {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.45rem 0.7rem;
        border: 1px solid var(--user-line);
        border-radius: 7px;
        background: rgba(17, 61, 65, 0.7);
        color: #d1e8e3;
        font-size: 0.73rem;
        white-space: nowrap;
    }

    .user-dashboard .user-date i,
    .user-dashboard .user-time i { color: #70d6bf; }

    .user-dashboard .user-live {
        padding: 0.45rem 0.7rem;
        border: 1px solid rgba(73, 208, 167, 0.25);
        border-radius: 7px;
        background: rgba(15, 148, 108, 0.18);
        color: #77e0bc;
        font-size: 0.67rem;
        font-weight: 700;
    }

    .user-dashboard .user-dashboard-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.6rem;
        margin-bottom: 0.85rem;
    }

    .user-dashboard .user-dashboard-action {
        display: inline-flex;
        min-height: 40px;
        align-items: center;
        gap: 0.55rem;
        padding: 0.55rem 0.8rem;
        border: 1px solid var(--user-line);
        border-radius: 7px;
        background: rgba(17, 61, 65, 0.7);
        color: #d1e8e3;
        font-size: 0.76rem;
        font-weight: 650;
        text-decoration: none;
    }

    .user-dashboard .user-dashboard-action:hover { border-color: #58c5aa; color: #fff; text-decoration: none; }
    .user-dashboard .user-dashboard-action .action-arrow { margin-left: 0.25rem; font-size: 0.65rem; }
    .user-dashboard .user-dashboard-action.primary-action { border-color: #087e72; background: linear-gradient(105deg, #087e72, #0a9a7c); color: #fff; }

    .user-dashboard .user-stats-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0.85rem;
    }

    .user-dashboard .user-stat-card {
        position: relative;
        display: flex;
        min-height: 142px;
        flex-direction: column;
        justify-content: space-between;
        gap: 1rem;
        overflow: hidden;
        padding: 1rem 1.1rem;
        border: 1px solid rgba(95, 177, 164, 0.2);
        border-radius: 10px;
        background: linear-gradient(145deg, rgba(19, 62, 67, 0.95), rgba(13, 47, 56, 0.98));
        box-shadow: 0 8px 22px rgba(0, 10, 17, 0.18);
        transition: transform 0.2s ease, border-color 0.2s ease;
    }

    .user-dashboard .user-stat-card:hover {
        transform: translateY(-2px);
        border-color: rgba(105, 219, 191, 0.48);
    }

    .user-dashboard .user-stat-card::after {
        position: absolute;
        right: -24px;
        bottom: -38px;
        width: 110px;
        height: 110px;
        border: 1px solid rgba(131, 225, 198, 0.1);
        border-radius: 50%;
        content: '';
        pointer-events: none;
    }

    .user-dashboard .user-stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.8rem;
    }

    .user-dashboard .user-stat-label {
        color: #b0cbc7;
        font-size: 0.72rem;
        font-weight: 650;
        text-transform: uppercase;
    }

    .user-dashboard .user-stat-icon {
        display: grid;
        width: 36px;
        height: 36px;
        flex: 0 0 36px;
        place-items: center;
        border-radius: 9px;
        background: rgba(65, 192, 163, 0.16);
        color: #74ddc0;
    }

    .user-dashboard .user-stat-value {
        color: #f2fbf9;
        font-size: clamp(1.3rem, 1.7vw, 1.75rem);
        font-weight: 720;
        line-height: 1.25;
        overflow-wrap: anywhere;
    }

    .user-dashboard .user-stat-note {
        color: #89aaa6;
        font-size: 0.69rem;
    }

    .user-dashboard .user-stat-card.principal-card {
        border-color: rgba(39, 190, 155, 0.35);
        background: linear-gradient(125deg, #087f75, #075e65);
    }

    .user-dashboard .user-stat-card.principal-card .user-stat-label,
    .user-dashboard .user-stat-card.principal-card .user-stat-value,
    .user-dashboard .user-stat-card.principal-card .user-stat-note,
    .user-dashboard .user-stat-card.principal-card .user-stat-icon { color: #f0fffb; }

    .user-dashboard .user-stat-card.principal-card .user-stat-icon { background: rgba(255, 255, 255, 0.16); }

    .user-dashboard .user-stat-card.balance-card .user-stat-icon { color: #f1c878; background: rgba(215, 161, 65, 0.15); }
    .user-dashboard .user-stat-card.interest-card .user-stat-icon { color: #91c9ef; background: rgba(67, 148, 193, 0.16); }

    .user-dashboard .user-status-row {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0.85rem;
        margin-top: 0.85rem;
    }

    .user-dashboard .user-status-panel {
        display: flex;
        align-items: center;
        gap: 0.85rem;
        padding: 0.9rem 1rem;
        border: 1px solid rgba(95, 177, 164, 0.18);
        border-radius: 9px;
        background: rgba(13, 48, 57, 0.8);
    }

    .user-dashboard .user-status-icon {
        display: grid;
        width: 34px;
        height: 34px;
        flex: 0 0 34px;
        place-items: center;
        border-radius: 8px;
        background: rgba(220, 171, 77, 0.15);
        color: #e3ba69;
    }

    .user-dashboard .user-status-panel.rejected .user-status-icon {
        background: rgba(226, 102, 111, 0.14);
        color: #ef9b9f;
    }

    .user-dashboard .user-status-copy { flex: 1; }
    .user-dashboard .user-status-label { color: #9dbbb6; font-size: 0.7rem; }
    .user-dashboard .user-status-value { margin-top: 0.15rem; color: #f1f8f6; font-size: 1.12rem; font-weight: 700; }
    .user-dashboard .user-status-tag { color: #8eaaa5; font-size: 0.66rem; }

    body:not(.dark-mode) #page-content:has(.user-dashboard) { background: #edf4f2; }

    body:not(.dark-mode) .user-dashboard {
        --user-ink: #173a3b;
        --user-muted: #607c7b;
        --user-line: #d2e1de;
        color: var(--user-ink);
        background:
            radial-gradient(ellipse at 70% -20%, rgba(156, 218, 202, 0.28), transparent 45%),
            linear-gradient(145deg, #f5f9f7 0%, #eaf2ef 55%, #f4f8f6 100%);
    }

    body:not(.dark-mode) .user-dashboard .user-heading h1 { color: #173a3b; }
    body:not(.dark-mode) .user-dashboard .user-heading p { color: #607c7b; }
    body:not(.dark-mode) .user-dashboard .user-date,
    body:not(.dark-mode) .user-dashboard .user-time { border-color: #d2e1de; background: #f8fbfa; color: #496967; }
    body:not(.dark-mode) .user-dashboard .user-date i,
    body:not(.dark-mode) .user-dashboard .user-time i { color: #148573; }
    body:not(.dark-mode) .user-dashboard .user-live { border-color: #b9e8d8; background: #e5f6ef; color: #087e61; }
    body:not(.dark-mode) .user-dashboard .user-dashboard-action { border-color: #d2e1de; background: #fff; color: #315b56; }
    body:not(.dark-mode) .user-dashboard .user-dashboard-action.primary-action { border-color: #087e72; background: linear-gradient(105deg, #087e72, #0a9a7c); color: #fff; }
    body:not(.dark-mode) .user-dashboard .user-stat-card {
        border-color: #d6e4e0;
        background: linear-gradient(145deg, #ffffff, #f7faf9);
        box-shadow: 0 6px 18px rgba(26, 67, 59, 0.06);
    }
    body:not(.dark-mode) .user-dashboard .user-stat-card.principal-card { border-color: #b8dfd5; background: linear-gradient(125deg, #d9f0e8, #c8e9df); }
    body:not(.dark-mode) .user-dashboard .user-stat-card.principal-card .user-stat-label,
    body:not(.dark-mode) .user-dashboard .user-stat-card.principal-card .user-stat-value,
    body:not(.dark-mode) .user-dashboard .user-stat-card.principal-card .user-stat-note { color: #174f4b; }
    body:not(.dark-mode) .user-dashboard .user-stat-card.principal-card .user-stat-icon { color: #147b6c; background: rgba(20, 123, 108, 0.1); }
    body:not(.dark-mode) .user-dashboard .user-stat-label { color: #607c7b; }
    body:not(.dark-mode) .user-dashboard .user-stat-value { color: #173a3b; }
    body:not(.dark-mode) .user-dashboard .user-stat-note { color: #718987; }
    body:not(.dark-mode) .user-dashboard .user-stat-icon { background: #e7f1ee; color: #16816f; }
    body:not(.dark-mode) .user-dashboard .user-stat-card.interest-card .user-stat-icon { background: #e9f1f6; color: #4383a5; }
    body:not(.dark-mode) .user-dashboard .user-stat-card.balance-card .user-stat-icon { background: #f7f0e3; color: #a1762d; }
    body:not(.dark-mode) .user-dashboard .user-status-panel { border-color: #d6e4e0; background: rgba(255, 255, 255, 0.78); }
    body:not(.dark-mode) .user-dashboard .user-status-label { color: #607c7b; }
    body:not(.dark-mode) .user-dashboard .user-status-value { color: #173a3b; }
    body:not(.dark-mode) .user-dashboard .user-status-tag { color: #718987; }

    @media (max-width: 900px) {
        .user-dashboard .user-stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }

    @media (max-width: 600px) {
        .user-dashboard { padding: 1rem; }
        .user-dashboard .user-header { align-items: flex-start; flex-direction: column; }
        .user-dashboard .user-datetime { width: 100%; }
        .user-dashboard .user-stats-grid,
        .user-dashboard .user-status-row { grid-template-columns: 1fr; }
        .user-dashboard .user-stat-card { min-height: 124px; }
    }
</style>

<main>
    <div class="dashboard user-dashboard">
        <header class="user-header">
            <div class="user-heading">
                <h1>My Dashboard</h1>
                <p>Welcome back, {{ Auth::user()->name ?? 'Member' }}. Here is your loan overview.</p>
            </div>
            <div class="user-datetime">
                <span class="user-date"><i class="far fa-calendar-alt"></i><span id="currentDate">Loading...</span></span>
                <span class="user-time"><i class="far fa-clock"></i><span id="currentTime">Loading...</span></span>
                <span class="user-live">ACCOUNT OVERVIEW</span>
            </div>
        </header>

        <nav class="user-dashboard-actions" aria-label="Loan request actions">
            <a href="{{ route('loan-request') }}" class="user-dashboard-action primary-action"><i class="fas fa-plus"></i><span>Request a loan</span></a>
            <a href="{{ route('my-loan-requests') }}" class="user-dashboard-action"><i class="fas fa-list-check"></i><span>My Loan Requests</span><i class="fas fa-arrow-right action-arrow"></i></a>
        </nav>

        <section class="user-stats-grid" aria-label="Loan summary">
            <article class="user-stat-card">
                <div class="user-stat-top"><span class="user-stat-label">Approved Loans</span><span class="user-stat-icon"><i class="fas fa-file-circle-check"></i></span></div>
                <div class="user-stat-value">{{ number_format($countLoan ?? 0) }}</div>
                <div class="user-stat-note">Completed loan accounts</div>
            </article>
            <article class="user-stat-card principal-card">
                <div class="user-stat-top"><span class="user-stat-label">Total Loan Amount</span><span class="user-stat-icon"><i class="fas fa-coins"></i></span></div>
                <div class="user-stat-value">৳{{ number_format($totalLoanAmt ?? 0, 2) }}</div>
                <div class="user-stat-note">Principal across completed loans</div>
            </article>
            <article class="user-stat-card interest-card">
                <div class="user-stat-top"><span class="user-stat-label">Total Loan Interest</span><span class="user-stat-icon"><i class="fas fa-chart-line"></i></span></div>
                <div class="user-stat-value">৳{{ number_format($loanInterest ?? 0, 2) }}</div>
                <div class="user-stat-note">Calculated interest</div>
            </article>
            <article class="user-stat-card">
                <div class="user-stat-top"><span class="user-stat-label">Total with Interest</span><span class="user-stat-icon"><i class="fas fa-file-invoice-dollar"></i></span></div>
                <div class="user-stat-value">৳{{ number_format($loanInterestWithAmount ?? 0, 2) }}</div>
                <div class="user-stat-note">Principal plus interest</div>
            </article>
            <article class="user-stat-card balance-card">
                <div class="user-stat-top"><span class="user-stat-label">Remaining Amount</span><span class="user-stat-icon"><i class="fas fa-wallet"></i></span></div>
                <div class="user-stat-value">৳{{ number_format($remainingAmount ?? 0, 2) }}</div>
                <div class="user-stat-note">Based on approved commitments</div>
            </article>
            <article class="user-stat-card">
                <div class="user-stat-top"><span class="user-stat-label">Latest Payment Month</span><span class="user-stat-icon"><i class="far fa-calendar-check"></i></span></div>
                <div class="user-stat-value">{{ $latestMonth ?? 'N/A' }}</div>
                <div class="user-stat-note">Most recent approved payment</div>
            </article>
        </section>

        <section class="user-status-row" aria-label="Loan request status">
            <article class="user-status-panel">
                <span class="user-status-icon"><i class="fas fa-hourglass-half"></i></span>
                <div class="user-status-copy"><div class="user-status-label">Pending applications</div><div class="user-status-value">{{ number_format($pendingLoan ?? 0) }}</div></div>
                <span class="user-status-tag">Awaiting review</span>
            </article>
            <article class="user-status-panel rejected">
                <span class="user-status-icon"><i class="fas fa-circle-xmark"></i></span>
                <div class="user-status-copy"><div class="user-status-label">Rejected applications</div><div class="user-status-value">{{ number_format($rejectedLoan ?? 0) }}</div></div>
                <span class="user-status-tag">Application history</span>
            </article>
        </section>
    </div>
</main>
<!-- Font Awesome -->

<script>
    // Simple function to update time - this WILL work
    function startLiveClock() {
        console.log("Clock started");

        const dateElement = document.getElementById('currentDate');
        const timeElement = document.getElementById('currentTime');

        if (!dateElement || !timeElement) {
            console.error("Time elements not found!");
            return;
        }

        function update() {
            const now = new Date();

            // Simple date formatting
            const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            const dayName = days[now.getDay()];
            const monthName = months[now.getMonth()];
            const day = now.getDate();
            const year = now.getFullYear();

            dateElement.textContent = `${dayName}, ${day} ${monthName} ${year}`;

            // Simple time formatting
            let hours = now.getHours();
            let minutes = now.getMinutes();
            let seconds = now.getSeconds();
            const ampm = hours >= 12 ? 'PM' : 'AM';

            hours = hours % 12;
            hours = hours ? hours : 12;

            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            timeElement.textContent = `${hours}:${minutes}:${seconds} ${ampm}`;
        }

        update();
        setInterval(update, 1000);
    }

    // Start the clock when page loads
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', startLiveClock);
    } else {
        startLiveClock();
    }

    // DataTable initialization
    $(document).ready(function() {
        if ($.fn.DataTable) {
            $(".data-table").DataTable({
                "ordering": false,
                "pageLength": 10,
                "responsive": true,
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search...",
                    "lengthMenu": "Show _MENU_",
                }
            });
        }
    });

    // Theme change listener for this page
    window.addEventListener('themeChanged', function(e) {
        console.log('Theme changed to:', e.detail.theme);
        // Page will auto-update via CSS variables
    });
</script>
