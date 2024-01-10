<?php
// php manage class
class Manage extends Modele
{
    public function __construct() {
        parent::__construct();
    }
    // fetch product data using getData Method
    public function getData()
    {
        $sql = "SELECT product.*, categorie.brand, categorie.company AS origin FROM product INNER JOIN categorie ON product.brand = categorie.id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $resultArray = array();

        // fetch manage data one by one
        if ($stmt->rowCount() > 0) {
            while ($item = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $resultArray[] = $item;
            }
        }

        return $resultArray;
    }

    // fetch brand data using getBrands Method
    public function getBrands()
    {
        $sql = "SELECT * FROM categorie";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $resultArray = array();

        // fetch manage data one by one
        if ($stmt->rowCount() > 0) {
            while ($item = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $resultArray[] = $item;
            }
        }

        return $resultArray;
    }

    // get brand using brand id
    public function getBrand($id = null, $table = 'categorie')
    {
        if ($id != null) {
            $sql = "SELECT * FROM {$table} WHERE id=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);

            $resultArray = array();

            // fetch account data once
            if ($stmt->rowCount() == 1) {
                $resultArray = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            return $resultArray;
        }
    }
}
