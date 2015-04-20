<?php
	require('commons/connection.php');
	$resultmenu=$qgen->selectOrder("*","tbl_menu","menu_id");
	//$resultcategory=$qgen->select("*","tbl_category");
	//$resultsubcategory=$qgen->select("*","tbl_subcat");
?>
	<div class="header">
        <div class="banner">	
            <div class="coupon">
            </div>
            <div class="shortcuts">
                <a href="#" class="contact" >Contact</a>
                <a href="#" class="login" >Login</a>
            </div>
        </div>
        <div class="searchbar">
            <div class="logo">
            </div>
            <div class="search">
                <input type="text" class="searchtext" placeholder="Search"/>
                <input type="submit" value="Search" class="searchsubmit"/>
            </div>
            <div class="createaccount"><a href="#">Create Account &nbsp;></a></div>
        </div>

        <div class="navbar">
            <ul class="nav">
            <?php
			
				while($arrmenu=$db->fetchAssoc($resultmenu)){
					$i=0;
					$firsttime=1;
				?>
                <li <?php if($arrmenu['menu_title']=="More") echo "class='more'"; ?>><a href="#"><?php echo $arrmenu['menu_title']; ?></a>
				<?php
				$resultcategory=$qgen->select("*","tbl_category","menu_id=".$arrmenu['menu_id']."");
				echo "<div>";
					while($arrcat=$db->fetchAssoc($resultcategory)){
							$resultsubcategory=$qgen->select("*","tbl_subcat","cat_id=".$arrcat['cat_id']."");
								echo "<div class='nav-column'>";
							
                            echo "<h3>"; echo $arrcat['cat_title']; echo "</h3>";
						
              				echo "<ul>";
							while($arrsubcat=$db->fetchAssoc($resultsubcategory)){
						?>
                                <li><a href="cat_id=<?php echo $arrcat['cat_id']; ?>&subcatid=<?php echo $arrsubcat['subcat_id'];?>">
								<?php echo $arrsubcat['subcat_title']; ?></a></li>
                         <?php    
							}
                            echo "</ul>";
							echo "</div>";
		
							$firsttime=0;
                        
					}
						echo "</div>";
						echo "</li>";
				}	
			?>
            </ul>
        </div>
      </div>