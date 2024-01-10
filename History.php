<?php
ob_start();
// include header.php file
include('func/header1.php');
?>

<?php

/*  include cart items if it is not empty */
include('views/history_view.php');
/*  include top sale section */
include('views/special_price.php');
/*  include top sale section */

?>

<?php
// include footer.php file
include('func/footer.php');
?>
