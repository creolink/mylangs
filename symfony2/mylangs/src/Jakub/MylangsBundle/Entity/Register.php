<?php

namespace Jakub\MylangsBundle\Entity;

class Register {

    protected $_sUserName;
    protected $_sPassword;
    protected $_sConfirm;

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

    public function isPasswordLegal() {
        return ($this->_sUserName != $this->_sPassword);
    }
    
    public function ispasswordConfirm() {
        return ($this->_sConfirm == $this->_sPassword);
    }
}
