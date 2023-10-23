<?php
session_start();
$user_email = $_POST['user_email'];


require('../../config.php');
// require('../../php/time_conexion.php') ;
require('../request/request.php');



$user = getOneData($db, 'users', 'users_emails',$user_email);

if ($_POST['user_email'] === $user[0]['users_emails'] ){
    $to = $_POST['user_email']; 
    $user_id = $user[0]['id'];
    $from = "admin@projetphp.com";
    $subject = 'Password Reset Request';
    $message = "Hi ".$user[0]['users_names'].", \nThere was a request to change your password! \n If you did not make this request then please ignore this email. \nOtherwise, please click this link to change your password:\nhttp://projet_php.com/admin/auth_password/page_reset_password.php?id=$user_id";
    $headers = "From:" . $from; 
    if (mail($to, $subject, $message, $headers)) {
        echo 'Request send in '.$user[0]['users_emails'];
        echo '<br>     <a href="http://projet_php.com/admin/auth_password/page_auth.php">Login</a>';
    } else {
        echo "L'envoi du courriel a échoué.";
    }
}else {
    echo ('user email not register');
}
?>