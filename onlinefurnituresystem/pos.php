<?php include('connection.php');
include 'theme/header.php';
include 'theme/sidebar.php'; 
?>  
<?php 
if(!(isset($_SESSION['acct_id'])))
{
  if (isset($_POST["add_to_cart"])) 
    {
      $av = $_POST['onhand'];
      $qq = $_POST["quant"];
        if ($av > $qq) 
        {
          if (isset($_SESSION["cart"])) 
            {
                $itemarrayid = array_column($_SESSION["cart"], "ids");
                  if (!in_array($_GET["id"], $itemarrayid)) 
                    {
   
                          $count=count($_SESSION["cart"]);
                          $itemarray = array(
                            'ids' => $_GET["id"],
                          'name' => $_POST["hiddenname"],
                          'price' => $_POST["hiddenprice"],
                          'quantity' => $_POST["quant"]);
                          $_SESSION["cart"][$count] = $itemarray;
                          echo '<script>window.location="productdetail.php?action=detail&id='.$_GET["id"].'"</script>';
                    }   
                    else
                      {
                          echo '<script>alert("Product is Already Added ")</script>';
                          echo '<script>window.location="productdetail.php?action=detail&id='.$_GET["id"].'"</script>';
                      }  
            }
          else
            {  
                $itemarray = array(                  
                'ids' => $_GET["id"], 
                'name' => $_POST["hiddenname"],
                'price' => $_POST["hiddenprice"],
                'quantity' => $_POST["quant"]);
                $_SESSION['cart'][0] = $itemarray;
                echo '<script>window.location="productdetail.php?action=detail&id='.$_GET["id"].'"</script>';
            }
        }
        else{
          echo '<script>alert("Unavailable Quantity")</script>';
          echo '<script>window.location="productdetail.php?action=detail&id='.$_GET["id"].'"</script>';
            }
    }
          if (isset($_GET["action"])) {
            if ($_GET["action"]=='delete') {
              foreach ($_SESSION["cart"] as $keys => $values) {
                if ($values['ids']==$_GET["id"]) {
                  unset($_SESSION["cart"][$keys]);
                  echo '<script>alert("Product is Removed")</script>';
                      echo '<script>window.location="pos.php"</script>';
                }
              }
            }
          }
?>
<div class="row">
    <?php 
        $query = "SELECT * FROM products_table GROUP BY ProductCode";
        $result = mysqli_query($db,$query);
        if (mysqli_num_rows($result)>0) 
        {
        while ($row=mysqli_fetch_array($result)) 
        {
        ?>

          <?php
          }
          }
          ?>
          </div>
            <div class=" mb-3">
                  <div class="card-header">
                     <h2>Your Cart</h2>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        
                                        <th>Name Of Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th> 
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                if (!empty($_SESSION["cart"])) {
                                   $_SESSION['mtotal']=0;                                   
                                  foreach($_SESSION["cart"] as $keys => $values){                                   
                                    ?>
                                    <tr>                                     
                                      <td><?php echo $values["name"]; ?></td>
                                      <td><?php echo $values["quantity"]; ?></td>
                                      <td><?php echo $values["price"]; ?></td>
                                      <td><?php echo $values["quantity"] * $values["price"]; ?></td>
                                      <td><a class="btn btn-danger" type="button" href="pos.php?action=delete&id=<?php echo $values["ids"]; ?>">Remove</a></td>
                                    </tr>
                                    <?php 
                                    $name= $values["name"];
                                    $_SESSION['mtotal'] = $_SESSION['mtotal']+($values["quantity"] * $values["price"]);
                                  }
                                  ?>                              
                                  <td colspan="3" align="right">Sub Total</td>
                                  <td align="right"><?php echo $_SESSION['mtotal'];?></td>
                                  <td><a type="button" class="btn btn-success" href="transpos.php?action=checkout">Checkout</a></td>
                                  <td></td>                                  
                                  <?php
                                }
                                 ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                 </div>
            </div>
            </div>
<? }

