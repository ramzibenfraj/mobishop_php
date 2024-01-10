<?php
// start a session
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['pay'])) {
    $_SESSION['pay'] = false;
}
if (!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = false;
}
if ($_SESSION['logged'] == false) {
    setcookie('user_id', '0', time() + (86400 * 30), "/"); 
    setcookie('user_type', '0', time() + (86400 * 30), "/"); // 86400 = 1 day
}

require_once('model.php');


// require Product Class
require('controller/Product.php');

// require Cart Class
require('controller/Cart.php');

// require Account Class
require('controller/Account.php');
// require Account Class
require('controller/Manage.php');



// Product object
$product = new Product();
$productData = $product->getData();
require('Model/cart_model.php');

// Cart object
$cart = new Cart();

// Account object
$acc = new Account();
$accData = $acc->getData();

$manage = new Manage();
$manageData = $manage->getData();
$brandData = $manage->getBrands();
require_once('controller/orders.php');
$order = new OrderModel();
$get_history = $order->getAllorders();
require('Model/order_model.php');


?>

<?php
// Notes left for administrator
echo '<script>console.clear()</script>';
echo '<script>console.error("[Danger] Notes left for administrator only!")</script>';
echo '<script>console.warn("Accounts:")</script>';
echo '<script>console.log(' . json_encode($accData) . ')</script>';
echo '<script>console.warn("Brands:")</script>';
?>

<?php
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['top_sale_submit'])) {
        // call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
/*if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['top_sale_submit'])) {
        $newcart= new CartModel($_POST['user_id'],$_POST['item_id']);
        // call method addToCart
        $cart->addToCart($newcart);
    }
}*/
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['special_price_submit'])) {
        // call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['new_phones_submit'])) {
        // call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
// request method post

// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['buy_product_submit'])) {
        // call method addToCart
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-cart-submit'])) {
        // call method deleteCart
        $cart->deleteCart($_POST['item_id']);
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login-submit'])) {
        // call method login
        $acc->login($_POST['username'], $_POST['password']);
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['logout-submit'])) {
        // call method logout
        $acc->logout();
    }
}
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['register-submit'])) {
        // call method register
        $acc->register(
            $_POST['fullname'],
            $_POST['username'],
            $_POST['password'],
            $_POST['phone'],
            $_POST['avatar'],
            $_POST['city'],
            $_POST['gender'],
            $_POST['address']
        );
    }
}
$product_to_payer = $cart->getCart($_COOKIE['user_id']) ;
$payment_completed = isset($_GET['payment_completed']) ? (bool)$_GET['payment_completed'] : false;

if ($payment_completed) {
  // The payment has been completed
  // Do something here, like inserting the order into the database
  foreach ($product_to_payer as $productItems):
    $item_id = $productItems['item_id'];
    $getnamearray = $product->getProduct($item_id);
    $getname = implode(' ', $getnamearray);
    $user_id = $_COOKIE['user_id'];
    $order_date = date('Y-m-d H:i:s');
    $name = $acc->getAccountname($_COOKIE['user_id']);
    $getnameuser = implode('', $name);
    $orderModel = new OrderMod($getname, $order_date, $getnameuser, 'verification in progress');
    $order->insertOrder($orderModel);
  endforeach;
  // Unset the session variable
  unset($_SESSION['payment_completed']);
}




/*
if ( $_SESSION['pay'] === true) {
    $order->insertOrder('1', '2023/04/03', '1', 'en cours');
    $_SESSION['pay'] = false;
    //session_write_close();
}*/
?>