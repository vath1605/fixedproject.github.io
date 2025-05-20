<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                    <div class="clock-container d-flex gap-3">
                        <div id="date">Loading date...</div>
                        <div id="time">Loading time...</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>
<script>
        function updateDateTime() {
            const now = new Date();
            
            // Format date as dd/mm/yyyy
            const day = String(now.getDate()).padStart(2, '0');
            const month = String(now.getMonth() + 1).padStart(2, '0'); // Month is 0-indexed
            const year = now.getFullYear();
            const dateString = `${day}/${month}/${year}`;
            
            // Format time as hh:mm:ss
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const timeString = `${hours}:${minutes}:${seconds}`;
            
            // Update the HTML elements
            document.getElementById('date').innerHTML = dateString;
            document.getElementById('time').innerHTML = timeString;
        }

        // Update the time immediately
        updateDateTime();
        
        // Update the time every second
        setInterval(updateDateTime, 1000);
    </script>
    <style>
        .clock-container {  
            text-align: center;
        }
        #date {
            font-size: 1.8rem;
        }
        #time {
            font-size: 1.8rem;
            font-weight: bold;
        }
    </style>