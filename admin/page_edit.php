<?php
    session_start();
    require('../php/time_conexion.php') ;
	require('../php/config.php');
    require('../php/php_admin/request/request.php');
    if (isset($_SESSION["user_name"]) && $_SESSION["users_roles"] > 1){
        header("Location: http://projet_php.com/admin/page_admin.php");
		exit(); 
    }elseif (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $this_id =  $_GET['id'];
        if($_GET['name'] === 'user' &&  $_SESSION["user_role"] === 0){
            $users = getOneData($db, 'users', 'id',$this_id);
        }elseif ($_GET['name'] === 'page'){
            $page = getOneData($db, 'pages', 'id',$this_id);
            $users = getAllData($db, 'users');
            $name_author="";
            foreach ($users as $user){
                if ($user['id'] === $page[0]['users_ids']){
                    $name_author = $user['users_names'];
                }  
            } 
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
        <?php if ($_GET['name'] === 'user') : ?>
            <title>Edit user <?php echo $users[0]['user_name'] ?></title>
        <?php elseif ($_GET['name'] === 'page') : ?>
            <title>Edit page <?php echo $pages[0]['pages_name'] ?></title>
        <?php endif;  ?>
        <link rel="stylesheet" href="http://projet_php.com/css/style.css">
        <link rel="stylesheet" href="http://projet_php.com/css/admin/page_edit_user.css">
    </head>
    <body>
        <div class="container">
            <?php include 'layout/admin_header.php'; ?>
            <?php if ($_GET['name'] === 'user') : ?>
            <main>
                <div class="div-title">
                    <h1>Edit  <?php echo $users[0]['user_name'] ?></h1>
                </div>
                <div class="div-edit-user-page">
                    <div class="div-update-user">
                        <h2>Update user info</h2>
                        <form method="POST" action="http://projet_php.com/php/php_admin/user/update_user_info.php?id=<?php echo $users[0]['id'] ?>">
                                <label for="user_name">User name :</label>
                                <input type="text" name="user_name" require placeholder="<?php echo $users[0]['user_name'] ?>">
                                <label for="user_email">User Email :</label>
                                <input type="email" name="user_email" require placeholder="<?php echo $users[0]['user_email'] ?>">
                                <input type="submit" value="confirmer">
                        </form>
                    </div>
                    <div class="div-update-password">
                        <h2>Update password</h2>
                        <form  method="POST" action="http://projet_php.com/php/php_admin/user/update_user_password.php?id=<?php echo $users[0]['id'] ?>">
                            <label for="user_password">User password :</label>
                            <input type="password" name="user_password" require>
                            <label for="new_user_password">New user password :</label>
                            <input type="password" name="new_user_password" require>
                            <label for="new_user_password_confirme">New user password confirme :</label>
                            <input type="password" name="new_user_password_confirme" require>
                            <input type="submit" value="confirmer">
                        </form>
                    </div>
                    <div class="div-update-role">
                        <h2>Update Role</h2>
                        <form  method="POST" action="http://projet_php.com/php/php_admin/user/update_user_role.php?id=<?php echo $users[0]['id'] ?>">
                            <label for="user_role">User role :</label>
                            <select name="user_role" id="user_role" require>
                                <option value="<?php echo $users[0]['user_role']?>">
                                    <?php 
                                    if ($users[0]['user_role'] === 0) {
                                        echo "Admin";
                                    } elseif ($user[0]['user_role'] === 1) {
                                        echo "Author";
                                    } else {
                                        echo 'User';
                                    }
                                    ?>
                                </option>
                                <option value="0">Admin</option>
                                <option value="1">Author</option>
                                <option value="2">User</option>
                            </select>
                            <input type="submit" value="confirmer">
                        </form>
                    </div>
                    <div class="div-delete-user">
                        <h2>Delete <?php echo $users[0]['user_name']?></h2>
                        <a href="http://projet_php.com/php/php_admin/user/delete_user.php?id=<?php echo $users[0]['id']?>">Delete</a>
                    </div>
                </div>
            </main>
            <?php elseif ($_GET['name'] === 'page') : ?>
            <main>
                <div class="div-title">
                    <h1>Edit  page <?php echo $page[0]['pages_names'] ?></h1>
                </div>
                <div class="div-edit-user-page">
                    <div class="div-update-page-info">
                        <h2>Update page Name</h2>
                        <form  method="POST" action="">
                            <label for="page_name">Page name :</label>
                            <input type="text" name="page_name" require placeholder="<?php echo $page[0]['pages_names']; ?>">
                            <h2><?php echo $name_author; ?> is the Author of the page</h2>
                        </form>
                    </div>
                    <div>
                        <h2>Edit Content page <?php echo $page[0]['pages_names']?></h2>
                        <a href="page_edit_content_page.php?id=<?php echo $page[0]['id']?>">Edit content page <?php echo $page[0]['pages_names']?></a>
                    </div>
                    <?php if ($_SESSION['users_roles'] == 0): ?>
                    <div class="div-delete-user">
                        <h2>Delete page <?php echo $page[0]['pages_names']?></h2>
                        <a href="http://projet_php.com/php/php_admin/user/delete_page.php?id=<?php echo $page[0]['id']?>&name=<?php echo $page[0]['pages_names']?>">Delete page</a>
                    </div>
                    <?php endif;  ?>
                </div>
            </main>
            <?php endif;  ?>
            <?php include 'layout/admin_footer.php'; ?>
        </div>
    </body>
</html>