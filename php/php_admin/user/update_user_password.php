<?php

require('../../config.php');
session_start();


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];
    $user_data = $db->prepare("SELECT * FROM users WHERE id = :id");
    $user_data->execute(array(':id' => $user_id));
    $user = $user_data->fetchAll();


    if (isset($_POST['user_password'], $_POST['new_user_password'], $_POST['new_user_password_confirme'])){
        $old_password = $_POST['user_password'];
        $new_password = $_POST['new_user_password'];
        $new_password_confirm = $_POST['new_user_password_confirme'];

        if (password_verify($old_password, $user[0]["user_password"])) {
            if ($new_password === $new_password_confirm) {
                $new_password_hash = password_hash($new_password, PASSWORD_ARGON2I);
                $update_password = $db->prepare("UPDATE users SET user_password = :new_password_hash WHERE id = :user_id");
                $update_password->execute(array(':new_password_hash' => $new_password_hash, ':user_id' => $user_id));
                header("Location: ../../admin/page_admin.php");
            } else {
                echo('new password and new password confirme is not ident');
            }
        } else {
            echo('old password is invalide.');
        }
    } else {
        echo('Error isset');
    }
}else {
    echo ('error get user');
}
?>
