<style>
.text-box-1{
	border: solid 2px #C3E2E8;
	margin-top: 5px;
	margin-left: -30px;
	padding: 0;
	border-radius: 5px;
	font-size: 13px;
	height: 38px;
	width: 263px;
}
.text-box-2{
	border: solid 2px #C3E2E8;
	margin-top: 5px;
	margin-left: -30px;
	padding: 0;
	border-radius: 5px;
	font-size: 13px;
	height: 40px;
	width: 270px;
}
.btn{
	display: block;
	margin: 10px auto;
	color: #fff;
	border: none;
	font-family: Arial, Helvetica, sans-serif;
	padding: 7px 20px;
	background-color: #4881F2;
	border-radius: 3px;
}
.text{
		font-size: 1.7em;
		font-family: Arial, Helvetica, sans-serif;
}
</style>
	<form method="post" action="actions/<?php if(isset($_GET['do']) and $_GET['do']=="editCategory")
	{ 
		echo "do-update-category.php";
		$result=$qgen->select("*","tbl_category","cat_id=".$_GET['id']."");
		$row=$db->fetchAssoc($result);
	}
	else{ echo "do-add-category.php";} ?>">
    <?php 
		if(isset($_GET['do']) and $_GET['do']=="editCategory"){
	?>
			<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
    <?php 
		}
		$resultmenu=$qgen->select("*","tbl_menu");
		
	?>
    	<table>
        	<tr><td class="text">Menu</td><td>
            	<select class="text-box-2" name="menu-id">
                <?php
                	while($rowmenu=$db->fetchAssoc($resultmenu)){
                   
				?>
                	 <option value="<?php echo $rowmenu['menu_id'];?>" <?php if(isset($_GET['do']) and $_GET['do']=="editCategory" 
					   and $row['menu_id']==$rowmenu['menu_id']){echo "selected='selected'";}?>><?php echo $rowmenu['menu_title']; ?></option>;
                <?php
				 }
				?>
                  </select>
            </td>
            </tr>
            <tr>
            <td class="text">Title</td><td><input  class="text-box-1" type="text" name="cat-title" placeholder="Enter Category Title" 
            value="<?php if(isset($_GET['do']) and $_GET['do']=="editCategory"){ echo $row['cat_title'];} ?>" /></td></tr>
            <tr><td class="text">Status</td>
            <td>
            <select class="text-box-2" name="cat-status">
            	<option value="Active" <?php if(isset($_GET['do']) and $_GET['do']=="editCategory" and $row['cat_status']=="Active")
				{echo "selected='selected'";}?> >Active</option>
                <option value="Inactive" <?php if(isset($_GET['do']) and $_GET['do']=="editCategory" and $row['cat_status']=="Inactive")
				{echo "selected='selected'";} ?> >Inactive</option>
                <option value="Delete" <?php if(isset($_GET['do']) and $_GET['do']=="editCategory" and $row['cat_status']=="Delete")
				{echo "selected='selected'";} ?> >Delete</option></select>
            </td>
            </tr>
            <tr><td><input class="btn" type="submit" name="catsub" 
            value="<?php if(isset($_GET['do']) and $_GET['do']=="editCategory"){echo "Update";}else {echo "Add";}?> Category" />
            </td></tr>
        </table>
    </form>