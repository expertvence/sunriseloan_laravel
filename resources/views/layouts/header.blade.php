<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background: linear-gradient(90deg, #0a0c10 0%, #0f1217 100%); border-bottom: 1px solid rgba(99, 102, 241, 0.1); height: 70px; position: fixed; top: 0; left: 0; right: 0; z-index: 2020; transition: all 0.3s ease;">
     <style>
        /* Premium Header Styling */
        .sb-topnav {
            font-family: 'Inter', sans-serif;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            padding-left: 280px; /* Add padding to account for sidebar */
            transition: padding-left 0.3s ease;
            display: flex;
            align-items: center;
        }

        /* Toggle button - Fixed position on the left */
        #sidebarToggle {
            color: rgba(255, 255, 255, 0.7);
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.2);
            border-radius: 10px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            margin: 0;
            position: absolute;
            left: 230px; /* Position inside the padded area */
            top: 15px;
            z-index: 1030;
        }

        #sidebarToggle:hover {
            background: rgba(99, 102, 241, 0.2);
            color: white;
            transform: scale(1.05);
        }

        /* Brand - positioned absolutely to stay on the far left */
        .navbar-brand {
            font-size: 1.4rem;
            font-weight: 700;
            background: linear-gradient(135deg, #fff 0%, #a5b4fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.02em;
            padding: 0;
            position: absolute;
            left: 20px; /* Fixed position on the left */
            top: 50%;
            transform: translateY(-50%);
            margin: 0;
            text-decoration: none;
            white-space: nowrap;
            z-index: 1040;
        }

        /* ===== THEME TOGGLE BUTTON (গোল্ডেন আইকন) ===== */
        .theme-toggle-header {
            position: relative;
            margin-left: auto;
            margin-right: 1rem;
            display: flex;
            align-items: center;
        }

        .theme-toggle-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .theme-toggle-icon:hover {
            transform: rotate(45deg) scale(1.1);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.5);
        }

        .theme-toggle-icon i {
            font-size: 1.5rem;
            color: white;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
            transition: all 0.3s ease;
        }

        .theme-toggle-icon:hover i {
            transform: rotate(-45deg);
        }

        /* Dark mode specific styles */
        body.dark-mode .theme-toggle-icon {
            background: linear-gradient(135deg, #818cf8 0%, #6366f1 100%);
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
        }

        body.dark-mode .theme-toggle-icon i {
            color: #ffffff;
        }

        /* Tooltip for the icon */
        .theme-toggle-icon {
            position: relative;
        }

        .theme-toggle-icon::after {
            content: 'Change Theme';
            position: absolute;
            bottom: -30px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.7rem;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .theme-toggle-icon:hover::after {
            opacity: 1;
            visibility: visible;
            bottom: -40px;
        }

        /* Search form - pushed to the right */
        .search-form {
            position: relative;
            margin-right: 1rem;
        }

        .search-input {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 30px;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            color: white;
            width: 300px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #6366f1;
            background: rgba(255, 255, 255, 0.05);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.3);
            font-size: 0.8rem;
        }

        /* User dropdown */
        .user-dropdown {
            margin-right: 1.5rem;
        }

        .user-dropdown .nav-link {
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.2);
            border-radius: 30px;
            padding: 0.4rem 1rem !important;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .user-dropdown .nav-link:hover {
            background: rgba(99, 102, 241, 0.2);
            transform: translateY(-2px);
        }

        .user-dropdown .nav-link i {
            color: #818cf8;
            font-size: 1rem;
        }

        .user-dropdown .nav-link::after {
            color: rgba(255, 255, 255, 0.5);
            margin-left: 0.5rem;
        }

        .dropdown-menu {
            background: #0f1217;
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 0.5rem;
            margin-top: 0.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .dropdown-item {
            color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background: rgba(99, 102, 241, 0.1);
            color: white;
            transform: translateX(4px);
        }

        .dropdown-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            margin: 0.5rem 0;
        }

        .user-name {
            color: white;
            font-weight: 600;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            margin-bottom: 0.5rem;
        }

        .logout-btn {
            color: #ef4444;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.1) !important;
            color: #ef4444 !important;
        }

        /* When sidebar is collapsed */
        body.sidebar-collapsed .sb-topnav {
            padding-left: 0;
        }

        body.sidebar-collapsed #sidebarToggle {
            left: 70px; /* Move toggle button next to brand when sidebar is collapsed */
        }

        /* Responsive */
        @media (max-width: 768px) {
            /* Remove left padding */
            .sb-topnav {
                padding-left: 0 !important;
                justify-content: space-between;
            }

            /* Hide brand on mobile */
            .navbar-brand {
                display: none !important;
            }

            /* Toggle button left side */
            #sidebarToggle {
                position: relative;
                left: 10px !important;
                top: 0;
            }

            /* Theme icon in mobile */
            .theme-toggle-header {
                margin-right: 0.5rem;
            }

            .theme-toggle-icon {
                width: 40px;
                height: 40px;
            }

            .theme-toggle-icon i {
                font-size: 1.2rem;
            }

            /* User dropdown right side */
            .user-dropdown {
                margin-right: 10px;
            }

            /* Hide search on mobile */
            .search-form {
                display: none !important;
            }
        }

        /* Small mobile devices */
        @media (max-width: 480px) {
            .theme-toggle-icon {
                width: 35px;
                height: 35px;
            }

            .theme-toggle-icon i {
                font-size: 1rem;
            }
        }
    </style>

    <!-- Brand - Fixed on the extreme left -->
    <a class="navbar-brand" href="#">
        Sunriseloan
    </a>

    <!-- Sidebar Toggle - Positioned after brand -->
    <button class="btn btn-link btn-sm" id="sidebarToggle" href="#!">
        <i class="fas fa-bars"></i>
    </button>

    <!-- ===== THEME TOGGLE ICON (সোনালী আইকন) ===== -->
    <div class="theme-toggle-header">
        <div class="theme-toggle-icon" id="headerThemeToggle" onclick="toggleHeaderTheme()">
            <i class="fas fa-sun" id="headerThemeIcon"></i>
        </div>
    </div>

    <!-- Search Form - Pushed to the right -->
    <form class="search-form d-none d-md-inline-block">
        <i class="fas fa-search search-icon"></i>
        <input class="search-input" type="text" placeholder="Search..." aria-label="Search">
    </form>

    <!-- User Dropdown -->
    <ul class="navbar-nav user-dropdown">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle"></i>
                <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li class="user-name">
                    <i class="fas fa-user me-2" style="color: #6366f1;"></i>
                    {{ Auth::user()->name }}
                </li>
                <li><a class="dropdown-item" href="#" data-url="{{url('profile-edit')}}">
                    <i class="fas fa-cog me-2" style="color: #6366f1;"></i> Settings
                </a></li>
                <li><a class="dropdown-item" href="#">
                    <i class="fas fa-chart-line me-2" style="color: #6366f1;"></i> Activity Log
                </a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <a class="dropdown-item logout-btn" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        {{ __('Logout') }}
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</nav>

