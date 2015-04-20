<?php
	$result=$qgen->select("*","tbl_subcat");
	if($db->countRows($result)>0){
		echo "<table class='subcat-table' cellspacing='35' border='1'>";
			echo "<tr class='subcat-row'><th class='subcat-heading'>Id</th><th class='subcat-heading'>Title</th><th class='subcat-heading'>
			Status</th><th class='subcat-heading' colspan='2'>Controls</th></tr>";

			while($arr=$db->fetchAssoc($result)){
				?>
                    <tr class="subcat-row"><td class="subcat-row-data"><?php echo $arr['subcat_id']; ?></td><td class="subcat-row-data">
                    <?php echo $arr['subcat_title'];?></td>
                    <td class="subcat-row-data"><?php echo $arr['subcat_status'];?></td>
                    <td class="subcat-row-data"><a href="?do=editSubcategory&id=<?php echo $arr['subcat_id']; ?>">Edit</a></td>
                    <td class="subcat-row-data"><a href="actions/do-delete-subcategory.php?id=<?php echo $arr['subcat_id']; ?>">Delete</a></td>
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