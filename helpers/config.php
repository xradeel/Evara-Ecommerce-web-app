<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";



// PHP Data Objects(PDO) Sample Code:
// try {
//     $conn = new PDO("sqlsrv:server = tcp:adeelsarwar.database.windows.net,1433; Database = web-project", "adeelsarwar", "Fa21-bcs-094");
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     print("Error connecting to SQL Server.");
//     die(print_r($e));
// }

// // SQL Server Extension Sample Code:
// $connectionInfo = array("UID" => "adeelsarwar", "pwd" => "Fa21-bcs-094", "Database" => "web-project", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
// $serverName = "tcp:adeelsarwar.database.windows.net,1433";
// $conn = sqlsrv_connect($serverName, $connectionInfo);
