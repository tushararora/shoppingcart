<?php
	require('../../commons/connection.php');
	session_start();
	$result=$qgen->delete("tbl_category","cat_id='".$_GET['id']."'");
	if($result){
		$_SESSION['msg']="Category deleted successfully";
	}
	else{
		$_SESSION['msg']="Category can't be deleted";
	}
	$db->closeCOnnection();
	header("Location:../cat-man.php");
?>