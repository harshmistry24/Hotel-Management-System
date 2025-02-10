<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        background: url('./hotell.webp') no-repeat center center/cover; /* Replace 'your-image.jpg' with your background image */
        position: relative;
    }

    .header {
        display: flex;
        align-items: center;
        position: absolute;
        top: 10px; /* Adjust top margin */
        left: 10px; /* Adjust left margin */
    }

    .hotel-name {
        color: white;
        font-size: 32px; /* You can adjust the size as needed */
        font-weight: bold;
        margin-left: 10px; /* Space between logo and name */
    }

    .login-link {
        position: absolute;
        top: 10px; /* Adjust top margin */
        right: 10px; /* Adjust right margin */
        padding: 15px 20px; /* Increased padding for larger size */
        font-size: 18px; /* Increased font size */
        font-weight: bold;
        text-decoration: none;
        color: white;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 8px; /* Slightly larger border radius for a smoother look */
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .login-link:hover {
        background-color: white;
        color: black;
        cursor: pointer;
    }

    .logo {
        width: 50px; /* Adjust the size of the logo */
        height: auto;
    }

    </style>
</head>
<body>
    <div class="header">
        <img src="logo.jpg" alt="Hotel Logo" class="logo"> <!-- Replace 'logo.png' with your logo file path -->
        <h1 class="hotel-name">The President</h1>
    </div>
    <a href="./login.php" class="login-link">login</a>
</body>
</html>
