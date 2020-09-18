<?php 
$wishlist_count=0;
include('connection.php');

	
//session_start();
if (isset ($_SESSION['acct_id'])) {
if($_SESSION['position']=='Admin') {


  ?>
		
<body id="page-top">
  <header class="dropbtn2 text-gray-700 body-font">
		  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
		    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
		      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
			        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
		      </svg>
		      <span class="ml-3 text-xl">Avon PlyHouse</span>
		    </a>
		    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <button class="dropbtn1">Home</button>
		        <button class="dropbtn1">All Furnitures</button>
			          <div class="dropdown">
			              <button class="dropbtn ">Administration</button>
			                    <div class="dropdown-content">
			                          <a  href="Productstable.php">Products Table</a>
                                <a href="Shipperstable.php">Shippers Table</a>
                                <a  href="Suppliertable.php">Suppliers Table</a>
                                <a  href="categorytable.php">Category Table</a>
                                <a href="orderstbl.php">Orders Table</a>
			                      </div>
			            </div>
		
		                    <button class="dropbtn1">About Us</button>
                        <button class="dropbtn1" onclick="window.location.href='contact.php'">Contact Us</button>
                        <button data-toggle="modal" data-target="#logoutModal" class="dropbtn1 ">Logout</button>
                        <button class="notification" onclick="window.location.href='sidebar.php'">Notification
                            <?php
                                $query = "SELECT * FROM notification";
                                $result = mysqli_query($db,$query);
                                $count = 0;
                                while($row = mysqli_fetch_array($result)){
                                      $count++;
                                }
                                  echo '<br>'.'    '.'
                                  <span class="badge badge-danger">';?><?php echo $count;?>
                                  <?php echo'</span></button></a>
                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">';
                                  ?>
                                  <?php 
                                      $query2 = "SELECT * FROM notification order by not_id LIMIT 8";
                                      $count2= 0;
                                      $result2 = mysqli_query($db,$query2);
                                  ?>
                                  <?php 
                                        while($row2 = mysqli_fetch_array($result2)):; 
                                            $_SESSION['p']=$row2[1];
                                            echo '<a class="mr-5 hover:text-gray-900" href="notification.php">';?>
                                            <?php echo $row2[2]; echo ' ' .'added transaction </a>';?>
                                            <?php  endwhile;
                                             ?>
          </nav>
    </header>
</div><?
}

    else if ($_SESSION['position']=='Customer') { 
      
      $uid=$_SESSION['acct_id'];
	
      if(isset($_GET['wishlist_id'])){
        $wid=$_GET['wishlist_id'];
        mysqli_query($db,"delete from wishlist where wid='$wid' and user_id='$uid'");
        
      }
      $wishlist_count=mysqli_num_rows(mysqli_query($db,"select * from wishlist where user_id='$uid'"));
      
      if(!isset($_SESSION["acct_id"])){
        $count = count($_SESSION["cart"]);
      } else {
        $count=mysqli_num_rows(mysqli_query($db,"select * from cart where user_id='$uid'"));
      }?>
<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
     <a class="navbar-brand" href="index.php"><strong>Avon Plyhouse</strong></a>
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
 <ul class="nav  navbar-nav nav-flex-icons navbar-right">
 <li  class="nav-item">
 <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
    <input class="form-control " type="search" id="search-box" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-secondary my-2 my-sm-0" type="submit" >Search</button>
  </form>
  <div id="suggesstion-box" class="dropdown-menu dropdown-menu-right dropdown-info" 
  aria-labelledby="navbarDropdownMenuLink-4"></div>
 
  </li>
    <li>
   <a class="nav-link" href="wishlist.php" ><span class="htc__wishlistadd"> 
      <i class="fa fa-heart" aria-hidden="true"></i> </span>
     <span class="htc__wishlist badge badge-light"><?php echo $wishlist_count?></span></a>
    </li>
    <li>
   <a class="nav-link" href="pos.php" > 
      <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
      <span class="htc_qua badge badge-light" id="cart-count"><?php  echo $count; ?></span>
    </a></li>
                 
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> <?php echo " ".$_SESSION['username'];?></a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="#">My account</a>
          <a class="dropdown-item" href="orderview.php">My Orders</a>
          <a class="dropdown-item" href="logout.php" ><i class="fas fa-sign-out-alt">Logout</i></a></li>
        </div>
      </li>
      
           
    </div>
  </div>

</nav>	

<?
      
      }
    }
    
      ?>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "suggest.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});
//To select country name
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}



</script>
       
        
            
    
