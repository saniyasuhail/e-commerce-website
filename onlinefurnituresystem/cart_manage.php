<?php 
include('connection.php');
include('theme/header.php');
include('theme/sidebar.php');
require('add_to_cart_class.php');




$pid=($_POST['Product_Id']);
$qty=($_POST['quant']);
//$type=($_POST['onhand']);

$obj=new add_to_cart();


	$obj->addProduct($pid,$qty);


if($type=='remove'){
	$obj->removeProduct($pid);
}

if($type=='update'){
	$obj->updateProduct($pid,$qty);
}

echo $obj->totalProduct();
?>

