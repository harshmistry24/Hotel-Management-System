<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>User Information</h2>

    <?php
        // Database connection
        $conn = new mysqli("localhost", "root", "", "student_erp");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Database connected successfully<br>";
    }

    // Query to select all users
    $sql = "SELECT id, name, email, phone, created_at FROM users";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error executing query: " . $conn->error); // Check for query errors
    }

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created At</th>
              </tr>";

        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['created_at'] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No users found.</p>";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
