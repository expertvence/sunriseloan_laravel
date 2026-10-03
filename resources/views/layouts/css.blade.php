<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

 <style>
        /* Simplified Premium Dashboard - Theme Aware */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Theme variables already defined in theme-manager */

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-primary, #0b1120);
            min-height: 100vh;
            transition: background 0.3s ease;
        }

        /* Simple topography background - Theme aware */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                repeating-linear-gradient(45deg,
                    var(--primary-alpha, rgba(99, 102, 241, 0.03)) 0px,
                    var(--primary-alpha, rgba(99, 102, 241, 0.03)) 2px,
                    transparent 2px,
                    transparent 20px),
                repeating-linear-gradient(135deg,
                    var(--primary-alpha, rgba(99, 102, 241, 0.03)) 0px,
                    var(--primary-alpha, rgba(99, 102, 241, 0.03)) 2px,
                    transparent 2px,
                    transparent 20px);
            pointer-events: none;
            z-index: 0;
        }

        body.light-mode::before {
            --primary-alpha: rgba(99, 102, 241, 0.05);
        }

        body.dark-mode::before {
            --primary-alpha: rgba(129, 140, 248, 0.03);
        }

        /* Main Layout */
        .dashboard {
            position: relative;
            padding: 1.5rem;
            max-width: 1400px;
            margin: 0 auto;
            z-index: 1;
        }

        /* Simple Header - Theme aware */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            background: var(--card-bg, rgba(255, 255, 255, 0.03));
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            border: 1px solid var(--border-color, rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(8px);
            transition: all 0.3s ease;
        }

        .header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary, white);
        }

        .header h1 span {
            color: var(--primary, #6366f1);
            font-weight: 700;
        }

        .datetime {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .date-box,
        .time-box {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary, rgba(255, 255, 255, 0.8));
            font-size: 0.9rem;
            background: var(--card-bg, rgba(255, 255, 255, 0.03));
            padding: 0.4rem 1rem;
            border-radius: 30px;
            border: 1px solid var(--border-color, rgba(255, 255, 255, 0.05));
        }

        .date-box i,
        .time-box i {
            color: var(--primary, #6366f1);
        }

        .live-badge {
            background: var(--primary, #6366f1);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.2rem;
            margin-bottom: 2rem;
        }

        /* Cards - Theme aware */
        .card {
            background: var(--card-bg, rgba(255, 255, 255, 0.02));
            backdrop-filter: blur(8px);
            border: 1px solid var(--border-color, rgba(255, 255, 255, 0.05));
            border-radius: 20px;
            padding: 1.2rem;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            border-color: var(--primary, rgba(99, 102, 241, 0.3));
            background: var(--card-hover-bg, rgba(255, 255, 255, 0.03));
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
            color: var(--text-secondary, rgba(255, 255, 255, 0.5));
        }

        .card-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary, #6366f1);
        }

        .card-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-primary, white);
            margin-bottom: 0.3rem;
        }

        .card-trend {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.8rem;
        }

        .trend-up {
            color: var(--success, #059669);
            background: rgba(5, 150, 105, 0.1);
            padding: 0.2rem 0.6rem;
            border-radius: 30px;
        }

        .trend-down {
            color: var(--danger, #dc2626);
            background: rgba(220, 38, 38, 0.1);
            padding: 0.2rem 0.6rem;
            border-radius: 30px;
        }

        .trend-neutral {
            color: var(--text-secondary, rgba(255, 255, 255, 0.6));
            background: rgba(255, 255, 255, 0.05);
            padding: 0.2rem 0.6rem;
            border-radius: 30px;
        }

        .trend-text {
            color: var(--text-muted, rgba(255, 255, 255, 0.3));
        }

        /* Alert - Theme aware */
        .alert {
            background: rgba(217, 119, 6, 0.1);
            border-left: 3px solid var(--warning, #d97706);
            border-radius: 10px;
            padding: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-top: 0.5rem;
        }

        .alert i {
            color: var(--warning, #d97706);
        }

        .alert span {
            color: var(--warning, #fbbf24);
            font-size: 0.9rem;
        }

        /* Analytics Section - Theme aware */
        .analytics {
            background: var(--card-bg, rgba(255, 255, 255, 0.02));
            backdrop-filter: blur(8px);
            border: 1px solid var(--border-color, rgba(255, 255, 255, 0.05));
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
            color: var(--text-primary, white);
            font-size: 1.1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .analytics-header h3 i {
            color: var(--primary, #6366f1);
        }

        .analytics-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }

        .metric {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border-color, rgba(255, 255, 255, 0.05));
            border-radius: 15px;
            padding: 1rem;
        }

        .metric-label {
            font-size: 0.7rem;
            color: var(--text-secondary, rgba(255, 255, 255, 0.4));
            text-transform: uppercase;
            margin-bottom: 0.3rem;
        }

        .metric-value {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-primary, white);
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
            color: var(--success, #059669);
            background: rgba(5, 150, 105, 0.1);
        }

        .metric-change.negative {
            color: var(--danger, #dc2626);
            background: rgba(220, 38, 38, 0.1);
        }

        /* Table Section - Theme aware */
        .table-section {
            background: var(--card-bg, rgba(255, 255, 255, 0.02));
            backdrop-filter: blur(8px);
            border: 1px solid var(--border-color, rgba(255, 255, 255, 0.05));
            border-radius: 20px;
            padding: 1.5rem;
            margin-top: 1.5rem;
        }

        .table-section h5 {
            color: var(--text-primary, white);
            font-weight: 500;
        }

        .export-btn {
            background: rgba(99, 102, 241, 0.1);
            color: var(--primary, #6366f1);
            border: 1px solid rgba(99, 102, 241, 0.2);
            padding: 0.4rem 1rem;
            border-radius: 30px;
            font-size: 0.8rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .export-btn:hover {
            background: rgba(99, 102, 241, 0.2);
        }

        /* Responsive */
        @media (max-width: 1024px) {

            .stats-grid,
            .analytics-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .dashboard {
                padding: 1rem;
            }

            .header {
                flex-direction: column;
                gap: 1rem;
                align-items: start;
            }

            .datetime {
                width: 100%;
                justify-content: space-between;
            }

            .stats-grid,
            .analytics-grid {
                grid-template-columns: 1fr;
            }
        }

        /* DataTable - Theme aware */
        .dataTables_wrapper {
            color: var(--text-primary, rgba(255, 255, 255, 0.8));
        }

        .dataTables_filter input {
            background: var(--card-bg, rgba(255, 255, 255, 0.03));
            border: 1px solid var(--border-color, rgba(255, 255, 255, 0.1));
            border-radius: 30px;
            padding: 0.4rem 1rem 0.4rem 2.2rem;
            color: var(--text-primary, white);
        }

        .dataTables_filter input::placeholder {
            color: var(--text-muted, rgba(255, 255, 255, 0.5));
        }

        .dataTables_length select {
            background: var(--card-bg, rgba(255, 255, 255, 0.03));
            border: 1px solid var(--border-color, rgba(255, 255, 255, 0.1));
            color: var(--text-primary, white);
        }

        /* Light mode specific adjustments */
        body:not(.dark-mode) {
            --bg-primary: #f8fafc;
            --card-bg: #ffffff;
            --text-primary: #0f172a;
            --text-secondary: #334155;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --primary: #6366f1;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
        }

        body:not(.dark-mode) .card {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        body:not(.dark-mode) .header h1 {
            color: #0f172a;
        }

        body:not(.dark-mode) .date-box,
        body:not(.dark-mode) .time-box {
            background: #f1f5f9;
            border-color: #e2e8f0;
            color: #334155;
        }

        #page-content:has(.dashboard) {
            background: #07152b;
        }

        body.dark-mode #layoutSidenav_content:has(.income-expense-surface),
        body.dark-mode #page-content:has(.income-expense-surface) {
            background: #07152b !important;
        }

        body:not(.dark-mode) #page-content:has(.income-expense-surface) {
            background: #eef3f2;
        }

        body.dark-mode .income-expense-surface {
            background-color: #07152b;
        }

        body.dark-mode .income-expense-shell {
            border-color: transparent !important;
            background: transparent !important;
            box-shadow: none !important;
        }

        body.dark-mode #page-content:has(.admin-dashboard) {
            background: #07152b;
        }

        body.dark-mode .admin-dashboard {
            background:
                radial-gradient(ellipse at 50% -15%, rgba(13, 94, 205, 0.34), transparent 45%),
                linear-gradient(145deg, #07152b 0%, #081a35 58%, #07152b 100%);
        }

        .dashboard {
            --dash-ink: #f3f7ff;
            --dash-muted: #a9bbd9;
            --dash-line: rgba(113, 157, 221, 0.2);
            width: 100%;
            max-width: none;
            min-height: calc(100vh - 132px);
            padding: 1.25rem;
            color: var(--dash-ink);
            background:
                radial-gradient(ellipse at 50% -15%, rgba(13, 94, 205, 0.34), transparent 45%),
                linear-gradient(145deg, #07152b 0%, #081a35 58%, #07152b 100%);
        }

        .dashboard .header {
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            padding: 0.25rem 0 1rem;
            border: 0;
            border-radius: 0;
            border-bottom: 1px solid var(--dash-line);
            background: transparent;
            backdrop-filter: none;
        }

        .dashboard .dashboard-heading h1 {
            margin: 0;
            color: var(--dash-ink);
            font-size: 1.55rem;
            font-weight: 700;
        }

        .dashboard .dashboard-heading p {
            margin: 0.2rem 0 0;
            color: var(--dash-muted);
            font-size: 0.8rem;
        }

        .dashboard .datetime {
            gap: 0.5rem;
        }

        .dashboard .date-box,
        .dashboard .time-box {
            padding: 0.45rem 0.7rem;
            border: 1px solid var(--dash-line);
            border-radius: 8px;
            background: rgba(17, 39, 75, 0.85);
            color: #d6e3f8;
            font-size: 0.75rem;
            white-space: nowrap;
        }

        .dashboard .date-box i,
        .dashboard .time-box i {
            color: #a8c6ff;
        }

        .dashboard .live-badge {
            padding: 0.45rem 0.75rem;
            border: 1px solid rgba(13, 217, 165, 0.25);
            border-radius: 8px;
            background: rgba(0, 190, 143, 0.16);
            color: #61f0c6;
            animation: none;
        }

        .dashboard .stats-grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 0.8rem;
            margin-bottom: 0;
        }

        .dashboard .stats-grid > .card {
            min-width: 0;
            min-height: 112px;
            padding: 0.95rem 1rem;
            overflow: hidden;
            border: 1px solid rgba(90, 145, 221, 0.24);
            border-radius: 9px;
            background: linear-gradient(145deg, rgba(12, 37, 73, 0.96), rgba(8, 27, 56, 0.98));
            box-shadow: 0 8px 22px rgba(0, 5, 20, 0.16);
            backdrop-filter: none;
        }

        .dashboard .stats-grid > .card:hover {
            transform: translateY(-2px);
            border-color: rgba(125, 178, 255, 0.55);
            background: linear-gradient(145deg, rgba(15, 45, 88, 0.98), rgba(8, 30, 62, 0.98));
        }

        .dashboard .stats-grid > .card:nth-child(1) {
            background: linear-gradient(125deg, #0879f9, #0648c7);
            border-color: transparent;
        }

        .dashboard .stats-grid > .card:nth-child(2) {
            background: linear-gradient(125deg, #04bd91, #007c80);
            border-color: transparent;
        }

        .dashboard .stats-grid > .card:nth-child(3) {
            background: linear-gradient(125deg, #8b42ed, #4935d6);
            border-color: transparent;
        }

        .dashboard .stats-grid > .card:nth-child(4) {
            background: linear-gradient(125deg, #ffb20c, #e85b13);
            border-color: transparent;
        }

        .dashboard .stats-grid > .card .card-header {
            margin-bottom: 0.45rem;
        }

        .dashboard .stats-grid > .card .card-title {
            color: #c1d0e8;
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.04em;
        }

        .dashboard .stats-grid > .card:nth-child(-n+4) .card-title {
            color: rgba(255, 255, 255, 0.9);
        }

        .dashboard .stats-grid > .card .card-icon {
            width: 32px;
            height: 32px;
            flex: 0 0 32px;
            border-radius: 8px;
            background: rgba(117, 166, 255, 0.17);
            color: #9fc5ff;
        }

        .dashboard .stats-grid > .card:nth-child(-n+4) .card-icon {
            background: rgba(255, 255, 255, 0.18);
            color: #fff;
        }

        .dashboard .stats-grid > .card .card-value {
            margin: 0;
            color: #f7faff;
            font-size: 1.28rem;
            font-weight: 700;
            line-height: 1.3;
            overflow-wrap: anywhere;
        }

        .dashboard .stats-grid > .card .card-trend {
            min-height: 0;
            margin: 0;
        }

        .dashboard .stats-grid > .card .card-trend:empty {
            display: none;
        }

        .dashboard-insights {
            display: grid;
            grid-template-columns: repeat(12, minmax(0, 1fr));
            gap: 0.8rem;
            margin-top: 0.8rem;
        }

        .dashboard-panel {
            min-width: 0;
            padding: 0.95rem 1rem;
            border: 1px solid rgba(90, 145, 221, 0.24);
            border-radius: 9px;
            background: linear-gradient(145deg, rgba(12, 37, 73, 0.96), rgba(8, 27, 56, 0.98));
            box-shadow: 0 8px 22px rgba(0, 5, 20, 0.16);
        }

        .financial-panel { grid-column: span 7; }
        .status-panel { grid-column: span 5; }
        .recent-panel { grid-column: span 8; }
        .quick-panel { grid-column: span 4; }

        .panel-heading,
        .panel-title,
        .chart-legend,
        .status-legend > div {
            display: flex;
            align-items: center;
        }

        .panel-heading {
            min-height: 28px;
            justify-content: space-between;
            gap: 0.75rem;
        }

        .panel-title {
            min-width: 0;
            gap: 0.55rem;
        }

        .panel-title > i {
            color: #9fc5ff;
            font-size: 0.85rem;
        }

        .panel-title h2 {
            margin: 0;
            color: #eaf2ff;
            font-size: 0.82rem;
            font-weight: 650;
        }

        .panel-filter,
        .panel-icon-link,
        .panel-action-link {
            color: #bcd0ef;
            font-size: 0.68rem;
            white-space: nowrap;
        }

        .panel-filter {
            padding: 0.35rem 0.55rem;
            border: 1px solid var(--dash-line);
            border-radius: 6px;
        }

        .panel-filter i { margin-left: 0.35rem; font-size: 0.55rem; }

        .panel-icon-link {
            display: grid;
            width: 27px;
            height: 27px;
            place-items: center;
            border-radius: 7px;
            background: rgba(54, 111, 208, 0.22);
            text-decoration: none;
        }

        .panel-action-link {
            padding: 0.33rem 0.55rem;
            border-radius: 12px;
            background: #405bff;
            color: #fff;
            text-decoration: none;
        }

        .panel-action-link i { margin-left: 0.25rem; }

        .chart-legend {
            justify-content: flex-end;
            gap: 0.8rem;
            margin: 0.25rem 0 0.1rem;
            color: #a9bbd9;
            font-size: 0.61rem;
        }

        .chart-legend span { display: inline-flex; align-items: center; gap: 0.3rem; }
        .legend-dot { width: 7px; height: 7px; border-radius: 50%; }
        .income-dot { background: #04d6b1; }
        .expense-dot { background: #188dff; }
        .net-dot { background: #a16bff; }

        .financial-chart { width: 100%; height: 190px; }
        .overview-svg { display: block; width: 100%; height: 100%; overflow: visible; }
        .chart-gridline { stroke: rgba(132, 168, 220, 0.16); stroke-width: 1; }
        .chart-axis-label,
        .chart-date-label { fill: #8498b8; font-size: 10px; }
        .chart-line { fill: none; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round; }
        .income-line { stroke: #04d6b1; }
        .expense-line { stroke: #188dff; }
        .net-line { stroke: #a16bff; }
        .income-area { fill: url(#incomeFill); }
        .chart-point { stroke: #0b1d3a; stroke-width: 2; }

        .status-content {
            display: flex;
            align-items: center;
            justify-content: space-around;
            gap: 0.8rem;
            min-height: 190px;
        }

        .status-donut {
            display: grid;
            width: 144px;
            aspect-ratio: 1;
            flex: 0 0 144px;
            place-items: center;
            border-radius: 50%;
            background: conic-gradient(#f5ab31 0 var(--pending-share), #228cff var(--pending-share) var(--accepted-share), #f04d66 var(--accepted-share) 100%);
            transform: rotate(-90deg);
        }

        .status-donut[data-total="0"] { background: conic-gradient(#314969 0 100%); }

        .donut-center {
            display: flex;
            width: 68%;
            aspect-ratio: 1;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #0b1d3a;
            transform: rotate(90deg);
        }

        .donut-center strong { color: #f4f7ff; font-size: 1.25rem; line-height: 1.2; }
        .donut-center span { margin-top: 0.2rem; color: #9db0ce; font-size: 0.62rem; }

        .status-legend { display: grid; min-width: 120px; gap: 0.8rem; }
        .status-legend > div { gap: 0.45rem; color: #bdcce3; font-size: 0.68rem; }
        .status-legend strong { margin-left: auto; color: #e9f1ff; font-weight: 600; }
        .status-key { width: 7px; height: 7px; flex: 0 0 7px; border-radius: 50%; }
        .pending-key { background: #f5ab31; }
        .accepted-key { background: #228cff; }
        .rejected-key { background: #f04d66; }

        .recent-table-wrap { width: 100%; margin-top: 0.65rem; overflow-x: auto; }
        .recent-loans-table { width: 100%; border-collapse: collapse; color: #d4e0f3; font-size: 0.66rem; white-space: nowrap; }
        .recent-loans-table th { padding: 0.5rem 0.45rem; background: rgba(31, 67, 121, 0.38); color: #9cb2d3; font-size: 0.56rem; font-weight: 600; text-align: left; text-transform: uppercase; }
        .recent-loans-table td { padding: 0.48rem 0.45rem; border-bottom: 1px solid rgba(113, 157, 221, 0.11); }
        .recent-loans-table tbody tr:last-child td { border-bottom: 0; }
        .recent-loans-table .customer-cell { max-width: 155px; overflow: hidden; text-overflow: ellipsis; }
        .loan-status-pill { display: inline-block; padding: 0.2rem 0.42rem; border-radius: 4px; font-size: 0.58rem; }
        .status-pending { background: rgba(245, 171, 49, 0.19); color: #ffd07b; }
        .status-complete { background: rgba(34, 140, 255, 0.2); color: #88c1ff; }
        .status-rejected { background: rgba(240, 77, 102, 0.19); color: #ff9aa9; }
        .loan-view-link { padding: 0.18rem 0.42rem; border-radius: 4px; background: rgba(0, 137, 255, 0.22); color: #72c4ff; text-decoration: none; }
        .empty-table { padding: 1.2rem !important; color: #9db0ce; text-align: center; }

        .quick-actions { display: grid; gap: 0.55rem; margin-top: 0.75rem; }
        .quick-action {
            display: flex;
            min-height: 42px;
            align-items: center;
            gap: 0.6rem;
            padding: 0.55rem 0.7rem;
            border-radius: 7px;
            color: #fff;
            font-size: 0.68rem;
            font-weight: 600;
            text-decoration: none;
            transition: filter 0.18s ease, transform 0.18s ease;
        }

        .quick-action:hover { color: #fff; filter: brightness(1.1); transform: translateY(-1px); text-decoration: none; }
        .quick-action > i:first-child { width: 16px; text-align: center; }
        .quick-action .action-arrow { margin-left: auto; font-size: 0.62rem; }
        .member-action { background: linear-gradient(100deg, #087df3, #0870d9); }
        .request-action { background: linear-gradient(100deg, #f9a908, #e87409); }
        .list-action { background: linear-gradient(100deg, #00af91, #008b87); }

        @media (max-width: 1100px) {
            .financial-panel, .status-panel { grid-column: span 6; }
            .recent-panel { grid-column: span 8; }
            .quick-panel { grid-column: span 4; }
            .status-content { flex-direction: column; justify-content: center; padding: 0.7rem 0; }
            .status-legend { width: min(100%, 190px); }
        }

        @media (max-width: 768px) {
            .financial-panel, .status-panel, .recent-panel, .quick-panel { grid-column: 1 / -1; }
            .status-content { flex-direction: row; }
            .financial-chart { height: 170px; }
        }

        @media (max-width: 480px) {
            .dashboard-panel { padding: 0.8rem; }
            .status-content { gap: 0.55rem; }
            .status-donut { width: 120px; flex-basis: 120px; }
            .status-legend { min-width: 110px; }
            .recent-loans-table { min-width: 610px; }
        }

        body:not(.dark-mode) #page-content:has(.dashboard) {
            background: #eef2f6;
        }

        body:not(.dark-mode) .dashboard {
            --dash-ink: #1e293b;
            --dash-muted: #64748b;
            --dash-line: #d9e1ea;
            color: var(--dash-ink);
            background:
                radial-gradient(ellipse at 50% -15%, rgba(203, 213, 225, 0.34), transparent 48%),
                linear-gradient(145deg, #f6f8fb 0%, #edf1f5 58%, #f5f7fa 100%);
        }

        body:not(.dark-mode) .dashboard .header {
            border-bottom-color: #d8e0e9;
        }

        body:not(.dark-mode) .dashboard .dashboard-heading h1,
        body:not(.dark-mode) .dashboard .panel-title h2 {
            color: #1e293b;
        }

        body:not(.dark-mode) .dashboard .dashboard-heading p,
        body:not(.dark-mode) .dashboard .chart-legend,
        body:not(.dark-mode) .dashboard .panel-filter,
        body:not(.dark-mode) .dashboard .status-legend > div {
            color: #64748b;
        }

        body:not(.dark-mode) .dashboard .date-box,
        body:not(.dark-mode) .dashboard .time-box {
            border-color: #d9e1ea;
            background: #f8fafc;
            color: #475569;
        }

        body:not(.dark-mode) .dashboard .live-badge {
            border-color: #a7ebd5;
            background: #e4f8f1;
            color: #087f5b;
        }

        body:not(.dark-mode) .dashboard .stats-grid > .card,
        body:not(.dark-mode) .dashboard .stats-grid > .card:nth-child(1),
        body:not(.dark-mode) .dashboard .stats-grid > .card:nth-child(2),
        body:not(.dark-mode) .dashboard .stats-grid > .card:nth-child(3),
        body:not(.dark-mode) .dashboard .stats-grid > .card:nth-child(4) {
            border-color: #dce3eb;
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            box-shadow: 0 5px 16px rgba(30, 41, 59, 0.06);
        }

        body:not(.dark-mode) .dashboard .stats-grid > .card:hover {
            border-color: #b8c8dc;
            background: #ffffff;
        }

        body:not(.dark-mode) .dashboard .stats-grid > .card .card-title,
        body:not(.dark-mode) .dashboard .stats-grid > .card:nth-child(-n+4) .card-title {
            color: #64748b;
        }

        body:not(.dark-mode) .dashboard .stats-grid > .card .card-icon,
        body:not(.dark-mode) .dashboard .stats-grid > .card:nth-child(-n+4) .card-icon {
            background: #e8eef8;
            color: #4361c5;
        }

        body:not(.dark-mode) .dashboard .stats-grid > .card .card-value {
            color: #172338;
        }

        body:not(.dark-mode) .dashboard-panel {
            border-color: #dce3eb;
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            box-shadow: 0 5px 18px rgba(30, 41, 59, 0.055);
        }

        body:not(.dark-mode) .dashboard .panel-title > i,
        body:not(.dark-mode) .dashboard .date-box i,
        body:not(.dark-mode) .dashboard .time-box i {
            color: #536da9;
        }

        body:not(.dark-mode) .dashboard .panel-filter {
            border-color: #d9e1ea;
            background: #f8fafc;
        }

        body:not(.dark-mode) .dashboard .chart-gridline {
            stroke: #e1e7ef;
        }

        body:not(.dark-mode) .dashboard .chart-axis-label,
        body:not(.dark-mode) .dashboard .chart-date-label {
            fill: #75839a;
        }

        body:not(.dark-mode) .dashboard .chart-point {
            stroke: #fff;
        }

        body:not(.dark-mode) .dashboard .status-donut[data-total="0"] {
            background: conic-gradient(#dbe3ec 0 100%);
        }

        body:not(.dark-mode) .dashboard .donut-center {
            background: #f8fafc;
        }

        body:not(.dark-mode) .dashboard .donut-center strong,
        body:not(.dark-mode) .dashboard .status-legend strong {
            color: #1e293b;
        }

        body:not(.dark-mode) .dashboard .donut-center span {
            color: #64748b;
        }

        body:not(.dark-mode) .dashboard .recent-loans-table {
            color: #334155;
        }

        body:not(.dark-mode) .dashboard .recent-loans-table th {
            background: #eef2f7;
            color: #64748b;
        }

        body:not(.dark-mode) .dashboard .recent-loans-table td {
            border-bottom-color: #e8edf3;
        }

        body:not(.dark-mode) .dashboard .empty-table {
            color: #64748b;
        }

        @media (max-width: 1100px) {
            .dashboard .stats-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 768px) {
            .dashboard {
                padding: 1rem;
            }

            .dashboard .header {
                align-items: flex-start;
            }

            .dashboard .datetime {
                flex-wrap: wrap;
                justify-content: flex-start;
            }

            .dashboard .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 480px) {
            .dashboard .header {
                flex-direction: column;
            }

            .dashboard .stats-grid {
                grid-template-columns: 1fr;
            }
        }
        /* Desktop-wide forms: keep the current small-screen layout unchanged. */
        @media (min-width: 1200px) {
            #page-content > *:has(form) {
                width: min(1680px, calc(100% - 40px));
                max-width: 1680px;
                margin-left: auto;
                margin-right: auto;
            }

            #page-content > *:has(form) :is(.container, .container-sm, .container-md, .container-lg, .container-xl, .container-xxl, .container-fluid) {
                width: 100%;
                max-width: none !important;
            }

            #page-content > *:has(form) :is(.loan-commit-entry, .loan-request-card, .deposit-page-shell, .income-expense-surface, .asset-page-shell, .form-card, .form-container) {
                width: 100%;
                max-width: none;
            }
        }
    </style>