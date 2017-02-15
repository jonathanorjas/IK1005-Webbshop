<?php
/* Error debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/
class FrontController{
	
	public static function doRequest(){
		
		$queryStringArray=explode("/",$_SERVER['PATH_INFO']);
		
		switch($queryStringArray[1]){
			case "Controller":
				$controller=new $queryStringArray[1]();
				$controller->{$queryStringArray[2]}($queryStringArray[3]);
				break;
			default:
				$controller=new Controller();
				$controller->getProducts();
		}	
		
	}
}


?>