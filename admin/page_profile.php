<?php
    session_start();
    require('../php/time_conexion.php') ;
    require('../php/config.php');
	if(!isset($_SESSION["user_name"])){
		header("Location: auth_password/page_auth.php");
		exit(); 
	} elseif (isset($_SESSION["user_name"])) {
        $user_name = $_SESSION["user_name"];
        $user_data = $db->prepare("SELECT * FROM users WHERE user_name = :user_name");
        $user_data->execute(array(':user_name' => $user_name));
        $user = $user_data->fetchAll();
    }else {
        header("Location: ../not_acces.php");
    }
    
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit my profile</title>
        <link rel="stylesheet" href="http://projet_php.com/css/style.css">
        <link rel="stylesheet" href="http://projet_php.com/css/admin/page_edit_my_profile.css">
    </head>
    <body>
        <div class="container">
            <?php include 'layout/admin_header.php'; ?>
            <main>
                <div class="div-title">
                    <h1>Edit  My profile</h1>
                </div>
                <div class="div-edit-user">
                    <div class="div-update-user">
                        <h2>Update my info</h2>
                        <form method="POST" action="http://projet_php.com/php/php_admin/user/update_user_info.php?id=<?php echo $user[0]['id'] ?>">
                                <label for="user_name">User name :</label>
                                <input type="text" name="user_name" require placeholder="<?php echo $user[0]['user_name'] ?>">
                                <label for="user_email">User Email :</label>
                                <input type="email" name="user_email" require placeholder="<?php echo $user[0]['user_email'] ?>">
                                <input type="submit" value="confirmer">
                        </form>
                    </div>
                    <div class="div-update-password">
                        <h2>Update my password</h2>
                        <form  method="POST" action="http://projet_php.com/php/php_admin/user/update_user_password.php?id=<?php echo $user[0]['id'] ?>">
                            <label for="user_password">User password :</label>
                            <input type="password" name="user_password" require>
                            <label for="new_user_password">New user password :</label>
                            <input type="password" name="new_user_password" require>
                            <label for="new_user_password_confirme">New user password confirme :</label>
                            <input type="password" name="new_user_password_confirme" require>
                            <input type="submit" value="confirmer">
                        </form>
                    </div>
                    <?php if($_SESSION["user_role"] === 0): ?>
                        <div class="div-update-role">
                            <h2>Update Role</h2>
                            <form  method="POST" action="http://projet_php.com/php/php_admin/user/update_user_role.php?id=<?php echo $user[0]['id'] ?>">
                                <label for="user_role">User role :</label>
                                <select name="user_role" id="user_role" require>
                                    <option value="<?php echo $user[0]['user_role']?>">
                                        <?php 
                                        if ($user[0]['user_role'] === 0) {
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
                    <?php endif; ?>
                    <div class="div-delete-user">
                        <h2>Delete my profile</h2>
                        <a href="http://projet_php.com/php/php_admin/user/delete_user.php?id=<?php echo $user[0]['id']?>">Delete my profile</a>
                    </div>
                </div>
            </main>
            <?php include 'layout/admin_footer.php'; ?>
        </div>
    </body>
</html>