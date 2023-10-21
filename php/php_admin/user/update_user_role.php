<?php

require('../../config.php');
session_start();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];
    $user_data = $db->prepare("SELECT * FROM users WHERE id = :user_id");
    $user_data->execute(array(':user_id' => $user_id));
    $user = $user_data->fetchAll();
}

if (isset($_POST['user_role'])) {
    $new_user_role = $_POST['user_role'];
    $update_role = $db->prepare("UPDATE users SET user_role = :new_user_role WHERE id = :user_id");

    if ($update_role->execute(array(':new_user_role' => $new_user_role, ':user_id' => $user_id))) {
        header("Location: ../../admin/page_admin.php");
    } else {
        echo('error update');
    }
} else {
    echo('error isset');
}
?>
