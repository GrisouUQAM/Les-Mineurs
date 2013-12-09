<?php
require_once "PHPUnit/Extensions/Database/TestCase.php";
include_once ('../src/DBManagement.php');
include_once ('../src/PostInfo.php');
include_once ('../src/ContributionInfo.php');

class DBManagementTest extends PHPUnit_Extensions_Database_TestCase {

     static private $pdo = null;

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection(){
       self::$pdo = new PDO('mysql:host=localhost;dbname=wiki_contrib_test', 'wikicontrib', 'wiki007');
       return PHPUnit_Extensions_Database_TestCase::createDefaultDBConnection(self::$pdo, ':wiki_contribTest:');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet(){
       return $this->createFlatXMLDataSet('./dataSets/wikiTable.xml');
    }
    public function testDuDataSet(){
        $this->assertEquals(3, $this->getConnection()->getRowCount('contributor'));
    }


    /**
     * test de compareUserIfInTable()
     */
    public function testCompareUserIfInTable1(){
        $this->assertTrue(DBManagement::compareUserIfInTable("gégé",self::$pdo));
    }
    public function testCompareUserIfInTable2(){
        $this->assertFalse(DBManagement::compareUserIfInTable("yeufyewfvhjweg",self::$pdo));
    }
    public function testCompareUserIfInTable3(){
        $this->assertFalse(DBManagement::compareUserIfInTable("",self::$pdo));
    }

    /**
     * test de insertUserIntoTable()
     */
    public function testInsertUserIntoTable1(){
        DBManagement::insertUserIntoTable("Test1", self::$pdo);
        $this->assertEquals(4, $this->getConnection()->getRowCount('contributor'));
    }
    public function testInsertUserIntoTable2(){
        DBManagement::insertUserIntoTable("Test2", self::$pdo);
        DBManagement::insertUserIntoTable("Test2.1", self::$pdo);
        DBManagement::insertUserIntoTable("Test2.2", self::$pdo);
        $this->assertEquals(6, $this->getConnection()->getRowCount('contributor'));
    }






}

?>