else
{
  
    $uid=$_SESSION['acct_id'];  
    $query="select products_table.Product_Id,products_table.Product_Name,
    products_table.Product_image, products_table.Selling_price,cart.cid,cart.quant 
    from products_table,cart where cart.product_id=products_table.Product_Id and 
    cart.user_id='$uid'  ";
    $result=mysqli_query($db,$query);
   
    if(!$result)
    {
      echo mysqli_error($db);
    }?>
        <div class=" mb-3">
                  <div class="card-header">
                     <h2>Your Cart</h2>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Name Of Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th> 
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <? $mtotal=0;
                                while($item=mysqli_fetch_array($result)){ 
                                  ?>
                                  <tr>  
                                                                      
                                      <td style="display: flex;justify-content: center;"><?php echo ' <img style="height:15rem; width:10em;" name="pimage" class="card-img-top"  src="data:image/jpeg;base64,'.base64_encode($item['Product_image']).'" alt=" ">';?></td>
                                      <td><?php echo $item["Product_Name"]; ?></td>
                                      <td  ><?php echo ' <form method="post" action="pos.php?action="update"&id='.$item["Product_Id"].'""><input class="form-control" type="hidden" name="productid" value='.$item["Product_Id"].'>
                                      <input style="display: inline; width:3rem;"class="form-control"  type="number" id="quant" name="quant" value='.$item["quant"].' >
                                      <input style="display: inline;"  class="btn btn-warning" type="submit" name="update" value="Update" ></form>'; ?></td>
                                      <td><?php echo $item["Selling_price"]; ?></td>
                                      <td><?php echo $item["quant"] * $item["Selling_price"]; ?></td>
                                      <td><a class="btn btn-danger" type="button" href="pos.php?action=delete&id=<?php echo $item["Product_Id"]; ?>">Remove</a></td>
                                      </tr>
                                    <?php 
                                    $name= $item["Product_Name"];
                                    $mtotal = $mtotal+$item["quant"] * $item["Selling_price"];
                                    $_SESSION['mtotal']=$mtotal;
                                  }
                                  ?><tr> 
                                 
                                  <td></td>                            
                                  <td colspan="3" align="right">Sub Total</td>
                                  <td align="right"><?php echo $mtotal;?></td>
                                  <td><a type="button" class="btn btn-success" href="transpos.php?action=checkout">Checkout</a></td>
                                   
                                  </tr>                                
                                  </tbody>
                            </table>
                          </div>
                        </div>
                 </div>
            </div>
            </div>
            <? 

  if (isset($_POST["add_to_cart"]))
  {  
      $av = $_POST['onhand'];
      $qq = $_POST["quant"];
      if ($av > $qq) 
      {
          $pid=$_POST['productid'];
          $pprice= $_POST["hiddenprice"];
          $query="select * from cart where product_id='$pid' and user_id='$uid'  ";

          $result=mysqli_query($db,$query);
          $cresult=mysqli_num_rows($result);
          
          if($cresult>=1){
            
            echo '<script>alert("Product is Already Added ")</script>';
           
            echo '<script>window.location="productdetail.php?action=detail&id='.$pid.'"</script>';
           
          }
          else{
              $query="Insert into cart (user_id,product_id,product_price,quant) values('$uid','$pid','$pprice','$qq')";
              $result=mysqli_query($db,$query);
              echo '<script>window.location="productdetail.php?action=detail&id='.$pid.'"</script>';
       
              } 
         
      }
      else
        {  
          echo '<script>alert("Unavailable Quantity")</script>';
          echo '<script>window.location="productdetail.php?action=detail&id='.$pid.'"</script>';
        }     
  }
  if(isset($_GET["action"])){
      if($_GET["action"]=="delete"){
        $pid=$_GET['id'];
        $query="Delete from cart where product_id='$pid' and user_id='$uid'";
        $result=mysqli_query($db,$query);
        echo '<script>window.location="pos.php"</script>';
      }
  }

  
    if(isset($_POST["update"])){
     
       
        $pid=$_POST['productid'];
      $quant=$_POST['quant'];
      $query="Update cart SET quant=$quant where product_id='$pid' and user_id='$uid'";
      $result=mysqli_query($db,$query);
      if(!$result)
      echo mysqli_error($db);
      else{
        echo '<script>window.location.href=window.location.href</script>';
      }      
    
}

}

?>


<?php include('theme/stickyfooter.php')?>   
