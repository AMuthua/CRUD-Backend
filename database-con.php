<!-- This is task:2 Connecting to the database -->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BRAIN";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

?>