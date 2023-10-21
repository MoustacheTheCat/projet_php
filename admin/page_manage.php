<?php
    session_start();
    require('../php/time_conexion.php') ;
	require('../php/config.php');
    require('../php/php_admin/request/request.php');
    $name = $_GET['name'];
    if (isset($_SESSION["user_name"]) && $_SESSION["users_roles"] > 1){
        header("Location: http://projet_php.com/admin/page_admin.php");
		exit(); 
    }elseif (isset($_GET['name'])){
            if($_GET['name'] === 'users' &&  $_SESSION["users_roles"] === 0){        
                $users = getAllData($db, 'users');
            }elseif ($_GET['name'] === 'pages' && $_SESSION["users_roles"] <  2){
                $pages = getAllData($db, 'pages');
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
            <title>Gestion des utilisateurs</title>
        <?php elseif ($_GET['name'] === 'pages') : ?>
            <title>Gestion des pages</title>
        <?php endif;  ?>
        <link rel="stylesheet" href="http://projet_php.com/css/style.css">
        <link rel="stylesheet" href="http://projet_php.com/css/admin/page_manage.css">
    </head>
    <body>
        <div class="container">
            <?php include 'layout/admin_header.php'; ?>
            <main>
                <div class="div-title">
                <?php if ($_GET['name'] === 'users') : ?>
                    <h1>Manage Users</h1>
                <?php elseif ($_GET['name'] === 'pages') : ?>
                    <h1>Manage Pages</h1>
                <?php endif;  ?> 
                </div>
                <div class="div-create-users-pages-link">
                <?php if ($_GET['name'] === 'users') : ?>
                    <a href="page_create.php?name=users">Create user</a>
                <?php elseif ($_GET['name'] === 'pages') : ?>
                    <?php if (file_exists('/var/www/html/projet_php/user/page_home.php')) : ?>
                        <a href="page_create.php?name=pages&id=<?php echo $_SESSION['id']; ?>">Create page</a>
                    <?php else : ?>
                        <a href="../php/php_admin/page/create_page.php">Create page</a>
                    <?php endif;  ?>
                <?php endif;  ?>
                </div>
                <div class="div-table">
                    <table class="table-users">
                    <?php if ($_GET['name'] === 'users') : ?>
                        <caption>Users list</caption>
                    <?php elseif ($_GET['name'] === 'pages') : ?>
                        <caption>Pages list</caption>
                    <?php endif;  ?>
                        <thead>
                            <tr class="table-users-row">
                                <?php if ($_GET['name'] === 'users') : ?>
                                    <th class="table-users-col">Users name</th>
                                <?php elseif ($_GET['name'] === 'pages') : ?>
                                    <th class="table-users-col">Pages name</th>
                                <?php endif;  ?>
                                <th class="table-users-col"></th>
                                <th class="table-users-col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if ($_GET['name'] === 'users') : ?>
                            <?php foreach($users as $user) :?>
                                <tr class="table-users-row">
                                    <td class="table-users-col"><?php echo $user['user_name']?></td>
                                    <td class="table-users-col"><a href="page_edit.php?id=<?php echo $user['id']?>&name=user">Edit user</a></td>
                                    <td class="table-users-col"><a href="http://projet_php.com/php/php_admin/user/delete_user.php?id=<?php echo $user['id']?>">Delete user</a></td>
                                </tr>
                            <?php  endforeach; ?>
                        <?php elseif ($_GET['name'] === 'pages') : ?>
                            <?php foreach($pages as $page) :?>
                                <tr class="table-users-row">
                                    <td class="table-users-col"><?php echo $page['pages_names']?></td>
                                    <td class="table-users-col"><a href="page_edit.php?id=<?php echo $page['id']?>&name=page">Edit page</a></td>
                                    <?php if ($_SESSION['users_roles'] == 0): ?>
                                        <td class="table-users-col"><a href="http://projet_php.com/php/php_admin/page/delete_page.php?id=<?php echo $page['id']?>&name=<?php echo $pages[0]['pages_names']?>">Delete page</a></td>
                                    <?php endif;  ?>
                                </tr>
                            <?php  endforeach; ?>
                        <?php endif;  ?>
                        </tbody>
                    </table>
                </div>
            </main>
            <?php include 'layout/admin_footer.php'; ?>
        </div>
    </body>
</html>