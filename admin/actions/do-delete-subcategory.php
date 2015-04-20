<?php
	require('../../commons/connection.php');
	session_start();
	$result=$qgen->delete("tbl_subcat","subcat_id='".$_GET['id']."'");
	if($result){
		$_SESSION['msg']="Subcategory deleted successfully";
	}
	else{
		$_SESSION['msg']="Subcategory can't be deleted";
	}
	$db->closeConnection();
	header("Location:../subcat-man.php");
?>