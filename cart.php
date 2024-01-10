<?php
ob_start();
// include header.php file
include('func/header1.php');
?>

<?php

/*  include cart items if it is not empty */
count($cart->getCart($_COOKIE['user_id'] ?? 0)) ? include('views/_cart-template.php') : include('views/notfound_cart.php');
/*  include cart items if it is not empty */

/*  include top sale section */
include('views/top_sale.php');
/*  include top sale section */

?>

<?php
// include footer.php file
include('func/footer.php');
?>
