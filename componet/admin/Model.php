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
	public function addProduct($namn, $kategoriID, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal){
		$pdocon = $this->ConnectPDO();
		$pdoStatement = $pdocon = $this->prepare('CALL h14viwib_addProduct('$namn,$kategoriID, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal')');
		$pdoStatement->execute();
		$pdocon = NULL;
	}
	public function deleteProduct($id){
		$pdocon = $this->ConnectPDO();
		$pdoStatement = $pdocon = $this->prepare('CALL h14viwib_addProduct('$id')');
		$pdoStatement->execute();
		$pdocon = NULL;
	}
	public function updateProduct($id, $namn, $kategoriID, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal){
		$pdocon = $this->ConnectPDO();
		$pdoStatement = $pdocon = $this->prepare('CALL h14viwib_updateProduct('$id,$namn,$kategoriID, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal')');
		$pdoStatement->execute();
		$pdocon = NULL;
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