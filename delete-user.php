<!-- Task 4: Deleting Data : Let's make a Form -->

<!DOCTYPE html>
<html>
    <head>
        <title>Booting a User</title>
    </head>
    <body>
        <h2>Removing a User</h2>
        <form action="delete-user.php" method="POST">
            User ID: <input type="number" name="id" required><br>
            <input type="submit" value="Delete User">
            <a href="view-users.php">View Update User List</a>
        </form>
    </body>
</html>


<!-- PHP Script to handle the operations -->

<?php
include "database-con.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $id = $_POST['id'];
    
    $sql = "DELETE FROM users WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo " User Deleted";
    } else {
        echo "Error deleting user: ". $conn->error;
    } 
    } else {
        echo "Add a user to delete a user ;)";
    }

    
    


$conn->close();
?>