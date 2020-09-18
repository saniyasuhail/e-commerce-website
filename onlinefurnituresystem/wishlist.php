<?php include('connection.php'); ?>
<?php include('theme/header.php'); ?>
<?php include('theme/sidebar.php'); ?>
<?php 


$uid=$_SESSION['acct_id'];

$res=mysqli_query($db,"select products_table.Product_Id,products_table.Product_Name,products_table.Product_image,
products_table.Selling_price,wishlist.wid from products_table,wishlist 
where wishlist.product_id=products_table.Product_Id and wishlist.user_id='$uid'");
?>


                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <h2>Your Wishlist</h2>
                            </div>
                        </div>
                    </div>
                </div>
           
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
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
										<?php
										while($row=mysqli_fetch_assoc($res)){
										echo'
											<tr>
                                                <td class="product-thumbnail">
                                                <a href="productdetail.php?action=detail&id='.$row["Product_Id"].'">
                                                <img style="height: 18rem;"class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($row['Product_image']).'" alt="">
                                                </a></td>
                                                <td class="product-name">
                                                <a href="#">'.$row['Product_Name'].'</a>
													                      <ul  class="pro__prize">
                                                <li>'.$row['Selling_price'].'</li>
		
													</ul>
												</td>
                                                <td class="product-remove">
                                                <a href="wishlist.php?wishlist_id='.$row['wid'].'">
                                                <i class="fa fa-trash"></i>
                                                </a></td>
                                            </tr>';?><?php
                                            
                                             } 
                                             ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a href="transpos.php">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        
										
<?php include('theme/stickyfooter.php')?>        