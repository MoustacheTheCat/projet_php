<?php
	session_start();
	if(session_destroy()){
		unset($_SESSION['user_name']);
		unset($_SESSION['id']);
		unset($_SESSION['user_role']);
		header("Location: http://projet_php.com/index.php");
	}
?>