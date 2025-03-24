<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <title>Deluxe Room Booking</title>
    <link rel="stylesheet" href="../assets/style.css">
    <script src="../assets/script.js" defer></script>
</head>
<body>
    <h2>Deluxe Room Booking</h2>
    
    <p id="availability-message" style="font-weight: bold;"></p>

    <p>Price per night: $150</p>
    <p id="total-price">Total Price: $150</p>

    <form action="../php/book_room.php" method="POST">
        <input type="hidden" name="room_type" value="Deluxe">
        <input type="hidden" id="room-price" value="150">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Phone:</label>
        <input type="text" name="phone" required>
        <label>Check-in Date:</label>
        <input type="date" name="checkin" id="checkin" required>
        <label>Check-out Date:</label>
        <input type="date" name="checkout" id="checkout" required>
        <button type="submit">Proceed to Payment</button>
    </form>
</body>
</html> -->
<!-- <?php include 'D:\Wampp\www\workspace\Hotel\room_booking\header.php'; ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Deluxe Room Booking</title>
    <link rel="stylesheet" href="../rooms/rooms_style.css">
    <!-- <script src="../assets/script.js" defer></script> -->
</head>

<body>
    <div class="booking-container">
        <h2>Deluxe Room Booking</h2>

        <p id="availability-message" style="font-weight: bold; color: red;"></p>

        <p>Price per night: 150</p>
        <p id="total-price">Total Price: 150</p>

        <div class="form-box">
            <form action="../php/book_room.php" method="POST" onsubmit="return validateForm()">
                <input type="hidden" name="room_type" value="Deluxe">
                <input type="hidden" id="room-price" value="150">

                <label>Name:</label>
                <input type="text" name="name" required>

                <label>Email:</label>
                <input type="email" name="email" required>

                <label>Phone:</label>
                <input type="text" name="phone" required>

                <label>Check-in Date:</label>
                <input type="date" name="checkin" id="checkin" required>

                <label>Check-out Date:</label>
                <input type="date" name="checkout" id="checkout" required>

                <button type="submit" id="submit-btn" >Proceed to Payment</button>
            </form>

            <button onclick="history.back()" class="go-back-btn">Go Back</button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let checkinInput = document.getElementById("checkin");
            let checkoutInput = document.getElementById("checkout");
            let totalPrice = document.getElementById("total-price");
            let roomPrice = parseFloat(document.getElementById("room-price").value);
            let availabilityMessage = document.getElementById("availability-message");
            let submitBtn = document.getElementById("submit-btn");

          

            // Prevent past dates for check-in
            let today = new Date().toISOString().split("T")[0];
            checkinInput.setAttribute("min", today);

            checkinInput.addEventListener("change", function () {
                checkoutInput.value = ""; // Reset check-out date
                checkoutInput.setAttribute("min", checkinInput.value);
                checkAvailability();
            });

            checkoutInput.addEventListener("change", function () {
                calculatePrice();
                checkAvailability();
            });

            function calculatePrice() {
                let checkinDate = new Date(checkinInput.value);
                let checkoutDate = new Date(checkoutInput.value);

                if (checkinDate && checkoutDate && checkoutDate > checkinDate) {
                    let nights = Math.ceil((checkoutDate - checkinDate) / (1000 * 60 * 60 * 24));
                    totalPrice.textContent = "Total Price: " + (nights * roomPrice);
                }
            }

            function checkAvailability() {
                if (checkinInput.value && checkoutInput.value) {
                    let formData = new FormData();
                    formData.append("room_type", "Deluxe");
                    formData.append("checkin", checkinInput.value);
                    formData.append("checkout", checkoutInput.value);

                    fetch("../php/check_availability.php", {
                        method: "POST",
                        body: formData
                    })
                        .then(response => response.text())
                        .then(data => {
                            availabilityMessage.innerHTML = data;
                            if (data.includes("available")) {
                                availabilityMessage.style.color = "green";
                                submitBtn.removeAttribute("disabled");
                            } else {
                                availabilityMessage.style.color = "red";
                                submitBtn.setAttribute("disabled", "true");
                            }
                        })
                        .catch(error => console.error("Error:", error));
                }
            }
        });
    </script>
</body>

</html>