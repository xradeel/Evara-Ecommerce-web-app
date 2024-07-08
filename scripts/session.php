<?php
session_start();

if (!isset($_SESSION['SESSION_ID']) || $_SESSION['SESSION_ID'] != true) {
    header('location: page-login.php');
}
