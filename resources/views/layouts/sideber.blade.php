

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background: linear-gradient(165deg, #0a0c15 0%, #0f1220 50%, #1a1f2f 100%); color: #F8F8FF; margin-top: 0rem; margin-right: auto; border-right: 1px solid rgba(147, 112, 219, 0.15); box-shadow: 10px 0 30px -10px rgba(0, 0, 0, 0.5), inset -1px 0 0 rgba(255, 255, 255, 0.03); height: 100vh; position: sticky; top: 0;">
    
    <style>
        /* Ultra Premium Sidebar Styling - Fixed Scrolling Issue */
        .sb-sidenav {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden; /* Changed from overflow-y: hidden */
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
            min-height: 0; /* Important for flex child scrolling */
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
            flex-shrink: 0; /* Prevent shrinking */
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
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
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
                <div class="user-name-large">{{ Auth::user()->name }}</div>
                <div class="user-status">
                    <span class="live-dot"></span>
                    <span>Active</span>
                    <span class="user-role-badge">{{ ucfirst(Auth::user()->user_type) }}</span>
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

                <div class="sb-sidenav-menu-heading">LOAN</div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#category">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                    <span>Loan Categories</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="category" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ajax_link" href="#" data-url="{{ url('show-categories-insert') }}">
                            <i class="fas fa-plus-circle me-2" style="font-size: 0.8rem;"></i>
                            <span>Create</span>
                        </a>
                        <a class="nav-link ajax_link" href="#" data-url="{{ url('show_categories') }}">
                            <i class="fas fa-list me-2" style="font-size: 0.8rem;"></i>
                            <span>List</span>
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#loan-request">
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
                            <span>Approvals</span>
                        </a>
                         <a class="nav-link ajax_link" href="#" data-url="{{ url('comitted-list') }}">
                            <i class="fas fa-check-circle me-2" style="font-size: 0.8rem;"></i>
                            <span>Loan Requet list</span>
                        </a>
                        <a class="nav-link ajax_link" href="#" data-url="{{ url('loan-request-list') }}">
                            <i class="fas fa-check-circle me-2" style="font-size: 0.8rem;"></i>
                            <span>Loan Approval List</span>
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

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#profile-edit">
                    <span class="accent-bar"></span>
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    <span>Settings</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="profile-edit" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link ajax_link" href="#" data-url="{{ url('admin-profile') }}">
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
                        <a class="nav-link ajax_link" href="#" data-url="{{ route('employee-member-register') }}">
                            <i class="fas fa-user-plus me-2" style="font-size: 0.8rem;"></i>
                            <span>Create Member</span>
                        </a>
                        <a class="nav-link ajax_link" href="#" data-url="{{ route('employee-member-list') }}">
                            <i class="fas fa-list me-2" style="font-size: 0.8rem;"></i>
                            <span>Member List</span>
                        </a>
                    </nav>
                </div>

                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#loan-request">
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
                       
                        <a class="nav-link ajax_link" href="#" data-url="{{ url('comitted-list') }}">
                            <i class="fas fa-check-circle me-2" style="font-size: 0.8rem;"></i>
                            <span>Approval List</span>
                        </a>
                    </nav>
                </div>
            @else
                <!-- Member menu items -->
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
        if (document.body.classList.contains('dark-mode')) {
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
        if (document.body.classList.contains('dark-mode')) {
            sidebar.style.background = 'linear-gradient(165deg, #1a1f2e 0%, #232837 50%, #2d3447 100%)';
        } else {
            sidebar.style.background = 'linear-gradient(165deg, #0a0c15 0%, #0f1220 50%, #1a1f2f 100%)';
        }
    }
});
</script>