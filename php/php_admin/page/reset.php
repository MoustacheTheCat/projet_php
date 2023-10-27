<?php 
session_start();
if (isset($_POST['reset'])){
    foreach ($_SESSION as $key => $value) {
        if ($key != 'user_name' && $key != 'id' && $key != 'users_roles' && $key != 'start' && $key != 'id_page'){
            unset($_SESSION[$key]);
        }
    }
    header("Location: ../../../admin/page_edit_content_page.php?id=".$_SESSION['id_page']."&step=0");
    die;
    }
?>
