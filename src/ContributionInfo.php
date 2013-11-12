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


    public function getUserName()
    {
        return $this->userName;
    }
    public function getWebSite()
    {
        return $this->website;
    }
    public function getOldVersion()
    {
        return $this->oldVersion;
    }
    public function getPagesId()
    {
        return $this->pagesId;
    }
    public function getUserVersion()
    {
        return $this->userVersion;
    }
    public function getUsertimestamp()
    {
        return $this->usertimestamp;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }
    public function setWebsite($webSite)
    {
        $this->webSite = $webSite;
    }
    public function setPagesId($pages)
    {
        $this->pagesId = $pages;
    }
    public function setUserVersion($userVersion)
    {
        $this->userVersion = $userVersion;
    }
    public function setOldVersion($oldVersion)
    {
        $this->oldVersion = $oldVersion;
    }
    public function setUsertimestamp($usertimestamp)
    {
        $this->usertimestamp = $usertimestamp;
    }


} 