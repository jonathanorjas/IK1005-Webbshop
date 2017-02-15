<?php



error_reporting(E_ERROR);
ini_set('display_errors', 1);

include('./FrontController.php');
FrontController::doRequest();
?>