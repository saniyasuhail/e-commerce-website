<?php 

include('connection.php'); ?>
 
<?php include('theme/header.php'); ?>
<?php include('theme/sidebar.php'); ?>
<?php include('carousel.php'); ?>

<center><div class="card-header">
<h3>Explore Our Range Of Products</h3>
</div></center>



<?php

	$query = "SELECT * FROM category GROUP BY category_id";
	$result = mysqli_query($db,$query);
	$rows = $result->num_rows;    // Find total rows returned by database
	
	if($rows > 0) {
		$cols = 4;    // Define number of columns
		$counter = 1;     // Counter used to identify if we need to start or end a row
		$nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns

while ($item = $result->fetch_array()) {
			if(($counter % $cols) == 1) { 

echo '<div style="margin-top: 25px; margin-right: 15px;
  margin-left: 15px;" class="row">';}

echo '<div class="col-sm-3"><div class="card  mb-3">
<a href="cproducts.php?action=view&id='.$item["category_id"].'">
<form method="post" action="cproducts.php?action=view&id='.$item["category_id"].'">
<img style="height: 18rem;"class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($item['category_icon']).'" alt=""></a>
<div class="card-body text-center"> <h5 class="card-title">'.$item['categoryname'].'</h5>
<input class="btn btn-info " type="submit" name="viewmore" value="View More " style="margin-top: 10px"></div></form>
    </div>
  </div>';
if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
				echo '</div>';	 //  Close the row
			}
			$counter++;    // Increase the counter
		}
		$result->free();

echo '</div>';	
}?>




  
    

      
       
        
        
      
  
<hr>

<center><div class="card-header">
<h3>Some of Our Best Products</h3>
</div></center>


 <div class="container my-4">

   

   
    <!--Carousel Wrapper-->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

      <!--Controls-->
     
      <!--/.Controls-->

      <!--Indicators-->
      <ol class="carousel-indicators">
        <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
        <li data-target="#multi-item-example" data-slide-to="1"></li>
        <li data-target="#multi-item-example" data-slide-to="2"></li>
      </ol>
      <!--/.Indicators-->

      <!--Slides-->
      <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <div class="carousel-item active">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
                <img style="height: 25rem;"class="card-img-top" src="theme/carousel/bs1.jpeg"
                  alt="Card image cap">
                <div class="card-body text-white bg-dark">
                  <h4 class="card-title">Book Shelf</h4>
                  
                  <a href="productdetail.php?action=detail&id=967" class="btn btn-info stretched-link">View</a>
                </div>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2 ">
                <img style="height: 25rem;" class="card-img-top" src="theme/carousel/cb1.jpeg"
                  alt="Card image cap">
                <div class="card-body text-white bg-dark">
                  <h4 class="card-title">Full Wall Cupboard</h4>
                  
                  <a href="productdetail.php?action=detail&id=977" class="btn btn-info">View</a>
                </div>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
                <img style="height: 25rem;" class="card-img-top" src="theme/carousel/cb2.jpeg"
                  alt="Card image cap">
                <div class="card-body text-white bg-dark">
                  <h4 class="card-title">Big Cupboard</h4>
                  
                  <a href="productdetail.php?action=detail&id=976" class="btn btn-info">View</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!--/.First slide-->

        <!--Second slide-->
        <div class="carousel-item">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
                <img style="height: 25rem;" class="card-img-top" src="theme/carousel/ct1.jpeg"
                  alt="Card image cap">
                <div class="card-body text-white bg-dark">
                  <h4 class="card-title">Wooden Coffee Table</h4>
                  
                  <a href="productdetail.php?action=detail&id=974"class="btn btn-info">View</a>
                </div>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
                <img style="height: 25rem;"class="card-img-top" src="theme/carousel/ct2.jpeg"
                  alt="Card image cap">
                <div class="card-body text-white bg-dark">
                  <h4 class="card-title">Glass Coffee Table</h4>
                  
                  <a href="productdetail.php?action=detail&id=972"class="btn btn-info">View</a>
                </div>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
                <img style="height: 25rem;" class="card-img-top" src="theme/carousel/dt1.jpeg"
                  alt="Card image cap">
                <div class="card-body text-white bg-dark">
                  <h4 class="card-title">Wooden Dining Table</h4>
                  
                  <a href="productdetail.php?action=detail&id=969" class="btn btn-info">View</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!--/.Second slide-->

        <!--Third slide-->
        <div class="carousel-item">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-2">
                <img style="height: 25rem;" class="card-img-top" src="theme/carousel/s1.jpeg"
                  alt="Card image cap">
                <div class="card-body text-white bg-dark">
                  <h4 class="card-title">Comfy Sofa</h4>
                  
                  <a href="productdetail.php?action=detail&id=957" class="btn btn-info">View</a>
                </div>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
                <img style="height: 25rem;" class="card-img-top" src="theme/carousel/sofa.jpg"
                  alt="Card image cap">
                <div class="card-body text-white bg-dark">
                  <h4 class="card-title">Basic Sofa</h4>
                  
                  <a href="productdetail.php?action=detail&id=950" class="btn btn-info">View</a>
                </div>
              </div>
            </div>

            <div class="col-md-4 clearfix d-none d-md-block">
              <div class="card mb-2">
                <img style="height: 25rem;" class="card-img-top" src="theme/carousel/bed.jpeg"
                  alt="Card image cap">
                <div class="card-body text-white bg-dark">
                  <h4 class="card-title">King Bed</h4>
                  
                  <a href="productdetail.php?action=detail&id=962" class="btn btn-info">View</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!--/.Third slide-->

      </div>
      <!--/.Slides-->

    </div>
    <!--/.Carousel Wrapper-->


  </div>

  <hr>
<?php include('theme/stickyfooter.php'); ?>


