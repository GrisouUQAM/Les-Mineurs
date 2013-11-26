<?php
/**
 * User: Dominique Menard
 */

class PostInfo {

    private $userName;
    private $website;
    private $pagesId;
    private $revId;
    private $userID;

    function __construct($userID, $website,  $pagesId, $revId)
    {
        $this->userID = $userID;
        $this->website = $website;
        $this->pagesId = $pagesId;
        $this->revId = $revId;
    }

    public function getUserName(){return $this->userName;}
    public function getWebSite(){return $this->website;}
    public function getRevId(){return $this->revId;}
    public function getPagesId(){return $this->pagesId;}
    public function getUserID(){return $this->userID;}

    public function setUserName($userName){
        $this->userName = $userName;
    }

} 
