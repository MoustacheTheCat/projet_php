<?php 
session_start();
if (isset($_GET['id']) && isset($_POST['reset'])){
    unset($_SESSION['type_cont']);
    unset($_SESSION['objetParents']);
    unset($_SESSION['cont_table']);
    unset($_SESSION['cont_form']);
    header("Location: ../../../admin/page_edit_content_page.php?id=".$_GET['id']."&step=0");
    die;
    }
?>
