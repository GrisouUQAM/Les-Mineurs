<?php
/**
 * User: alexis
 */

class UserInfo {


    private $pagesId;
    private $oldVersion;
    private $userVersion;
    private $usertimestamp;

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