<?php
// Use to fetch product data
class Product extends Modele
{
    public function __construct() {
        parent::__construct();
    }
    // fetch product data using getData Method
    public function getData($table = 'product')
    {
        $sql = "SELECT * FROM {$table}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultArray = array();

        // fetch product data one by one
        if ($stmt->rowCount() > 0) {
            while ($item = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $resultArray[] = $item;
            }
        }

        return $resultArray;
    }
    public function getProductall($id = null, $table = 'product')
    {
        if ($id != null) {
            $sql = "SELECT * FROM {$table} WHERE id=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            $resultArray = array();

            // fetch product data once
            if ($stmt->rowCount() == 1) {
                $resultArray = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            return $resultArray;
        }
    }

    // get product name using item id
    public function getProduct($id = null, $table = 'product')
    {
        if ($id != null) {
            $sql = "SELECT name FROM {$table} WHERE id=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            $resultArray = array();

            // fetch product data once
            if ($stmt->rowCount() == 1) {
                $resultArray = $stmt->fetch(PDO::FETCH_ASSOC);
            }
            return $resultArray;
        }
    }  
}
