<?php
/* Error debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/
class View{
		
	private $productArray; // vår array innehållandes data
	function __construct(){
		$this->productArray=array();
	}
	
	public function assign($key,$value){
		if(!array_key_exists($key,$this->productArray)){
			$this->productArray[$key]=$value;
		}
		else{
			throw  new Exception('Nyckeln är upptagen!');
		}
			
	}

	public function display(string $template){
		extract($this->productArray);
		if(file_exists($template)){
			include($template);
		}
		else{
			throw new Exception('View existerar ej!');
		}
	}
}
?>