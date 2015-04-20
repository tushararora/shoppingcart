<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
    	<link href="css/admin-main.css" rel="stylesheet" />
    </head>
    <body>
    	<div class="admin-login">
            <form action="adminlogin.php" method="post">
                <table>
                	<tr><td class="login">Admin Login</td></tr>
                    <tr>  
                    <td>            
                    <?php

						if(isset($_SESSION['msg'])){
							echo "<span style='font-family: Arial'>".$_SESSION['msg']."</span>";
							unset($_SESSION['msg']);
						}
					?>
					</td>
                   	</tr>
                    <tr><td><input class="text-box" type="text" name="username" placeholder="Username" /></td></tr>
                    <tr><td><input class="text-box" type="password" name="password" placeholder="Password" /></td></tr>
                    <tr><td><input class="btn" type="submit" name="sub" value="Login" /></td></tr>
                </table>
            </form>
         </div>
    </body>
</html>