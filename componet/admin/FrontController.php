<?php
/* Error debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/
include_once './controller.php';
class FrontController{
	
	public static function doRequest(){
		$queryStringArray=explode("/",$_SERVER['QUERY_STRING']);
		switch($queryStringArray[0]){
			case "Controller":
				$controller=new $queryStringArray[0]();
				$controller->{$queryStringArray[1]}($queryStringArray[2]);
				break;
			default:
				$controller=new Controller();
				$controller->getProducts();
		}	
		
	}
}


?>