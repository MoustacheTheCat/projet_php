<?php

require('../../config.php');
session_start();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];
    $user_data = $db->prepare("SELECT * FROM users WHERE id = :id");
    $user_data->execute(array(':id' => $user_id));
    $user = $user_data->fetchAll();
}
$update_user_info = $db->prepare("UPDATE users SET user_name = :user_name, user_email = :user_email WHERE id = :user_id");
if (isset($_POST['user_name']) || isset($_POST['user_email'])) {
    $update_user_info = $db->prepare("UPDATE users SET user_name = :user_name, user_email = :user_email WHERE id = :user_id");
    
    $execute_params = array(
        ':user_name' => isset($_POST['user_name']) ? $_POST['user_name'] : $user[0]['user_name'],
        ':user_email' => isset($_POST['user_email']) ? $_POST['user_email'] : $user[0]['user_email'],
        ':user_id' => $user_id
    );

    if ($update_user_info->execute($execute_params)) {
        if (isset($_POST['user_name']) && isset($_POST['user_email'])) {
            header("Location: ../../admin/page_admin.php");
            echo('yes');
        } elseif (isset($_POST['user_name'])) {
            header("Location: ../../admin/page_admin.php");
        } elseif (isset($_POST['user_email'])) {
            header("Location: ../../admin/page_admin.php");
        }
    } else {
        echo('error in update ');
    }
} else {
    echo('error isset ');
}
?>
