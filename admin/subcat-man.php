<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/dashboard.css" rel="stylesheet" />
<link href="css/dashboard-pages.css" rel="stylesheet" />
<title>Dashboard-SubCategory Manager</title>
</head>
<body>
	<?php require('includes/dashboard-nav.php'); ?>
    <div class="sm-main">
    	<div class="sm-main-topbar"><a href="?do=addNewSubcategory">Add New Subcategory</a></div>
        <?php
		if(isset($_SESSION['msg'])){
			echo "<br/><p style='font-family: Arial; font-size:1.4em'>".$_SESSION['msg']."</p>";
			unset($_SESSION['msg']);
		}
		?>
       	 <?php 
			if(isset($_GET['do'])){
				switch($_GET['do']){
					case 'addNewSubcategory':
						require('includes/add-new-subcategory.php');
						break;
					case 'editSubcategory':
						require('includes/add-new-subcategory.php');
						break;
				}
			}
			else
			{
				require('includes/view-all-subcategory.php');
			}
		?>
    </div>
</body>