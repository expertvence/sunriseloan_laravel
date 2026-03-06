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