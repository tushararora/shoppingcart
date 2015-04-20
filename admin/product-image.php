<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
	.productimagetext{
		font-size: 20px;
		font-family: Verdana, Geneva, sans-serif;
		margin :50px auto;
		width: 200px;
		display: block;
	}
	.selectcolor, .selectimage{
		margin: 20px auto;
		font-size: 15px;
		font-family: Verdana, Geneva, sans-serif;
		display: block;
		width: 200px;
	}
	.selectcolor div{
		display: inline-block;
	}
	.submitimageform{
		width: 200px;
		display: block;
		margin: 20px auto;
	}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Manager</title>
<link href="css/dashboard.css" rel="stylesheet" />
<link href="css/dashboard-pages.css" rel="stylesheet" />
</head>
<body>
    <?php
        include('includes/dashboard-nav.php');
    ?>
    <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		}
	?>
    <div class="productimagetext">Add Images Here</div>
   	<form method="post" enctype="multipart/form-data" action="actions/do-add-product-image.php" >
    <input type="hidden" name="product-id" value="<?php echo $_GET['product-id'];?>"/>
    <div class="selectcolor">
    	<div>Select Color:</div>
        <div><input type="color" name="product-color" /></div>
    </div>
    <div class="selectimage">
    	<div>Select Images:</div>
    	<input type="file" class="text-box-1" name="product-image1"/>
        <input type="file" class="text-box-1" name="product-image2"/>
        <input type="file" class="text-box-1" name="product-image3"/>
    </div>
    <div class="submitimageform">
    	<input type="submit" name="productimagesub" value="Submit"/>
        <input type="submit" name="productimagesubandmore" value="Submit and Add more"/>
    </div>
    </form>
    </body>
</body>
</html>