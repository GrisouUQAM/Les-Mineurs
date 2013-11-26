<?php

include_once (dirname(__FILE__) . '/DBConnection.php');
include_once (dirname(__FILE__) . '/ContributionInfo.php');
include_once (dirname(__FILE__) . '/PostInfo.php');


class DBManagement {
  
  
  /********************************************************
* Compare avec le tableau si les éléments existe déjà
* Si n'existe pas, il appelle la fonction insertIntoTable
* la vérification se fait à l'aide du nom d'utilisateur
* du user ID et du siteweb d'ou provient la contribution
*********************************************************/
  
  public function compareContributionIfInTable($uneContrib) {
    
    $result = $bdd -> query('SELECT * FROM contributions WHERE ID ='  . $uneContrib->getUserID() . ' AND timestamp =' . $uneContrib->getPagesID() . 'AND website =' . $uneContrib->getWebSite());
    $row_count = $result -> rowCount();
    if ($row_count == 0) {
      return false;
    } else {
      return true;
    }
    
    
    
  }
  
  
  /**********************************************************
* Insert dans la table table les informations de la contributions
****************************************************************/ 
  public function insertContributionIntoTable($uneContrib){
    
    if (!compareContributionIfInTable($uneContrib)){
      
      $contributionIDToInsert = $uneContrib->getPagesId();
      $contributionOldVersionToInsert = $uneContrib->getOldVersion();
      $contributionUserVersionToInsert = $uneContrib->getUserVersion();
      $contributionUsertimestampToInsert = $uneContrib->getUsertimestamp();
      $contributionWebsiteToInsert = $uneContrib->getWebsite();
      $contributorID = $uneContrib->getID();
      
      
      bdd -> exec("INSERT INTO contributions('ID','page_id','rev_id','parent_id','time','website') VALUES('" . $contributorID . "','" . $contributionIDToInsert . "','" . $contributionUserVersionToInsert . "','" . $contributionOldVersionToInsert . "','" . $contributionUsertimestampToInsert . "','" . $contributionWebsiteToInsert . "')");
      
      
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
    if (!compareUserIfInTable($username) { 
      $bdd -> exec("INSERT INTO contributor('username') VALUES('" . $username . "')");               
    }
  }
        
  public function retrieveUserID($username) {
          $result = $bdd -> query('SELECT ID FROM contributor WHERE username =' . $username);
          $row_count = $result -> rowcount();
          if ($row_count == 0) {
            return null;
          } else {
            return $result->fetch();
          } 
  }
        
        
        
      /********************************************************
* Compare avec le tableau si les éléments d'un talk existe déjà
* Si n'existe pas, il appelle la fonction insertPostIntoTable
* la vérification se fait à l'aide du nom d'utilisateur
* du user ID et du siteweb d'ou provient le post
*********************************************************/
        
        public function comparePostIfInTable(unPost) {
          
          $resultTalk = $bdd -> exec("SELECT * FROM talk where rev_id =".$postIDToInsert. "AND ID=".$userID."AND website=".$postWebsiteToInsert);
          $row_count = $result -> rowcount();
          
          if ($row_count == 0) {
            return true;
          } else {
            
                  return false;
          }

        }
        
        
        /**********************************************************
* Insert dans la table table les informations d'un post
****************************************************************/ 
        public function insertPostIntoTable($unPost){
          
          if (!comparePostIfInTable($unPost)0) {
            $postIDToInsert = $unPost->getPagesId();
            $postWebsiteToInsert = $unPost->getWebsite();
            $userID = $unPost->getID();
            $postPost = $unPost->getPost();
            
            bdd -> exec("INSERT INTO talk('ID','website','page_id','post') VALUES('" . $userID . "','" . $postWebsiteToInsert . "','" . $postIDToInsert . "','" . $postPost . "')");
          }
        }
              
?>
