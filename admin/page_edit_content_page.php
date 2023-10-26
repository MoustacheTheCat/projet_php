<?php
    
    session_start();
    require('../php/config.php');
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
            $tagObs = array();
            foreach($tags as $tag){
                array_push($tagObs, $tag['tags_names']);
            }
            $containers = ['section','div','article'];
            $firstChildrens = ['container', 'tags', 'lists', 'tables', 'forms'];
            $typeLists = ['ul', 'ol'];
            $typesInputs = getAllData($db, 'types_inputs');
            $tablesObs = $tabelsObjets['tables'];
            $formObs = $tabelsObjets['forms'];
            foreach ($users as $user){
                if ($user['id'] === $page[0]['users_ids']){
                    $name_author = $user['users_names'];
                }
            }
        }else {
        header("Location: ../not_acces.php");
    }
    function choiseTypeElement($conts, $itleElement , $typeElement){
            echo("<label for=".$typeElement.">".$itleElement."</label>
                <select name=".$typeElement." id=".$typeElement.">
                <option value=''>".$itleElement."</option>");
            foreach($conts as $cont) {
                echo "<option value=".$cont.">".ucfirst($cont)."</option>";
            }
            echo "</select>";
    }
    function configureOneElement($tbs){
        foreach($tbs as $tb) {
            echo("<label for=".$tb.">".ucfirst($tb)."</label>
                <input type='text' name=".$tb." placeholder=".ucfirst($tb)."><br>"
                );
        }
    }
    function btnReset($ident){
        echo "<form method='POST' action='../php/php_admin/page/reset.php?id=".$ident."'><input type='submit' name='reset' id='btn-reset' value='Reset'></form>";
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
                    <?php if ($_GET['step'] == "0") : ?>
                    <form action="<?php echo 'http://projet_php.com/admin/page_edit_content_page.php?id='.$this_id.'&step=1'; ?>" method="POST">
                        <?php var_dump($_SESSION); ?>
                        <h2>Choise the type of Parent container </h2>
                        <?php choiseTypeElement($containers, 'Parent container','type_container'); ?>
                        <input type="submit" value="Valider" name="sub-step-1">
                    </form> 
                    <?php elseif ($_GET['step'] == "1") : ?>
                        <?php var_dump($_SESSION); ?>
                        <?php if(isset($_POST['type_container'])){
                            $_SESSION['type_cont'] = $_POST['type_container'];
                        }
                        ?>
                        <form action="<?php echo 'http://projet_php.com/admin/page_edit_content_page.php?id='.$this_id.'&step=2&name-content='.$_POST['type_container']; ?>" method="POST">
                            <h2>Configure Parent container  => <?php echo ucfirst($_POST['type_container']);?></h2>
                            <?php 
                                $parentName = strval($_POST['type_container']."s");
                                $parentObs = $tabelsObjets[$parentName];
                                configureOneElement($parentObs);
                            ?>
                        <input type="submit" value="Valider" name="sub-step-2">
                    </form>
                    <?php var_dump($_SESSION); ?>
                    <?php btnReset($this_id) ;?>
                    <?php elseif ($_GET['step'] == "2") : ?>
                        <?php if (isset($_POST['sub-step-2'])){
                            $contParent = array();
                            $postReps = $_POST;
                            $contParent['cont_type'] = $_SESSION['type_cont'];
                            foreach($postReps as $key => $value){
                                if($value != 'Valider'){
                                    $contParent[$key] = $value;
                                }
                            }
                            $parentObs = (object)$contParent;
                            $_SESSION['objetParents'] = $parentObs;
                            unset($_SESSION['type_cont']);
                        }
                        ?>
                        <form action="<?php echo 'http://projet_php.com/admin/page_edit_content_page.php?id='.$this_id.'&step=3'; ?>" method="POST">
                            <?php var_dump($_SESSION); ?>
                            <h2>Choise the type of the first children</h2>
                            <?php choiseTypeElement($firstChildrens, 'Type of first child','type_first_children'); ?>
                            <input type="submit" value="Valider" name="sub-step-3">
                        </form>
                        <?php btnReset($this_id) ;?>
                    <?php elseif ($_GET['step'] == "3") : ?>
                        <form action="<?php echo 'http://projet_php.com/admin/page_edit_content_page.php?id='.$this_id.'&step=4'; ?>" method="post">
                            <?php var_dump($_SESSION); ?>
                            <?php if (  $_POST['type_first_children'] == 'container') : ?>
                                <h2>Choise the type of the children container</h2>
                                <?php choiseTypeElement($containers, 'Children container', 'cont_f_c'); ?>
                            <?php elseif (  $_POST['type_first_children'] == 'tags') : ?>
                                <h2>Choise the type of tag</h2>
                                <?php choiseTypeElement($tagObs, 'Type of tag', 'tags'); ?>
                            <?php elseif (  $_POST['type_first_children'] == 'lists') : ?>
                                <h2>Choise the type of list</h2>
                                $typeLists
                                <?php choiseTypeElement($typeLists, 'Type of list', 'lists'); ?>
                            <?php elseif (  $_POST['type_first_children'] == 'tables') : ?>
                                <h2>Configure table tag</h2>
                                <?php configureOneElement($tablesObs); ?>
                            <?php elseif (  $_POST['type_first_children'] == 'forms') : ?>
                                <h2>Configure form tag</h2>
                                <?php configureOneElement($formObs); ?>
                            <?php endif; ?>
                            <input type="submit" value="Valider" name="sub-step-4">
                        </form>
                        <?php btnReset($this_id) ;?>
                    <?php elseif ($_GET['step'] == "4") : ?>
                        <?php
                            if (isset($_POST['sub-step-4'])) {
                                if (isset($_POST['cont_f_c'])){
                                    $contFCs = array();
                                    $contFCs['cont_type'] = $_POST['cont_f_c'];
                                    $_SESSION['cont_f_c'] = $contFCs;
                                }
                                elseif (isset($_POST['tags'])) {
                                    $contTags = array();
                                    $contTags['cont_type'] = $_POST['tags'];
                                    $_SESSION['cont_tag'] = $contTags;
                                }
                                elseif (isset($_POST['lists'])) {
                                    $contLists = array();
                                    $contLists['cont_type'] = $_POST['lists'];
                                    $_SESSION['cont_list'] = $contLists;
                                }
                                elseif (isset($_POST['tables_ids']) && isset($_POST['tables_classs']) && isset($_POST['tables_names'])) {
                                    $contTables = array();
                                    $contTables['cont_type'] = 'table';
                                    $contTables['tables_ids'] = $_POST['tables_ids'];
                                    $contTables['tables_classs'] = $_POST['tables_classs'];
                                    $contTables['tables_names'] = $_POST['tables_names'];
                                    $_SESSION['cont_table'] = $contTables;
                                }
                                elseif (isset($_POST['forms_classs']) && isset($_POST['forms_names']) && isset($_POST['froms_methods']) && isset($_POST['forms_actions'])) {
                                    $contForms = array();
                                    $contForms['cont_type'] = 'form';
                                    $contForms['forms_classs'] = $_POST['forms_classs'];
                                    $contForms['forms_names'] = $_POST['forms_names'];
                                    $contForms['froms_methods'] = $_POST['froms_methods'];
                                    $contForms['forms_actions'] = $_POST['forms_actions'];
                                    $_SESSION['cont_form'] = $contForms;
                                }
                            }
                        ?>
                        <form action="<?php echo 'http://projet_php.com/admin/page_edit_content_page.php?id='.$this_id.'&step=5'; ?>" method="post">
                            <?php var_dump($_SESSION); ?>
                            <?php if (isset($_POST['cont_f_c'])) :?>
                                <h2>Configure  firstChild Conatiner  => <?php echo ucfirst($_POST['cont_f_c']);?></h2>
                                <?php 
                                    $parentName = strval($_POST['cont_f_c']."s");
                                    $parentObs = $tabelsObjets[$parentName];
                                    configureOneElement($parentObs);
                                ?>   
                            <?php elseif (isset($_POST['tags'])) :?>
                                <?php 
                                    $tagNames = $_POST['tags'].'s';
                                    $tagObs = $tabelsObjets[$tagNames];
                                ?>
                                <h2><?php echo $_POST['tags']; ?></h2>
                                <?php configureOneElement($tagObs); ?>
                            <?php elseif (isset($_POST['lists'])) :?>
                                <h2><?php echo $_POST['lists'];?></h2>
                                <label for="nb_li">Numbers of li :</label>
                                <input type="number" name="nb_li" id="nb_li" min="1">
                            <?php elseif (isset($_POST['tables_ids']) && isset($_POST['tables_classs']) && isset($_POST['tables_names'])) :?>
                                <h2>Create your table</h2>
                                <label for="check_thead">Thead</label>
                                <input type="checkbox" name="check_theader" id="check_theader">
                                <label for="check_tbody">TBody</label>
                                <input type="checkbox" name="check_tbody" id="check_tbody">
                                <label for="check_tfoot">TBody</label>
                                <input type="checkbox" name="check_tfoot" id="check_tfoot">
                            <?php elseif (isset($_POST['forms_classs']) && isset($_POST['forms_names']) && isset($_POST['froms_methods']) && isset($_POST['forms_actions'])) :?>
                                <h2>Form</h2>
                                <label for="nb_champ">Numbers of champ :</label>
                                <input type="number" name="nb_champ" id="nb_champ" min="1">
                            <?php endif; ?>
                            <input type="submit" value="Valider" name="sub-step-5">
                        </form>
                        <?php btnReset($this_id) ;?>
                        
                    <?php elseif ($_GET['step'] == "5") : ?>
                        <?php if (isset($_POST['sub-step-5'])){ 
                            if (!empty($_SESSION['cont_f_c'])){
                                $cont=$_SESSION['cont_f_c'];
                                unset($_SESSION['cont_f_c']);
                            }
                            elseif (!empty($_SESSION['cont_tag'])){
                                $cont=$_SESSION['cont_tag'];
                                unset($_SESSION['cont_tag']);
                            }
                            elseif (!empty($_SESSION['cont_list'])){
                                $cont=$_SESSION['cont_list'];
                                unset($_SESSION['cont_list']);
                            }
                            elseif (!empty($_SESSION['cont_table'])){
                                $cont=$_SESSION['cont_table'];
                                unset($_SESSION['cont_table']);
                            }
                            elseif (!empty($_SESSION['cont_form'])){
                                $cont=$_SESSION['cont_form'];
                                unset($_SESSION['cont_form']);
                            }
                            
                            $postReps = $_POST;
                            foreach($postReps as $key => $value){
                                if($value != 'Valider'){
                                    $cont[$key] = $value;
                                }
                            }
                            $_SESSION['first_child'] = $cont;
                        }; ?>  
                        <form action="<?php echo 'http://projet_php.com/admin/page_edit_content_page.php?id='.$this_id.'&step=6'; ?>" method="post">
                        
                            
                        </form>
                    <?php btnReset($this_id) ;?>
                    <?php endif; ?>
                </div>
            </main>
            <?php include 'layout/admin_footer.php'; ?>
        </div>
    </body>
</html>