<?php

require('../../config.php');
session_start();


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $page_id =  $_GET['id'];
    $page_name = $_GET['name'];
    $fichierPage = '/var/www/html/projet_php/user/page_'.$page_name.'.php';
    $fichierMain = '/var/www/html/projet_php/user/main/main_'.$page_name.'.php';
    var_dump($fichierPage);
    $delete_page = $db->prepare("DELETE FROM pages WHERE id = :id");
    $delete_page->execute([
        'id' => $page_id
    ]);
    if($delete_page->execute(['id' => $page_id])){
        if( file_exists ( $fichierPage) && file_exists ( $fichierMain)){
            unlink( $fichierPage ) ;
            unlink( $fichierMain ) ;
        }elseif( file_exists ( $fichierMain )) {
            unlink( $fichierMain ) ;
        }
        elseif( file_exists ( $fichierPage )) {
            unlink( $fichierPage ) ;
        }
	    header("Location: ../../../admin/page_manage.php?name=pages");
	}
}




