<?php
$session_duration = 3600;
ini_set('session.gc_maxlifetime', $session_duration);
session_set_cookie_params($session_duration);
session_start(); // Start session


// Set session timeout (3600 seconds = 1 hour)

// Store user session data
$_SESSION['LAST_ACTIVITY'] = time(); // Track last activity time
include 'includes/config.php';

if(isset($_POST['signIn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM admin WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        
        // Store user details in session
        $_SESSION['user_id'] = $row['id']; // Assuming 'id' is the primary key in users table
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_name'] = $row['firstName'] . " " . $row['lastName'];
        
        $_SESSION['email'] = $user_email;

        header("Location: bookings.php"); // Redirect to dashboard
        exit();
    } else {
        echo "<script>
        alert('Incorrect Email or Password!');
        window.location.href='admin_login.html';
        </script>";
    }
}
?>
