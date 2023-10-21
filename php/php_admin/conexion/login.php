<?php
require('../../config.php');
require('../request/request.php');
session_start();


if (isset($_POST['users_names'] , $_POST['users_passwords'])){
	$user_name = $_POST['users_names'];
	$user_password = $_POST['users_passwords'];
	$verif_user = $db->prepare("SELECT * FROM users WHERE users_names = :users_names");
    $verif_user->execute(array(':users_names' => $_POST['users_names']));
	$data = $verif_user->fetchAll();
	if(password_verify($user_password, $data[0]["users_passwords"])) {
	    $_SESSION['user_name'] = $user_name;
		$_SESSION['id'] = $data[0]["id"];
		$_SESSION['users_roles'] = $data[0]["users_roles"];
		$_SESSION['start'] = time();
	    header("Location: http://projet_php.com/admin/page_admin.php");
		
	}else{
		header("Location: http://projet_php.com/admin/page_admin.php");
		echo "password is incorrect.";
	}
}else{
	echo "user name or password is incorrect.";
}
?>