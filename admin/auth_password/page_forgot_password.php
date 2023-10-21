<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot password</title>
        <link rel="stylesheet" href="http://projet_php.com/css/style.css">
        <link rel="stylesheet" href="http://projet_php.com/css/admin/page_forgot_password.css">
    </head>
    <body>
        <div class="container">
            <main>
                <div class="div-title">
                    <h1>Forgot password</h1>
                </div>
                <div class="div-forgot-password">
                    <form action="http://projet_php.com/php/php_admin/password/forgot_password.php?user_email=$_POST['user_email']">
                        <label for="user_email">Your email :</label>
                        <input type="email" name="user_email" id="user_email_forgot">
                        <input type="submit" value="Send">
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>