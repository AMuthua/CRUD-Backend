<!-- This is Task:3 
 
    Adding data to the database
    By making a form. 
-->

<!DOCTYPE html>
<html>
    <head>
        <title>Adding a User</title>
    </head>
    <body>
        <h2>This is the Backend: Add a User</h2>
        <form action="create-user.php" method="post">
            Name: <input type="text" name="name" required><br>
            Email: <input type="email" name="email" required><br>
            <input type="submit" value="Add User">

            <a href="view-users.php"> View User Table</a>
        </form>



        
    </body>
</html>

<!-- This is the php script to add the User -->

<?php

include 'database-con.php';

// Validate input data
if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO USERS (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: ". $stmt->error;
    }

    $stmt->close();
} else {
    echo "Please fill in all fields";
}

$conn->close();
?>