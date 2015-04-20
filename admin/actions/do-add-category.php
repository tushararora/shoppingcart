<?php
	require('../../commons/connection.php');
	session_start();
	if(isset($_POST['catsub'])){
		$catTitle=$db->escapeString($_POST['cat-title']);
		$catStatus=$db->escapeString($_POST['cat-status']);
		$menuId=$_POST['menu-id'];
		$result=$result=$qgen->select("*","tbl_category");
		while($arr=$db->fetchAssoc($result)){
			if(($arr['menu_id']==$menuId) && ($arr['cat_title']==$catTitle)){
				$msg="Duplicate Entry";
				$_SESSION['msg']=$msg;
				header("Location:../cat-man.php?do=addNewCategory");die;
			}
		}
		if(empty($catTitle)){
			$msg="Please fill the Title";
			$_SESSION['msg']=$msg;
			header("Location:../cat-man.php?do=addNewCategory");die;
		}
		$result=$qgen->insert("tbl_category","cat_title,cat_status,menu_id","'".$catTitle."','".$catStatus."','".$menuId."'");
		if($result){
			$msg="Category Added Successfully";
			$_SESSION['msg']=$msg;
			header("Location:../cat-man.php?do=addNewCategory");die;
		}
		$db->closeConnection();
	}

?>