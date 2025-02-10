<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="./logo.jpg">
    <script>
        function validateForgotPassword() {
            const email = document.getElementById('email').value;
            const newPassword = document.getElementById('new_password').value;
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!emailPattern.test(email)) {
                alert('Please enter a valid email address.');
                return false;
            }

            if (newPassword.length < 6) {
                alert('Password must be at least 6 characters long.');
                return false;
            }

            alert('Password has been successfully reset!');
            return true;
        }
    </script>
    <style>
       

/* Container Styling */
.forgetpass {
    background: white;
    width: 90%;
    max-width: 400px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* Header Section */
.forget_header {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.forget_header h2 {
    flex-grow: 1;
    text-align: center;
    font-size: 24px;
    color: #333;
}

#backbutton {
    background: none;
    border: none;
    margin-right: 10px;
    cursor: pointer;
}

#backbutton img {
    width: 24px;
    height: 24px;
}

/* Form Styling */
form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    font-size: 16px;
    color: #333;
    margin-bottom: 10px;
    text-align: left;
    width: 100%;
}

input[type="email"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
    box-sizing: border-box;
}

input[type="email"]:focus, input[type="password"]:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Button Styling */
#resetpass_button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
}

#resetpass_button:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

/* Responsive Design */
@media screen and (max-width: 600px) {
    .forgetpass {
        width: 95%;
        padding: 15px;
    }

    #resetpass_button {
        padding: 10px 15px;
        font-size: 14px;
    }

    label, input {
        font-size: 14px;
    }
}

    </style>
</head>
<body>
    <div class="forgetpass">
        <div class="forget_header">
            <button id="backbutton"><a href="./login.php"><img src="./backbutton.png" alt="Back"></a></button>
            <h2>Reset Password</h2>
        </div>
        <form id="forgotPasswordForm" method="post" onsubmit="return validateForgotPassword()">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required><br>

            <button type="submit" id="resetpass_button">Reset Password</button>
        </form>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the user's password
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $hashed_password, $email);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        echo "<p>Password has been successfully updated.</p>";
        header("Location: home.php"); 
    } else {
        echo "<p>Failed to update password. Please check the email address.</p>";
    }

    $stmt->close();
}
$conn->close();
?>

</body>
</html>
