<?php

require('../../config.php');
require('../../time_conexion.php');
require('../request/request.php');
session_start();
$pages = getAllData($db, 'pages');
if (count($pages) > 0) {
    if (isset($_POST['pages_name'])){ 
    $pages_exists = false;
    foreach($pages as $page) {
        if ($_POST['pages_name'] == $page['pages_names']){ 
            $pages_exists = true;
            break;
        } 
    }
    if ($pages_exists) {
        echo('error page_name existe ');
    } else {
        $pageTitle = strtolower($_POST['pages_name']);
        $pageHtml = "<!DOCTYPE html>
                    <html lang='fr'>
                        <head>
                        <meta charset='UTF-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                                <title>$pageTitle</title>
                                <link rel='stylesheet' href='http://projet_php.com/css/style_user.css'>
                        </head>
                        <body>
                            <div class='container'>
                                <?php include '../layout/user_header.php'; ?>
                                <main class='main-$pageTitle.' id='main-$pageTitle.'><?php include 'content/main_$pageTitle.php'; ?></main>   
                                <?php include 'layout/user_footer.php'; ?>
                            </div>
                        </body>
                    </html>";
        $pageMain = "";
        $new_page = $db->prepare("INSERT INTO pages (pages_names, pages_urls, users_ids) VALUES (:pages_names, :pages_urls, :users_ids)");
        $new_page->execute([
            ':pages_names' => $_POST['pages_name'], 
            ':pages_urls' => "http://projet_php.com/user/".'page_'.$pageTitle.'.html',
            ':users_ids' => $_SESSION['id'],
        ]);
        $openPage = fopen('/var/www/html/projet_php/user/'.'page_'.$pageTitle.'.php', 'w');
        $openMain = fopen('/var/www/html/projet_php/user/main/main_'.$pageTitle.'.php', 'w');
        fwrite($openPage, $pageHtml);
        fclose($openPage);
        fwrite($openMain, $pageMain);
        fclose($openMain);
        header("Location: ../../../admin/page_manage.php?name=pages"); 
    } 
    } else {
        echo('error missing parameters ');
    }
}elseif  (count($pages) === 0){
    $pageHtml = "<!DOCTYPE html>
                <html lang='fr'>
                    <head>
                    <meta charset='UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                            <title>home</title>
                            <link rel='stylesheet' href='http://projet_php.com/css/style_user.css'>
                    </head>
                    <body>
                        <div class='container'>
                            <?php include '../layout/user_header.php'; ?>  
                            <main class='main-home' id='main-home'><?php include 'content/main_home.php'; ?></main> 
                            <?php include 'layout/user_footer.php'; ?>
                        </div>
                    </body>
                </html>";
    $pageMain = "";
    $new_page = $db->prepare("INSERT INTO pages (pages_names, pages_urls, users_ids) VALUES (:pages_names, :pages_urls, :users_ids)");
    $new_page->execute([
        ':pages_names' => 'home', 
        ':pages_urls' => "http://projet_php.com/user/".'page_home.html',
        ':users_ids' => $_SESSION['id'],
    ]);
    $openPage = fopen('/var/www/html/projet_php/user/'.'page_home.php', 'w+');
    $openMain = fopen('/var/www/html/projet_php/user/main/main_home.php', 'w+');
    fwrite($openPage, $pageHtml);
    fclose($openPage);
    fwrite($openMain, $pageMain);
    fclose($openMain);
    header("Location: ../../../admin/page_manage.php?name=pages");
}else {
    echo('ERROR');
}
?>