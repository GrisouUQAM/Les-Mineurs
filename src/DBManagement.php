<?php

include_once (dirname(__FILE__) . '/DBConnection.php');
include_once (dirname(__FILE__) . '/ContributionInfo.php');

class DBManagement {


      /********************************************************
       * Compare avec le tableau si les éléments existe déjà
       * Si n'existe pas, il appelle la fonction insertIntoTable
       * la vérification se fait à l'aide du nom d'utilisateur
       * du user ID et du siteweb d'ou provient la contribution
       *********************************************************/

       public function compareContributionIfInTable($ContributionInfo) {
           
            $result = $bdd -> query('SELECT * FROM contributions WHERE ID ='  . $ContributionInfo->getUserID() . ' AND timestamp =' . $UserInfo->getPagesID() . 'AND website =' . $UserInfo->getWebSite());
            $row_count = $result -> rowCount();
            if ($row_count == 0) {
                return false;
            }
 else {
                return true;
            }
           
       

       }


      /**********************************************************
      * Insert dans la table table les informations de la contributions
      ****************************************************************/ 
       public function insertContributionIntoTable($ContributionInfo){
            
            if (!compareContributionIfInTable($ContributionInfo)){
                   
                $contributionIDToInsert = $ContributionInfo->getPagesId();
                $contributionOldVersionToInsert = $ContributionInfo->getOldVersion();
                $contributionUserVersionToInsert = $ContributionInfo->getUserVersion();
                $contributionUsertimestampToInsert = $ContributionInfo->getUsertimestamp();
                $contributionWebsiteToInsert = $ContributionInfo->getWebsite();
                $contributorID = $ContributionInfo->getID();
               
            
                bdd -> exec("INSERT INTO contributions('ID',page_id','rev_id','parent_id','time','website') VALUES('" . $contributorID . "','" . $contributionIDToInsert . "','" . $contributionUserVersionToInsert . "','" . $contributionOldVersionToInsert . "','" . $contributionUsertimestampToInsert . "','" . $contributionWebsiteToInsert . "')");

                
           }      
       }

      
       
       public function compareUserIfInTable($username) {
             $result = $bdd -> query('SELECT ID FROM contributor where username =' . $username);
             $row_count = $result -> rowCount();
             if ($row_count == 0) {
                 return false;
             } else {
                 return true;
             }
       }
       
       public function insertUserIntoTable($username) {
            if (!compareUserIfInTable($ContributionInfo()) { 
                $bdd -> exec("INSERT INTO contributor('username') VALUES('" . $username . "')");               
            }
       }
       
       public function retrieveUserID() {
            $result = $bdd -> query('SELECT ID FROM contributor WHERE username =' . $username);
            $row_count = $result -> rowcount();
            if ($row_count == 0) {
                return null;
            } else {
                return $result->fetch();
            } 
       }
 
       


       public function verifyContributorIDandCreateIfNotPresent($username) {
           $result = $bdd -> query('SELECT ID FROM contributor where username =' . $username);
           $row_count = $result -> rowCount();

           if ($row_count == 0) {
                  $bdd -> exec("INSERT INTO contributor('username') VALUES('" . $username . "')");
           }
       }

   
}
?>
