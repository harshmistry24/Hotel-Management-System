<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="./logo.jpg">
    <script>
        function showWelcomeAlert() {
            alert("Welcome to the Login page!");
        }

        function validateLogin() {
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            }
            alert("Login successful!");
            return true;
        }

        window.addEventListener('load', () => {
            const emailField = document.getElementById("email");
            const passwordField = document.getElementById("password");
            const loginButton = document.querySelector("button[type='submit']");

            // Mouseover and Mouseout for Email field
            emailField.addEventListener("mouseover", function() {
                this.style.backgroundColor = "#f0f0f0";
            });
            emailField.addEventListener("mouseout", function() {
                this.style.backgroundColor = "";
            });

            // Mouseover and Mouseout for Password field
            passwordField.addEventListener("mouseover", function() {
                this.style.backgroundColor = "#f0f0f0";
            });
            passwordField.addEventListener("mouseout", function() {
                this.style.backgroundColor = "";
            });

            // Mouseover and Mouseout for Login button
            loginButton.addEventListener("mouseover", function() {
                this.style.backgroundColor = "#0056b3";  // Darker blue shade
                this.style.color = "#fff";  // White text
            });
            loginButton.addEventListener("mouseout", function() {
                this.style.backgroundColor = "";  // Reset to default background
                this.style.color = "";  // Reset to default text color
            });
        });

        window.onload = showWelcomeAlert;
    </script>
</head>
<body>
    <div class="Login">
        <div class="header">
            
            <h2>Login</h2>
         
        </div>
        <form id="loginForm" action="./login.php" method="post" onsubmit="return validateLogin()">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        <a href="forgotpass.php">Forgot password</a>
        
    </div>
    
<?php

session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_erp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id, $hashed_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            echo "Login successful!";
            header("Location: home.php");  // Redirect to dashboard after login
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with this email.";
    }

    $stmt->close();
}
$conn->close();
?>

</body>
</html>
