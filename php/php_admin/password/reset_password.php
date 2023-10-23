<?php
$user_id = $_GET['id'];
require('../../config.php');
require('../request/request.php');
session_start();
$users = getOneData($db, 'users', 'id',$user_id);

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    if (isset($_POST['user_email'], $_POST['new_user_password'], $_POST['new_user_password_confirme'])){
        $new_password = $_POST['new_user_password'];
        $new_password_confirm = $_POST['new_user_password_confirme'];
        if ($new_password === $new_password_confirm) {
            $new_password_hash = password_hash($new_password, PASSWORD_ARGON2I);
            $update_password = $db->prepare("UPDATE users SET users_passwords = :new_password_hash WHERE id = :user_id");
            $update_password->execute(array(':new_password_hash' => $new_password_hash, ':user_id' => $user_id));
            mail($_POST['user_email'], 'Changing your password on the php project site', 'Your password has been successfully changed','From : admin@projetphp.com');
            header("Location: http://projet_php.com/admin/auth_password/page_auth.php");
        } else {
            echo('new password and new password confirme is not ident');
        }
    }
}else {
    echo ('error get id user');
}
?>
