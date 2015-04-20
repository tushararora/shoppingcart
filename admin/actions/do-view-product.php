<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Manager</title>
<link href="css/dashboard.css" rel="stylesheet" />
<link href="css/dashboard-pages.css" rel="stylesheet" />
</head>
<?php
	require('../../commons/connection.php');
	$viewMore=$qgen->select("*","tbl_product");
	echo "<table>";
	while($arr=$db->fetchAssoc($viewMore))
	{
		?>
        	<tr><th>Product Id</th><th><?php $arr['product_id'] ?></th></tr>
            
        <?php
	}
	echo "</table>"	
?>