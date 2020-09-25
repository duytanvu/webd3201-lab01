<?php
/*
    Duy Tan Vu - 100750366
    September 16 2020
    WEBD3201
*/
include 'includes/functions.php';

session_start();
session_destroy();
session_start();
$_SESSION['new_session'] = "You have successfully logged out.";
redirect("sign-in.php");
?>