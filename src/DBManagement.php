<?php

include_once(dirname(__FILE__) . '/DBConnection.php');
include_once(dirname(__FILE__) . '/ContributionInfo.php');
include_once(dirname(__FILE__) . '/PostInfo.php');


class DBManagement
{


    /********************************************************
     * Compare avec le tableau si les éléments existe déjà
     * Si n'existe pas, il appelle la fonction insertIntoTable
     * la vérification se fait à l'aide du nom d'utilisateur
     * du user ID et du siteweb d'ou provient la contribution
     *********************************************************/
    public static function compareContributionIfInTable($uneContrib, $dataBase)
    {

        $uneContribPID = $uneContrib->getPagesID();
        $uneContribUID = $uneContrib->getUserID();
        $uneContribRID = $uneContrib->getUserVersion();
        $uneContribWEB = $uneContrib->getWebSite();

        $result = $dataBase->query("SELECT * FROM contributions WHERE page_id='$uneContribPID' AND ID='$uneContribUID' AND website='$uneContribWEB' AND rev_id='$uneContribRID'");
        if (!$result) {
            print_r($dataBase->errorInfo());
        }
        $count = $result->rowCount();
        return ($count > 0);
    }


    /**********************************************************
     * Insert dans la table table les informations de la contributions
     ****************************************************************/
    public static function insertContributionIntoTable($uneContrib, $dataBase)
    {
        if (!DBManagement::compareContributionIfInTable($uneContrib, $dataBase)) {

            $contributionIDToInsert = $uneContrib->getPagesId();
            $contributionOldVersionToInsert = $uneContrib->getOldVersion();
            $contributionUserVersionToInsert = $uneContrib->getUserVersion();
            $contributionUsertimestampToInsert = $uneContrib->getUsertimestamp();
            $contributionWebsiteToInsert = $uneContrib->getWebsite();
            $contributorID = $uneContrib->getUserID();

            $result = $dataBase->prepare("INSERT INTO contributions(ID,page_id,rev_id,parent_id,contrib_time,website) VALUES(:contributorID,:contributionIDToInsert,:contributionUserVersionToInsert,:contributionOldVersionToInsert,:contributionUsertimestampToInsert,:contributionWebsiteToInsert)");
            try{
                $result->execute(array(':contributorID' => $contributorID, ':contributionIDToInsert' => $contributionIDToInsert, ':contributionUserVersionToInsert' => $contributionUserVersionToInsert, ':contributionOldVersionToInsert' => $contributionOldVersionToInsert, ':contributionUsertimestampToInsert' => $contributionUsertimestampToInsert, ':contributionWebsiteToInsert' => $contributionWebsiteToInsert));
            }catch (Exception $e){
                print_r('insertContrubutionIntoTable erreur : ' . $e->getMessage());
            }

            if (!$result) {
                print_r($dataBase->errorInfo());
            }
            $count = $result->rowCount();
            return ($count > 0);

        }
    }


    public static function compareUserIfInTable($username, $dataBase)
    {

        $result = $dataBase->query("SELECT * FROM contributor WHERE contributor_username='$username'");

        if (!$result) {
            print_r($dataBase->errorInfo());
        }
        $count = $result->rowCount();
        return ($count > 0);
    }

    public static function insertUserIntoTable($usernameToInsert, $dataBase)
    {

        if (!DBManagement::compareUserIfInTable($usernameToInsert, $dataBase)) {
            //echo " |Insert av execute<br>";
            $result = $dataBase->prepare("INSERT INTO contributor(contributor_username) VALUES(:username)");
            //echo " |Insert av bind<br>";
            $result->bindParam(":username", $username);
            //echo " |Insert av exec2<br>";
            $username = $usernameToInsert;
            $result->execute();
            //echo " |Insert execute fait<br>";
        }
    }

    public static function retrieveUserID($username, $dataBase)
    {
        $result = $dataBase->prepare("SELECT ID FROM contributor WHERE contributor_username='$username'");
        $result->execute();
        $row_count = $result->rowcount();
        $theResult = $result->fetch();
        return ($row_count == 0) ? null : $theResult[0];
    }


    /********************************************************
     * Compare avec le tableau si les éléments d'un talk existe déjà
     * Si n'existe pas, il appelle la fonction insertPostIntoTable
     * la vérification se fait à l'aide du nom d'utilisateur
     * du user ID et du siteweb d'ou provient le post
     *********************************************************/
    public static function comparePostIfInTable($unPost, $dataBase)
    {

        $unPostPID = $unPost->getPagesId();
        $unPostUID = $unPost->getUserID();
        $unPostWEB = $unPost->getWebSite();
        $unPostRID = $unPost->getRevId();

        $result = $dataBase->prepare("SELECT * FROM talk WHERE rev_id='$unPostRID' AND page_id='$unPostPID' AND ID='$unPostUID' AND website='$unPostWEB'");
        $result->execute();

        if (!$result) {
            print_r($dataBase->errorInfo());
        }

        $count = $result->rowcount();
        return ($count > 0);
    }


    /**********************************************************
     * Insert dans la table table les informations d'un post
     ****************************************************************/
    public static function insertPostIntoTable($unPost, $dataBase)
    {

        if (!DBManagement::comparePostIfInTable($unPost, $dataBase)) {
            $postIDToInsert = $unPost->getPagesId();
            $postWebsiteToInsert = $unPost->getWebsite();
            $userID = $unPost->getUserID();
            $revID = $unPost->getRevID();


            $result = $dataBase->prepare("INSERT INTO talk(ID,website,page_id,rev_id) VALUES(:userID,:postWebsiteToInsert,:postIDToInsert,:revID)");
            $result->execute(array(':postIDToInsert' => $postIDToInsert, ':postWebsiteToInsert' => $postWebsiteToInsert, ':userID' => $userID, ':revID' => $revID));
            if (!$result) {
                print_r($dataBase->errorInfo());
            }
            $count = $result->rowCount();
            return ($count > 0);

        }
    }
}

?>
