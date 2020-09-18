<?php
 include('connection.php');
 include('theme/header.php');
?>
<?php include('theme/sidebar.php');?>
 <div class="col-lg-12">
                <?php
						//$Product_Id = $_POST['Product_Id'];
					    $Product_Name = $_POST['Product_Name'];
					     $qnty = $_POST['qnty'];
					    $Supplier_Id = $_POST['Supplier_Id'];
					    $category = $_POST['category'];
					    $quantity = $_POST['quantity'];
					    $onhand = $_POST['onhand'];
					    $unit = $_POST['unit'];
					    $markup = $_POST['markup'];
					    $sale = $_POST['sale'];
					    $date = $_POST['date'];
					    $code = $_POST['code'];
				
$idname=$_FILES['productimage']['name'];
$idtmpname=$_FILES['productimage']['tmp_name'];
$idsize=$_FILES['productimage']['size'];
$iderror=$_FILES['productimage']['error'];
$idtype=$_FILES['productimage']['type'];
$ifileext=explode('.',$idname);
$idactualext=strtolower(end($ifileext));
$allowed=array('jpg','jpeg','png');
if(in_array($idactualext,$allowed)){
if($iderror===0){
if($idsize<100000){
$iduname=uniqid('',true).".".$idactualext;


$pdata=addslashes(file_get_contents($_FILES['productimage']['tmp_name']));
}
else{
echo "File size too big";
}
}
else
{
echo "Some error in uploading file.";
}
}
else
{
echo "You cannot upload this file type.";
}
					switch($_GET['action']){
						case 'add':
						
									$query = "INSERT INTO products_table
								( Product_Name, Supplier_Id,category_id, Quantity, Onhand, Original_price,markup,Selling_price,date,ProductCode,Product_image)
								VALUES ('".$Product_Name."','".$Supplier_Id."','".$category."','".$qnty."','".$qnty."','".$unit."','".$markup."','".$sale."','".$date."','".$code."','".$pdata."')";
								mysqli_query($db,$query)or die (mysqli_error($db));;
										
								
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "Productstable.php";
		</script>
                    </div>
                    <?php include('theme/stickyfooter.php');?>
