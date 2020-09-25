<?php
/*
    Duy Tan Vu - 100750366
    September 16 2020
    WEBD3201
*/
$title = "WEBD3201 Home Page";
include "./includes/header.php";

// Determine that someone is not logged in
// redirect("sign-in.php");
?>

<h1 class="cover-heading">Cover your page.</h1>
<h6><?php echo $message?></h6>
<p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
<p class="lead">
    <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
</p>

<?php
include "./includes/footer.php";
?>    