<?php
    session_start();
    require('../php/config.php');
    require('../php/time_conexion.php') ;
    require('../php/php_admin/request/request.php');
    require('../php/php_admin/request/tables.php');
    if (isset($_SESSION["user_name"]) && $_SESSION["users_roles"] > 1){
        header("Location: http://projet_php.com/admin/page_admin.php");
		exit(); 
    } elseif (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $this_id =  $_GET['id'];
            $name_author="";
            $page = getOneData($db, 'pages', 'id',$this_id);
            $users = getAllData($db, 'users');
            $tags = getAllData($db, 'tags');
            $containers = ['section','div','article'];
            $firstChildrens = ['container', 'simple_tags', 'list_tags', 'tables_tag', 'form'];
            $typesInputs = getAllData($db, 'types_inputs');
            $tables_= "";
            $yourChoise = "";
            
            foreach ($users as $user){
                if ($user['id'] === $page[0]['users_ids']){
                    $name_author = $user['users_names'];
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
        <title>Edit content page <?php echo $page[0]['pages_names'] ?></title>
        <link rel="stylesheet" href="http://projet_php.com/css/style.css">
        <link rel="stylesheet" href="http://projet_php.com/css/admin/page_admin.css">
    </head>
    <body>
        <div class="container">
            <?php include 'layout/admin_header.php'; ?>
            <main>
                <div class="div-title">
                    <h1>Edit content page <?php echo $page[0]['pages_names'] ?></h1>
                </div>
                <div>
                    <h2>Choise the type of container</h2>
                    <?php if ($_GET['step'] == "0") : ?>
                    <form action="<?php echo 'http://projet_php.com/admin/page_edit_content_page.php?id='.$_GET['id'].'&step=1'; ?>" method="POST">
                        <label for="type_container">Type of container</label>
                        <select name="type_container" id="type_container">
                            <option value="">Container</option>
                            <?php foreach($containers as $container) : ?>
                                <option value="<?php echo $container; ?>"><?php echo ucfirst($container); ?></option>
                            <?php endforeach; ?>
                            <br>
                            
                        </select>
                        <input type="submit" value="Valider" name="sub-step-1">
                    </form> 
                    <?php elseif ($_GET['step'] == "1") : ?>
                        <?php if (isset($_POST['sub-step-1'])) : ?> 
                            <?php $_SESSION['container'] = $_POST["type_container"]; ?>
                            <form action="<?php echo 'http://projet_php.com/admin/page_edit_content_page.php?id='.$_GET['id'].'&step=2'; ?>" method="POST">
                                <label for="type_first_children">Type of first childre</label>
                                <select name="type_first_children" id="type_first_children">
                                    <?php foreach($firstChildrens as $firstChildren) : ?>
                                        <option value="<?php echo $firstChildren ; ?>"><?php echo ucfirst($firstChildren); ?></option>
                                    <?php endforeach ?>
                                </select>
                                <input type="submit" value="Valider" name="sub-step-2">
                            </form>
                        <?php endif; ?>
                    <?php elseif ($_GET['step'] == "2") : ?>
                        <?php if (isset($_POST['sub-step-2'])) {
                            if ($_POST['type_first_children'] == 'container') {
                                $_SESSION['first_children'] = 'container';
                            }
                            elseif ($_POST['type_first_children'] == 'simple_tags') {
                                $_SESSION['first_children'] = 'simple_tags';
                            }
                            elseif ($_POST['type_first_children'] == 'list_tags') {
                                $_SESSION['first_children'] = 'list_tags';
                            }
                            elseif ($_POST['type_first_children'] == 'tables_tags') {
                                $_SESSION['first_children'] = 'tables_tags';
                            }
                            elseif ($_POST['type_first_children'] == 'form'){
                                $_SESSION['first_children'] = 'form';
                            }
                        }; ?>
                        <form action="<?php echo 'http://projet_php.com/admin/page_edit_content_page.php?id='.$_GET['id'].'&step=3'; ?>" method="post">
                            <?php if (  $_SESSION['first_children'] == 'container') : ?>
                                <label for="type_container">Type of container</label>
                                <select name="type_container" id="type_container">
                                    <option value="">Container</option>
                                    <?php foreach($containers as $container) : ?>
                                        <option value="<?php echo $container; ?>"><?php echo ucfirst($container); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php elseif (  $_SESSION['first_children'] == 'simple_tags') : ?>
                                <label for="type_tags">Type of tag</label>
                                <select name="type_tag" id="type_tag">
                                    <option value="">Tag</option>
                                    <?php foreach($tags as $tag) : ?>
                                        <option value="<?php echo $tag['tags_names']; ?>"><?php echo ucfirst($tag['tags_names']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php elseif (  $_SESSION['first_children'] == 'list_tags') : ?>
                                <label for="type_list">Type of list</label>
                                <select name="type_list" id="type_list">
                                    <option value="">List</option>
                                    <option value="ul"><?php echo ucfirst('ul'); ?></option>
                                    <option value="ol"><?php echo ucfirst('ol'); ?></option>
                                </select>
                            <?php elseif (  $_SESSION['first_children'] == 'tables_tags') : ?>
                                <label for="tables">Tables</label>
                            <?php elseif (  $_SESSION['first_children'] == 'form') : ?>
                                <label for="form">Tables</label>
                                <p>form</p>
                            <?php endif; ?>
                            <input type="submit" value="Valider" name="sub-step-3">
                        </form>
                    <?php else : ?>
                        <?php header("http://projet_php.com/admin/page_edit_content_page.php?id=".$_GET['id']."&step=0"); ?>
                    <?php endif; ?>
                </div>
            </main>
            <?php include 'layout/admin_footer.php'; ?>
        </div>
        <!-- <script type="module" src="../js/create_tag.js"></script> -->
    </body>
</html>