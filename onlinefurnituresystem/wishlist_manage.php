<?php
include('connection.php');
session_start();
//require('functions.inc.php');


$pid=($_POST['Product_Id']);


if(isset($_SESSION['username'])){
	$uid=$_SESSION['acct_id'];
	if(mysqli_num_rows(mysqli_query($db,"select * from wishlist where user_id='$uid' and product_id='$pid'"))>0){
		//echo "Already added";
    }
    else{
        $added_on=date('Y-m-d h:i:s');
        
		mysqli_query($db,"insert into wishlist(user_id,product_id,added_on) values('$uid','$pid','$added_on')");
		//wishlist_add($db,$uid,$pid);
		//echo "added";
	}
	echo $total_record=mysqli_num_rows(mysqli_query($db,"select * from wishlist where user_id='$uid'"));
}
else{
	$_SESSION['WISHLIST_ID']=$pid;
    echo "not_login";
    
}
?>