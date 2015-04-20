<?php
	require('../../commons/connection.php');
	session_start();
	if(isset($_POST['subcatsub'])){
		$subcatTitle=$db->escapeString($_POST['subcat-title']);
		$subcatStatus=$_POST['subcat-status'];
		$catId=$_POST['cat-id'];
		if(empty($subcatTitle)){
			$msg="Please fill the Title";
			$_SESSION['msg']=$msg;
			header("Location:../subcat-man.php?do=addNewSubcategory");die;
		}
		$r=$qgen->update("tbl_subcat","subcat_title='".$subcatTitle."',subcat_status='".$subcatStatus."',cat_id='".$catId."'",
		"subcat_id='".$_POST['id']."'");
		if($r){
			$_SESSION['msg']="Subcategory updated successfully";
		}
		else{
			$_SESSION['msg']="Subcategory can't be updated";
		}
	}
	header("Location:../subcat-man.php");


?>