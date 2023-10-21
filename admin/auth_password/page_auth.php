<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth page</title>
    <link rel="stylesheet" href="http://projet_php.com/css/style.css">
    <link rel="stylesheet" href="http://projet_php.com/css/admin/page_auth.css">
</head>
<body>
    <div class="container">
        <div class="div-title">
            <h1>Welcome</h1>
        </div>
        <div class="div-form-auth">
            <form action="http://projet_php.com/php/php_admin/conexion/login.php" method="POST">
                <label for="users_names">Identifiant :</label>
                <input type="text" name="users_names" id="user_name">
                <label for="users_passwords">Mot de passe :</label>
                <input type="password" name="users_passwords" id="users_passwords">
                <input type="submit" value="Valider" id="btn-auth-submit">
            </form>
            <a href="http://projet_php.com/admin/auth_password/page_forgot_password.php">Forgot Password.</a>
        </div>
    </div>
</body>
</html>