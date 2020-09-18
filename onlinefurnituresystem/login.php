<?php 
include "connection.php";
session_start();
if (isset($_SESSION['fname'])) {
  # code...
  header("location: index.php");
  die();
}

else{ 
  if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $username_cookie=$_COOKIE['username'];
    $password_cookie=$_COOKIE['password'];
    $set_remember="checked='checked'";	
  }
  else{
  $username_cookie='';
  $password_cookie='';
  $set_remember="";
  }
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body style="background-color: white">

    <div class="container">
      <div class="card card-login mx-auto mt-5" ><?php
      if (isset($_GET['error'])) {
           
           if ($_GET["error"]=="nouser") {
               echo '<div><p class="signuperror">Username/Email does not exist. Please <a href="register.php> Register></a> here."</p><div>';
            }
            elseif ($_GET["error"]=="wrongpwd") {
               echo '<div><p class="signuperror">Invalid Username/Password</p></div>';
            }
            
            } 
          
   
         ?>
 
        <div class="card-header">Login</div>
        <div class="card-body">
          <form action="includes/signin.php" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputEmail" name="mailuid" class="form-control" placeholder="Email/Username" autofocus="autofocus"  value="<?php echo $username_cookie?>">
                <label for="inputEmail">Email/Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="pwd" class="form-control" placeholder="Password" value="<?php echo $password_cookie?>" >
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="remember" <?php echo $set_remember?> >
                  Remember Me
                </label>
              </div>
            </div>
            <button class="btn btn-primary btn-block" name="login-submit">Login</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.php">Register an Account</a>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
            <a class="d-block small mt-3" href="index.php">Home</a>
          </div>
        </div>
      </div>
    </div>

 <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
<?php
}
?>
