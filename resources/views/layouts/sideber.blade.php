<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: #000000; color: #F8F8FF">
    <div class="sb-sidenav-menu">
        <div class="nav">

            @if(Auth::user()->user_type=="admin")
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link ajax_link" href="#" data-url="{{route('admin-panel')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#member_reg" aria-expanded="false" aria-controls="member_reg">
                <div class="sb-nav-link-icon"><i class="fas fa-users" style=" font-size: 20px;"></i></div>
                Member Reg
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="member_reg" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link ajax_link" href="#" data-url="{{route('member-register')}}">Create Member</a>
                    <a class="nav-link ajax_link" href="#" data-url="{{route('member-list')}}">Member list</a>
                </nav>
            </div>


            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#income-expense" aria-expanded="false" aria-controls="income-expense">
                <div class="sb-nav-link-icon"><i class="fas fa-coins" style=" font-size: 20px;"></i></div>
                Income-Expense
                <div class="sb-sidenav-collapse-arrow"></div>
            </a>
            <div class="collapse" id="income-expense" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link ajax_link" href="#" data-url="{{route('income-expence')}}">Entry Income-Expense</a>
                    <a class="nav-link ajax_link" href="#" data-url="{{route('income-expence-list')}}">Income-Expense List</a>
                </nav>
            </div>

            <!--   // Loan Section -->

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#category" aria-expanded="false" aria-controls="income-expense">
                <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd" style=" font-size: 20px;"></i></div>
                Loan Category
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="category" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link ajax_link" href="#" data-url="{{url('show-categories-insert')}}">Create Categories</a>
                    <a class="nav-link ajax_link" href="#" data-url="{{url('show_categories')}}">Categories List</a>


                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#loan-request" aria-expanded="false" aria-controls="income-expense">
                <div class="sb-nav-link-icon"><i class="fas fa-hand-holding" style=" font-size: 20px;"></i></div>
                Loan Section
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="loan-request" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">

                    <a class="nav-link ajax_link" href="#" data-url="{{url('show-list')}}">Loan Request</a>
                    <a class="nav-link ajax_link" href="#" data-url="{{url('loan-commite')}}">Loan Commit</a>


                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#assets" aria-expanded="false" aria-controls="income-expense">
                <div class="sb-nav-link-icon"><i class="fas fa-diamond" style=" font-size: 20px;"></i></div>
                Assets
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="assets" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link ajax_link" href="#" data-url="{{url('index')}}">Add Assets</a>
                    <a class="nav-link ajax_link" href="#" data-url="{{route('show-assets')}}">Show Assets</a>

                </nav>
            </div>



            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#profile-edit" aria-expanded="false" aria-controls="income-expense">
                <div class="sb-nav-link-icon"><i class="fas fa-diamond" style=" font-size: 20px;"></i></div>
                Settings
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="profile-edit" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link ajax_link" href="#" data-url="{{url('admin-profile')}}">Settings</a>


                </nav>
            </div>







            @elseif(Auth::user()->user_type=="employee")
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link ajax_link" href="#" data-url="{{route('userDashboard')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link ajax_link" href="#" data-url="{{route('member_profile',Auth::user()->member_id)}}">
                <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                My Profile
            </a>

            <a class="nav-link ajax_link" href="#" data-url="#">
                <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                My Profile
            </a>




            @else
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link ajax_link" href="#" data-url="{{route('userDashboard')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link ajax_link" href="#" data-url="{{route('member_profile',Auth::user()->member_id)}}">
                <div class="sb-nav-link-icon"><i class="fa fa-user" style=" font-size: 20px;"></i></div>
                My Profile
            </a>

            <a class="nav-link ajax_link" href="#" data-url="{{route('loan-request')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-credit-card" style=" font-size: 20px;"></i>
                    </i></div>
                Loan Request
            </a>

            <a class="nav-link ajax_link" href="#" data-url="{{route('user-loan-list')}}">
                <div class="sb-nav-link-icon"><i class="fa fa-hand-holding-usd" style=" font-size: 20px;"></i>
                </div>
                Loan Commit List
            </a>


            @endif
        </div>
    </div>

</nav>