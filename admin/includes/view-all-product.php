<?php
	$result=$qgen->select("*","tbl_product");
	if($db->countRows($result)>0){
		echo "<table class='product-table' cellspacing='35' border='1'>";
			echo "<tr class='product-row'><th class='product-heading'>Id</th><th class='product-heading'>Title</th><th 	
			class='product-heading'>Status</th><th class='product-heading'>Price</th><th class='product-heading'>Brand</th>		
			<th class='product-heading' colspan='3'>Controls</th></tr>";
			while($arr=$db->fetchAssoc($result)){
				?>
                    <tr class="product-row"><td class="product-row-data"><?php echo $arr['product_id']; ?></td>
                    <td class="product-row-data"><?php echo $arr['product_title'];?></td>
                    <td class="product-row-data"><?php echo $arr['product_status'];?></td>
                    <td class="product-row-data"><?php echo $arr['product_price'];?></td>
                    <td class="product-row-data"><?php echo $arr['product_brand'];?></td>
                    <td class="product-row-data"><a href="?do=editProduct&id=<?php echo $arr['product_id']; ?>">Edit</a></td>
                    <td class="product-row-data"><a href="actions/do-delete-product.php?id=<?php echo $arr['product_id']; ?>">Delete</a></td>
                    <td class="product-row-data"><a href="actions/do-view-product.php?id=<?php echo $arr['product_id']; ?>">View More</a></td>
                    </tr>

                <?php
			}
		echo "</table>";
	}
	else{
		echo "<br/><p style='font-family: Arial; font-size: 1.6em'>No record found</p>";
	}
	$db->closeConnection();
?>