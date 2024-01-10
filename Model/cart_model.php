<?php

class CartModel {
    private $userid;
    private $itemid;

    public function __construct($userid="", $itemid="") {
        $this->userid = $userid;
        $this->itemid = $itemid;
    }

    public function setUserid($userid) {
        $this->userid = $userid;
    }

    public function getUserid() {
        return $this->userid;
    }

    public function setItemid($itemid) {
        $this->itemid = $itemid;
    }

    public function getItemid() {
        return $this->itemid;
    }
}
?>