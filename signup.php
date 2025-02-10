<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="./logo.jpg">

    <title>Sign-up Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
        .success {
            color: green;
            font-size: 1em;
        }
    </style>

    <script>
       
        function validateSignup() {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const cnf_password = document.getElementById('cnf_password').value;
            const phone = document.getElementById('phone').value;

            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            const phonePattern = /^[0-9]{10}$/;

            document.getElementById('error_message').innerHTML = "";

            if (!emailPattern.test(email)) {
                showError("Please enter a valid email address.");
                return false;
            }

            if (password.length < 6) {
                showError("Password must be at least 6 characters long.");
                return false;
            }

            if (password !== cnf_password || cnf_password !== password) {
                showError("Passwords do not match.");
                return false;
            }

            if (!phonePattern.test(phone)) {
                showError("Please enter a valid 10-digit phone number.");
                return false;
            }

            showSuccess("Form submitted successfully!");
            return true;
        }

        function showError(message) {
            const errorDiv = document.getElementById('error_message');
            errorDiv.innerHTML = message;
            errorDiv.className = "error";
        }

        function showSuccess(message) {
            const successDiv = document.getElementById('error_message');
            successDiv.innerHTML = message;
            successDiv.className = "success";
        }

        window.addEventListener('load', () => {
            const passwordField = document.getElementById('password');
            const cnfPasswordField = document.getElementById('cnf_password');

            cnfPasswordField.addEventListener('input', function() {
                if (passwordField.value !== cnfPasswordField.value) {
                    showError("Passwords do not match.");
                } else {
                    document.getElementById('error_message').innerHTML = ""; // Clear error message
                }
            });

            passwordField.addEventListener('input', function() {
                if (passwordField.value.length < 6) {
                    showError("Password must be at least 6 characters.");
                } else {
                    document.getElementById('error_message').innerHTML = ""; // Clear error message
                }
            });
        });
    </script>
</head>
<body>
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_erp";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password
    $phone = $_POST['phone'];

    // Check if the email is already registered
    $checkEmail = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $checkEmail->store_result();

    if ($checkEmail->num_rows > 0) {
        echo "Email already exists. Please log in.";
    } else {
        // Insert new user into the database
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $phone);

        if ($stmt->execute()) {
            echo "Sign-up successful!";
            header("Location: login.php"); // Redirect to login page after successful sign-up
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
}

$conn->close();
?>

    <div class="sign-up">
        <div class="header">
            
            <h1>Sign-up</h1>
         
        </div>
        <form action="./signup.php" method="post" onsubmit="return validateSignup()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="cnf_password">Confirm Password:</label>
            <input type="password" id="cnf_password" name="cnf_password" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <div id="error_message"></div>
            
            <button type="submit">Sign up</button>
        </form>
    </div>
</body>
</html>
