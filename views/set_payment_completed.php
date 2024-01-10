<?php
session_start();

if (isset($_GET['payment_completed']) && $_GET['payment_completed'] === 'true') {
  $_SESSION['payment_completed'] = true;
}

?>
