<?php
if(!isset($_SESSION["user_name"]) ){
    header("Location: auth_password/page_auth.php");
    exit(); 
}
ini_set('display_errors', 'On');
if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 1800)) {
        session_unset(); 
        session_destroy(); 
        header("Location: http://projet_php.com/index.php");
    }
$_SESSION['start'] = time();
?>