<main>
 

    <div class="dashboard admin-dashboard">
        <!-- Header -->
        <div class="header">
            <div class="dashboard-heading">
                <h1>Dashboard</h1>
                <p>Welcome to your loan management dashboard</p>
            </div>
            <div class="datetime">
                <div class="date-box">
                    <i class="far fa-calendar-alt"></i>
                    <span id="currentDate">Loading...</span>
                </div>
                <div class="time-box">
                    <i class="far fa-clock"></i>
                    <span id="currentTime">Loading...</span>
                </div>
                <span class="live-badge">LIVE</span>
            </div>
        </div>

        <!-- Stats Grid (your existing PHP code remains exactly the same) -->
        <div class="stats-grid">
            <!-- Total Assets -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Total Assets</span>
                    <span class="card-icon"><i class="fas fa-building"></i></span>
                </div>
                <div class="card-value">৳{{ number_format($totalAssets ?? 0, 2) }}</div>
                
            </div>

            <!-- Total Loan -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Total Loan</span>
                    <span class="card-icon"><i class="fas fa-hand-holding-usd"></i></span>
                </div>
                <div class="card-value">৳{{ number_format($loan ?? 0, 2) }}</div>
                
            </div>

            <!-- Total Profit -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Total Profit</span>
                    <span class="card-icon"><i class="fas fa-chart-pie"></i></span>
                </div>
                <div class="card-value">৳{{ number_format($totalProfit ?? 0, 2) }}</div>
               
            </div>

            <!-- Remaining Amount -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Remaining</span>
                    <span class="card-icon"><i class="fas fa-wallet"></i></span>
                </div>
                {{-- @if ($warningMessage)
                    <div class="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>{{ $warningMessage }}</span>
                    </div>
                @else --}}
                    <div class="card-value">৳{{ number_format($remainingAmount ?? 0, 2) }}</div>
                    <div class="card-trend">
                        {{-- <span class="trend-neutral"><i class="fas fa-minus"></i> Stable</span>
                        <span class="trend-text">Available</span> --}}
                    </div>
                {{-- @endif --}}
            </div>

            <!-- Total Users -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Total Member</span>
                    <span class="card-icon"><i class="fas fa-users"></i></span>
                </div>
                <div class="card-value">{{ number_format($totalUser ?? 0) }}</div>
                
            </div>
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Active Member</span>
                    <span class="card-icon"><i class="fas fa-users"></i></span>
                </div>
                <div class="card-value">{{ number_format($activeUser ?? 0) }}</div>
               
            </div>
            {{-- <div class="card">
                <div class="card-header">
                    <span class="card-title">Total Manager</span>
                    <span class="card-icon"><i class="fas fa-users"></i></span>
                </div>
                <div class="card-value">{{ number_format($totalManager ?? 0) }}</div>
               
            </div> --}}
            {{-- <div class="card">
                <div class="card-header">
                    <span class="card-title">Active Manager</span>
                    <span class="card-icon"><i class="fas fa-users"></i></span>
                </div>
                <div class="card-value">{{ number_format($activeManger ?? 0) }}</div>
                
            </div> --}}

            <!-- Service Charge -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Service Charge</span>
                    <span class="card-icon"><i class="fas fa-file-invoice"></i></span>
                </div>
                <div class="card-value">৳{{ number_format($totalServicesCharge ?? 0, 2) }}</div>
                
            </div>

            <!-- Total Expense -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Total Expense</span>
                    <span class="card-icon"><i class="fas fa-credit-card"></i></span>
                </div>
                <div class="card-value">৳{{ number_format($totalExpence ?? 0, 2) }}</div>
                
            </div>

            <!-- Exact Capital -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Exact Capital</span>
                    <span class="card-icon"><i class="fas fa-scale-balanced"></i></span>
                </div>
                <div class="card-value">৳{{ number_format($exactAssetsWithprofitandwithoutloan ?? 0, 2) }}</div>
                
            </div>
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Total Deposit</span>
                    <span class="card-icon"><i class="fas fa-scale-balanced"></i></span>
                </div>
                <div class="card-value">
                    ৳{{ number_format($totalBalance ?? 0, 2) }}
                </div>

                
            </div>
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Total Withdraw</span>
                    <span class="card-icon"><i class="fas fa-scale-balanced"></i></span>
                </div>
                <div class="card-value">৳{{ number_format($totalWithdraw ?? 0, 2) }}</div>
                
            </div>
        </div>

        @php
            $pendingLoans = (int) ($loanStatusCounts['pending'] ?? 0);
            $acceptedLoans = (int) ($loanStatusCounts['complete'] ?? 0);
            $rejectedLoans = (int) ($loanStatusCounts['rejected'] ?? 0);
            $allLoans = $pendingLoans + $acceptedLoans + $rejectedLoans;
            $pendingShare = $allLoans ? ($pendingLoans / $allLoans) * 100 : 0;
            $acceptedShare = $allLoans ? ($acceptedLoans / $allLoans) * 100 : 0;
            $acceptedEnd = $pendingShare + $acceptedShare;
        @endphp

        <div class="dashboard-insights">
            <section class="dashboard-panel financial-panel">
                <div class="panel-heading">
                    <div class="panel-title"><i class="fas fa-chart-column"></i><h2>Financial Overview</h2></div>
                    <span class="panel-filter">Last 7 days <i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="chart-legend">
                    <span><i class="legend-dot income-dot"></i>Income</span>
                    <span><i class="legend-dot expense-dot"></i>Expense</span>
                    <span><i class="legend-dot net-dot"></i>Net</span>
                </div>
                <div class="financial-chart" data-series='@json($financialOverview)' role="img" aria-label="Daily income, expense, and net financial overview for the last seven days">
                    <svg class="overview-svg" viewBox="0 0 700 220" preserveAspectRatio="none" aria-hidden="true">
                        <defs>
                            <linearGradient id="incomeFill" x1="0" x2="0" y1="0" y2="1">
                                <stop offset="0%" stop-color="#04d6b1" stop-opacity=".22" />
                                <stop offset="100%" stop-color="#04d6b1" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                        <line class="chart-gridline" x1="38" y1="20" x2="690" y2="20" />
                        <line class="chart-gridline" x1="38" y1="65" x2="690" y2="65" />
                        <line class="chart-gridline" x1="38" y1="110" x2="690" y2="110" />
                        <line class="chart-gridline" x1="38" y1="155" x2="690" y2="155" />
                        <line class="chart-gridline" x1="38" y1="200" x2="690" y2="200" />
                        <text class="chart-axis-label" x="0" y="24">High</text>
                        <text class="chart-axis-label" x="0" y="204">0</text>
                        <path class="income-area" d="" />
                        <polyline class="chart-line income-line" points="" />
                        <polyline class="chart-line expense-line" points="" />
                        <polyline class="chart-line net-line" points="" />
                        <g class="chart-points"></g>
                        <g class="chart-labels"></g>
                    </svg>
                </div>
            </section>

            <section class="dashboard-panel status-panel">
                <div class="panel-heading">
                    <div class="panel-title"><i class="fas fa-chart-pie"></i><h2>Loan Status</h2></div>
                    <a class="panel-icon-link" href="{{ route('loan-request-list') }}" aria-label="View loan requests" title="View loan requests"><i class="fas fa-arrow-up-right-from-square"></i></a>
                </div>
                <div class="status-content">
                    <div class="status-donut" data-total="{{ $allLoans }}" style="--pending-share: {{ $pendingShare }}%; --accepted-share: {{ $acceptedEnd }}%;">
                        <div class="donut-center"><strong>{{ $allLoans }}</strong><span>Total loans</span></div>
                    </div>
                    <div class="status-legend">
                        <div><span class="status-key pending-key"></span><span>Pending</span><strong>{{ $pendingLoans }}</strong></div>
                        <div><span class="status-key accepted-key"></span><span>Accepted</span><strong>{{ $acceptedLoans }}</strong></div>
                        <div><span class="status-key rejected-key"></span><span>Rejected</span><strong>{{ $rejectedLoans }}</strong></div>
                    </div>
                </div>
            </section>

            <section class="dashboard-panel recent-panel">
                <div class="panel-heading">
                    <div class="panel-title"><i class="fas fa-file-invoice-dollar"></i><h2>Recent Loan Requests</h2></div>
                    <a class="panel-action-link" href="{{ route('loan-request-list') }}">View all <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="recent-table-wrap">
                    <table class="recent-loans-table">
                        <thead>
                            <tr><th>#</th><th>Customer</th><th>Amount</th><th>Status</th><th>Date</th><th></th></tr>
                        </thead>
                        <tbody>
                            @forelse ($recentLoanRequests as $recentLoan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="customer-cell">{{ optional($recentLoan->user)->name ?? 'Unknown member' }}</td>
                                    <td>৳{{ number_format($recentLoan->loan_amount, 2) }}</td>
                                    <td><span class="loan-status-pill status-{{ $recentLoan->status }}">{{ $recentLoan->status === 'complete' ? 'Accepted' : ucfirst($recentLoan->status) }}</span></td>
                                    <td>{{ optional($recentLoan->created_at)->format('Y-m-d') ?? '—' }}</td>
                                    <td><a class="loan-view-link" href="{{ route('loan-request-details', ['loan_ide' => $recentLoan->loan_ide]) }}">View</a></td>
                                </tr>
                            @empty
                                <tr><td class="empty-table" colspan="6">No loan requests yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="dashboard-panel quick-panel">
                <div class="panel-heading">
                    <div class="panel-title"><i class="fas fa-bolt"></i><h2>Quick Actions</h2></div>
                </div>
                <div class="quick-actions">
                    <a href="{{ route('member-register-form') }}" class="quick-action member-action"><i class="fas fa-user-plus"></i><span>Add Member</span><i class="fas fa-arrow-right action-arrow"></i></a>
                    <a href="{{ url('loan-request') }}" class="quick-action request-action"><i class="fas fa-file-circle-plus"></i><span>New Loan Request</span><i class="fas fa-arrow-right action-arrow"></i></a>
                    <a href="{{ route('loan-request-list') }}" class="quick-action list-action"><i class="fas fa-list-check"></i><span>View Loan Requests</span><i class="fas fa-arrow-right action-arrow"></i></a>
                </div>
            </section>
        </div>

        <!-- Analytics (your existing PHP code remains exactly the same) -->
        {{-- <div class="analytics">
            <div class="analytics-header">
                <h3><i class="fas fa-chart-line"></i> Key Metrics</h3>
                <span class="live-badge">UPDATED</span>
            </div>
            <div class="analytics-grid">
                @php
                    $profitMargin =
                        $totalProfit > 0 && $totalAssets > 0 ? round(($totalProfit / $totalAssets) * 100, 2) : 0;
                    $loanRatio = $loan > 0 && $totalAssets > 0 ? round(($loan / $totalAssets) * 100, 2) : 0;
                    $expenseRatio =
                        $totalExpence > 0 && $totalProfit > 0 ? round(($totalExpence / $totalProfit) * 100, 2) : 0;
                    $avgUserValue = $totalUser > 0 ? round($totalAssets / $totalUser, 0) : 0;
                @endphp

                <div class="metric">
                    <div class="metric-label">Profit Margin</div>
                    <div class="metric-value">{{ $profitMargin }}%</div>
                    <div class="metric-change positive"><i class="fas fa-arrow-up"></i> 2.3%</div>
                </div>
                <div class="metric">
                    <div class="metric-label">Loan Ratio</div>
                    <div class="metric-value">{{ $loanRatio }}%</div>
                    <div class="metric-change negative"><i class="fas fa-arrow-down"></i> 1.5%</div>
                </div>
                <div class="metric">
                    <div class="metric-label">Expense Ratio</div>
                    <div class="metric-value">{{ $expenseRatio }}%</div>
                    <div class="metric-change positive"><i class="fas fa-arrow-up"></i> 0.8%</div>
                </div>
                <div class="metric">
                    <div class="metric-label">Avg/User</div>
                    <div class="metric-value">₦{{ number_format($avgUserValue) }}</div>
                    <div class="metric-change positive"><i class="fas fa-arrow-up"></i> 12.5k</div>
                </div>
            </div>
        </div> --}}

        <!-- Data Table (your existing code remains exactly the same) -->
        @if (isset($dataTable))
            <div class="table-section">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5><i class="fas fa-table me-2" style="color: var(--primary);"></i> Transactions</h5>
                    <button class="export-btn"><i class="fas fa-download me-1"></i> Export</button>
                </div>
                {{ $dataTable->table() }}
            </div>
        @endif
    </div>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- SIMPLE AND GUARANTEED LIVE TIME SCRIPT -->
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

        (() => {
            const chart = document.querySelector('.financial-chart');
            if (!chart) return;

            const data = JSON.parse(chart.dataset.series || '[]');
            const svg = chart.querySelector('svg');
            const series = [
                { key: 'income', selector: '.income-line', color: '#04d6b1' },
                { key: 'expense', selector: '.expense-line', color: '#188dff' },
                { key: 'net', selector: '.net-line', color: '#a16bff' }
            ];
            const values = series.flatMap(item => data.map(day => Number(day[item.key]) || 0));
            const minimum = Math.min(0, ...values);
            const maximum = Math.max(0, ...values);
            const valueRange = maximum - minimum || 1;
            const xStart = 42;
            const xEnd = 686;
            const yStart = 24;
            const yEnd = 194;
            const xFor = index => data.length < 2 ? (xStart + xEnd) / 2 : xStart + (xEnd - xStart) * index / (data.length - 1);
            const yFor = value => yStart + (maximum - value) / valueRange * (yEnd - yStart);

            series.forEach(item => {
                const points = data.map((day, index) => `${xFor(index)},${yFor(Number(day[item.key]) || 0)}`);
                svg.querySelector(item.selector).setAttribute('points', points.join(' '));
            });

            const incomePoints = data.map((day, index) => `${xFor(index)},${yFor(Number(day.income) || 0)}`);
            svg.querySelector('.income-area').setAttribute('d', `M ${xStart},${yEnd} L ${incomePoints.join(' L ')} L ${xEnd},${yEnd} Z`);
            svg.querySelector('.chart-axis-label').textContent = `৳${new Intl.NumberFormat('en', { notation: 'compact', maximumFractionDigits: 1 }).format(maximum)}`;

            const pointsGroup = svg.querySelector('.chart-points');
            const labelsGroup = svg.querySelector('.chart-labels');
            const svgNamespace = 'http://www.w3.org/2000/svg';

            data.forEach((day, index) => {
                series.forEach(item => {
                    const circle = document.createElementNS(svgNamespace, 'circle');
                    circle.setAttribute('cx', xFor(index));
                    circle.setAttribute('cy', yFor(Number(day[item.key]) || 0));
                    circle.setAttribute('r', '3.2');
                    circle.setAttribute('fill', item.color);
                    circle.setAttribute('class', 'chart-point');
                    pointsGroup.appendChild(circle);
                });

                const label = document.createElementNS(svgNamespace, 'text');
                label.setAttribute('x', xFor(index));
                label.setAttribute('y', '216');
                label.setAttribute('text-anchor', 'middle');
                label.setAttribute('class', 'chart-date-label');
                label.textContent = day.label;
                labelsGroup.appendChild(label);
            });
        })();

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
</main>
