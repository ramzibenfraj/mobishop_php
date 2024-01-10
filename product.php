<?php
ob_start();
// include header.php file
include('func/header1.php');
?>

<?php

/*  include products */
include('views/products.php');
/*  include products */

/*  include top sale section */
include('views/top_sale.php');
/*  include top sale section */

?>

<?php
// include footer.php file
include('func/footer.php');
?>
