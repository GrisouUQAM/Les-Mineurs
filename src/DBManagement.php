<?php

include_once( dirname(__FILE__) . '/DBConnection.php');
include_once( dirname(__FILE__) . '/UserInfo.php');

public function retrieveContributionID($contributorID){
  $result = $bdd->query('SELECT page_id FROM contributions where ID ='.$contributorID);
  $contributionsID;
  while ($contributionsID =result->fetch()){ }
  return $contributionsID;
}

public function insertIfContributionNotPresent($contributorID,$UserInfo){

  $contributionsID = retrieveContributionID($contributorID)
  
  $contributionIDToInsert = $UserInfo.getPagesId();
  $contributionOldVersionToInsert = $UserInfo.getOldVersion();  
  $contributionUserVersionToInsert = $UserInfo.getUserVersion();  
  $contributionUsertimestamp = $UserInfo.getUsertimestamp();  
  
  foreach ($contributionsID as $IDvalue){
    if($IDvalue == $contributionIDToInsert){
      return;
    }
  }
  
  
  
  $bdd->exec('INSERT INTO contributions(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(\'Battlefield 1942\', \'Patrick\', \'PC\', 45, 50, \'2nde guerre mondiale\')');
  
}

?>