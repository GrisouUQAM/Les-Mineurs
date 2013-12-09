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
    public function getConnection()
    {
       self::$pdo = new PDO('mysql:host=localhost;dbname=wiki_contrib_test', 'wikicontrib', 'wiki007');
       return PHPUnit_Extensions_Database_TestCase::createDefaultDBConnection(self::$pdo, ':wiki_contribTest:');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
       return $this->createFlatXMLDataSet('./dataSets/wikiTable.xml');
    }
    /*
        public function testCompareUserIfInTable1()
        {
            $this->assertEquals(1,compareUserIfInTable("gégé",self::$pdo));
        }
*/

    public function testNewEntry()
    {
        $this->assertEquals(3, $this->getConnection()->getRowCount('contributor'));

    }

    public function testCompareUserIfInTable1()
    {
        $this->assertEquals(1,DBManagement::compareUserIfInTable("gégé",self::$pdo));
    }

}

?>
