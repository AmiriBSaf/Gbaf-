<?php
session_start(); 


try{
    $bdd = new PDO('mysql:host=localhost;dbname=id16887953_gbaf;charset=utf8', 'id16887953_safia', 'qIV~Y^_8i_7_/+4L');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>