<!-- Header Theme Toggle JavaScript - সম্পূর্ণ নতুন কোড -->
<script>
// এই function টা সরাসরি theme change করবে
function toggleHeaderTheme() {
    const body = document.body;
    const headerIcon = document.getElementById('headerThemeIcon');
    const header = document.querySelector('.sb-topnav');
    
    // Toggle dark mode class
    if (body.classList.contains('dark-mode')) {
        body.classList.remove('dark-mode');
        localStorage.setItem('global_theme', 'light');
        
        // Update header icon
        if (headerIcon) headerIcon.className = 'fas fa-sun';
        
        // Update header background
        if (header) {
            header.style.background = 'linear-gradient(90deg, #0a0c10 0%, #0f1217 100%)';
        }
        
        // Update sidebar if exists
        const sidebar = document.querySelector('.sb-sidenav');
        if (sidebar) {
            sidebar.style.background = 'linear-gradient(165deg, #0a0c15 0%, #0f1220 50%, #1a1f2f 100%)';
        }
        
    } else {
        body.classList.add('dark-mode');
        localStorage.setItem('global_theme', 'dark');
        
        // Update header icon
        if (headerIcon) headerIcon.className = 'fas fa-moon';
        
        // Update header background
        if (header) {
            header.style.background = 'linear-gradient(90deg, #1a1f2e 0%, #232837 100%)';
        }
        
        // Update sidebar if exists
        const sidebar = document.querySelector('.sb-sidenav');
        if (sidebar) {
            sidebar.style.background = 'linear-gradient(165deg, #1a1f2e 0%, #232837 50%, #2d3447 100%)';
        }
    }
    
    // Dispatch event for other components
    window.dispatchEvent(new CustomEvent('themeChanged', {
        detail: { theme: localStorage.getItem('global_theme') }
    }));
}

// Page load এ আইকন এবং ব্যাকগ্রাউন্ড সেট করুন
document.addEventListener('DOMContentLoaded', function() {
    const headerIcon = document.getElementById('headerThemeIcon');
    const header = document.querySelector('.sb-topnav');
    
    if (document.body.classList.contains('dark-mode')) {
        if (headerIcon) headerIcon.className = 'fas fa-moon';
        if (header) {
            header.style.background = 'linear-gradient(90deg, #1a1f2e 0%, #232837 100%)';
        }
    } else {
        if (headerIcon) headerIcon.className = 'fas fa-sun';
        if (header) {
            header.style.background = 'linear-gradient(90deg, #0a0c10 0%, #0f1217 100%)';
        }
    }
});

// অন্য কোথাও থেকে theme change হলে header আপডেট করুন
window.addEventListener('themeChanged', function(e) {
    const headerIcon = document.getElementById('headerThemeIcon');
    const header = document.querySelector('.sb-topnav');
    
    if (document.body.classList.contains('dark-mode')) {
        if (headerIcon) headerIcon.className = 'fas fa-moon';
        if (header) {
            header.style.background = 'linear-gradient(90deg, #1a1f2e 0%, #232837 100%)';
        }
    } else {
        if (headerIcon) headerIcon.className = 'fas fa-sun';
        if (header) {
            header.style.background = 'linear-gradient(90deg, #0a0c10 0%, #0f1217 100%)';
        }
    }
});
</script>