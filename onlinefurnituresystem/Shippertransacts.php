<?php
 include('connection.php');
  include('theme/header.php');

 	?>
 	<?php include('theme/sidebar.php');?>
 <div class="col-lg-12">
                <?php
						$Shipper_id = $_POST['Shipper_id'];
					    $Company_Name = $_POST['Company_Name'];
				
					switch($_GET['action']){
						case 'add':			
								$query = "INSERT INTO shippers
								(Shipper_id, Company_Name)
								VALUES ('".$Shipper_id."','".$Company_Name."')";
								
							
						break;
									
						}
if(mysqli_query($db,$query)){
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "Shipperadd.php";
		</script>
                   <?}
else
{
?>
    	<script type="text/javascript">
			alert("Already Present.");
			window.location = "Shipperadd.php";
		</script>
                    <?}
?>
