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

       public function insertIfContributionNotPresent($contributorID, $UserInfo) {

             $contributionsID = retrieveContributionID($contributorID);

             $contributionIDToInsert = $UserInfo . getPagesId();
             $contributionOldVersionToInsert = $UserInfo . getOldVersion();
             $contributionUserVersionToInsert = $UserInfo . getUserVersion();
             $contributionUsertimestampToInsert = $UserInfo . getUsertimestamp();
             $contributionWebsiteToInsert = $UserInfo . getWebsite();

             foreach ($contributionsID as $IDvalue) {
                    if ($IDvalue == $contributionIDToInsert) {
                           return;
                    }
             }

             $bdd -> exec("INSERT INTO contributions('ID',page_id','rev_id','parent_id','time','website') VALUES('" . $contributorID . "','" . $contributionIDToInsert . "','" . $contributionUserVersionToInsert . "','" . $contributionOldVersionToInsert . "','" . $contributionUsertimestampToInsert . "','" . $contributionWebsiteToInsert . "')");

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
