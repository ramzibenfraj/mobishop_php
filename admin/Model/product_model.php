<?php 

class Item {
    private $name;
    private $brand;
    private $price;
    private $image;

    public function __construct($name="", $brand="", $price="", $image="") {
        $this->name = $name;
        $this->brand = $brand;
        $this->price = $price;
        $this->image = $image;
    }
    public function getName(): string {
        return $this->name;
    }

    public function getBrand(): string {
        return $this->brand;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getImage(): string {
        $image = $this->image;
        if (is_array($image)) {
            return $image['name']; // or whatever property of the file you want to use
        }
        return $image;
    }
}

?>