<?php
	$result=$qgen->select("*","tbl_category");
	if($db->countRows($result)>0){
		echo "<table class='cat-table' cellspacing='35' border='1'>";
			echo "<tr class='cat-row'><th class='cat-heading'>Id</th><th class='cat-heading'>Title</th><th class='cat-heading'>Status</th>
			<th class='cat-heading' colspan='2'>Controls</th></tr>";

			while($arr=$db->fetchAssoc($result)){
				?>
                    <tr class="cat-row"><td class="cat-row-data"><?php echo $arr['cat_id']; ?></td><td class="cat-row-data">
                    <?php echo $arr['cat_title'];?></td>
                    <td class="cat-row-data"><?php echo $arr['cat_status'];?></td>
                    <td class="cat-row-data"><a href="?do=editCategory&id=<?php echo $arr['cat_id']; ?>">Edit</a></td>
                    <td class="cat-row-data"><a href="actions/do-delete-category.php?id=<?php echo $arr['cat_id']; ?>">Delete</a></td>
                    </tr>
                <?php
				
			}
		echo "</table>";
		
	}
	else
	{
		echo "<br/><p style='font-family: Arial; font-size: 1.6em'>No record found</p>";
	}
	$db->closeConnection();

?>
