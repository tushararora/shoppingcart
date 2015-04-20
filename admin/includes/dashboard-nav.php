<?php
	require('../commons/connection.php');
?>

<div class="banner">
    	<a href="dashboard.php"><div class="banner-text">Dashboard</div></a>
        <div class="banner-links">
        	<ul>
            	<li class="banner-link-border">Settings</li>
            	<li>Logout</li>
            </ul>
        </div>
    </div>
<div class="navbar">
	<ul>
    <?php
		$result=$qgen->select("*","tbl_dashboard");
		while($arr=$db->fetchAssoc($result)){
			echo "<li><a href='".$arr['opt_action']."'>".$arr['opt_title']."</a></li>";
		}
	?>
    </ul>
</div>

