<?php

require('../../config.php');
session_start();


$user_email = $_GET['user_email'];
$user_data = $db->prepare("SELECT * FROM users WHERE user_email = :user_email");
$user_data->execute(array(':user_email' => $user_email));
$user = $user_data->fetchAll();


if ($_GET['user_email'] === $user[0]['user_email'] ){
    $to = $_GET['user_email']; 
    $user_id = $user[0]['id'];
    $from = "admin@projetphp.com";
    $subject = 'Password Reset Request';
    $message = "Hi ".$user[0]['user_name'].", \nThere was a request to change your password! \n If you did not make this request then please ignore this email. \nOtherwise, please click this link to change your password:\nhttp://projet_php.com/admin/auth_password/page_reset_password.php?id=$user_id";
    $headers = "From:" . $from; 
    mail($to,$subject,$message,$headers); 
    echo ('Request send to'. $user[0]['user_email']);
    echo ('     <a href="http://projet_php.com/admin/auth_password/page_auth.php">Login</a>');
    
}else {
    echo ('user email not register');
}
?>