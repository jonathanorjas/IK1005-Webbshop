<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/
class Model {
	
    public function getProducts(): array {
		try {
		// skapar en connection mot databasen
		$pdocon = $this->ConnectPDO();
		// Skapar ett Statement som ska skickas mot databasen, i dettafall kallar den på en procedur som hämtar ut produkterna i en tabell
		$pdoStatement = $pdocon->prepare('CALL h14viwib_getProducts()');
		// Exekverar vårt Statement
		$pdoStatement->execute();
		// Fyller en array med alla produkter som vi vill hämta in
		$products = $pdoStatement->fetchAll();
		// Stänger vår databas anslutning
		$pdocon = NULL;
		
		/* Experiment, objektifiering av Product.php
		$productsObjectified;
		foreach($products as $prodElem) {
			
		}
		*/
		
		// Returnerar vår array med produkter
		return $products;
		}
		// catch som fångar eventuella errors
		catch (PDOException $pdoexp){
			// Terminera anslutningen
			$pdocon = NULL;
			// Skicka felmeddelande
			throw new Exception('Databasfel - kan ej hämta produkter '.$pdoexp->getMessage());
		}
	}
	
	// Alla get funktioner är lika den första, därmed avstår överflödiga kommentarer
	// Vi skickar in ett specifikt ID som vi vill ha tillbaka
	public function getProductsbyID($id_num) {
		try {
		$pdocon = $this->ConnectPDO();
		// Skickar statement med ID:t vi vill ha
		$pdoStatement = $pdocon->prepare("CALL h14viwib_getProductsbyID('{$id_num}')");
		
		$pdoStatement->execute();
		// fyller vår array, indexerad med kolumn namnen
		$productID = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
		$pdocon = NULL;
		return $productID;
		}
		catch (PDOException $pdoexp){
			$pdocon = NULL;
			throw new Exception('Databasfel - kan ej hämta produkter '.$pdoexp->getMessage());
		}
	}
	// samma visa fast med kategori som argument
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
	// produkter med denna tillverkare
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
	// Hämta ut kategorier som finns i databasen, inte produkterna alltså
	public function getCategories(){
		try {
		$pdocon = $this->ConnectPDO();
		// samlar in alla unika kategorier från Kategori kolumnen,eftersom dessa ligger i olika tabeller
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
	
	// privat metod för att skapa en ny anslutning
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
	
	
	/* Admin-funktioner */
	
	// skapa en ny produkt, ID genereras per automatik
	public function addProduct($namn, $kategoriID, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal){
		try{
		// skapa array och indexera instoppade värden av adminen
		$data  = array($namn, $kategoriID, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal);
		$pdocon = $this->ConnectPDO();
		$pdoStatement = $pdocon->prepare('CALL h14viwib_addProduct(?,?,?,?,?,?,?)');
		// exekverar vårt statement och stoppar in värdena i proceduren
		$pdoStatement->execute($data);
		$pdocon = NULL;
		}
		catch (PDOException $pdoexp){
			$pdocon = NULL;
			throw new Exception('Databasfel - kan ej lägga till produkter '.$pdoexp->getMessage());	
		}
	}
	// enkel ta bort funktion, hittar ID:t och rensar
	public function deleteProduct($id){
		try{
		$pdocon = $this->ConnectPDO();
		$pdoStatement = $pdocon->prepare('CALL h14viwib_deleteProduct('.$id.')');
		$pdoStatement->execute();
		$pdocon = NULL;
		}
		catch (PDOException $pdoexp){
			$pdocon = NULL;
			throw new Exception('Databasfel - kunde ej ta bort produkter '.$pdoexp->getMessage());	
		}

	}
	// Samma som skapa funktionen, men uppdaterar befintlig produkt istället
	public function updateProduct($id, $namn, $kategoriID, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal){
		try{
		$data  = array($id, $namn, $kategoriID, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal);
		$pdocon = $this->ConnectPDO();
		$pdoStatement = $pdocon->prepare('CALL h14viwib_updateProduct(?,?,?,?,?,?,?,?)');
		$pdoStatement->execute($data);
		$pdocon = NULL;
		}
		catch (PDOException $pdoexp){
			$pdocon = NULL;
			throw new Exception('Databasfel - kan ej uppdatera produkter '.$pdoexp->getMessage());	
		}
	}
	
}
/*
$mod = new Model();
$produkter = $mod->getProducts();
var_dump($produkter);
*/
?>