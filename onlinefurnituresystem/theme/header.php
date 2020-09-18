<?php session_start(); 
if (isset($_SESSION['fname'])) {
  # code...
  $uid=$_SESSION['acct_id'];
  if(isset($_SESSION["cart"])){
  foreach($_SESSION["cart"] as $key=>$values){
    $pid=$values["ids"];
    $price=$values["price"];
    $quantity=$values["quantity"];
    $sql1="select * from cart where user_id=$uid and product_id=$pid";
    $result1 = mysqli_num_rows(mysqli_query($db,$sql1));
    if($result1<1){
    $sql= "insert into cart( user_id, product_id, product_price, quant) values ('$uid','$pid','$price','$quantity')";
    $result = mysqli_query($db,$sql);
    if(!$result)
    {
      echo mysqli_error($db);
    }
    unset($_SESSION["cart"]);
  }
  else{
    //echo '<script>alert("Product already present")</script>';
  }
  }
}
}
  
//$count=0;?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Custom fonts for this template--> <link href="css/drop.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="css/drop.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="vendor/jquery/jquery-ui.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"  media="screen">
<!--script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script-->


<style>
	.htc__shopping__cart a span.htc__wishlist {
		background: #c43b68;
		border-radius: 100%;
		color: #fff;
		font-size: 9px;
		height: 17px;
		line-height: 19px;
		position: absolute;
		right: 18px;
		text-align: center;
		top: -4px;
		width: 17px;
	}
	</style>
 
    <title>Avon PlyHouse</title>
  </head>

   

 
<?
   
if (!isset ($_SESSION['acct_id']))
{
  if(!empty($_SESSION["cart"])){
  $count = count($_SESSION["cart"]);
} else {
  $count = 0;
}?>

<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
     <a class="navbar-brand" href="#"><strong>Avon Plyhouse</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="search.php">All Furnitures</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
      </ul>
      <!--form class=" nav  navbar-nav nav-flex-icons navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form-->
 <ul class="nav  navbar-nav nav-flex-icons navbar-right">
 <li>
   <a class="nav-link" href="pos.php" > 
      <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
      <span class="badge badge-light" id="cart-count"><?php print $count; ?></span>
    </a></li>
                 <li>
                 <a class="nav-link"href="register.php">
                 <span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li>
      <a class="nav-link" href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
    </div>
  </div>
  
</nav>
<?}?>
 
  
