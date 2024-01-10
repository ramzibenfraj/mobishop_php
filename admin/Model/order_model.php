<?php
class OrderMod {

  private $id;
  private $product_id;
  private $date;
  private $user_id;
  private $etat;

  public function __construct($id="", $product_id="", $date="", $user_id="", $etat="") {
    $this->id = $id;
    $this->product_id = $product_id;
    $this->date = $date;
    $this->user_id = $user_id;
    $this->etat = $etat;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getProductId() {
    return $this->product_id;
  }

  public function setProductId($product_id) {
    $this->product_id = $product_id;
  }

  public function getDate() {
    return $this->date;
  }

  public function setDate($date) {
    $this->date = $date;
  }

  public function getUserId() {
    return $this->user_id;
  }

  public function setUserId($user_id) {
    $this->user_id = $user_id;
  }

  public function getEtat() {
    return $this->etat;
  }

  public function setEtat($etat) {
    $this->etat = $etat;
  }
}
