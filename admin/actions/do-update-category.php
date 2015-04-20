<?php
	require('../../commons/connection.php');
	session_start();
	if(isset($_POST['catsub'])){
		$catTitle=$db->escapeString($_POST['cat-title']);
		$catStatus=$db->escapeString($_POST['cat-status']);
		$menuId=$_POST['menu-id'];
		if(empty($catTitle)){
			$msg="Please fill the Title";
			$_SESSION['msg']=$msg;
			header("Location:../cat-man.php?do=addNewCategory");die;
		}
		//$title=$_POST['title'];
		//$status=$_POST['status'];
		$result=$qgen->update("tbl_category","cat_title='".$_POST['cat-title']."',cat_status='".$_POST['cat-status']."',
		menu_id='".$menuId."'","cat_id='".$_POST['id']."'");
		if($result){
			$_SESSION['msg']="Category updated successfully";
		}
		else{
			$_SESSION['msg']="Category can't be updated";
		}
	}
	$db->closeConnection();
	header("Location:../cat-man.php");


?>