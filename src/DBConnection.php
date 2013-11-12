<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=wiki_contrib', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>