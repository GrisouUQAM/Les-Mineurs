<?php
require_once "PHPUnit/Extensions/Database/TestCase.php";
include_once ('../src/DBManagement.php');
include_once ('../src/PostInfo.php');
include_once ('../src/ContributionInfo.php');
include_once ('./PHPUnitExtensionsDatabaseOperationMySQL55Truncate.php');


class DBManagementTest extends PHPUnit_Extensions_Database_TestCase {

     static private $pdo = null;

    /**
     * Fix Foreign Key integrity problem with truncate on mySQL5
     */
    public function getSetUpOperation(){
        $cascadeTruncates = TRUE; //for cascading Truncate
        return new PHPUnit_Extensions_Database_Operation_Composite(array(
            new PHPUnit_Extensions_Database_Operation_MySQL55Truncate($cascadeTruncates),
            PHPUnit_Extensions_Database_Operation_Factory::INSERT()
        ));
    }

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection(){
       self::$pdo = new PDO('mysql:host=localhost;dbname=wiki_contrib_test', 'wikicontrib', 'wiki007');
       return $this->createDefaultDBConnection(self::$pdo, ':wiki_contribTest:');
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




/// ----------
/// - Test de compareUserIfInTable
    public function testCompareUserIfInTable1(){
        $this->assertTrue(DBManagement::compareUserIfInTable("gégé",self::$pdo));
    }
    public function testCompareUserIfInTable2(){
        $this->assertFalse(DBManagement::compareUserIfInTable("yeufyewfvhjweg",self::$pdo));
    }
    public function testCompareUserIfInTable3(){
        $this->assertFalse(DBManagement::compareUserIfInTable("",self::$pdo));
    }


/// ----------
/// - Test de compareUserIfInTable
    /**
     * @depends testDuDataSet
     * Le résultat dépends des infos du DataSet (wikiTest.xml)
     */
    public function testInsertUserIntoTable1(){
        DBManagement::insertUserIntoTable("Test1", self::$pdo);
        $this->assertEquals(4, $this->getConnection()->getRowCount('contributor'));
    }
    /**
     * @depends testDuDataSet
     * Le résultat dépends des infos du DataSet (wikiTest.xml)
     */
    public function testInsertUserIntoTable2(){
        DBManagement::insertUserIntoTable("Test2", self::$pdo);
        DBManagement::insertUserIntoTable("Test2.1", self::$pdo);
        DBManagement::insertUserIntoTable("Test2.2", self::$pdo);
        $this->assertEquals(6, $this->getConnection()->getRowCount('contributor'));
    }



/// ----------
/// - Test de retriveUserID
    public function testRetrieveUserID1(){
        $this->assertNull(DBManagement::retrieveUserID("adffgf", self::$pdo));
    }
    public function testRetrieveUserID2(){
        $this->assertEquals(04,DBManagement::retrieveUserID("victor", self::$pdo));
    }


/// ----------
/// - Test de insertContributionIntoTable
    public function testInsertContributionIntoTable(){
        $uneContrib = new ContributionInfo("9", "http//blabla",  "3109537", "346457", "568467", "2009-05-27 10:58:19", "io");

        $this->assertFalse(DBManagement::insertContributionIntoTable($uneContrib, self::$pdo));
    }



}


?>
