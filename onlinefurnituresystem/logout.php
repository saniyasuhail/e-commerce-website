
<?php
session_start();
unset($_SESSION['acct_id']);
unset($_SESSION['username']);
unset($_SESSION['fname']);
unset($_SESSION['email']);
unset($_SESSION['position']);
unset($_SESSION['cart']);
//session_destroy();
header("Location: index.php");

?>
