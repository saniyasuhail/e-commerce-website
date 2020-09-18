<?php 
include('connection.php');
include 'theme/header.php';
include 'theme/sidebar.php'; 
class add_to_cart{
	function addProduct($pid,$qty){
		$_SESSION['cart'][$pid]['qty']=$qty;
	}
	
	function updateProduct($pid,$qty){
		if(isset($_SESSION['cart'][$pid])){
			$_SESSION['cart'][$pid]['qty']=$qty;
		}
	}
	
	function removeProduct($pid){
		if(isset($_SESSION['cart'][$pid])){
			unset($_SESSION['cart'][$pid]);
		}
	}
	
	function emptyProduct(){
		unset($_SESSION['cart']);
	}
	
	function totalProduct(){
		if(isset($_SESSION['cart'])){
			return count($_SESSION['cart']);
		}else{
			return 0;
		}
		
	}

}


function get_product(){
	$sql="select * from products_table where 1 ";
	/*if($cat_id!=''){
		$sql.=" and product.categories_id=$cat_id ";
	}
	if($product_id!=''){
		$sql.=" and product.id=$product_id ";
	}
	$sql.=" and product.categories_id=categories.id ";
	if($search_str!=''){
		$sql.=" and (product.name like '%$search_str%' or product.description like '%$search_str%') ";
	}
	if($sort_order!=''){
		$sql.=$sort_order;
	}else{
		$sql.=" order by product.id desc ";
	}
	if($limit!=''){
		$sql.=" limit $limit";
	}
	//echo $sql;*/
	$res=mysqli_query($db,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}



?>