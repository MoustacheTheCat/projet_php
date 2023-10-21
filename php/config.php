<?php

try
{
$db = new PDO('mysql:host=localhost; dbname=projet_php; charset=utf8', 'admin_projet_php', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


?>