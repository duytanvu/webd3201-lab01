<?php 
/*
    Duy Tan Vu - 100750366
    September 16 2020
    WEBD3201
*/
require "constants.php";

function db_connect() {
    return pg_connect("host=".DB_HOST." port=".DB_PORT." dbname=".DATABASE." user=".DB_ADMIN." password=".DB_PASSWORD);
}

$conn = db_connect();

// Two prepared statements
$user_select_smtm = pg_prepare($conn, "user_select", "SELECT * FROM users WHERE EmailAddress = $1");
$user_update_login_time_stmt = pg_prepare($conn, "user_update_login_time", "UPDATE users SET LastAccess=CURRENT_TIMESTAMP WHERE EmailAddress=$1");

function user_select($input_email) {
    $conn = db_connect();
    $result = pg_execute($conn, "user_select", array($input_email));
    if (pg_num_rows($result) == 1) {
        $user = pg_fetch_assoc($result, 0);
        return $user;
    } else {
        return false;
    }
}

function user_authenticate($input_email, $plain_password) {
    $conn = db_connect();
    $result = pg_execute($conn, "user_select", array($input_email));
    $user = pg_fetch_assoc($result, 0);
    // if (pg_num_rows($result) == 1) {
        // $user = user_select($input_email);
        $is_user = password_verify($plain_password, $user['password']);
        if ($is_user == true) {
            pg_execute($conn, "user_update_login_time", array($input_email));
            // $result2 = pg_execute($conn, "user_select", array($input_email));
            $_SESSION['email'] = $user['email'];
            // $user = pg_fetch_assoc($result2, 0);
            $_SESSION['user'] = $user;
            // $_SESSION['lastaccess'] = $user['lastaccess'];
            return $user;
        } else {
            return false;
        }
    // } else {
    //     return false;
    // }
}
?>