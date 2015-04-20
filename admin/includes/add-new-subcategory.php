<style>
.text-box-1{
	border: solid 2px #C3E2E8;
	margin-top: 5px;
	padding: 0;
	border-radius: 5px;
	font-size: 13px;
	height: 38px;
	width: 263px;
}
.text-box-2{
	border: solid 2px #C3E2E8;
	margin-top: 5px;
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
<form method="post" action="actions/<?php if(isset($_GET['do']) and $_GET['do']=="editSubcategory"){
		echo "do-update-subcategory.php";
		$result=$qgen->select("*","tbl_subcat","subcat_id=".$_GET['id']."");
		$row=$db->fetchAssoc($result);
	
	}
	else{
		echo "do-add-subcategory.php";
	}
	
	?>" >
 	<?php 
		if(isset($_GET['do']) and $_GET['do']=="editSubcategory"){
	?>
			<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
    <?php 
		}
	?>
    <table>
    	<?php 
			$getResult=$qgen->select("*","tbl_category");
			
		?>
        <tr>
            <td class="text">Select Category</td>
                <td>
                    <select class="text-box-2" name="cat-id">
                    <?php
						while($arr=$db->fetchAssoc($getResult)){
							$resultmenu=$qgen->select("*","tbl_menu");
					?>
                       <option value="<?php echo $arr['cat_id'];?>" <?php if(isset($_GET['do']) and $_GET['do']=="editSubcategory" 
					   and $row['cat_id']==$arr['cat_id']){echo "selected='selected'";}?>>
					   <?php  while($arrmenu=$db->fetchAssoc($resultmenu)){if($arr['menu_id']==$arrmenu['menu_id']) 
					   echo $arrmenu['menu_title'];} echo "&nbsp;"; echo $arr['cat_title']; 
					?></option>;
                    <?php
						}
					?>
                    
                    </select>
                </td>
        </tr>
    	<tr><td class="text">Title</td><td><input  class="text-box-1" type="text" name="subcat-title" placeholder="Enter SubCategory Title" 
            value="<?php if(isset($_GET['do']) and $_GET['do']=="editSubcategory"){ echo $row['subcat_title'];} ?>"/></td></tr>
            <tr><td class="text">Status</td>
            <td>
            <select class="text-box-2" name="subcat-status">
            	<option value="Active" <?php if(isset($_GET['do']) and $_GET['do']=="editSubcategory" and $row['subcat_status']=="Active")
				{echo "selected='selected'";}?> >Active</option>
                <option value="Inactive" <?php if(isset($_GET['do']) and $_GET['do']=="editSubcategory" and $row['subcat_status']=="Inactive")
				{echo "selected='selected'";} ?> >Inactive</option>
                <option value="Delete" <?php if(isset($_GET['do']) and $_GET['do']=="editSubcategory" and $row['subcat_status']=="Delete")
				{echo "selected='selected'";} ?> >Delete</option></select>
            </td>
            </tr>
            <tr><td><input class="btn" type="submit" name="subcatsub" 
            value="<?php if(isset($_GET['do']) and $_GET['do']=="editSubcategory"){echo "Update";}else {echo "Add";}?> Subcategory" />
            </td></tr>
    </table>