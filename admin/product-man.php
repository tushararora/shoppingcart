<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Manager</title>
<link href="css/dashboard.css" rel="stylesheet" />
<link href="css/dashboard-pages.css" rel="stylesheet" />
</head>

<body>
	<?php require('includes/dashboard-nav.php'); ?>
	<div class="pm-main">
    	<div class="pm-main-topbar"><a href="?do=addNewProduct">Add new product</a></div>
         <?php
		if(isset($_SESSION['msg'])){
			echo "<br/><p style='font-family: Arial; font-size:1.4em'>".$_SESSION['msg']."</p>";
			unset($_SESSION['msg']);
		}
		?>
         <?php 
			if(isset($_GET['do'])){
				switch($_GET['do']){
					case 'addNewProduct':
						require('includes/add-new-product.php');
						break;
					case 'editProduct':
						require('includes/add-new-product.php');
						break;
				}
			}
			else
			{
				require('includes/view-all-product.php');
			}
		?>
    </div>
</body>
</html>