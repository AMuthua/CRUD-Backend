<!-- Task 5: Form and PHP Script to Update users -->

<!-- PHP Script for Updating a User -->
 <!-- Task 5: Form and PHP Script to Update users -->

<!DOCTYPE html>
<html>
    <head>
        <title>Update User</title>
    </head>
    <body>
        <h2>Edit an already existing user</h2>
        <form action="edit-user.php" method="POST">
            User ID: <input type="text" name="id" required><br>
            <input type="submit" value="Edit User">
        </form>
    </body>
</html>



<!-- PHP Script for Updating a User -->
<?php

include 'database-con.php';

if (isset($_POST['id'])) { // Check if 'id' key exists in POST
  $id = $_POST['id'];

  $sql = "SELECT * FROM USERS WHERE id='$id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html>
      <head>
        <title>Real Update User</title>
      </head>
      <body>
        <h2>Read User Edit</h2>
        <form action="update_user.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
          Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
          Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
          <input type="submit" value="Update User">
        </form>
      </body>
    </html>
    <?php
  } else {
    echo "No user found with this ID.";
  }
} else {
  // Handle the case where there's no ID submitted (Optional)
  // You can display a message or redirect to another page
  echo "Please enter a user ID to edit.";
}

$conn->close();
?>





