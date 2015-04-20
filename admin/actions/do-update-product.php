<?php
	require('../../commons/connection.php');
	session_start();
	if(isset($_POST['productsub'])){
		$productTitle=$db->escapeString($_POST['product-title']);
		$productStatus=$_POST['product-status'];
		$productDescription=$_POST['product-description'];
		$productPrice=$_POST['product-price'];
		$productBrand=$_POST['product-brand'];
		$productRetailer=$_POST['product-retailer'];
		$productDeliveryDuration=$_POST['product-deliveryduration'];
		$subcatId=$_POST['subcat-id'];
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
			if(empty($productRetailer)){
			$msg="Please fill the Retailer";
			$_SESSION['msg']=$msg;
			header("Location:../product-man.php?do=addNewProduct");die;
			}
			if(empty($productDeliveryDuration)){
			$msg="Please fill the Delivery Duration";
			$_SESSION['msg']=$msg;
			header("Location:../product-man.php?do=addNewProduct");die;
			}
			
			$r=$qgen->update("tbl_product",
			"product_title='".$productTitle."',product_status='".$productStatus."', product_description='".$productDescription."',
			product_price='".$productPrice."',product_brand='".$productBrand."',product_retailer='".$productRetailer."',
			product_deliveryduration='".$productDeliveryDuration."'",
			"subcat_id='".$subcatId."' and product_id='".$_POST['id']."'");
			if($r){
				$_SESSION['msg']="Product updated successfully";
			}
			else{
				$_SESSION['msg']="Product can't be updated";
			}
	}
	header("Location:../product-man.php");


?>