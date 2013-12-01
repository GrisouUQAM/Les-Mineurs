<?php
require_once "PHPUnit/Extensions/Database/TestCase.php";
include_once (dirname(__FILE__) . '/DBManagement.php');
include_once (dirname(__FILE__) . '/ContributionInfo.php');
include_once (dirname(__FILE__) . '/PostInfo.php');

class DBManagementTest extends PHPUnit_Framework_TestCase {


    public function setUp(){
        require_once "PHPUnit/Extensions/Database/TestCase.php";
        include_once (dirname(__FILE__) . '/DBManagement.php');
        include_once (dirname(__FILE__) . '/PostInfo.php');
        $pdo = null;
    }


    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {

        return $this->createDefaultDBConnection($pdo, ':memory:');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/guestbook-seed.xml');
    }

    public function testCompareUserIfInTable1()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=wiki_contrib', 'wikicontrib', 'wiki007');
        $uneContrib = "unecontrib";
        $result = DBManagement::compareContributionIfInTable($uneContrib, $pdo);
        $this->assertFalse($result);
    }



}

?>
 