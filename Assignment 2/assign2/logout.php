<?php
// clear all session variables
session_start();

// removes all session variables and data associated with the user's session.
$_SESSION = array();

// destroy the current session
session_destroy();

// Redirect to home page
header('Location: index.php');
exit();
