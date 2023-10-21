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
            $typesInputs = getAllData($db, 'types_inputs');
            $tables_= "";
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
                    <h2>Add content</h2>
                    <div class="form_add_tags">
                    <form action="#" method="POST" id="form-create">
                        <label for="tags_tag">Tags :</label>
                        <select name="tags_tag" id="tags_tag">
                            <option value="">Tags</option>
                            <?php foreach($tags as $tag) : ?>
                                <option value="<?php echo $tag['tags_names']?>"><?php echo $tag['tags_names']?></option>
                            <?php  endforeach; ?>
                        </select>
                        <button id="btn-create-tag" name="btn-create-tag">Valider</button>
                        <?php if (isset($_POST['btn-create-tag'])) :?>
                            <?php 
                                $tablesName = $_POST['tags_tag'].'s';
                                $colsTables = $tabelsObjets[$tablesName]; 
                            ?>
                            <?php  foreach ($colsTables as $colsTable) :?>
                                <?php   
                                    $target = array("s_");
                                    $replace = array(" ");
                                    $nameColsTables = substr(str_replace($target , $replace, $colsTable),0, -1);
                                    $nameColsTables = trim($nameColsTables);
                                ?>
                                <label for="<?php echo $nameColsTables ?>"> <?php echo $nameColsTables ?> :</label>
                                <?php if ($nameColsTables === "input type") : ?>
                                    <select name="<?php echo $nameColsTables ?>" id="<?php echo $nameColsTables ?>">
                                        <option value="">Types of input</option>
                                        <?php  var_dump($typesInputs) ?>
                                        <?php foreach ($typesInputs as $typesInput) : ?>
                                            <option value="<?php echo $typesInput['types_inputs_names']; ?>"><?php echo $typesInput['types_inputs_names']; ?></option> 
                                        <?php endforeach; ?>    
                                    </select> 
                                <?php elseif ($nameColsTables === "i required selects") : ?> 
                                    <p>Require :</p>  
                                    <input type="checkbox" name="required" value=true>
                                    <p>Not require :</p> 
                                    <input type="checkbox" name="required" value=false>
                                <?php else : ?> 
                                    <input type="text" name="<?php echo $nameColsTables ?>" id="<?php echo $nameColsTables ?>" placeholder="<?php echo $nameColsTables ?>">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif;  ?>
                    </form>
                    </div>
                </div>
            </main
            <?php include 'layout/admin_footer.php'; ?>
        </div>
        <script type="module" src="../js/create_tag.js"></script>
    </body>
</html>