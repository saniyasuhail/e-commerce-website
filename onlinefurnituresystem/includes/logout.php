 <?php 

session_start();
//session_unset($_SESSION['acct_id']);
//unset($_SESSION['username'];
session_destroy();
header("Location: ../index.php");
?>
