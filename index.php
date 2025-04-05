<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Booking</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("availability-form").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        let formData = new FormData(this);
        let errorElement = document.getElementById("error");

        fetch("../room_booking/php/check_availability.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            errorElement.innerHTML = data; // Show result at the top
            errorElement.style.display = "block";
        })
        .catch(error => {
            errorElement.innerHTML = "<span class='error'>Error checking availability.</span>";
        });
    });
    
        // function validateForm() {
        //     let check_in = document.getElementById("checkin").value;
        //     let check_out = document.getElementById("checkout").value;
        //     let today = new Date().toISOString().split("T")[0];
            
        //     if (check_in < today) {
        //         document.getElementById("error").innerText = "Check-in date cannot be in the past!";
        //         return false;
        //     }
        //     if (check_out <= check_in) {
        //         document.getElementById("error").innerText = "Check-out date must be after check-in date!";
        //         return false;
        //     }
        //     return true;
        // }
       
        let checkinInput = document.getElementById("checkin");
         let checkoutInput = document.getElementById("checkout");

       // Disable past dates for check-in
       let today = new Date().toISOString().split("T")[0];
        checkinInput.setAttribute("min", today);

       // When check-in date is selected, update the min for check-out
       checkinInput.addEventListener("change", function () {
            let checkinDate = checkinInput.value;
            checkoutInput.setAttribute("min", checkinDate); // Set min checkout date
        });
        
    });
    </script>
<style>
    .success {
        color: green; /* Changes text color to green */
        font-weight: bold; /* Makes the text bold (optional) */
        font-size: 16px; /* Adjusts the text size (optional) */
        margin-bottom: 10px;
    }

    .error {
    color:#FF0000;    /* Changes text color to green */
    font-weight: bold; /* Makes the text bold (optional) */
    font-size: 16px; /* Adjusts the text size (optional) */
    margin-bottom: 10px;
    }
</style>

</head>
<body>
    <!-- Header -->
   <?php include 'header.php' ?>

    <div class="availability-section">
        <h2>Check Room Availability</h2>

        <div id="error" class="error"></div>

        <form method="POST" action="../room_booking/php/check_availability.php" id="availability-form" onsubmit="return validateForm()">
            <label for="room-type">Room Type:</label>
            <select id="room-type" name="room_type">
                <option value="Deluxe">Deluxe</option>
                <option value="Suite">Suite</option>
                <option value="Standard">Standard</option>
            </select>

            <label for="checkin">Check-in Date:</label>
            <input type="date" id="checkin" name="checkin" required>

            <label for="checkout">Check-out Date:</label>
            <input type="date" id="checkout" name="checkout" required>
            
            <span id="error" class="error"></span>

            <button type="submit">Check Availability</button>
        </form>

        <!-- <p id="availability-message"></p> -->
    </div>

    <div class="rooms">
        <div class="room">
            <img src="HMSimages/duplex.jpg" alt="deluxe room" width="250" height="250" />
            <h2>Deluxe Room</h2>
            <p>Luxury and comfort.</p>
            <a href="rooms/deluxe.php" class="book-btn">Book Now</a>
        </div>
        <div class="room">
             <img src="HMSimages/suite.png" alt="suite room" width="250" height="250" />
            <h2>Suite</h2>
            <p>Spacious and elegant.</p>
            <a href="rooms/suite.php" class="book-btn">Book Now</a>
        </div>
        <div class="room">
            <img src="HMSimages/6.png" alt="Standard room" width="250" height="250" />
            <h2>Standard Room</h2>
            <p>Affordable and cozy.</p>
            <a href="rooms/standard.php" class="book-btn">Book Now</a>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</body>
</html>
