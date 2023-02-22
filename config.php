<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=id19048053_projet;charset=utf8', 'id19048053_username', 'Hugoemma1103!');
    }
    catch(Exception $e)
    {
        die('Erreur'.$e->getMessage());
    }
?>