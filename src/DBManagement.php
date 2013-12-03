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
  
  public static function compareContributionIfInTable($uneContrib, $dataBase) {
    
    $result = $dataBase -> query('SELECT * FROM contributions WHERE ID ='  . $uneContrib->getUserID() . ' AND timestamp =' . $uneContrib->getPagesID() . 'AND website =' . $uneContrib->getWebSite());
    $row_count = $result -> rowCount();
    return !($row_count == 0);
  }
  
  
/**********************************************************
* Insert dans la table table les informations de la contributions
****************************************************************/ 
  public static function insertContributionIntoTable($uneContrib, $dataBase){
    
    if (!compareContributionIfInTable($uneContrib)){
      
      $contributionIDToInsert = $uneContrib->getPagesId();
      $contributionOldVersionToInsert = $uneContrib->getOldVersion();
      $contributionUserVersionToInsert = $uneContrib->getUserVersion();
      $contributionUsertimestampToInsert = $uneContrib->getUsertimestamp();
      $contributionWebsiteToInsert = $uneContrib->getWebsite();
      $contributorID = $uneContrib->getID();


        $dataBase -> exec("INSERT INTO contributions('ID','page_id','rev_id','parent_id','time','website') VALUES('" . $contributorID . "','" . $contributionIDToInsert . "','" . $contributionUserVersionToInsert . "','" . $contributionOldVersionToInsert . "','" . $contributionUsertimestampToInsert . "','" . $contributionWebsiteToInsert . "')");
      
      
    }      
  }
  
  
  
  public static function compareUserIfInTable($username,$dataBase) {
    $result = $dataBase -> query('SELECT ID FROM contributor where username =' . $username);
    $row_count = $result -> rowCount();
      return !($row_count == 0);
  }
  
  public static function insertUserIntoTable($username, $dataBase) {
    if (!compareUserIfInTable($username, $dataBase) {
    $dataBase -> exec("INSERT INTO contributor('username') VALUES('" . $username . "')");
    }
  }
        
  public static function retrieveUserID($username, $dataBase) {
          $result = $dataBase -> query('SELECT ID FROM contributor WHERE username =' . $username);
          $row_count = $result -> rowcount();
          return ($row_count == 0) ? null : $result->fetch() ;
  }
        
        
        
/********************************************************
* Compare avec le tableau si les éléments d'un talk existe déjà
* Si n'existe pas, il appelle la fonction insertPostIntoTable
* la vérification se fait à l'aide du nom d'utilisateur
* du user ID et du siteweb d'ou provient le post
*********************************************************/
        
        public static function comparePostIfInTable($unPost, $dataBase) {
          
          $resultTalk = $dataBase -> exec("SELECT * FROM talk where rev_id =".$postIDToInsert. "AND ID=".$userID."AND website=".$postWebsiteToInsert);
          $row_count = $resultTalk -> rowcount();
          return $row_count == 0;
        }
        
        
/**********************************************************
* Insert dans la table table les informations d'un post
****************************************************************/ 
        public static function insertPostIntoTable($unPost, $dataBase){
          
          if (!comparePostIfInTable($unPost)0) {
            $postIDToInsert = $unPost->getPagesId();
            $postWebsiteToInsert = $unPost->getWebsite();
            $userID = $unPost->getID();
            $postPost = $unPost->getPost();

                $dataBase -> exec("INSERT INTO talk('ID','website','page_id','post') VALUES('" . $userID . "','" . $postWebsiteToInsert . "','" . $postIDToInsert . "','" . $postPost . "')");
          }
        }
              
?>
