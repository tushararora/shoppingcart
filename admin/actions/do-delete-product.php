<?php 
	require('../../commons/connection.php');
	session_start();
	$result=$qgen->delete("tbl_product","product_id='".$_GET['id']."'");
	if($result){
		$_SESSION['msg']="Product deleted successfully";
	}
	else{
		$_SESSION['msg']="Product can't be deleted";
	}
	$db->closeConnection();
	header("Location:../product-man.php");

?>