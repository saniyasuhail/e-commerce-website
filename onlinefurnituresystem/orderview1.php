<?php
include('connection.php');
include('theme/header.php');
?>
<?php include('theme/sidebar.php');
?>
<?php 
$query = 'SELECT a.order_code,concat(b.f_name," ",b.l_name)as name,concat(a.order_street_address," ",a.order_city_and_state," ",a.pincode)as address, b.contact,a.status FROM `order` a,tblaccounts b
              WHERE a.customer_id=b.acct_id and
              order_code ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
               $stats = $row['status'];
               $name = $row['name'];
               $contact = $row['contact'];
               $address = $row['address'];
               $cd = $row['order_code'];
              }
         
?>
 <span id="divToPrint">
 <div class="">
   
            <div class="card-header">
              <div style="margin-bottom: 60px">
             <center><h2>Order Summary</h2>
         </div>
              
               
         <ul>
             <div  style="margin-bottom: 30px">
            <h5>Order No.# : 0<?php echo $cd; ?></h5>
            <h5>Name : <?php echo $name; ?></h5>
            <h5>Contact : 0<?php echo $contact; ?></h5>
            <h5>Address : <?php echo $address; ?></h5>
        
        </div>
            
                

            <div class="card-body">
                <h4>Orders</h4>
              <div class="table-responsive">
                            <table class="table" width="100%" cellspacing="0">
                                <thead align="left">
                                    <tr>
                                        <th>Product</th>
                                        <th>Name Of Product</th>
                                        <th>OrderDate</th>
                                        <th>Quantity</th>
                                        <th>Price</th> 
                                        <th>Total</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php                  
                $query = "SELECT b.Product_image,b.Product_Name,a.order_date,a.Quantity,a.UnitPrice,a.total FROM orderdetails a,products_table b WHERE a.Product_code=b.Product_Id AND a.order_code='".$_GET['id']."' GROUP BY a.Product_code";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td style="display: flex;justify-content: center;"><img style="height:5rem; width:5em;" name="pimage" class="card-img-top"  src="data:image/jpeg;base64,'.base64_encode($row['Product_image']).'" alt=" "></td>';
                            echo '<td>'. $row['Product_Name'].'</td>';                     
                            echo '<td>'. $row['order_date'].'</td>';
                            echo '<td>'. $row['Quantity'].'</td>';
                            echo '<td>&#8377 '. $row['UnitPrice'].'</td>';
                            echo '<td>&#8377 '. $row['total'].'</td>';
                           /* echo '<td>  ';
                            echo '<center> <a  type="button" class="btn btn-lg btn-info fas fa-cart-plus" href="addtransacdetail.php?action=edit & id='.$row['transac_id'] . '"></a> </td></center>';*/
                            echo '</tr> ';
                }
            ?> 
                                    
                                </tbody>
                            </table>

                        </div>
            </div>
            <?php 
$query = 'SELECT * FROM `order`
              WHERE
              order_code ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
               $zz = $row['total_price'];
              }
         
?>

          <h5 align="right" style="margin-right: 165px">Total Price :&#8377 <?php echo $zz; ?></h5>
          </div>



          
        </div><br>
</ul>
</span>
            <?php if ($_SESSION['position']=='Customer') { 
              echo '<div style="margin-left:5rem;"><a href="orderview.php" class="btn  btn-info float-left" ><i class="fa fa-arrow-left"></i>  Back</a></div>';
           }else{
            echo '<a href="orderdetailtable.php" class="btn btn-xs btn-info fas fa-arrow-left" >Back</a>';
           } ?>
             
             <?php 
             if ($stats=='Confirmed') {
               ?>
               <div  style="margin-right:5rem;"><a href="#" class="btn btn-info float-right" value="print" onclick="PrintDiv();"><i class="fa fa-print"></i> Print</a></div><hr>
            <?php }
              ?>
             <br> <br> 
    <?php include('theme/stickyfooter.php');?>


        <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=900,height=900');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
