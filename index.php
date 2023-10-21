<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
        <link rel="stylesheet" href="http://projet_php.com/css/style.css">
        <link rel="stylesheet" href="http://projet_php.com/css/user/welcome.css">
    </head>
    <body>
        <div class="container">
            <main>
                <div class="div-title">
                    <h1>Welcome</h1>
                </div>
                <div>
                    <a href="admin/auth_password/page_auth.php">Connexion admin</a>
                    <?php if (file_exists('/var/www/html/projet_php/user/page_home.php')) :?>
                        <a href="user/page_home.php">Vue site</a>
                    <?php endif;  ?>
                </div>
            </main>
        </div>
    </body>
</html> 