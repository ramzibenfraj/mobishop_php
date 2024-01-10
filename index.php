<?php
ob_start();
// include header.php file
include('func/header1.php');
?>

<?php

/*  include banner area  */
include('views/banner-area.php');
/*  include banner area  */

/*  include top sale section */
include('views/special_price.php');
/*  include top sale section */

/*  include special price section  */
include('views/top_sale.php');
/*  include special price section  */

/*  include banner ads  */
include('views/banner-ads.php');
/*  include banner ads  */

/*  include new phones section  */
include('views/new_phones.php');
/*  include new phones section  */

/*  include blog area  */
include('views/blogs.php');
/*  include blog area  */

?>

<?php
// include footer.php file
include('func/footer.php');
?>
