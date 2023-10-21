<?php

require('../../config.php');
session_start();


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id =  $_GET['id'];
    $delete_user = $db->prepare("DELETE FROM users WHERE id = :id");
    $delete_user->execute([
        'id' => $user_id
    ]);
    if($delete_user->execute(['id' => $user_id])){
	    header("Location: ../../admin/page_admin.php");
		
	}
}




