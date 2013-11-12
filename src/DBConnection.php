<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=wiki_contrib', 'wikicontrib', 'wiki007');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
