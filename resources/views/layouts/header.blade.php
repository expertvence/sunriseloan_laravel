<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background: linear-gradient(90deg, #0a0c10 0%, #0f1217 100%); border-bottom: 1px solid rgba(99, 102, 241, 0.1); height: 70px; position: fixed; top: 0; left: 0; right: 0; z-index: 1020; transition: all 0.3s ease;">
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
            left: 290px; /* Position inside the padded area */
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

        /* .navbar-brand::after {
            content: '';
            position: absolute;
            bottom: -5px;
            right: -10px;
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            box-shadow: 0 0 10px #10b981;
        } */

        /* Search form - pushed to the right */
        .search-form {
            position: relative;
            margin-left: auto;
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
            .sb-topnav {
                padding-left: 0 !important;
            }
            
            .navbar-brand {
                left: 10px;
                font-size: 1.2rem;
            }
            
            #sidebarToggle {
                left: 120px !important;
            }
            
            .search-form {
                display: none;
            }
        }
    </style>

    <!-- Brand - Fixed on the extreme left -->
    <a class="navbar-brand" href="{{route('home_2')}}">
        Sunriseloan
    </a>

    <!-- Sidebar Toggle - Positioned after brand -->
    <button class="btn btn-link btn-sm" id="sidebarToggle" href="#!">
        <i class="fas fa-bars"></i>
    </button>

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