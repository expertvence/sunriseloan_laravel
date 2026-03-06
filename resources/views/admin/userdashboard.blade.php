<main>
   
    <div class="dashboard">
        <h1 class="mt-4">Dashboard</h1>
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
        <div class="row">
            <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                <div class="card  text-white  text-center"
                    style="min-height: 150px; box-shadow: 9px 5px 10px rgba(20, 20, 20, 0.2); background-color:rgb(13, 105, 98);">

                    <h5 class="mt-3"> Total Loan</h5>

                    <div class="small text-white mt-3">
                        <h3>{{ $countLoan }}</h3>
                    </div>

                    <!-- <a class="small text-white stretched-link" href="#">View Details</a> -->
                    <div class="small text-white mt-3">
                        {{-- <h3>{{$countLoan}}</h3> --}}
                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                <div class="card  text-white  text-center"
                    style="min-height: 150px; box-shadow: 9px 5px 10px rgba(14, 15, 15, 0.2); background-color:rgb(177, 206, 11);">

                    <h5 class="mt-3"> Total Loan Amound</h5>


                    <!-- <a class="small text-white stretched-link" href="#">View Details</a> -->
                    <div class="small text-white mt-3">
                        <h3>৳{{ $totalLoanAmt ?? 0 }}</h3>
                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                <div class="card  text-white text-center"
                    style="min-height: 150px; box-shadow: 9px 5px 10px rgba(18, 19, 19, 0.2); background-color:rgb(230, 40, 26);">

                    <h5 class="mt-3">Remaining Amount</h5>


                    <!--  <a class="small text-white stretched-link" href="#">View Details</a> -->
                    <div class="small text-white">
                        <h3>৳{{ $remainingAmount ?? 0 }}</h3>
                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-2">
                <div class="card  text-white "
                    style="min-height: 150px; box-shadow: 9px 5px 10px rgba(17, 18, 17, 0.2); background-color:rgb(59, 189, 221);">
                    <h5 class="mt-3">Latest Month</h5>
                     <h3>{{ $latestMonth ?? 'N/A'}}</h3>

                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>

            </div>
        </div>

    </div>
</main>
<!-- Font Awesome -->

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


