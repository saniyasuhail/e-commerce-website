<?php 

//index.php
include('connection.php');
include 'theme/header.php'; 
include 'theme/sidebar.php';
?>
<head> 

   <style>
        #loading
        {
        text-align:center; 
        background: url('images/loader.gif') no-repeat center; 
        height: 150px;
        }
   </style>
  
</head>

<body>
<?php
    if(isset($_POST['search'])){
        $search=$_POST['search'];
    }
    else
        $search="";
?>
    <!-- Page Content -->
    <div class="container ">
        <div class="row ">
         <br />
         <br />
         <div  class="col-md-2 float-left ">
            <div class="list-group">
            <h3>Price</h3>
                <input type="hidden" id="filtersearch" value="<?php echo $search?>" />
                <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">100 - 500</p>
                    <div id="price_range"></div>
                </div>  
                
                <div class="list-group">
                    <h3>Category</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                        <?php
                        $query = "SELECT DISTINCT(categoryname) FROM category ORDER BY category_id DESC";
                        $result = mysqli_query($db,$query)or die( mysqli_error($db));
                        foreach($result as $row)
                        {
                        ?>
                            <div class="list-group-item checkbox">
                                <label><input type="checkbox" class="common_selector category" value="<?php echo $row['categoryname']; ?>"  > <?php echo $row['categoryname']; ?></label>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-10  float-right">
                <br />                
                <div class="row filter_data">
                </div>               
            </div>
        </div>
    </div>
    <hr>

    

    <script>
    $(document).ready(function(){

        filter_data();

        function filter_data()
        {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var minimum_price = $('#hidden_minimum_price').val();
            var maximum_price = $('#hidden_maximum_price').val();
            var category = get_filter('category');
            var filtersearch = $('#filtersearch').val();
            
            $.ajax({
                url:"fetch_data.php",
                method:"POST",
                data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price,
                 category:category,filtersearch:filtersearch},
                success:function(data){
                    $('.filter_data').html(data);
                }
            });
        }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });
  
    $('#price_range').slider({
        range:true,
        min:100,
        max:500,
        values:[100, 500],
        step:50,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });



});

</script>


<?php include('theme/stickyfooter.php');?>