<?php

namespace Jakub\MylangsBundle\Entity;

class Register {

    protected $_sUserName;
    protected $_sPassword;
    protected $_sConfirm;
    protected $_bTermsAccepted;
    protected $_sUserId;
    
    protected $_oDB;

    public function getPassword() {
        return ($this->_sPassword);
    }

    public function setPassword($p_sPassword) {
        $this->_sPassword = trim((string)($p_sPassword));
    }

    public function getConfirm() {
        return ($this->_sConfirm);
    }

    public function setConfirm($p_sConfirm) {
        $this->_sConfirm = trim((string)($p_sConfirm));
    }

    public function getUserName() {
        return ($this->_sUserName);
    }

    public function setUserName($p_sUserName) {
        $this->_sUserName = trim((string)($p_sUserName));
    }
    
    public function getTermsAccepted()
    {
        return $this->_bTermsAccepted;
    }

    public function setTermsAccepted($p_bTermsAccepted)
    {
        $this->_bTermsAccepted = ((bool)($p_bTermsAccepted));
    }

    public function isPasswordLegal() {
        return (strlen($this->_sPassword) == 0 || $this->_sUserName != $this->_sPassword);
    }
    
    public function isPasswordConfirm() {
        return ($this->_sConfirm == $this->_sPassword);
    }
    
    public function isMinPasswordLength() {
        return (strlen($this->_sPassword) > 6);
    }
    
    public function isMinUsernameLength() {
        return (strlen($this->_sUserName) > 6);
    }
    
    public function setDB($p_oDB)
    {
        $this->_oDB = $p_oDB;
    }
    
    public function isUserDuplicated()
    {
        $oQuery = $this->_oDB->createQuery("SELECT count(u.id) FROM Jakub\MylangsBundle\Entity\User u WHERE (u.username = '".$this->_sUserName."')"); // AND u.id <> '".$this->_sUserId."'
        $iResult = $oQuery->getSingleScalarResult();
        
        return (($iResult >= 1) ? TRUE : FALSE);
    }
    
    public function isEmailDuplicated()
    {
        
    }
}
