<?php
	require('../../commons/connection.php');	
	session_start();
	if(isset($_POST['subcatsub'])){
		$subcatTitle=$db->escapeString($_POST['subcat-title']);
		$subcatStatus=$_POST['subcat-status'];
		$catId=$_POST['cat-id'];
		$beingResult=$qgen->select("*","tbl_subcat");
		while($arr=$db->fetchAssoc($beingResult)){
			if($arr['subcat_title']==$subcatTitle && $arr['cat_id']==$catId){
				$msg="Duplicate Entry";
				$_SESSION['msg']=$msg;
				header("Location:../subcat-man.php?do=addNewSubcategory");die;
			}
		}
		if(empty($subcatTitle)){
			$msg="Please fill the Title";
			$_SESSION['msg']=$msg;
			header("Location:../subcat-man.php?do=addNewSubcategory");die;
		}
		$resultSet=$qgen->insert("tbl_subcat","subcat_title,subcat_status,cat_id","'".$subcatTitle."','".$subcatStatus."','".$catId."'");
		if($resultSet){
			$msg="Subcategory Added Successfully";
			$_SESSION['msg']=$msg;
			header("Location:../subcat-man.php?do=addNewSubcategory");die;
		}
		$db->closeConnection();
	}

?>