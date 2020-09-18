
<?php

//fetch_data.php

include('connection.php');

if(isset($_POST["action"]))
{
 $query = "
  SELECT * FROM products_table  WHERE 1
  ";

 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
 {
  $query .= "
   AND Selling_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
  ";
 }
 if(isset($_POST["category"]))
 {
  $brand_filter = implode("','", $_POST["category"]);
  $query .= "
   AND categoryname IN ('".$brand_filter."')
  ";
 }
 if(isset($_POST["filtersearch"]))
 {
  
  $query .= "
   AND Product_Name like '" . $_POST["filtersearch"] . "%' ORDER BY Product_Name
  ";
 }
 
 $statement = $db->prepare($query);
 $result = mysqli_query($db,$query);
 if(!$result)
 echo mysqli_error($db);//or die( mysqli_error($db));
 //$result = $result->fetch_array();
 //$result = $statement->fetchAll();
 $total_row = mysqli_num_rows($result);
 $output = '';
 if($total_row > 0)
 {
  foreach($result as $item)
  {
   $output .= '<div class="col-md-4 ">
    <form method="post" action="pos.php?action=detail&id='.$item["Product_Id"].' ">
        <div class="category">
            <div class="ht__cat__thumb">
                <a href="productdetail.php?action=detail&id='.$item["Product_Id"].' " class="">
                    <div class="card mb-3 ">
                        <img style="height:20rem;" name="pimage" class="image-responsive img-thumbnail"  src="data:image/jpeg;base64,'.base64_encode($item['Product_image']).'" alt="">
                    </div>
     
                </a>
            </div>
            <div class="fr__hover__info product__action"> 
                <ul class="product__action">
                    <li><a href="javascript:void(0)" onclick="wishlist_manage('.$item["Product_Id"].')" ><i class="fa fa-heart"></i></a></li>
                    
                </ul>
            </div>
            <div class="card-header">'.$item['Product_Name'].'</div>
                <div class="card-footer">
                     <p class="card-text float-left">&#8377;'.$item["Selling_price"].'</p>
                </div>
            </div>
   
        </div>
    </form>
    <br />
   ';
  }
 }
 else
 {
  $output = '<h3>No Data Found</h3>';
 }
 echo $output;
}

?>
<script>

function wishlist_manage(Product_Id){
   
	$.ajax({
		url:"wishlist_manage.php",
		method:"POST",
        data:{Product_Id:Product_Id},
        
		success:function(result){
			if(result=='not_login'){
				window.location.href='login.php';
			}else{
				jQuery('.htc__wishlist').html(result);
			}
		}	
    });	
}


    </script>