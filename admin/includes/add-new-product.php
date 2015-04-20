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
	<form method="post" enctype="multipart/form-data" action="actions/<?php if(isset($_GET['do']) and $_GET['do']=="editProduct")
	{ 
		echo "do-update-product.php";
		$result=$qgen->select("*","tbl_product","product_id=".$_GET['id']."");
		$row=$db->fetchAssoc($result);
	}
	else{ echo "do-add-product.php";} ?>">
    <?php 
		if(isset($_GET['do']) and $_GET['do']=="editProduct"){
	?>
			<input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
    <?php 
		}
	?>
    	<table>
			<?php 
                $getResult=$qgen->select("*","tbl_subcat");
            ?>
            <tr>
                <td class="text">Select Subcategory</td>
                    <td>
                        <select class="text-box-2" name="subcat-id">
                        <?php
                            while($arr=$db->fetchAssoc($getResult)){
                        ?>
                           <option value="<?php echo $arr['subcat_id'];?>" <?php if(isset($_GET['do']) and $_GET['do']=="editProduct" 
                           and $row['subcat_id']==$arr['subcat_id']){echo "selected='selected'";}?>><?php echo $arr['subcat_title']; ?></option>;
                        <?php
                            }
                        ?>
                        
                        </select>
                    </td>
            </tr>
        	<tr><td class="text">Title</td><td><input  class="text-box-1" type="text" name="product-title" placeholder="Enter Product Title" 
            value="<?php if(isset($_GET['do']) and $_GET['do']=="editProduct"){ echo $row['product_title'];} ?>" /></td></tr>
            <tr><td class="text">Status</td>
            <td>
            <select class="text-box-2" name="product-status">
            	<option value="Active" <?php if(isset($_GET['do']) and $_GET['do']=="editProduct" and $row['product_status']=="Active")
				{echo "selected='selected'";}?> >Active</option>
                <option value="Inactive" <?php if(isset($_GET['do']) and $_GET['do']=="editProduct" and $row['product_status']=="Inactive")
				{echo "selected='selected'";} ?> >Inactive</option>
                <option value="Delete" <?php if(isset($_GET['do']) and $_GET['do']=="editProduct" and $row['product_status']=="Delete")
				{echo "selected='selected'";} ?> >Delete</option></select>
            </td>
            </tr>
            <tr><td class="text">Description</td><td><textarea class="text-box-1" name="product-description" 
            value="<?php if(isset($_GET['do']) and $_GET['do']=="editProduct"){ echo $row['product_description'];}?>" >
			</textarea></td>
            </tr>
            <tr>
            <td class="text">Price</td><td><input type="text" class="text-box-1" name="product-price" 
            value="<?php if(isset($_GET['do']) and $_GET['do']=="editProduct"){ echo $row['product_price'];}?>" >
			</td>
            </tr>
            <tr>
            <td class="text">Brand</td><td><input type="text" class="text-box-1" name="product-brand" 
            value="<?php if(isset($_GET['do']) and $_GET['do']=="editProduct"){ echo $row['product_brand'];}?>" >
			</td>
            </tr>
            <tr>
            <td class="text">Retailer</td><td><input type="text" class="text-box-1" name="product-retailer" 
            value="<?php if(isset($_GET['do']) and $_GET['do']=="editProduct"){ echo $row['product_retailer'];}?>" >
			</td>
            </tr>
            <tr>
            <td class="text">Delivery Duration(In days)</td><td><input type="text" class="text-box-1" name="product-deliveryduration" 
            value="<?php if(isset($_GET['do']) and $_GET['do']=="editProduct"){ echo $row['product_deliveryduration'];}?>" >
			</td>
            </tr>
            <tr><td><input class="btn" type="submit" name="productsub" 
            value="<?php if(isset($_GET['do']) and $_GET['do']=="editProduct"){echo "Update";}else {echo "Add";}?> Product" />
            </td></tr>
        </table>
    </form>