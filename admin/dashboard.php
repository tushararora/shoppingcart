<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/dashboard.css" rel="stylesheet" />
<title>Dashboard</title>
</head>

<body>
	<?php require('includes/dashboard-nav.php'); ?>
    <div class="main">
    <?php
		$result=$qgen->select("*","tbl_dashboard","status='Active'");
		while($arr=$db->fetchAssoc($result)){
			?>
            <a href="<?php echo $arr['opt_action']?>">
            <div class="main-category" style="background-color:<?php echo $arr['opt_bg_color']?>">
                <div class="main-category-image"><img src="images/cat_man.png" alt=""/></div>
                <div class="main-category-text"><span><?php echo $arr['opt_title'] ?></span></div>
            </div>
            </a>
			<?php
		}
	?>
    <div style="clear:both;"></div> 
	</div>
	<!-- Web2PDF Converter Button BEGIN -->
<script type="text/javascript">
var
pdfbuttonlabel="Save page as PDF"
</script>
<script src="http://www.web2pdfconvert.com/pdfbutton2.js" id="Web2PDF" type="text/javascript"></script>
<!-- Web2PDF Converter Button END -->

</body>
</html>
