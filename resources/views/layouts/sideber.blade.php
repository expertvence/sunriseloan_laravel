<nav class="sb-sidenav accordion sb-sidenav-dark {{ Auth::user()->user_type === 'user' ? 'user-sidenav' : '' }}" id="sidenavAccordion"
    style="background: linear-gradient(165deg, #0a0c15 0%, #0f1220 50%, #1a1f2f 100%); color: #F8F8FF; margin-top: 0rem; margin-right: auto; border-right: 1px solid rgba(147, 112, 219, 0.15); box-shadow: 10px 0 30px -10px rgba(0, 0, 0, 0.5), inset -1px 0 0 rgba(255, 255, 255, 0.03); height: 100vh; position: sticky; top: 0;">

    <style>
        /* Ultra Premium Sidebar Styling - Fixed Scrolling Issue */
        .sb-sidenav {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            /* Changed from overflow-y: hidden */
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Make menu area scrollable */
        .sb-sidenav-menu {
            flex: 1 1 auto;
            overflow-y: auto !important;
            overflow-x: hidden;
            scrollbar-width: none;
            -ms-overflow-style: none;
            position: relative;
            z-index: 1;
            min-height: 0;
            /* Important for flex child scrolling */
        }

        .sb-sidenav-menu::-webkit-scrollbar {
            display: none;
            width: 0;
            background: transparent;
        }

        /* Glass effect overlay - fixed positioning */
        .sb-sidenav::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 0% 0%, rgba(147, 112, 219, 0.1) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        /* User Profile - Fixed at Top */
        .sidebar-user-profile {
            background: linear-gradient(180deg, rgba(99, 102, 241, 0.2), rgba(20, 20, 35, 0.9));
            border-bottom: 2px solid rgba(147, 112, 219, 0.4);
            padding: 1.2rem 1.2rem 1rem;
            margin: 0;
            position: relative;
            z-index: 2;
            backdrop-filter: blur(10px);
            border-radius: 0;
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.3);
            flex-shrink: 0;
            /* Prevent shrinking */
        }

        .sidebar-user-profile::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #8b5cf6, #c084fc, #8b5cf6, transparent);
        }

        .user-avatar-large {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #6366f1, #a855f7, #ec4899);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4);
            border: 2px solid rgba(255, 255, 255, 0.2);
            flex-shrink: 0;
        }

        .live-dot {
            position: relative;
            width: 10px;
            height: 10px;
        }

        .live-dot::before {
            content: '';
            position: absolute;
            width: 10px;
            height: 10px;
            background: #10b981;
            border-radius: 50%;
            box-shadow: 0 0 0 rgba(16, 185, 129, 0.4);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        .user-status {
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.5);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .user-name-large {
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            line-height: 1.3;
            margin-bottom: 0.2rem;
            word-break: break-word;
        }

        .user-role-badge {
            background: linear-gradient(135deg, #6366f1, #a855f7);
            padding: 0.2rem 0.8rem;
            border-radius: 20px;
            font-size: 0.6rem;
            font-weight: 600;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        /* Menu Headings */
        .sb-sidenav-menu-heading {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: rgba(255, 255, 255, 0.4) !important;
            padding: 1.2rem 1.2rem 0.4rem 1.2rem !important;
            margin: 0;
            text-align: left;
            position: relative;
        }

        .sb-sidenav-menu-heading::before {
            content: '';
            position: absolute;
            left: 1.2rem;
            bottom: 0;
            width: 25px;
            height: 2px;
            background: linear-gradient(90deg, #6366f1, transparent);
        }

        /* Navigation Links */
        .sb-sidenav-menu .nav-link {
            color: rgba(255, 255, 255, 0.7) !important;
            padding: 0.7rem 1.2rem !important;
            margin: 0.1rem 0.5rem;
            border-radius: 8px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            white-space: nowrap;
            border: 1px solid transparent;
            text-align: left;
            position: relative;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        /* Left accent bar */
        .sb-sidenav-menu .nav-link .accent-bar {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 0;
            background: linear-gradient(180deg, #6366f1, #c084fc);
            border-radius: 0 3px 3px 0;
            transition: height 0.3s ease;
        }

        .sb-sidenav-menu .nav-link:hover .accent-bar,
        .sb-sidenav-menu .nav-link.active .accent-bar {
            height: 60%;
        }

        .sb-sidenav-menu .nav-link:hover {
            color: white !important;
            background: rgba(99, 102, 241, 0.15);
            border-color: rgba(147, 112, 219, 0.2);
            transform: translateX(3px);
        }

        .sb-sidenav-menu .nav-link.active {
            color: white !important;
            background: linear-gradient(90deg, rgba(147, 112, 219, 0.2), rgba(147, 112, 219, 0.05));
            border-left: 3px solid #8b5cf6;
        }

        /* Icon styling */
        .sb-nav-link-icon {
            font-size: 1rem !important;
            margin-right: 0.8rem !important;
            width: 20px;
            text-align: center;
            color: rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .nav-link:hover .sb-nav-link-icon {
            color: #a78bfa !important;
            transform: scale(1.1);
        }

        .user-sidenav {
            --member-accent: #36c3a2;
            --member-ink: #e8f5f1;
            --member-muted: #9bb9b2;
            --member-line: rgba(92, 190, 165, 0.18);
            border-right-color: var(--member-line) !important;
            box-shadow: 10px 0 30px -10px rgba(0, 20, 23, 0.38), inset -1px 0 0 rgba(255, 255, 255, 0.025) !important;
        }

        body:not(.dark-mode) .user-sidenav {
            --member-accent: #287459;
            --member-ink: #183d2f;
            --member-muted: #456a54;
            --member-line: #9dc99b;
            background: linear-gradient(165deg, #d8f6d2 0%, #caf2c2 56%, #c1edba 100%) !important;
            color: #183d2f !important;
            border-right-color: #9dc99b !important;
            box-shadow: 8px 0 24px -14px rgba(29, 86, 55, 0.32) !important;
        }

        body.dark-mode .user-sidenav {
            background: linear-gradient(165deg, #0c282b 0%, #103438 52%, #12383a 100%) !important;
            color: var(--member-ink) !important;
            border-right-color: rgba(92, 190, 165, 0.2) !important;
        }

        .user-sidenav::before {
            background: radial-gradient(circle at 0% 0%, rgba(45, 184, 151, 0.12) 0%, transparent 72%);
        }

        .user-sidenav .sidebar-user-profile {
            padding: 1.1rem 1rem;
            border-bottom: 1px solid var(--member-line);
            background: linear-gradient(125deg, rgba(22, 132, 112, 0.16), rgba(24, 72, 72, 0.08));
            box-shadow: 0 8px 22px -14px rgba(0, 0, 0, 0.3);
        }

        body:not(.dark-mode) .user-sidenav .sidebar-user-profile {
            border-bottom-color: #9dc99b;
            background: linear-gradient(125deg, #d8f6d2, #caf2c2);
            box-shadow: 0 8px 22px -16px rgba(29, 86, 55, 0.28);
        }

        .user-sidenav .sidebar-user-profile::before {
            background: linear-gradient(90deg, transparent, #55c6a8, #b0e6d5, transparent);
        }

        .user-sidenav .user-avatar-large {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: linear-gradient(145deg, #138a79, #36b996);
            box-shadow: 0 7px 18px rgba(94, 168, 150, 0.24);
        }

        .user-sidenav .welcome-text { color: var(--member-muted); }
        .user-sidenav .user-name-large { color: var(--member-ink); font-size: 0.98rem; }
        body:not(.dark-mode) .user-sidenav .user-name-large { color: #183d2f; }
        .user-sidenav .user-status { color: var(--member-muted); }
        .user-sidenav .user-role-badge {
            padding: 0.18rem 0.6rem;
            background: rgba(43, 180, 144, 0.18);
            color: #a7ecd5;
        }
        body:not(.dark-mode) .user-sidenav .user-role-badge { background: #d2eee4; color: #18725f; }

        .user-sidenav-links { padding: 0.35rem 0 0.9rem; }
        .user-sidenav .user-menu-heading {
            padding: 1rem 1.05rem 0.45rem !important;
            color: var(--member-muted) !important;
            font-size: 0.62rem;
            letter-spacing: 0.13em;
        }
        .user-sidenav .user-menu-heading::before {
            left: 1.05rem;
            width: 22px;
            background: linear-gradient(90deg, var(--member-accent), transparent);
        }

        .user-sidenav .sb-sidenav-menu .user-nav-link {
            position: relative;
            gap: 0.75rem;
            min-height: 44px;
            margin: 0.18rem 0.55rem;
            padding: 0.62rem 0.75rem !important;
            border: 1px solid transparent;
            border-radius: 9px;
            color: #b6ccc7 !important;
            font-size: 0.8rem;
            font-weight: 550;
            text-decoration: none;
            transition: background 0.18s ease, color 0.18s ease, border-color 0.18s ease, transform 0.18s ease;
        }

        body:not(.dark-mode) .user-sidenav .sb-sidenav-menu .user-nav-link { color: #426762 !important; }

        .user-sidenav .user-nav-link .user-nav-icon {
            display: grid;
            width: 30px;
            height: 30px;
            flex: 0 0 30px;
            place-items: center;
            border: 1px solid rgba(92, 190, 165, 0.13);
            border-radius: 8px;
            background: rgba(92, 190, 165, 0.09);
            color: #83d9bf;
            font-size: 0.82rem;
            transition: inherit;
        }

        body:not(.dark-mode) .user-sidenav .user-nav-link .user-nav-icon {
            border-color: #d9e9e3;
            background: #e5f1ec;
            color: #21816d;
        }

        .user-sidenav .sb-sidenav-menu .user-nav-link:hover {
            transform: translateX(2px);
            border-color: rgba(86, 196, 163, 0.2);
            background: rgba(39, 157, 130, 0.13);
            color: #f0fbf7 !important;
        }

        body:not(.dark-mode) .user-sidenav .sb-sidenav-menu .user-nav-link:hover {
            border-color: #c7e2d8;
            background: #e4f2ec;
            color: #16594d !important;
        }

        .user-sidenav .user-nav-link:hover .user-nav-icon {
            border-color: transparent;
            background: #198d77;
            color: #fff;
        }

        .user-sidenav .user-nav-link:focus-visible {
            outline: 2px solid var(--member-accent);
            outline-offset: 2px;
        }

        /* Collapse arrow */
        .sb-sidenav-collapse-arrow {
            margin-left: auto;
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .nav-link[aria-expanded="true"] .sb-sidenav-collapse-arrow {
            transform: rotate(180deg);
            color: #a78bfa;
        }

        /* Nested menu */
        .sb-sidenav-menu-nested {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 6px;
            margin: 0.2rem 0.5rem 0.4rem 2rem !important;
            padding: 0.2rem 0 !important;
            border-left: 2px solid rgba(147, 112, 219, 0.3);
        }

        .sb-sidenav-menu-nested .nav-link {
            padding: 0.4rem 1rem !important;
            margin: 0.1rem 0.3rem;
            font-size: 0.8rem;
        }

        .sb-sidenav-menu-nested .nav-link:hover {
            transform: translateX(5px);
        }

        /* Welcome text */
        .welcome-text {
            font-size: 0.65rem;
            color: rgba(255, 255, 255, 0.4);
            margin-bottom: 0.1rem;
        }

        /* Collapse animations */
        .collapse {
            transition: all 0.3s ease-out;
        }

        .collapsing {
            position: relative;
            height: 0;
            overflow: hidden;
            transition: height 0.3s ease;
        }

        /* Ensure all menu items are visible */
        .nav {
            width: 100%;
            padding-bottom: 1rem;
        }

        /* Fix for flex child scrolling */
        * {
            box-sizing: border-box;
        }
    </style>

    <!-- User Profile at Top -->
    <div class="sidebar-user-profile">
        <div style="display: flex; align-items: center; gap: 1rem;">
            <div class="user-avatar-large">
                <i class="fas fa-user" style="color: white; font-size: 1.3rem;"></i>
            </div>
            <div style="flex: 1; min-width: 0;"> <!-- Added min-width:0 for text truncation -->
                <div class="welcome-text">WELCOME BACK</div>
                <div class="user-name-large">{{ Auth::user()->name??'' }}</div>
                <div class="user-status">
                    <span class="live-dot"></span>
                    <span>Active</span>
                    <span class="user-role-badge">{{ ucfirst(Auth::user()->user_type??'') }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Scrollable Menu Section -->
    <div class="sb-sidenav-menu">
        <div class="nav">
            @if (Auth::user()->user_type == 'admin')
                <div class="sb-sidenav-menu-heading">CORE</div>
                <a class="nav-link ajax_link" href="#" data-url="{{ route('admin-panel') }}">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    <span>Dashboard</span>
                </a>

                <div class="sb-sidenav-menu-heading">USERS</div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#member_reg">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    <span>Member Registration</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="member_reg" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ajax_link" href="#" data-url="{{ route('member-register') }}">
                            <i class="fas fa-user-plus me-2" style="font-size: 0.8rem;"></i>
                            <span>Create Member</span>
                        </a>
                        <a class="nav-link ajax_link" href="#" data-url="{{ route('member-list') }}">
                            <i class="fas fa-list me-2" style="font-size: 0.8rem;"></i>
                            <span>Member List</span>
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#manager_reg">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                    <span>Manager Management</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="manager_reg" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ajax_link" href="#" data-url="{{ route('manager-create-form') }}">
                            <i class="fas fa-user-plus me-2" style="font-size: 0.8rem;"></i>
                            <span>Add Manager</span>
                        </a>
                        <a class="nav-link ajax_link" href="#" data-url="{{ route('manager-list') }}">
                            <i class="fas fa-list me-2" style="font-size: 0.8rem;"></i>
                            <span>Manager List</span>
                        </a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">FINANCE</div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#income-expense">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
                    <span>Income & Expense</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="income-expense" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ajax_link" href="#" data-url="{{ route('income-expence') }}">
                            <i class="fas fa-plus-circle me-2" style="font-size: 0.8rem;"></i>
                            <span>New Entry</span>
                        </a>
                        <a class="nav-link ajax_link" href="#" data-url="{{ route('income-expence-list') }}">
                            <i class="fas fa-history me-2" style="font-size: 0.8rem;"></i>
                            <span>History</span>
                        </a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Deposit</div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#deposit">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
                    <span>Deposit</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="deposit" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ajax_link" href="#" data-url="{{ route('deposite-add-form') }}">
                            <i class="fas fa-plus-circle me-2" style="font-size: 0.8rem;"></i>
                            <span>Add Deposit</span>
                        </a>
                        <a class="nav-link ajax_link" href="#" data-url="{{ route('deposit-list') }}">
                            <i class="fas fa-history me-2" style="font-size: 0.8rem;"></i>
                            <span>Deposit List</span>
                        </a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">LOAN</div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#category">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                    <span>Loan Categories</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="category" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ajax_link" href="#" data-url="{{ url('show-categories-form') }}">
                            <i class="fas fa-plus-circle me-2" style="font-size: 0.8rem;"></i>
                            <span>Create</span>
                        </a>
                        <a class="nav-link ajax_link" href="#" data-url="{{ url('show_categories-list') }}">
                            <i class="fas fa-list me-2" style="font-size: 0.8rem;"></i>
                            <span>List</span>
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#loan-request">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-heart"></i></div>
                    <span>Loan Request</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="loan-request" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ajax_link" href="#" data-url="{{ url('loan-request') }}">
                            <i class="fas fa-clipboard-list me-2" style="font-size: 0.8rem;"></i>
                            <span>Requests</span>
                        </a>

                        <a class="nav-link ajax_link" href="#" data-url="{{ url('loan-request-list') }}">
                            <i class="fas fa-check-circle me-2" style="font-size: 0.8rem;"></i>
                            <span>Loan Approval List</span>
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#loan-commit">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-heart"></i></div>
                    <span>Loan Commit</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="loan-commit" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                        <a class="nav-link ajax_link" href="#" data-url="{{ url('loan-commite') }}">
                            <i class="fas fa-check-circle me-2" style="font-size: 0.8rem;"></i>
                            <span>Loan Commit</span>
                        </a>
                        <a class="nav-link ajax_link" href="#" data-url="{{ url('comitted-list') }}">
                            <i class="fas fa-check-circle me-2" style="font-size: 0.8rem;"></i>
                            <span>Loan Requet list</span>
                        </a>
                        <a class="nav-link ajax_link" href="#" data-url="{{ url('committed-users') }}">
                            <i class="fas fa-users me-2" style="font-size: 0.8rem;"></i>
                            <span>Committed Users</span>
                        </a>

                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">RESOURCES</div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#assets">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                    <span>Assets</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="assets" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ajax_link" href="#" data-url="{{ url('index') }}">
                            <i class="fas fa-plus-circle me-2" style="font-size: 0.8rem;"></i>
                            <span>Add Asset</span>
                        </a>
                        <a class="nav-link ajax_link" href="#" data-url="{{ route('show-assets') }}">
                            <i class="fas fa-list me-2" style="font-size: 0.8rem;"></i>
                            <span>Asset List</span>
                        </a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">SYSTEM</div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#profile-edit">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    <span>Settings</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="profile-edit" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ajax_link" href="#" data-url="{{ url('admin-password') }}">
                            <i class="fas fa-user-cog me-2" style="font-size: 0.8rem;"></i>
                            <span>Profile</span>
                        </a>
                    </nav>
                </div>
            @elseif(Auth::user()->user_type == 'employee')
                <!-- Employee menu items -->
            @elseif(Auth::user()->user_type == 'manager')
                <!-- Manager menu items -->
                <div class="sb-sidenav-menu-heading">CORE</div>
                <a class="nav-link ajax_link" href="#" data-url="{{ route('managerDashboard') }}">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    <span>Dashboard</span>
                </a>

                <div class="sb-sidenav-menu-heading">USERS</div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#member_reg">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    <span>Member Registration</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="member_reg" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ajax_link" href="#"
                            data-url="{{ route('employee-member-register') }}">
                            <i class="fas fa-user-plus me-2" style="font-size: 0.8rem;"></i>
                            <span>Create Member</span>
                        </a>
                        <a class="nav-link ajax_link" href="#" data-url="{{ route('employee-member-list') }}">
                            <i class="fas fa-list me-2" style="font-size: 0.8rem;"></i>
                            <span>Member List</span>
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#loan-request">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-heart"></i></div>
                    <span>Loan Commit</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="loan-request" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ajax_link" href="#" data-url="{{ url('loan-request') }}">
                            <i class="fas fa-clipboard-list me-2" style="font-size: 0.8rem;"></i>
                            <span>Requests</span>
                        </a>
                        <a class="nav-link ajax_link" href="#" data-url="{{ url('loan-commite') }}">
                            <i class="fas fa-check-circle me-2" style="font-size: 0.8rem;"></i>
                            <span>Loan Commits</span>
                        </a>

                        <a class="nav-link ajax_link" href="#" data-url="{{ url('loan-request-list') }}">
                            <i class="fas fa-check-circle me-2" style="font-size: 0.8rem;"></i>
                            <span>Approval List</span>
                        </a>
                    </nav>
                </div>

                 <div class="sb-sidenav-menu-heading">SYSTEM</div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#profile-edit">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    <span>Settings</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="profile-edit" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ajax_link" href="#" data-url="{{ url('manager-profile') }}">
                            <i class="fas fa-user-cog me-2" style="font-size: 0.8rem;"></i>
                            <span>Profile</span>
                        </a>
                    </nav>
                </div>
            @else
                <div class="sb-sidenav-menu-heading user-menu-heading">OVERVIEW</div>
                <div class="user-sidenav-links">
                    <a class="nav-link ajax_link user-nav-link" href="#" data-url="{{ route('userDashboard') }}">
                        <span class="user-nav-icon"><i class="fas fa-house"></i></span>
                        <span>Dashboard</span>
                    </a>
                    <a class="nav-link ajax_link user-nav-link" href="#" data-url="{{ route('user-profile') }}">
                        <span class="user-nav-icon"><i class="fas fa-user"></i></span>
                        <span>My Profile</span>
                    </a>

                    <div class="sb-sidenav-menu-heading user-menu-heading">LOAN SERVICES</div>
                    <a class="nav-link ajax_link user-nav-link" href="#" data-url="{{ route('loan-request') }}">
                        <span class="user-nav-icon"><i class="fas fa-file-circle-plus"></i></span>
                        <span>Loan Request</span>
                    </a>
                    <a class="nav-link ajax_link user-nav-link" href="#" data-url="{{ route('user-loan-list') }}">
                        <span class="user-nav-icon"><i class="fas fa-money-check-dollar"></i></span>
                        <span>Loan Commit List</span>
                    </a>
                    <a class="nav-link ajax_link user-nav-link" href="#" data-url="{{ route('my-loan-requests') }}">
                        <span class="user-nav-icon"><i class="fas fa-list-check"></i></span>
                        <span>My Loan Requests</span>
                    </a>
                </div>
            @endif
        </div>
    </div>
</nav>

<!-- আপনার sidebar code এর শেষে এই JavaScript টা যোগ করুন -->

<script>
    // Update sidebar when theme changes
    window.addEventListener('themeChanged', function(e) {
        const sidebar = document.querySelector('.sb-sidenav');
        if (sidebar) {
            if (sidebar.classList.contains('user-sidenav')) {
                sidebar.style.background = document.body.classList.contains('dark-mode')
                    ? 'linear-gradient(165deg, #0c282b 0%, #103438 52%, #12383a 100%)'
                    : 'linear-gradient(165deg, #d8f6d2 0%, #caf2c2 56%, #c1edba 100%)';
            } else if (document.body.classList.contains('dark-mode')) {
                sidebar.style.background = 'linear-gradient(165deg, #1a1f2e 0%, #232837 50%, #2d3447 100%)';
            } else {
                sidebar.style.background = 'linear-gradient(165deg, #0a0c15 0%, #0f1220 50%, #1a1f2f 100%)';
            }
        }
    });

    // Initialize sidebar on load
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.querySelector('.sb-sidenav');
        if (sidebar) {
            if (sidebar.classList.contains('user-sidenav')) {
                sidebar.style.background = document.body.classList.contains('dark-mode')
                    ? 'linear-gradient(165deg, #0c282b 0%, #103438 52%, #12383a 100%)'
                    : 'linear-gradient(165deg, #d8f6d2 0%, #caf2c2 56%, #c1edba 100%)';
            } else if (document.body.classList.contains('dark-mode')) {
                sidebar.style.background = 'linear-gradient(165deg, #1a1f2e 0%, #232837 50%, #2d3447 100%)';
            } else {
                sidebar.style.background = 'linear-gradient(165deg, #0a0c15 0%, #0f1220 50%, #1a1f2f 100%)';
            }
        }
    });
</script>
