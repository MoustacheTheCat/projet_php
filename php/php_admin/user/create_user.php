<?php

require('../../config.php');
session_start();

if (isset($_POST['user_name'], $_POST['user_email'], $_POST['user_password'], $_POST['user_password_confirme'], $_POST['user_role'])){
    $data_users = $db->prepare("SELECT user_name, user_email FROM users");
    $data_users->execute();
    $users = $data_users->fetchAll();

    $user_exists = false;
    foreach($users as $user) {
        if ($_POST['user_name'] == $user['user_name'] || $_POST['user_email'] == $user['user_email']){
            $user_exists = true;
            break;
        }
    }

    if ($user_exists) {
        echo('error user_name or user_email existe ');
    } else if ($_POST['user_password'] == $_POST['user_password_confirme']){
        $new_user = $db->prepare("INSERT INTO users (user_name, user_email, user_password, user_role) VALUES (:user_name, :user_email, :user_password, :user_role)");
        $new_user->execute([
            ':user_name' => $_POST['user_name'], 
            ':user_email' => $_POST['user_email'],
            ':user_password' => password_hash($_POST['user_password'], PASSWORD_ARGON2I),
            ':user_role' => $_POST['user_role'],
        ]);
        header("Location: ../../admin/page_admin.php");
        
        
    } else {
        echo('error user_password and user_password_confirme do not match ');
    }
} else {
    echo('error missing parameters ');
}

?>