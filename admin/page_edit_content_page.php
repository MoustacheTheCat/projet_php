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
            $_SESSION['id_page'] = $this_id;
            $name_author="";
            $page = getOneData($db, 'pages', 'id',$this_id);
            $users = getAllData($db, 'users');
            $tags = getAllData($db, 'tags');
            $tagObs = array();
            foreach($tags as $tag){
                array_push($tagObs, $tag['tags_names']);
            }
            $containers = ['section','div','article'];
            $firstChilsdrens = ['container', 'tags', 'lists', 'tables', 'forms'];
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
    function configureAnyElements($tbs, $nBEs){
        foreach($tbs as $tb) {
        for($nb=1;$nb<=$nBEs;$nb++){
        echo("<label for=".$tb."_".$nBEs.">".ucfirst($tb)." ".($nb)." </label>
            <input type='text' name=".$tb."_".$nBEs." placeholder=".ucfirst($tb).">"
            );
        }
        echo "<br>";
        }
    }
    function btnReset(){
        echo "<form method='POST' action='../php/php_admin/page/reset.php'><input type='submit' name='reset' id='btn-reset' value='Reset'></form>";
    }

    function nbTrTdTh($typeT, $nL){
        echo "<label for='nb_".$typeT."_".$nL."'>Numbers of ".$typeT."_".$nL." :</label>";
        echo "<input type='number' name='nb_".$typeT."_".$nL."' id='nb_".$typeT."_".$nL."' min='1' placeholder='1'>";
                                        
    }

    function addInArray($dTabs,$Rtabs){
        foreach($dTabs as $key => $value){
            if($value != 'Valider'){
                $Rtabs[$key] = $value;
            }
        }
        return $Rtabs;
    }

    function configTableRowsCols($names, $tblRows, $nbRows, $typeRows,$tblCols ,$nbCols, $typeCols){
        if ($nbRows == 1 && $nbCols == 1){
            echo "<h3>T".$names." Row with 1 Col</h3>";
        }elseif ($nbRows > 1 && $nbCols == 1){
            echo "<h3>T".$names." with ".$nbRows." Row with 1 Col</h3>";
        }
        elseif ($nbRows > 1 && $nbCols > 1){
            echo "<h3>T".$names." with ".$nbRows." Row and ".$nbCols." Cols</h3>";
        }
        elseif ($nbRows == 1 && $nbCols > 1){
            echo "<h3>T".$names." Row with ".$nbCols." Cols</h3>";
        }
        
        for($nb=1;$nb<=$nbRows;$nb++){
            if ($nbRows > 1){
                echo "<h4>T".$names." Rows :</h4>";
            }
            else {
                echo "<h4>T".$names." Row :</h4>";
            }
            echo"<p>Row number ".$nb." :</p>";
            foreach($tblRows as $tblRow){
                if(substr($tblRow, 0, 3) == $typeRows."s" || substr($tblRow, 1, 4) == "$names" ){
                    echo("<label for=".$names."_".$tblRow."_".$nb.">".ucfirst($tblRow)."_".$nb."</label>
                        <input type='text' name=".$names."_".$tblRow."_".$nb." placeholder=".ucfirst($tblRow)."_".$nb.">"
                    );
                }
            }
            echo "<br>";
            if ($nbCols > 1){
                echo "<h4>T".$names." Cols Row ".$nb.":</h4>";
            }
            else {
                echo "<h4>T".$names." Col :</h4>";
            }
            for($nbC=1;$nbC<=$nbCols;$nbC++){
                echo"<p>Col number ".$nbC." :</p>";
                echo "<br>";
                
                foreach($tblCols as $tblCol){
                    $dataForm = $names."_".$tblCol."_".$nbC."_row_".$nb;
                    $dataText = $names."_".ucfirst($tblCol)."_".$nbC."_row_".$nb;
                    if(substr($tblCol, 0, 3) == $typeCols."s" || substr($tblCol, 1, 4) == "$names" ){
                        echo("<label for='". $dataForm."'>".$dataText."</label>
                            <input type='text' name='".$dataForm."' placeholder=".$dataText.">"
                        );
                    }
                }
            }
        }
        echo "<br>";
    };

    
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
                        <!-- <?php var_dump($_SESSION); ?> -->
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
                    <!-- <?php var_dump($_SESSION); ?> -->
                    <?php btnReset() ;?>
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
                            <!-- <?php var_dump($_SESSION); ?> -->
                            <h2>Choise the type of the first children</h2>
                            <?php choiseTypeElement($firstChilsdrens, 'Type of first child','type_first_children'); ?>
                            <input type="submit" value="Valider" name="sub-step-3">
                        </form>
                        <?php btnReset() ;?>
                    <?php elseif ($_GET['step'] == "3") : ?>
                        <form action="<?php echo 'http://projet_php.com/admin/page_edit_content_page.php?id='.$this_id.'&step=4'; ?>" method="post">
                            <!-- <?php var_dump($_SESSION); ?> -->
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
                        <?php btnReset() ;?>
                    <?php elseif ($_GET['step'] == "4") : ?>
                        <?php var_dump($_SESSION);  var_dump($_POST)?>

                        <?php
                            if (isset($_POST['sub-step-4'])) {
                                $datPosts = $_POST;
                                $firstChils = array();
                                if (isset($_POST['cont_f_c'])){
                                    $firstChils['fc_type'] = $_POST['cont_f_c'];
                                }
                                elseif (isset($_POST['tags'])) {
                                    $firstChils['fc_type'] = $_POST['tags'];
                                }
                                elseif (isset($_POST['lists'])) {
                                    $firstChils['fc_type'] = $_POST['lists'];;
                                }
                                elseif (isset($_POST['tables_ids']) && isset($_POST['tables_classs']) && isset($_POST['tables_names'])) {
                                    $firstChils['fc_type'] = 'table';
                                    addInArray($datPosts, $firstChils);
                                }
                                elseif (isset($_POST['forms_classs']) && isset($_POST['forms_names']) && isset($_POST['froms_methods']) && isset($_POST['forms_actions'])) {
                                    $firstChils['fc_type'] = 'form';
                                }
                                var_dump(addInArray($datPosts, $firstChils));
                                $firstChils = addInArray($datPosts, $firstChils);
                                $_SESSION['first_child'] = $firstChils;
                            }
                        ?>
                        <form action="<?php echo 'http://projet_php.com/admin/page_edit_content_page.php?id='.$this_id.'&step=5'; ?>" method="post">
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
                                <input type="checkbox" name="check_thead" id="check_thead">
                                <label for="check_tbody">TBody</label>
                                <input type="checkbox" name="check_tbody" id="check_tbody">
                                <label for="check_tfoot">TFoot</label>
                                <input type="checkbox" name="check_tfoot" id="check_tfoot">
                            <?php elseif (isset($_POST['forms_classs']) && isset($_POST['forms_names']) && isset($_POST['froms_methods']) && isset($_POST['forms_actions'])) :?>
                                <h2>Form</h2>
                                <label for="nb_champ">Numbers of champ :</label>
                                <input type="number" name="nb_champ" id="nb_champ" min="1">
                            <?php endif; ?>
                            <input type="submit" value="Valider" name="sub-step-5">
                        </form>
                        <?php btnReset() ;?>
                    <?php elseif ($_GET['step'] == "5") : ?>
                        <?php var_dump($_SESSION); var_dump($_POST); ?>
                        <?php if (isset($_POST['sub-step-5'])){ 
                            $firstChils = $_SESSION['first_child'];
                            $datPosts = $_POST;
                            $firstChils = addInArray($datPosts, $firstChils);
                            if($firstChils['fc_type'] != 'table' || $firstChils['fc_type'] != 'form' || $firstChils['fc_type'] != 'list'){
                                $firstChilObs = (object)$firstChils;
                                $_SESSION['first_child'] = $firstChilObs;
                            }
                            $_SESSION['first_child'] = $firstChils;
                        }; ?>  
                        <form action="<?php echo 'http://projet_php.com/admin/page_edit_content_page.php?id='.$this_id.'&step=6'; ?>" method="post">
                            <?php if ($_SESSION['first_child']['fc_type'] == "list"):?>
                                <h2>List</h2>
                                <?php for($nbl=0;$nbl<$_SESSION['first_child']['nb_li'];$nbl++):?>
                                    <label for="li-<?php echo $nbl;?>">Li <?php echo $nbl;?></label>
                                    <input type="text" name="li-<?php echo $nbl;?>" id="li-<?php echo $nbl;?>">
                                <?php endfor;?>
                            <?php elseif ($_SESSION['first_child']['fc_type'] == "table"):?>
                                <h2>Table</h2>
                                <?php 
                                foreach($firstChils as $key => $firstChil){
                                    if($firstChils[$key] == 'on'){
                                        $lvName = substr($key, 6);
                                        $lvNm = strtolower($lvName);
                                        echo "<h3>".$lvName."</h3>";
                                        nbTrTdTh('tr', $lvNm);
                                        if($lvName == 'thead'){
                                            nbTrTdTh('th',$lvNm);
                                        } 
                                        else{
                                            nbTrTdTh('td', $lvNm);
                                        }
                                        
                                    }
                                }
                            ?>
                            <?php elseif ($_SESSION['first_child']['fc_type'] == "form"):?>
                                <h2>Form</h2>
                                <?php
                                    nbTrTdTh('label','label');
                                    nbTrTdTh('input','input');
                                ?>
                                <label for="add_textarea">Would you like to add TextArea :</label>
                                <input type="checkbox" name="add_textarea" id="add_textarea">
                                <label for="add_select">Would you like to add Select Menu to subject :</label>
                                <input type="checkbox" name="add_select" id="add_select">
                                <label for="add_send_copie">Would you like to add Send message Copie :</label>
                                <input type="checkbox" name="add_send_copie" id="add_send_copie">
                            <?php elseif($firstChils['fc_type'] != 'table' && $firstChils['fc_type'] != 'form' && $firstChils['fc_type'] != 'list'):?>
                                <h2>Would you like to add other elements to the container?</h2>
                                <input type="submit" value="Yes" name="sub-yes">
                                <input type="submit" value="No" name="sub-no">
                            <?php endif; ?>
                            <?php if($firstChils['fc_type'] == 'table' || $firstChils['fc_type'] == 'form' || $firstChils['fc_type'] == 'list'):?>
                                <input type='submit' value='Valider' name='sub-step-6'>;
                            <?php endif; ?>
                        </form>
                    <?php btnReset() ;?>
                    <?php elseif ($_GET['step'] == "6") : ?>
                        <?php  if (isset($_POST['sub-step-6'])){

                            $firstChils = $_SESSION['first_child'];
                            $datPosts = $_POST;
                            $firstChils = addInArray($datPosts, $firstChils); 
                            var_dump($firstChils);
                            $_SESSION['first_child'] = $firstChils;
                        }
                        ?>
                        <form action="<?php echo 'http://projet_php.com/admin/page_edit_content_page.php?id='.$this_id.'&step=7'; ?>" method="post">
                            <h2>Step 6</h2>
                            <?php if ($firstChils['fc_type'] == "table"):?>
                                <?php 
                                    $trObs = $tabelsObjets['trs'];
                                    $thObs = $tabelsObjets['ths'];
                                    $tdObs = $tabelsObjets['tds'];
                                    if($firstChils ["check_thead"] == 'on'){
                                        $nbTrThead = $firstChils['nb_tr_thead'];
                                        $nbThThead = $firstChils['nb_th_thead'];
                                        configTableRowsCols('head', $trObs, $nbTrThead, 'tr', $thObs, $nbThThead, 'th');
                                    }
                                    if ($firstChils ["check_tbody"] == 'on'){
                                        $nbTrTbody = $firstChils['nb_tr_tbody'];
                                        $nbTdTbody = $firstChils['nb_td_tbody'];
                                        configTableRowsCols('body', $trObs, $nbTrTbody, 'tr', $thObs, $nbTdTbody, 'th');
                                    }
                                    if ($firstChils ["check_tfoot"] == 'on') {
                                        $nbTrTfoot = $firstChils['nb_tr_tfoot'];
                                        $nbTdTfoot = $firstChils['nb_td_tfoot'];
                                        configTableRowsCols('foot', $trObs, $nbTrTfoot, 'tr', $thObs, $nbTdTfoot , 'th');
                                    }
                                ?> 
                            <?php endif; ?>
                            <input type='submit' value='Valider' name='sub-step-7'>
                        </form>
                    <?php btnReset() ;?>
                    <?php elseif ($_GET['step'] == "7") : ?>
                        <?php if (isset($_POST['sub-step-7'])){
                            $firstChils = $_SESSION['first_child'];
                            // print_r($firstChils);
                            // echo "<br>";
                            //print_r($_POST);
                            var_dump(count($_POST));
                            echo "<br>";
                            $datPosts = $_POST;
                            $nbHRows = $firstChils['nb_tr_thead'];
                            // echo $nbHRows;
                            // $nbdataRow = 3;
                            // $nbdataCol = 4;
                            $nbCols = $firstChils['nb_th_thead'];
                            $nbRows = $firstChils['nb_tr_tbody'];
                            $nbCols = $firstChils['nb_td_tbody'];
                            $nbRows = $firstChils['nb_tr_tfoot'];
                            $nbCols = $firstChils['nb_td_tfoot'];
                            $arrayRowsHead = array();
                            $nbH = 0;
                            $nbH2 = 0;
                            foreach($datPosts as $key => $value){
                                    // if(substr($key, 0, 8) === 'head_ths' && substr($key, -1) === '1'){
                                    //     echo(substr($key, 0, 8));
                                    //     echo   "<br>";
                                    //     $nbH += 1;
                                    // } 
                                    // elseif (substr($key, 0, 8) === 'head_trs' && substr($key, -1) > '1'){
                                    //     $nbH2 += 1;
                                    // }
                                    // if(substr($key, 0, 8) === 'head_ths'){
                                    //     $nbH += 1;
                                    // } 
                                
                               
                            }
                            echo $nbH;
                            echo   "<br>";
                            $arrayRowsHead1 = array_splice($datPosts, 0,4); 
                            $arrayColsHead1 = array_splice($datPosts, 0,8);
                            echo   "<br>";  
                            print_r($arrayRowsHead1);
                            echo   "<br>";
                            print_r($arrayColsHead1);
                            echo   "<br>";
                            $arrayRowsHead2 = array_splice($datPosts, 0,4);
                            $arrayColsHead2 = array_splice($datPosts, 0,8);
                            echo   "<br>";  
                            print_r($arrayRowsHead2);
                            echo   "<br>";
                            print_r($arrayColsHead2);
                            echo   "<br>";
                            echo   "<br>";
                            print_r($datPosts);
                            echo   "<br>";
                            // if($firstChils ["check_thead"] == 'on'){
                            //     echo"<h2>Head</h2>";
                            //     $arrayThead = array();
                            //     $arrayTheadRows = array();
                            //     $arrayTheadCols = array();
                            //     $nbRows = $firstChils['nb_tr_thead'];
                            //     $nbCols = $firstChils['nb_th_thead'];
                            // }
                            // if ($firstChils ["check_tbody"] == 'on'){
                            //    echo"<h2>Body</h2>";
                            //    $arrayTbody = array();
                            //    $arrayTbodyRows = array();
                            //    $arrayTbodyCols = array();
                               
                            // }
                            // if ($firstChils ["check_tfoot"] == 'on') {
                            //     echo"<h2>Foot</h2>";
                            //     $arrayTfoot = array();
                            //     $arrayTfootRows = array();
                            //     $arrayTfootCols = array();
                                
                            // }
                        }
                        ?>
                        <form action="<?php echo 'http://projet_php.com/admin/page_edit_content_page.php?id='.$this_id.'&step=8'; ?>" method="post">
                            <input type='submit' value='Valider' name='sub-step-7'>
                        </form>
                    <?php btnReset() ;?>
                    <?php endif; ?>
                </div>
            </main>
            <?php include 'layout/admin_footer.php'; ?>
        </div>
    </body>
</html>