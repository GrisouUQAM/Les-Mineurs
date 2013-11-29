<?php
require_once "PHPUnit/Extensions/Database/TestCase.php";
include_once (dirname(__FILE__) . '/DBManagement.php');
include_once (dirname(__FILE__) . '/ContributionInfo.php');
include_once (dirname(__FILE__) . '/PostInfo.php');

class DBManagementTest extends PHPUnit_Framework_TestCase {

    static private $pdo = null;

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        this->$pdo = new PDO('mysql:host=localhost;dbname=wiki_contrib', 'wikicontrib', 'wiki007');
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
        $faux = false;
        $this->assertFalse(compareContributionIfInTable($uneContrib, $pdo));
    }



}

?>
 