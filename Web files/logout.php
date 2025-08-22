<?php
session_start();
//Destroy session so that user is no longer logged in
$_SESSION['loggedin']=FALSE;
session_destroy();
//Go back to login form
header("Location: session.php");
exit();
?>