<?php

namespace Jakub\MylangsBundle\Entity;

class Login {

    protected $_sUserName;
    protected $_sPassword;
    protected $_sLang;

    public function getPassword() {
        return ($this->_sPassword);
    }

    public function setPassword($p_sPassword) {
        $this->_sPassword = trim((string) ($p_sPassword));
    }

    public function getLang() {
        return ($this->_sLang);
    }

    public function setLang($p_sLang) {
        $this->_sLang = trim((string) ($p_sLang));
    }

    public function getUserName() {
        return ($this->_sUserName);
    }

    public function setUserName($p_sUserName) {
        $this->_sUserName = trim((string) ($p_sUserName));
    }

    public function isPasswordLegal() {
        return ($this->_sUserName != $this->_sPassword);
    }
}
