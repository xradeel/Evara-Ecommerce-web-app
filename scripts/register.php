<?php
include '../helpers/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $mdpassword = md5($password);

   $TokenKey = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!*()$";
   $TokenKey = str_shuffle($TokenKey);
   $TokenKey = substr($TokenKey, 0, 32);

   $MySqlCommand = "SELECT username FROM users WHERE username = '$username' ";
   $Result = mysqli_query($conn, $MySqlCommand);
   $userexist = mysqli_fetch_assoc($Result);
   if (mysqli_num_rows($Result) > 0) die('1');
   $MySqlCommand = "SELECT email FROM users WHERE email = '$email' ";
   $Result = mysqli_query($conn, $MySqlCommand);
   if (mysqli_num_rows($Result) > 0) die('2');

   $MySqlCommand = "SELECT MAX(id) FROM users";
   $Result = mysqli_query($conn, $MySqlCommand);
   $MaxID = mysqli_fetch_array($Result);
   $UserID = $MaxID['0'];
   $UserID = $UserID + 1;

   $TodayDate = date("Ymd");
   $Reference =  $TodayDate . "_" . str_pad($UserID, 8, "0", STR_PAD_LEFT);
   $Status = 1;
   $IP = $_SERVER['REMOTE_ADDR'];

   $Query = "INSERT INTO users (id, reference, username, " .
      " email, password, status, upassword, ipaddress, lastmodified, accesstoken) " .
      " VALUES($UserID, '$Reference', '$username', " .
      "  '$email', '$mdpassword', $Status, '$password', '$IP', '$TodayDate' ,'$TokenKey')";
   if (mysqli_query($conn, $Query)) {
      echo "3";
   } else {
      echo "Error: " . mysqli_error($conn);
   }
} else {
   echo "Exception Found, Try Again";
}

mysqli_close($conn);
