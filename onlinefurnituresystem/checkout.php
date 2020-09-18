<?
include "includes/connection.php";
session_start();
$uid=$_SESSION['acct_id'];
if (isset($_POST['submit'])){
    $mtotal=$_SESSION['mtotal'];
    $address=$_POST['address'];
    $city=$_POST['city'];
	$pincode=$_POST['pincode'];
	$method=$_POST['payment_type'];
	

    
			$query = 'SELECT current_date FROM tblaccounts';
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            while($row = mysqli_fetch_array($result))
              {   
               $date = $row['current_date'];
              }

				$time=time();	
				$query1="Select * from cart where user_id='$uid'";
				$result1=mysqli_query($db,$query1);
				//$cresult=mysqli_num_rows($result);
				 
				  //echo $cresult;
				while($item=mysqli_fetch_array($result1))
				{
					$result=mysqli_query($db, "INSERT INTO orderdetails(order_code,order_date,Product_code,UnitPrice,Quantity,total,customer_id)VALUES('".$time."','".$date."','".$item['product_id']."','".$item['product_price']."','".$item['quant']."','".$item['quant'] * $item['product_price']."','".$_SESSION['acct_id']."')")or die(mysqli_error($db));
					

					mysqli_query($db, "UPDATE products_table SET Onhand = Onhand - '".$item['quant']."'WHERE ProductCode ='".$item['product_id']."'")or die(mysqli_error($db));
				}
				
					mysqli_query($db, "INSERT INTO `order`(order_code,order_date,customer_id,order_street_address,order_city_and_state,pincode,total_price,status)VALUES('".$time."','".$date."','".$_SESSION['acct_id']."','".$address."','".$city."','".$pincode."','".$mtotal."','Pending')")or die(mysqli_error($db));

					mysqli_query($db, "INSERT INTO `notification`(customer_id,username,status)VALUES('".$_SESSION['acct_id']."','".$_SESSION['username']."','added')")or die(mysqli_error($db));
			}
				
										unset($_SESSION["cart"]);
										unset($_SESSION["mtotal"]);
										$query="DELETE from cart WHERE 1";
										$result=mysqli_query($db,$query);
										
										if($method=="payu")
										header("Location:PHP_Bolt-master/index.php");
										?>
                                        <script>
                                        alert("Successfully ordered")
                                        window.location="orderview.php"
                                        </script>
                                        																	
										
								
						
				