<?php
$tag = $_GET['name'];
if ($tag === 'h1' ||$tag === 'h2' || $tag === 'h3' || $tag === 'h4'){
    echo ('<label for="text_title">Your Title :</label>') ;
    echo ('<input type="text" name="text_title">');
}
?>