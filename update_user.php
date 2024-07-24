<!--Task: 5 Handling the PHP update
            No new updated are required atm.
-->
<?php
include "database-con.php";

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

$sql = "UPDATE USERS SET name='$name', email='$email' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "User updated successfully";
} else {
    echo "Error updating user: ". $conn->error;
}
$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Updated</title>
    </head>
    <body>
    <form action="view-users.php" method="post">
        <button type="submit">View Users</button>        </body>
    </body>
</html>