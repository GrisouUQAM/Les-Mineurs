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
    
    $result =  $dataBase -> prepare('SELECT * FROM contributions WHERE ID ='  . $uneContrib->getUserID() . ' AND timestamp =' . $uneContrib->getPagesID() . 'AND website =' . $uneContrib->getWebSite());
    $result->execute();
    $row_count = $result -> rowCount();
    return !($row_count == 0);
  }
  
  
/**********************************************************
* Insert dans la table table les informations de la contributions
****************************************************************/ 
  public static function insertContributionIntoTable($uneContrib, $dataBase){
    
    if (!DBManagement::compareContributionIfInTable($uneContrib, $dataBase)){
      
      $contributionIDToInsert = $uneContrib->getPagesId();
      $contributionOldVersionToInsert = $uneContrib->getOldVersion();
      $contributionUserVersionToInsert = $uneContrib->getUserVersion();
      $contributionUsertimestampToInsert = $uneContrib->getUsertimestamp();
      $contributionWebsiteToInsert = $uneContrib->getWebsite();
      $contributorID = $uneContrib->getUserID();


        $dataBase -> exec("INSERT INTO contributions('ID','page_id','rev_id','parent_id','time','website') VALUES('" . $contributorID . "','" . $contributionIDToInsert . "','" . $contributionUserVersionToInsert . "','" . $contributionOldVersionToInsert . "','" . $contributionUsertimestampToInsert . "','" . $contributionWebsiteToInsert . "')");
      
      
    }      
  }
  
  
  
  public static function compareUserIfInTable($username,$dataBase) {
      echo "av compare prepare<br>";
      $result = $dataBase -> query("SELECT * FROM contributor WHERE contributor_username LIKE '$username'");
      echo "- Compare exec fait<br>";
    //$row_count = $result -> rowCount();
      if(!$result){
         print_r($dataBase->errorInfo());
      }
      $count = $result->rowCount();
      return ($count>0);
  }
  
  public static function insertUserIntoTable($usernameToInsert, $dataBase) {
      echo " |Insert av if compare<br>";
    if (!DBManagement::compareUserIfInTable($usernameToInsert, $dataBase)) {
        echo " |Insert av execute<br>";
        $result = $dataBase -> prepare("INSERT INTO contributor(contributor_username) VALUES(:username)");
        echo " |Insert av bind<br>";
        $result->bindParam(":username",$username);
        echo " |Insert av exec2<br>";
        $username = $usernameToInsert;
        $result -> execute();
        echo " |Insert execute fait<br>";
    }
  }
        
  public static function retrieveUserID($username, $dataBase) {
       $result = $dataBase -> prepare('SELECT ID FROM contributor WHERE contributor_username =' . $username);
       $result->execute();
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
          
          $resultTalk = $dataBase -> exec("SELECT * FROM talk where page_id =".$unPost->getPagesId(). "AND ID=".$unPost->getUserID()."AND website=".$unPost->getWebSite());
          $row_count = $resultTalk -> rowcount();
          return $row_count == 0;
        }
        
        
/**********************************************************
* Insert dans la table table les informations d'un post
****************************************************************/ 
        public static function insertPostIntoTable($unPost, $dataBase){
          
          if (!comparePostIfInTable($unPost)) {
            $postIDToInsert = $unPost->getPagesId();
            $postWebsiteToInsert = $unPost->getWebsite();
            $userID = $unPost->getID();
            $postPost = $unPost->getPost();

                $dataBase -> exec("INSERT INTO talk('ID','website','page_id','post') VALUES('" . $userID . "','" . $postWebsiteToInsert . "','" . $postIDToInsert . "','" . $postPost . "')");
          }
        }
    }
?>
