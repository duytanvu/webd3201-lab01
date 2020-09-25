<?php
/*
    Duy Tan Vu - 100750366
    September 16 2020
    WEBD3201
*/
$title = "WEBD3201 Login Page";
include "./includes/header.php";

// Someone successfully logs in
// setMessage("You successfully logged in.");
// Redirect user to the dashboard page 
// redirect("./dashboard.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = date("Ymd", time());
    $time = date("h:i:sa");;
    $input_email = trim($_POST["email"]);
    $plain_password = trim($_POST["password"]);

    if (user_select($input_email) == false) {
        setMessage("Email is not registered. Please try again.");
        $input_email = "";
    } else {
        $user = user_authenticate($input_email, $plain_password);
        if ($user == false) {
            $toWrite = fopen ('logs/'.$date.'_log.txt','a');
            fwrite($toWrite,'Sign in failed at '.$time.'. User '.$input_email.' tried to sign in.'.PHP_EOL);
            fclose($toWrite);
            setMessage("Password is incorrect. Please try again.");
        } else {
            $toWrite = fopen ('logs/'.$date.'_log.txt','a');
            fwrite($toWrite,'Sign in success at '.$time.'. User '.$input_email.' sign in.'.PHP_EOL);
            fclose($toWrite);
            setMessage("Welcome back, ".$user['firstname']."! Last login was at ".$user['lastaccess']);
            redirect("dashboard.php");
        }
    }
}

?>   
<h6>
<?php
    if (isset($_SESSION['new_session'])) {
        $date = date("Ymd", time());
        $time = date("h:i:sa");;
        $toWrite = fopen ('logs/'.$date.'_log.txt','a');
        fwrite($toWrite,'Log out success at '.$time.'. User '.$_SESSION['email'].' log out.'.PHP_EOL);
        fclose($toWrite);
        setMessage($_SESSION['new_session']);
        unset($_SESSION['new_session']);
        unset($_SESSION['email']);
    }
    if (!isset($_SESSION['user'])) {
        $message = flashMessage();
    }
    echo $message; 
    ?>
</h6>
<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" value="<?php echo $input_email; ?>" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>
<?php
include "./includes/footer.php";
?>    