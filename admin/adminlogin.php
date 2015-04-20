<?php
	session_start();
	require('../commons/connection.php');
	if(isset($_POST['sub'])){
		$username=$db->escapeString($_POST['username']);
		$password=$db->escapeString($_POST['password']);
		if(empty($username) && empty($password)){
			$msg="Please fill Username and Password";
			$_SESSION['msg']=$msg;
			header("Location:index.php");die;
		}
		if(empty($username)){
			$msg="Please fill the Username";
			$_SESSION['msg']=$msg;
			header("Location:index.php");die;
		}
		if(empty($password)){
			$msg="Please fill the Password";
			$_SESSION['msg']=$msg;
			header("Location:index.php");die;
		}
		$result=$qgen->select("*","adminlogin","username='".$username."' and password='".$password."'");
		if($db->countRows($result)==1){
			//echo "Hie";
			header("Location:dashboard.php");die;
		}
		else{
			$msg="Invalid Username or Password";
			$_SESSION['msg']=$msg;
			header("Location:index.php");die;
		}
		
		$db->closeConnection();
	}
	

?>