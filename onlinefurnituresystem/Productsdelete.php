
<?php
       
       include('connection.php');
       include('theme/header.php');
       
        ?>  

<body>
<?php

	

			
			
			switch ($_GET['type']) {
				case 'products_table':
					$query = 'DELETE FROM products_table
							WHERE
							Product_Id = ' . $_GET['id'];
						$result = mysqli_query($db, $query) or die(mysqli_error($db));?>
						<script type="text/javascript">
				alert("Successfully Deleted.");
				window.location = "Productstable.php";
			</script>	<?
				break;
						case 'customercancel':
							
							$orderid= $_GET['id'];
							
							$query = "Select order_code from `order` where order_id =$orderid";
							$result=mysqli_query($db,$query);
							$item=mysqli_fetch_array($result);
							$ordercode=$item['order_code'];
							
							$query1="Select * FROM orderdetails
									WHERE
									order_code =  $ordercode";
								$result1 = mysqli_query($db, $query1);
								if(!$result1)
								echo mysqli_error($db);
								while($item=mysqli_fetch_array($result1)){
									
								mysqli_query($db, "UPDATE products_table SET Onhand = Onhand + '".$item['Quantity']."'
								WHERE Product_Id ='".$item['Product_code']."'")or die(mysqli_error($db));
								}
							
								$query2 = "UPDATE `order` SET status='Request for cancellation'
									WHERE
									order_id= $orderid";
								$result2 = mysqli_query($db, $query2) ;
								if(!$result2)
								echo mysqli_error($db);
?>
			<script>
			alert("Request for order cancellation sent")
			window.location="orderview.php";
			</script>			
				
			<?php
			//break;
				}
			
			?>

</body>
</html>