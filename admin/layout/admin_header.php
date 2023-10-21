


<header>
    <div class="div-logo-header">
        <a href="http://projet_php.com/admin/page_admin.php" class="link-logo-header">
            <img src="#" alt="logo du site">
        </a>
    </div>
    <div class="div-nav">
        <label for="label-logo-menu">
            <span id="span-1"></span>
            <span id="span-2"></span>
            <span id="span-3"></span>
        </label>
        <input type="checkbox" name="label-logo-menu" id="label-logo-menu" class="input-nav">
        <nav class="nav-menu">
            <ul class="menu">
                <li>
                    <label for="label-sub-menu"><?php echo $_SESSION['user_name']; ?></label>
                    <input type="checkbox" name="label-sub-menu" id="label-sub-menu" class="input-nav">
                    <ul class="sub-menu">
                        <li><a href="http://projet_php.com/admin/page_profile.php">Edit my profile</a></li>
                        <?php if ($_SESSION['users_roles'] == 0): ?>
                            <li><a href="http://projet_php.com/admin/page_manage.php?name=users">Manage users</a></li>
                        <?php  endif;?>
                        <?php if ($_SESSION['users_roles'] < 2): ?>
                            <li><a href="http://projet_php.com/admin/page_manage.php?name=pages">Manage Pages</a></li>
                        <?php  endif;?>
                        <li><a href="http://projet_php.com/php/php_admin/conexion/logout.php">Disconnect</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header> 