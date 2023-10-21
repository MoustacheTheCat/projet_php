<?php
    session_start();
    require('../php/time_conexion.php');
    require('../php/config.php');
    $name = $_GET['name'];
	if (isset($_SESSION["user_name"]) && $_SESSION["user_role"] > 1){
        header("Location: http://projet_php.com/admin/page_admin.php");
		exit(); 
    }elseif (isset($_GET['name'])){
        if($_GET['name'] === 'users' &&  $_SESSION["user_role"] === 0){
            require('../php/config.php');
            $data_users = $db->prepare("SELECT * FROM users");
            $data_users->execute();
            $users = $data_users->fetchAll();
        }elseif ($_GET['name'] === 'pages' && $_SESSION["user_role"] <  2){
            require('../php/config.php');
            $data_pages = $db->prepare("SELECT * FROM  pages");
            $data_pages->execute();
            $pages = $data_pages->fetchAll();
        }
    }else {
        header("Location: ../not_acces.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php if ($_GET['name'] === 'users') : ?>
            <title>Create User</title>
        <?php elseif ($_GET['name'] === 'pages') : ?>
            <title>Create Page</title>
        <?php endif;  ?>
        <link rel="stylesheet" href="http://projet_php.com/css/style.css">
        <link rel="stylesheet" href="http://projet_php.com/css/admin/page_create.css">
    </head>
    <body>
        <div class="container">
            <?php include 'layout/admin_header.php'; ?>
            <main>
                <div class="div-title">
                    <?php if ($_GET['name'] === 'users') : ?>
                        <h1>Create User</h1>
                    <?php elseif ($_GET['name'] === 'pages') : ?>
                        <h1>Create Page</h1>
                    <?php endif;  ?>
                </div>
                <?php if ($_GET['name'] === 'users') : ?>
                    <div class="form-create-user">
                        <form action="http://projet_php.com/php/php_admin/user/create_user.php" method="POST">
                            <label for="user_name">User name :</label>
                            <input type="text" name="user_name" require>
                            <label for="user_email">User Email :</label>
                            <input type="email" name="user_email" require>
                            <label for="user_password">User password :</label>
                            <input type="password" name="user_password" require>
                            <label for="user_password_confirme">User password confirme :</label>
                            <input type="password" name="user_password_confirme" require>
                            <label for="user_role">User role :</label>
                            <select name="user_role" id="user_role" require>
                                <option value="">Role</option>
                                <option value="0">Admin</option>
                                <option value="1">Author</option>
                                <option value="2">User</option>
                            </select>
                            <input type="submit" value="Create new user">
                        </form>
                    </div>
                <?php elseif ($_GET['name'] === 'pages') : ?>
                    <div class="form-create-page">
                        <form action="http://projet_php.com/php/php_admin/page/create_page.php" method="POST">
                            <label for="page_name">Page name :</label>
                            <input type="text" name="page_name" require>
                            <!-- <label for="page_url">Page url :</label>
                            <input type="text" name="user_url" require> -->
                            <input type="submit" value="Create new page">
                        </form>
                    </div>
                <?php endif;  ?>
            </main>
            <?php include 'layout/admin_footer.php'; ?>
        </div>
    </body>
</html>