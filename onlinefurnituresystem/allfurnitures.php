<?php include('connection.php');?>  

<!--header area-->
<?php include 'theme/header.php'; ?>

<!--sidebar area-->
<?php include 'theme/sidebar.php'; ?>
<?php include('carousel.php'); ?>
<?php 

	$query="SELECT * FROM products_table GROUP BY Product_Id";
	$result = mysqli_query($db,$query);
   	$rows = $result->num_rows;    // Find total rows returned by database
	
	if($rows > 0) {
		$cols = 4;    // Define number of columns
		$counter = 1;     // Counter used to identify if we need to start or end a row
		$nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
		
		while ($item = $result->fetch_array()) {
			if(($counter % $cols) == 1) { 

echo ' <div style="margin-top: 25px; margin-right: 15px;
  margin-left: 15px;" class="row">';}

echo '<div class="col-sm-3"><div class="card  mb-3">
<form method="post" action="productdetail.php?action=detail&id='.$item["Product_Id"].'">
<img style="height: 18rem;"class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($item['Product_image']).'" alt=""><div class="card-body text-center"> 
<input class="btn btn-info" type="submit" name="detail" value="Detail" style="margin-top: 10px"></div></form>
    </div>
  </div>';
if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
				echo '</div>';	 //  Close the row
			}
			$counter++;    // Increase the counter
		}
		$result->free();

echo '</div>';	
}?>

<hr>
<body>
    <!-- Page Content -->
    

    

  



   
<?php include('theme/stickyfooter.php'); ?>

