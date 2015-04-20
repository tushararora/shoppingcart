<?php
	require('../../commons/connection.php');
	require('../../commons/upload-process.php');	
	session_start();
	if(isset($_POST['productimagesub'])){
		$productColor=$_POST['product-color'];
		$productImg=array();
            if(isset($_FILES['product-image1']['tmp_name'])) 
				$productImg[]=imageUpload('product-image1');
			if(isset($_FILES['product-image2']['tmp_name'])) 
				$productImg[]=imageUpload('product-image2');
			if(isset($_FILES['product-image3']['tmp_name'])) 
				$productImg[]=imageUpload('product-image3');
        $productImage=implode(',',$productImg);
		if(empty($productImage)){
			$msg="Please fill the Image";
			$_SESSION['msg']=$msg;
			header("Location:../product-man.php?do=addNewProduct");die;
		}
		if(empty($productColor)){
			$msg="Please fill the Color";
			$_SESSION['msg']=$msg;
			header("Location:../product-man.php?do=addNewProduct");die;
		}
		$resultImageSet=$qgen->insert("tbl_productimage","product_color,product_images,product_id","'".$productColor."','".$productImage."',
		'".$_POST['product-id']."'");
		
		if($resultImageSet){
			$_SESSION['msg']="Images added successfully";
			header("Location:../product-image.php");die;
		}
		else{
			$_SESSION['msg']="Images can't be added";
			header("Location:../product-image.php");die;
		}
	}
?>