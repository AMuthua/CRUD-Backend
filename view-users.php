<!-- Task 6: View all Users -->
<!DOCTYPE html>
<html>
    <head>
        <title>God's eye</title>
    </head>
        <body>
        <!-- <form action="view-users.php" method="post">
        <button type="submit">View Users</button>        </body> -->
</html>

<?php

include "database-con.php";

$sql = "SELECT * from USERS";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2> Users List</h2>";
    echo "<table border ='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>". $row["id"]. "</td>
            <td>". $row["name"]. "</td>
            <td>". $row["email"]. "</td>
            <td>
                    <a href='edit-user.php?id=" . $row['id'] . "'>Edit</a> | 
                    <a href='delete-user.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a>
                </td>

        </tr>";
    }
    echo "</table>";
} else {
    echo "No users found.";
}
$conn->close();
?>