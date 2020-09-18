<?php
require("connection.php");
//$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM products_table WHERE Product_Name like '" . $_POST["keyword"] . "%' ORDER BY Product_Name LIMIT 0,6";
$result = mysqli_query($db,$query);
if(!empty($result)) {
?>
<ul id="product-list">
<?php
foreach($result as $product) {
?>
<li onClick="selectCountry('<?php echo $product["Product_Name"]; ?>');">
<?php echo $product["Product_Name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>

