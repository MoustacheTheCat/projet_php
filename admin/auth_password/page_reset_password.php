<?php
    $user_id = $_GET['id'];
    session_start();  
    require('../../php/config.php');
    require('../../php/php_admin/request/request.php');
    $user= getOneData($db, 'users', 'id',$user_id);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update my password</title>
        <link rel="stylesheet" href="http://projet_php.com/css/style.css">
        <link rel="stylesheet" href="http://projet_php.com/css/admin/page_reset_password.css">
    </head>
    <body>
        <div class="container">
            <main>
                <div class="div-title">
                    <h1>Update my password</h1>
                </div>
                    <div class="div-update-password">
                        <h2>Update my password</h2>
                        <form  method="POST" action="http://projet_php.com/php/php_admin/password/reset_password.php?id=<?php echo $user[0]['id'] ?>">
                            <label for="user_email">Your email :</label>
                            <input type="email" name="user_email" id="user_email_forgot">
                            <label for="new_user_password">New user password :</label>
                            <input type="password" name="new_user_password" require>
                            <label for="new_user_password_confirme">New user password confirme :</label>
                            <input type="password" name="new_user_password_confirme" require>
                            <input type="submit" value="confirmer">
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>