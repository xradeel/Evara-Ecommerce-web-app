<?php
$servername = "adeelsarwar.database.windows.net";
$username = "adeelsarwar";
$password = "Fa21-bcs-094";
$db_name = "web-project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
