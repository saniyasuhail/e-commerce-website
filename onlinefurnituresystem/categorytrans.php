<?php
 include('connection.php');
 include('theme/header.php');
 	?>
<?php include('theme/sidebar.php');?> 	
 <div class="col-lg-12">
                <?php
						
					    
						$categoryname = $_POST['categoryname'];
						
				$idname=$_FILES['categoryimage']['name'];
$idtmpname=$_FILES['categoryimage']['tmp_name'];
$idsize=$_FILES['categoryimage']['size'];
$iderror=$_FILES['categoryimage']['error'];
$idtype=$_FILES['categoryimage']['type'];
$ifileext=explode('.',$idname);
$idactualext=strtolower(end($ifileext));
$allowed=array('jpg','jpeg','png');
if(in_array($idactualext,$allowed)){
if($iderror===0){
if($idsize<100000){
$iduname=uniqid('',true).".".$idactualext;


$pdata=addslashes(file_get_contents($_FILES['categoryimage']['tmp_name']));
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
								$query = "INSERT INTO category
								( categoryname,category_icon)
								VALUES ('".$categoryname."','".$pdata."')";
								mysqli_query($db,$query)or die (mysqli_error($db));;
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "categorytable.php";
		</script>
                    

<?php include('theme/stickyfooter.php');?>
