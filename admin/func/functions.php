<?php
// start a session
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = false;
}
if ($_SESSION['logged'] == false) {
    setcookie('user_id', '0', time() + (86400 * 30), "/");
    setcookie('user_type', '0', time() + (86400 * 30), "/");
}
require('model.php');
// require Product Class
require('controller/Product.php');
require('controller/categorie_controller.php');

// require Account Class
require('controller/accout_controller.php');
require('controller/order_ctr.php');


// require Account Class
require('Model/account_model.php');
require('Model/product_model.php');
require('Model/categorie_model.php');
require('Model/order_model.php');



// Product object


// Account object
$acc = new Account();
$accData = $acc->getData();
$nbracc = $acc->nombreclients();
//$acc = new account_model($username, $password, $privilege);
//$accData = new Accountcontroller();

// Manage object
$product = new product();
$manageData = $product->getData();
//$brandData = $product->getBrands();
$productData = $product->getDataproduct();
$nbrprod=$product->nombreproduct();

$categorieCtr = new categorie_ctr();
//$categoryModel = new category_model();
$brandData = $categorieCtr->getAllBrands();
$orders =  new OrderModel();
$get_order= $orders->getAllorders();

?>

<?php


// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['logout-submit'])) {
        $acc->logout();
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['manage-delete'])) {
        if (isset($_GET['id'])) {
            // call method deleteProduct
            $product->deleteProduct($_GET['id']);
        } else {
            echo "<script>alert('invalid id');</script>";
        }
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['manage-update'])) {
        if (isset($_GET['id'])) {
            // call method updateProduct
            $product->updateProduct(
                $_GET['id'],
                $_POST['name-' . $_GET['id']],
                $_POST['brand-' . $_GET['id']],
                $_POST['price-' . $_GET['id']],
                $_FILES['image-' . $_GET['id']],
            );
        } else {
            echo "<script>alert('invalid id');</script>";
        }
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['manage-insert'])) {
        $item = new Item(
            $_POST['name-' . $_GET['id']],
            $_POST['brand-' . $_GET['id']],
            $_POST['price-' . $_GET['id']],
            $_FILES['image-' . $_GET['id']]
        );
        $product->insertProduct($item);
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['manage-insert'])) {
        $product->insertProduct(
            $_POST['name-' . $_GET['id']],
            $_POST['brand-' . $_GET['id']],
            $_POST['price-' . $_GET['id']],
            $_FILES['image-' . $_GET['id']],
        );
    }
}
 //request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['account-delete'])) {
        if (isset($_GET['id'])) {
            $acc->deleteAcc($_GET['id']);
        } else {
            echo "<script>alert('invalid id');</script>";
        }
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['account-update'])) {
        if (isset($_GET['id'])) {
            $newUser = new user_admin(
                $_GET['id'],
                $_POST['username-' . $_GET['id']],
                $_POST['password-' . $_GET['id']],
                $_POST['privilege-' . $_GET['id']]
            );
            $acc->updateAcc($newUser);
        } 
    }
}

// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['account-insert'])) {
        $newUser = new user_admin(
            $_GET['id'],
            $_POST['username-' . $_GET['id']],
            $_POST['password-' . $_GET['id']],
            $_POST['privilege-' . $_GET['id']],
        );
        $insertResult = $acc->insertAcc($newUser);
    }
    
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['cat-delete'])) {
        if (isset($_GET['id'])) {
            $categorieCtr->deletecat($_GET['id']);
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['cat-update'])) {
        if (isset($_GET['id'])) {
            $categoryModel = new category_model(
                $_GET['id'],
                $_POST['brand-' . $_GET['id']],
                $_POST['company-' . $_GET['id']],
            );
            $categorieCtr->updatecat($categoryModel);
        } 
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['cat-insert'])) {
        $categoryModel = new category_model(
            $_GET['id'],
            $_POST['brand-' . $_GET['id']],
            $_POST['company-' . $_GET['id']],
        );
        $insertResult = $categorieCtr->insertcat($categoryModel);
    }

}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['ord-update'])) {
        if (isset($_GET['id'])) {
            $orderModel = new OrderMod(
                $_GET['id'],
                $_POST['name-' . $_GET['id']],
                $_POST['date-' . $_GET['id']],
                $_POST['uname-' . $_GET['id']],
                $_POST['etat-' . $_GET['id']],
            );
            $orders->updateOrder($orderModel);
        }
    }
}

?>