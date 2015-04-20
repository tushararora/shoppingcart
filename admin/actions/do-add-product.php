<?php
	require('../../commons/connection.php');	
	session_start();
	if(isset($_POST['productsub'])){
			require('../../commons/upload-process.php');
			$productTitle=$_POST['product-title'];
			$productStatus=$_POST['product-status'];
			$productDescription=$_POST['product-description'];
			$productPrice=$_POST['product-price'];
			$productBrand=$_POST['product-brand'];
			$productRetailer=$_POST['product-retailer'];
			$productDeliveryDuration=$_POST['product-deliveryduration'];
			$subcatId=$_POST['subcat-id'];
			$beingResult=$qgen->select("*","tbl_product");
			while($arr=$db->fetchAssoc($beingResult)){
				if($arr['product_title']==$productTitle && $arr['subcat_id']==$subcatId){
					$msg="Duplicate Entry";
					$_SESSION['msg']=$msg;
					header("Location:../product-man.php?do=addNewProduct");die;
				}
			}
			if(empty($productTitle)){
			$msg="Please fill the Title";
			$_SESSION['msg']=$msg;
			header("Location:../product-man.php?do=addNewProduct");die;
			}
			if(empty($productDescription)){
			$msg="Please fill the Decsription";
			$_SESSION['msg']=$msg;
			header("Location:../product-man.php?do=addNewProduct");die;
			}
			if(empty($productPrice)){
			$msg="Please fill the Price";
			$_SESSION['msg']=$msg;
			header("Location:../product-man.php?do=addNewProduct");die;
			}
			if(empty($productBrand)){
			$msg="Please fill the Brand";
			$_SESSION['msg']=$msg;
			header("Location:../product-man.php?do=addNewProduct");die;
			}
			if(empty($productDeliveryDuration)){
			$msg="Please fill the Delivery Duration";
			$_SESSION['msg']=$msg;
			header("Location:../product-man.php?do=addNewProduct");die;
			}
			$resultSet=$qgen->insert("tbl_product",
			"product_title,product_status,product_description,product_price,product_brand
			,product_retailer,product_deliveryduration,subcat_id",
			"'".$productTitle."','".$productStatus."','".$productDescription."','".$productPrice."',
			'".$productBrand."','".$productRetailer."','".$productDeliveryDuration."'
			,'".$subcatId."'",false);
			$id=$db->getInsertId();
			if($resultSet){
			header("Location:../product-image.php?product-id=".$id."");
			}
		}

	$db->closeConnection();

?>