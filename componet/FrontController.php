<?php
/* Error debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/
class FrontController{
	
	public static function doRequest(){
		
		$queryStringArray=explode("/",$_SERVER['QUERY_STRING']);
		
		switch($queryStringArray[0]){
			case "Controller":
				$controller=new $queryStringArray[0]();
				$controller->{$queryStringArray[1]}($queryStringArray[2]);
				break;
			case "AdminController":
				$controller=new $queryStringArray[0]();
				$controller->{$queryStringArray[1]}($queryStringArray[2]);
				break;
			default:
				$controller=new Controller();
				$controller->getProducts();
		}	
		
	}
}

/* PATH_INFO

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

*/

?>