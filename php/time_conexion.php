<?php
ini_set('display_errors', 'On');
if(!isset($_SESSION["user_name"]) ){
    header("Location: auth_password/page_auth.php");
    exit(); 
}

elseif (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 180000000)) {
        session_unset(); 
        session_destroy(); 
        header("Location: http://projet_php.com/index.php");
    }

?>