<?php
       
       include('connection.php');
       include('theme/header.php');
       
        ?>  

<?php
			 $zz= $_POST['Orders_id'];
               
                $up = $_POST['UnitPrice'];
                $q = $_POST['quantity'];
                $tp = $_POST['TotalPrice'];

		$query = 'UPDATE orderdetails set  
					UnitPrice ="'.$up.'", Quantity ="'.$q.'",
					total ="'.$tp.'" WHERE
					Orders_id ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "Orderdetailtable.php";
		</script>
