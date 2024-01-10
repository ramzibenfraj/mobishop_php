<?php

class user_admin {
    public $id, $username, $password, $privilege;

    public function __construct($id="", $username="", $password="", $privilege="") {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->privilege = $privilege;
        
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getPrivilege() {
        return $this->privilege;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setPrivilege($privilege) {
        $this->privilege = $privilege;
    }
}
