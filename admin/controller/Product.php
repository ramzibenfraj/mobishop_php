<?php
include_once('./model.php');
class product extends Modele
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
        $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultArray;
    }

    // fetch brand data using getBrands Method
    /*public function getBrands()
    {
        $sql = "SELECT * FROM categorie";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultArray;
    }*/
    public function handleImage($image)
{
    $target_dir1 = "./assets/products/";
    $target_dir2 = "C:/xampp/htdocs/ramzi/mobile shop/assets/products/";

    // generate unique filenames for both targets
    $filename = "my_image_" . time() . ".jpg";// use a specific name for the uploaded file
    $filename1 = $filename2 = $filename; // use the same filename for both targets

    $target_file1 = $target_dir1 . $filename1;
    $target_file2 = $target_dir2 . $filename2;

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($image['tmp_name']);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo '<script>alert("File is not an image.")</script>';
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file1) || file_exists($target_file2)) {
        echo '<script>alert("Sorry, file already exists.")</script>';
        $uploadOk = 0;
    }

    // Check file size > 1MB
    if ($image['size'] > 1000000) {
        echo '<script>alert("Sorry, your file is too large.")</script>';
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo '<script>alert("Sorry, your file was not uploaded.")</script>';
        return '';
    } else {
        if (move_uploaded_file($image['tmp_name'], $target_file1) && copy($target_file1, $target_file2)) {
            return $filename1;
        } else {
            echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
            return '';
        }
    }
}

    public function deleteProduct($id = null, $table = 'product')
    {
        if ($id != null) {
            $sql = "DELETE FROM {$table} WHERE id=?";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([$id]);
            if ($result !== false) {
                // Reload Page
                header('Location: ' . $_SERVER['REQUEST_URI']);
            } else {
                echo '<script>alert("Error")</script>';
            }
            return $result !== false;
        }
    }
    
    // update product item using product id
    public function updateProduct($id = null, $name = null, $brand = null, $price = null, $image = null)
    {
        if ($id != null) {
            if (intval($brand) != 0) {
                $sql = "UPDATE product SET brand=? WHERE id=?";
                $stmt = $this->pdo->prepare($sql);
                $result = $stmt->execute([$brand, $id]);
                if ($result === false) {
                    echo '<script>alert("Update brand error!")</script>';
                    return false;
                }
            }
            if ($image['name'] != null) {
                $imgName = $this->handleImage($image);
                $target123='./assets/products/'.$imgName;
                if ($imgName != '') {
                    $sql = "UPDATE product SET image=? WHERE id=?";
                    $stmt = $this->pdo->prepare($sql);
                    $result = $stmt->execute([$target123, $id]);
                    if ($result === false) {
                        echo '<script>alert("Update image error!")</script>';
                        return false;
                    }
                }
            }
            $sql = "UPDATE product SET name=?, price=? WHERE id=?";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([$name, $price, $id]);
            if ($result !== false) {
                // Reload Page
                header('Location: ' . $_SERVER['REQUEST_URI']);
            } else {
                echo '<script>alert("Update error!")</script>';
            }
            return $result;
        }
    }
    
    public function insertProduct($name = null, $brand = null, $price = null, $image = null)
    {
        
        if ($name != null && $brand != null && $price != null && $image != null) {
            $imgName = $this->handleImage($image);
            $target12='./assets/products/'.$imgName;
            if ($imgName != '') {
                $sql = "INSERT INTO product (name, brand, price, image) VALUES (?, ?, ?, ?)";
                $stmt = $this->pdo->prepare($sql);
                $result = $stmt->execute([$name, $brand, $price, $target12]);
                if ($result) {
                    // Reload Page
                    header('Location: ' . $_SERVER['REQUEST_URI']);
                } else {
                    echo '<script>alert("Insert error!")</script>';
                }
                return $result;
            }
        } else {
            echo '<script>alert("Please fill all fields!")</script>';
        }
    } 
    // fetch product data using getData Method
    public function getDataproduct($table = 'product')
    {
        $sql = "SELECT * FROM {$table}";
        $result = $this->pdo->query($sql);

        $resultArray = array();

        // fetch product data one by one
        if ($result->rowCount() > 0) {
            while ($item = $result->fetch(PDO::FETCH_ASSOC)) {
                $resultArray[] = $item;
            }
        }

        return $resultArray;
    }

    // get product using item id
    public function getProduct($id = null, $table = 'product')
    {
        if ($id != null) {
            $sql = "SELECT * FROM {$table} WHERE id={$id}";
            $result = $this->pdo->query($sql);

            $resultArray = array();

            // fetch product data once
            if ($result->rowCount() == 1) {
                $resultArray = $result->fetch(PDO::FETCH_ASSOC);
            }

            return $resultArray;
        }
    }
    public function nombreproduct(){
        $query ="select COUNT(*) from product";
        $stmt = $this->pdo->query($query);
        $result = $stmt->fetchColumn();
        return $result;
    } 

}