<?php
require_once 'session.php';

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page after logout
header("location: login.php");
exit();
