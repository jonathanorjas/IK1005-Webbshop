<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/

function autoLoad($className) {
	include "./".$className.'.php';
}

spl_autoload_register('autoLoad');
FrontController::doRequest();
?>