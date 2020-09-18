<?php
include "includes/connection.php";
include 'theme/header.php';
include "theme/sidebar.php";
 //session_start();
if(isset($_SESSION['acct_id']))
{
	$uid=$_SESSION['acct_id'];
	if($_GET["action"]=='checkout') {?>
	


		<div class="order-details">
			<h5 class="order-details__title">Your Order</h5>
			
				<div class="order-details__item">
				<div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
					<? $query="select products_table.Product_Id,products_table.Product_Name,
						products_table.Product_image, products_table.Selling_price,cart.cid,cart.quant 
						from products_table,cart where cart.product_id=products_table.Product_Id and 
						cart.user_id='$uid' ";
						$result=mysqli_query($db,$query);
						$mtotal=0;
						while($item=mysqli_fetch_array($result)){
							echo'
							<tr>
								<td class="product-thumbnail">
								
								<img style="height:15rem; width:10em;" name="pimage" class="card-img-top"  src="data:image/jpeg;base64,'.base64_encode($item['Product_image']).'" alt=" ">
								</td>
								<td class="product-name">
								<a href="#">'.$item['Product_Name'].'</a>
								<ul  class="pro__prize">
									<li>'.$item["quant"] * $item["Selling_price"].'</li>
								</ul>
								</td>
								<td class="product-remove">
								<a href="wishlist.php?wishlist_id='.$item['cid'].'">
								<i class="fa fa-trash"></i>
								</a></td>
							</tr>';


						  $mtotal = $mtotal+$item["quant"] * $item["Selling_price"];}
						  $_SESSION['mtotal']=$mtotal;?>
						   </tbody>
                                </table>
                            </div>
				</div>
				<div class="container ordre-details__total">
				<h5>Order total</h5>
				<span class="price"><?php echo $mtotal?></span>
				</div>
		</div>
		<br>
		<div class="container card-deck">
  			<div class="card">   
			  <div class="card-header">
			  <form method="post" action="checkout.php">
      <h5 class="card-title">Add Address</h5>		
	  </div>
   				 <div class="card-body">
      				
      <p class="card-text"><div class="single-input">
								<input type="text" name="address" placeholder="Street Address" required>
							</div></p>
      <p class="card-text"><div class="single-input">
								<input type="text" name="city" placeholder="City/State" required>
							</div></p>
							<p class="card-text"><div class="single-input">
								<input type="text" name="pincode" placeholder="Post code/ zip" required>
							</div></p>
							<input type="hidden" name="total" value='.$mtotal.'>
    </div>
  </div>
  <div class="card">
  <div class="card-header">
      <h5 class="card-title">Payment Method</h5>		
	  </div>
    <div class="card-body">
     
      <p class="card-text"><div class="single-method">
					COD <input type="radio" name="payment_type" value="COD" required/>
					&nbsp;&nbsp;PayU <input type="radio" name="payment_type" value="payu" required/>
				</div></p>
				</div>
				<div  class="card-footer float-right">
      <p class="card-text"><input type="submit" class="btn btn-success" name="submit" value="Submit"/></p>
	  
    </div>
  </div>
 
</div>
</form>			
	<hr>	
						<? } } ?>
		
 







        						
<?php require('theme/stickyfooter.php')?>        