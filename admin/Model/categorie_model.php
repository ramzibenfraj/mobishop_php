<?php
class category_model {
    private $id;
    private $brand;
    private $company;

    public function __construct($id="", $brand="", $company="") {
        $this->id = $id;
        $this->brand = $brand;
        $this->company = $company;
    }

    // Methods to get and set the properties

    public function getId() {
        return $this->id;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setBrand($brand) {
        $this->brand = $brand;
    }

    public function getCompany() {
        return $this->company;
    }

    public function setCompany($company) {
        $this->company = $company;
    }
}