<?php

namespace Jakub\MylangsBundle\Entity;

class Login {

    protected $_sLogin;
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

    public function getLogin() {
        return ($this->_sLogin);
    }

    public function setLogin($p_sLogin) {
        $this->_sLogin = trim((string) ($p_sLogin));
    }

    public function isPasswordLegal()
    {
        return ($this->_sLogin != $this->_sPassword);
    }
}
