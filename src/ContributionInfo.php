<?php
/**
 * User: alexis
 */

class ContributionInfo {

    private $userName;
    private $website;
    private $pagesId;
    private $oldVersion;
    private $userVersion;
    private $usertimestamp;

    function __construct($website,  $pagesId, $oldVersion, $userVersion, $usertimestamp )
    {
        $this->website = $website;
        $this->pagesId = $pagesId;
        $this->oldVersion = $oldVersion;
        $this->userVersion = $userVersion;
        $this->usertimestamp = $usertimestamp;
    }

    public function getUserName(){return $this->userName;}
    public function getWebSite(){return $this->website;}
    public function getOldVersion(){return $this->oldVersion;}
    public function getPagesId(){return $this->pagesId;}
    public function getUserVersion(){return $this->userVersion;}
    public function getUsertimestamp(){return $this->usertimestamp;}

    public function setUserName($userName){
        $this->userName = $userName;
    }

} 