<div id="product-grid">
	<div class="txt-heading">Products</div>
    <?php
     include('connection.php');
     include 'theme/header.php';
     $query = "SELECT * FROM products_table ";
 $result = mysqli_query($db,$query)or die( mysqli_error($db));
//$rows = $result->num_rows;

 while ($item = $result->fetch_array()) 
{
  

echo'<form method="post" action="pos.php?action=detail&id='.$item["Product_Id"].' "><div style="margin-top: 25px; margin-right: 55px;
  margin-left: 55px;" class="card-deck">
  <div class="card">
    <img style="height:40rem;" name="pimage" class="card-img-top"  src="data:image/jpeg;base64,'.base64_encode($item['Product_image']).'" alt="Card image cap">
   
</div>
  
  <div class="card">
   <div class="card-header">'.$item['Product_Name'].'</div>
    <div class="card-body">
    
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      </div><input style=" margin-bottom:10px;" class="form-control card-text" type="number" name="quant" value="1">
      <input class="form-control" type="hidden" name="onhand" value='.$item["Onhand"].'>
      <input class="form-control" type="hidden" name="hiddenprice" value='.$item["Selling_price"].'>
      <input class="form-control" type="hidden" name="hiddenname" value='.$item["Product_Name"].'>
      <p class="card-text float-left">&#8377;'.$item["Selling_price"].'</p>
      <div class="card-footer"> 
      <a class="addtowishlist" data-data='.$item["Selling_price"].'>
      <i class="fa fa-heart whishstate"></i></a>
      <input class="btn btn-info  float-right" type="submit" name="add_to_cart" value="Add To Cart " style="margin-top: 10px">
      <p class="card-text"><small class="text-muted"></small></p> </div></form>
      </form>
   
      </div>
  
</div>';
   }



       
			?>
			<input type="button" id="add_<?php echo $key["Product_Id"]; ?>" value="Add to cart" class="btnAddAction cart-action" onClick = "cartAction('add','<?php echo $product_array[$key]["code"]; ?>')" <?php if($in_session != "0") { ?>style="display:none" <?php } ?> />
			<input type="button" id="added_<?php echo $key["Product_Id"]; ?>" value="Added" class="btnAdded" <?php if($in_session != "1") { ?>style="display:none" <?php } ?> />
			</div>
			</form>
		</div>
	<?php
			
	
	?>
</div>