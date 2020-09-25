<?php
/*
    Duy Tan Vu - 100750366
    September 16 2020
    WEBD3201
*/

// Function to redirect to another URL
function redirect($url) {
    ob_flush();
    header("Location:".$url);
}

function setMessage($message) {
    $_SESSION['message'] = $message; 
}

function getMessage() {
    return $_SESSION['message'];
}

function isMessage() {
    return isset($_SESSION['message'])?true:false;   // conditional operator
}

function removeMessage() {
    unset($_SESSION['message']);
}

function flashMessage() {
    $message = "";
    if (isMessage()) {
        $message = getMessage();
        removeMessage();
    }
    return $message;
}
?>