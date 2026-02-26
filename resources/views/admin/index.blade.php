<main>
    <style>
        /* Simplified Premium Dashboard */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --success: #059669;
            --danger: #dc2626;
            --warning: #d97706;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0b1120;
            min-height: 100vh;
        }

        /* Simple topography background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                repeating-linear-gradient(45deg, 
                    rgba(99, 102, 241, 0.03) 0px, 
                    rgba(99, 102, 241, 0.03) 2px,
                    transparent 2px, 
                    transparent 20px),
                repeating-linear-gradient(135deg, 
                    rgba(99, 102, 241, 0.03) 0px, 
                    rgba(99, 102, 241, 0.03) 2px,
                    transparent 2px, 
                    transparent 20px);
            pointer-events: none;
            z-index: 0;
        }

        /* Main Layout */
        .dashboard {
            position: relative;
            padding: 1.5rem;
            max-width: 1400px;
            margin: 0 auto;
            z-index: 1;
        }

        /* Simple Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: white;
        }

        .header h1 span {
            color: var(--primary);
            font-weight: 700;
        }

        .datetime {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .date-box, .time-box {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            background: rgba(255, 255, 255, 0.03);
            padding: 0.4rem 1rem;
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .date-box i, .time-box i {
            color: var(--primary);
        }

        .live-badge {
            background: var(--primary);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.2rem;
            margin-bottom: 2rem;
        }

        /* Simple Cards */
        .card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 1.2rem;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            border-color: rgba(99, 102, 241, 0.3);
            background: rgba(255, 255, 255, 0.03);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.8rem;
        }

        .card-title {
            font-size: 0.8rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: rgba(255, 255, 255, 0.5);
        }

        .card-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary);
        }

        .card-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.3rem;
        }

        .card-trend {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.8rem;
        }

        .trend-up {
            color: var(--success);
            background: rgba(5, 150, 105, 0.1);
            padding: 0.2rem 0.6rem;
            border-radius: 30px;
        }

        .trend-down {
            color: var(--danger);
            background: rgba(220, 38, 38, 0.1);
            padding: 0.2rem 0.6rem;
            border-radius: 30px;
        }

        .trend-neutral {
            color: rgba(255, 255, 255, 0.6);
            background: rgba(255, 255, 255, 0.05);
            padding: 0.2rem 0.6rem;
            border-radius: 30px;
        }

        .trend-text {
            color: rgba(255, 255, 255, 0.3);
        }

        /* Alert */
        .alert {
            background: rgba(217, 119, 6, 0.1);
            border-left: 3px solid var(--warning);
            border-radius: 10px;
            padding: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-top: 0.5rem;
        }

        .alert i {
            color: var(--warning);
        }

        .alert span {
            color: #fbbf24;
            font-size: 0.9rem;
        }

        /* Analytics Section */
        .analytics {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 1.5rem;
            margin-top: 1.5rem;
        }

        .analytics-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.2rem;
        }

        .analytics-header h3 {
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .analytics-header h3 i {
            color: var(--primary);
        }

        .analytics-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }

        .metric {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 1rem;
        }

        .metric-label {
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.4);
            text-transform: uppercase;
            margin-bottom: 0.3rem;
        }

        .metric-value {
            font-size: 1.3rem;
            font-weight: 600;
            color: white;
            margin-bottom: 0.2rem;
        }

        .metric-change {
            font-size: 0.7rem;
            display: inline-flex;
            align-items: center;
            gap: 0.2rem;
            padding: 0.2rem 0.5rem;
            border-radius: 20px;
        }

        .metric-change.positive {
            color: var(--success);
            background: rgba(5, 150, 105, 0.1);
        }

        .metric-change.negative {
            color: var(--danger);
            background: rgba(220, 38, 38, 0.1);
        }

        /* Table Section */
        .table-section {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 1.5rem;
            margin-top: 1.5rem;
        }

        .table-section h5 {
            color: white;
            font-weight: 500;
        }

        .export-btn {
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary);
            border: 1px solid rgba(99, 102, 241, 0.2);
            padding: 0.4rem 1rem;
            border-radius: 30px;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }

        .export-btn:hover {
            background: rgba(99, 102, 241, 0.2);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .stats-grid, .analytics-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .dashboard { padding: 1rem; }
            .header { flex-direction: column; gap: 1rem; align-items: start; }
            .datetime { width: 100%; justify-content: space-between; }
            .stats-grid, .analytics-grid { grid-template-columns: 1fr; }
        }

        /* DataTable */
        .dataTables_wrapper { color: rgba(255, 255, 255, 0.8); }
        .dataTables_filter input {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 0.4rem 1rem 0.4rem 2.2rem;
            color: white;
        }
        .dataTables_length select {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
        }
    </style>

    <div class="dashboard">
        <!-- Header -->
        <div class="header">
            <div>
                <h1>Fin<span>Dash</span></h1>
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

        <!-- Stats Grid -->
        <div class="stats-grid">
            <!-- Total Assets -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Total Assets</span>
                    <span class="card-icon"><i class="fas fa-building"></i></span>
                </div>
                <div class="card-value">₦{{ number_format($totalAssets, 2) }}</div>
                <div class="card-trend">
                    <span class="trend-up"><i class="fas fa-arrow-up"></i> 12.5%</span>
                    <span class="trend-text">vs last month</span>
                </div>
            </div>

            <!-- Total Loan -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Total Loan</span>
                    <span class="card-icon"><i class="fas fa-hand-holding-usd"></i></span>
                </div>
                <div class="card-value">₦{{ number_format($loan, 2) }}</div>
                <div class="card-trend">
                    <span class="trend-down"><i class="fas fa-arrow-down"></i> 3.2%</span>
                    <span class="trend-text">vs last month</span>
                </div>
            </div>

            <!-- Total Profit -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Total Profit</span>
                    <span class="card-icon"><i class="fas fa-chart-pie"></i></span>
                </div>
                <div class="card-value">₦{{ number_format($totalProfit, 2) }}</div>
                <div class="card-trend">
                    <span class="trend-up"><i class="fas fa-arrow-up"></i> 18.3%</span>
                    <span class="trend-text">vs last month</span>
                </div>
            </div>

            <!-- Remaining Amount -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Remaining</span>
                    <span class="card-icon"><i class="fas fa-wallet"></i></span>
                </div>
                @if($warningMessage)
                    <div class="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>{{ $warningMessage }}</span>
                    </div>
                @else
                    <div class="card-value">₦{{ number_format($remainingAmount, 2) }}</div>
                    <div class="card-trend">
                        <span class="trend-neutral"><i class="fas fa-minus"></i> Stable</span>
                        <span class="trend-text">Available</span>
                    </div>
                @endif
            </div>

            <!-- Total Users -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Total Users</span>
                    <span class="card-icon"><i class="fas fa-users"></i></span>
                </div>
                <div class="card-value">{{ number_format($totalUser) }}</div>
                <div class="card-trend">
                    <span class="trend-up"><i class="fas fa-arrow-up"></i> 5.7%</span>
                    <span class="trend-text">new this month</span>
                </div>
            </div>

            <!-- Service Charge -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Service Charge</span>
                    <span class="card-icon"><i class="fas fa-file-invoice"></i></span>
                </div>
                <div class="card-value">₦{{ number_format($totalServicesCharge, 2) }}</div>
                <div class="card-trend">
                    <span class="trend-up"><i class="fas fa-arrow-up"></i> 2.1%</span>
                    <span class="trend-text">vs last month</span>
                </div>
            </div>

            <!-- Total Expense -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Total Expense</span>
                    <span class="card-icon"><i class="fas fa-credit-card"></i></span>
                </div>
                <div class="card-value">₦{{ number_format($totalExpence, 2) }}</div>
                <div class="card-trend">
                    <span class="trend-down"><i class="fas fa-arrow-down"></i> 8.4%</span>
                    <span class="trend-text">reduced</span>
                </div>
            </div>

            <!-- Exact Capital -->
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Exact Capital</span>
                    <span class="card-icon"><i class="fas fa-scale-balanced"></i></span>
                </div>
                <div class="card-value">₦{{ number_format($exactAssetsWithprofitandwithoutloan, 2) }}</div>
                <div class="card-trend">
                    <span class="trend-up"><i class="fas fa-arrow-up"></i> 9.2%</span>
                    <span class="trend-text">net position</span>
                </div>
            </div>
        </div>

        <!-- Analytics -->
        <div class="analytics">
            <div class="analytics-header">
                <h3><i class="fas fa-chart-line"></i> Key Metrics</h3>
                <span class="live-badge">UPDATED</span>
            </div>
            <div class="analytics-grid">
                @php
                    $profitMargin = $totalProfit > 0 && $totalAssets > 0 ? round(($totalProfit / $totalAssets) * 100, 2) : 0;
                    $loanRatio = $loan > 0 && $totalAssets > 0 ? round(($loan / $totalAssets) * 100, 2) : 0;
                    $expenseRatio = $totalExpence > 0 && $totalProfit > 0 ? round(($totalExpence / $totalProfit) * 100, 2) : 0;
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
        </div>

        <!-- Data Table -->
        @if(isset($dataTable))
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
            console.log("Clock started"); // Debug: Check if script runs
            
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
                hours = hours ? hours : 12; // 0 becomes 12
                
                // Add leading zeros
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;
                
                timeElement.textContent = `${hours}:${minutes}:${seconds} ${ampm}`;
            }
            
            // Update immediately
            update();
            
            // Update every second (1000 milliseconds)
            setInterval(update, 1000);
        }

        // Start the clock when page loads
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', startLiveClock);
        } else {
            // DOM already loaded
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
    </script>
</main>