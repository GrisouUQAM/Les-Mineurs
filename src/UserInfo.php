<?php
/**
 * User: alexis
 */

class UserInfo {

    private $queries;
    private $pages;
    private $revision
    private $userrevision;
    private $oldVersion;
    private $userVersion;
    private $usertimestamp;

    public function getOldVersion()
    {
        return $this->oldVersion;
    }
    public function getPages()
    {
        return $this->pages;
    }
    public function getQueries()
    {
        return $this->queries;
    }
    public function getRevision()
    {
        return $this->revision;
    }
    public function getUserVersion()
    {
        return $this->userVersion;
    }
    public function getUserrevision()
    {
        return $this->userrevision;
    }
    public function getUsertimestamp()
    {
        return $this->usertimestamp;
    }


    public function setQueries($queries)
    {
        $this->queries = $queries;
    }
    public function setPages($pages)
    {
        $this->pages = $pages;
    }
    public function setRevision($revision)
    {
        $this->revision = $revision;
    }
    public function setUserVersion($userVersion)
    {
        $this->userVersion = $userVersion;
    }
    public function setOldVersion($oldVersion)
    {
        $this->oldVersion = $oldVersion;
    }
    public function setUserrevision($userrevision)
    {
        $this->userrevision = $userrevision;
    }
    public function setUsertimestamp($usertimestamp)
    {
        $this->usertimestamp = $usertimestamp;
    }


} 