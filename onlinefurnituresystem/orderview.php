<?php
include('connection.php');
include('theme/header.php');

?>
<?php include('theme/sidebar.php');
?>
    
          <!-- Breadcrumbs-->
<div class="row">
    
    <div class="col-lg-12">
      <div class="col mb-3">
        <div class=" mb-3">
           <div class="card-header">
                        <h2>List of Order</h2>
                        <div class="card-body">       
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTable" with="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Order No.</th>
                                        <th>OrderDate</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php                  
                $query = "SELECT * FROM `order` WHERE `customer_id` = '".$_SESSION['acct_id']."' order by order_date  DESC";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['order_id'].'</td>';
                            echo '<td>'. $row['order_code'].'</td>';
                            echo '<td>'. $row['order_date'].'</td>';
                            echo '<td>'. $row['total_price'].'</td>';
                            echo '<td>'. $row['status'].'</td>';
                            
                            
                          echo ' <td> <a   type="button" class="btn btn-xs  btn-warning " href="orderview1.php?action=edit & id='.$row['order_code'] . '"> Detail</a> </td>';
                          if($row['status']=="Request for cancellation" || $row['status']=="Cancelled")
                         echo ' <td> <a  type="button" class="btn btn-xs btn-danger disabled" href="#" >Cancel</a> </td>';
                         else
                         echo ' <td> <a  type="button" class="btn btn-xs btn-danger" href="Productsdelete.php?type=customercancel&id='.$row['order_id'].'">Cancel</a> </td>';
                         echo '</tr> ';
                }
            ?> 
            
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

                </div>
        <!-- /#page-wrapper -->

    <?php include('ProductsAdd.php'); ?>

        <!-- Sticky Footer -->
  <?php include('theme/stickyfooter.php');?>
