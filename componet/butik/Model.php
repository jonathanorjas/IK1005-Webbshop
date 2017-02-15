<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/
class Model {
	
    public function getProducts() {
		try {
		$pdocon = $this->ConnectPDO();
		
		$pdoStatement = $pdocon->prepare('CALL h14viwib_getProducts()');
		
		$pdoStatement->execute();
		$products = $pdoStatement->fetchAll();
		$pdocon = NULL;
		/* Experiment, objektifiering för Product.php
		$productsObjectified;
		foreach($products as $prodElem) {
			
		}
		*/
		
		return $products;
		}
		catch (PDOException $pdoexp){
			$pdocon = NULL;
			throw new Exception('Databasfel - kan ej hämta produkter '.$pdoexp->getMessage());
		}
	}
	public function getCategories(){
		try {
		$pdocon = $this->ConnectPDO();
		
		$pdoStatement = $pdocon->prepare('CALL h14viwib_getCategories()');
		
		$pdoStatement->execute();
		$categories = $pdoStatement->fetchAll();
		$pdocon = NULL;
		
		return $categories;
		}
		catch (PDOException $pdoexp){
			$pdocon = NULL;
			throw new Exception('Databasfel - kan ej hämta produkter '.$pdoexp->getMessage());
		}
	}
	public function getProductbyID($id_num) {
		try {
		$pdocon = $this->ConnectPDO();
		
		$pdoStatement = $pdocon->prepare("CALL h14viwib_getProductsbyID('{$id_num}')");
		
		$pdoStatement->execute();
		$productID = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
		$pdocon = NULL;
		return $productID;
		}
		catch (PDOException $pdoexp){
			$pdocon = NULL;
			throw new Exception('Databasfel - kan ej hämta produkter '.$pdoexp->getMessage());
		}
	}
	
	public function getProductsbyCategory($category) {
		try {
		$pdocon = $this->ConnectPDO();
		
		$pdoStatement = $pdocon->prepare("CALL h14viwib_getProductsbyCategory('{$category}')");
		
		$pdoStatement->execute();
		$productsbyCategory = $pdoStatement->fetchAll();
		$pdocon = NULL;
		
		return $productsbyCategory;
		}
		catch (PDOException $pdoexp){
			$pdocon = NULL;
			throw new Exception('Databasfel - kan ej hämta produkter '.$pdoexp->getMessage());
		}
	}
	
	public function getProductsbyManufacturer($manufacture_string) {
		try {
		$pdocon = $this->ConnectPDO();
		
		$pdoStatement = $pdocon->prepare("CALL h14viwib_getProductsbyManufacturer'{$manufacture_string}')");
		
		$pdoStatement->execute();
		$productsbyManufacturer = $pdoStatement->fetchAll();
		$pdocon = NULL;
		
		return $productsbyManufacturer;
		}
		catch (PDOException $pdoexp){
			$pdocon = NULL;
			throw new Exception('Databasfel - kan ej hämta produkter '.$pdoexp->getMessage());
		}
	}
	
	
	private function ConnectPDO() {
		try {
        $dsn = 'mysql:host=utb-mysql.du.se;dbname=db30';
		$username = 'db30';
		$password = 'FJJAcyMU';
        
		$pdocon = new PDO($dsn, $username, $password);
		
		return $pdocon;
		}
		catch (PDOException $pdoexp){
			$pdocon = NULL;
			throw new Exception('Databasfel - kan ej ansluta '.$pdoexp->getMessage());
		}
	}
}
/*
$mod = new Model();
$produkter = $mod->getProducts();
var_dump($produkter);
*/
?>