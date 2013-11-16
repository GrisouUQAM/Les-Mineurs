<?php

include_once (dirname(__FILE__) . '/DBConnection.php');
include_once (dirname(__FILE__) . '/ContributionInfo.php');

class DBManagement {
       public function retrieveContributionID($contributorID, $website) {
           $result = $bdd -> query('SELECT page_id FROM contributions where ID =' . $contributorID . ' and website = ' . $website);
           $contributionsID;
           while ($contributionsID = $result -> fetch()) {
           }
           return $contributionsID;
       }

       public function insertIfContributionNotPresent($UserInfo) {


           $contributionIDToInsert = $UserInfo->getPagesId();
           $contributionOldVersionToInsert = $UserInfo->getOldVersion();
           $contributionUserVersionToInsert = $UserInfo->getUserVersion();
           $contributionUsertimestampToInsert = $UserInfo->getUsertimestamp();
           $contributionWebsiteToInsert = $UserInfo->getWebsite();
           $contributorIdToInsert = $UserInfo->getUserID;

           $contributionsID = retrieveContributionID($contributorIdToInsert, $contributionWebsiteToInsert);

           foreach ($contributionsID as $IDvalue) {
                  if ($IDvalue == $contributionIDToInsert) {
                         return;
                  }
           }

           $bdd -> exec("INSERT INTO contributions('ID',page_id','rev_id','parent_id','time','website') VALUES('" . $contributorIdToInsert . "','" . $contributionIDToInsert . "','" . $contributionUserVersionToInsert . "','" . $contributionOldVersionToInsert . "','" . $contributionUsertimestampToInsert . "','" . $contributionWebsiteToInsert . "')");

       }

       public function verifyContributorIDandCreateIfNotPresent($username) {
           $result = $bdd -> query('SELECT ID FROM contributor where username =' . $username);
           $row_count = $result -> rowCount();

           if ($row_count == 0) {
                  $bdd -> exec("INSERT INTO contributor('username') VALUES('" . $username . "')");
           }
       }

    /*****************************************************
     * Vérifie si l'utilisateur existe
     * Si NON, il appel createIfNotPresent pour le créer
     * si oui il retourne le ID pour utilisation futur
     ******************************************************/

     /*public function verifyContributorID($username) {
          $result = $bdd -> query('SELECT ID FROM contributor where username =' . $username);
          $row_count = $result -> rowCount();
          if ($row_count == 0) {
            createIfNotPresent($username);
          }
          return $result;
     }*/



    /*******************************************************
     * Crée l'utilisateur dans la table
     ********************************************************/

       /* public function createIfNotPresent($username) {
            $bdd -> exec("INSERT INTO contributor('username') VALUES('" . $username . "')");
            verifyContributorID($username);
        }*/


}
?>
