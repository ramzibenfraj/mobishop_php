<?php
class categorie_ctr extends Modele {

    public function __construct() {
        parent::__construct();
    }

    public function getAllBrands() {
        $query = 'SELECT * FROM categorie';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getBrandById($id) {
        $query = 'SELECT * FROM categorie WHERE id = ?';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updatecat($new = null)
    {
        if ($new != null && $new->getId() != null) {
            $sql = "UPDATE categorie SET brand=?, company=? WHERE id=?";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([
                $new->getBrand(),
                $new->getCompany(),
                $new->getId()
            ]);
            if ($result) {
                // Reload Page
                header('Location: ' . $_SERVER['REQUEST_URI']);
            } else {
                echo '<script>alert("Error")</script>';
            }
            return $result;
        }
    }  

    public function deletecat($id = null)
    {
        if ($id != null) {
            $sql = "DELETE FROM categorie WHERE id=?";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([$id]);
            if ($result) {
                // Reload Page
                header('Location:'. $_SERVER['REQUEST_URI']);
            } else {
                echo '<script>alert("Error")</script>';
            }
            return $result;
        }
    }
    public function insertcat($newcat)
    {
        $newbrand = $newcat->getBrand();
        $newcomp_brand = $newcat->getCompany();
    
        if ($newbrand != null && $newcomp_brand != null ) {
            $sql = "INSERT INTO categorie(brand, company) VALUES (?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([$newbrand,$newcomp_brand]);
            if ($result) {
                header('Location: ' . $_SERVER['REQUEST_URI']);
            } else {
                echo '<script>alert("Error")</script>';
            }
            return $result;
        } else {
            echo '<script>alert("Please fill all fields!")</script>';
        }
    }
}

