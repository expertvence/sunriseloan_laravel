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
    </style>