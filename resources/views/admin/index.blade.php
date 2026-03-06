<main>
 

    <div class="dashboard">
        <!-- Header -->
        <div class="header">
            <div>
                <h1>Sun<span>Rise</span></h1>
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
