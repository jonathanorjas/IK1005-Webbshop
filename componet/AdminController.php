<?php
/*
AdminController är till största del identisk till Controller, men innehåller funktioner med modifikationsmöjligheter och är därför separerade
*/

// Inkludera 
include_once('./Model.php');
include_once('./ViewHelper.php');

// Tillgång till session
session_start();

class AdminController {
    
	// Skapa privata identifierare
	private $model;
	private $view;
	private $cart;
	private $productArray;
	private $productVar;
	
	public function __construct() {
		// Initiera dessa privata identifierare
		$this->model = new Model();
		$this->view = new View();
		$this->cart = array();
		$this->productArray = array();
		$this->productVar = array();
		
	}

	
	/* Admin kontroller */
	
	// Login funktion
	public function login($loggedin) {
        
		if($_POST['username']=='admin' && $_POST['password']=='1234') {
            $_SESSION['loggedin'] = TRUE; 
			
            //Gå till admin sidan
            $this->getProductsAdminView();
        }
		else{
			// Ge meddelande om felaktiga uppgifter och ladda om sidan
			$errorLogin = "Ogiltigt Användarnamn/Lösenord!";
			$this->view->assign('loginMessage',$errorLogin);
			$this->view->display('./login/loginView.php');
		}
    }
    
	// Logout
    public function logout() {
        unset($_SESSION['loggedin']);
        //$this->view->display('./admin/AdminProductView.php');
		header("Location: ../");
    }
	
	
	// Hämtar in all data för produkter
	public function getProductsAdminView() {
		$productArray=$this->model->getProducts();
		$this->view->assign('products',$productArray);
		$this->view->display('./admin/AdminProductView.php');
	}

	// Visa sidan för att skapa och lägga till produkter
	public function addProductView(){
		$categories = $this->model->getCategories();
		$this->view->assign('categories',$categories);
		$this->view->display('./admin/AdminAddProductView.php');
	}
	
	// funktionen lägger till produkten och skickar användaren till admin huvudmenyn
	public function addProduct(){
		if($_SESSION['loggedin'] != true){
		header("Location: ../");
		}else{
			// Hämta in all användarskriven data
			$namn = $_POST['namn'];
			$kategori = (int)$_POST['kategori'];
			$bildURL = $_POST['bildURL'];
			$beskrivning = $_POST['beskrivning']; 
			$pris = (double)str_replace(',','.',$_POST['pris']); 
			$tillverkare = $_POST['tillverkare'];
			$lagerAntal = (int)$_POST['lagerantal'];
			// Lägger till skapade produkten
			$this->model->addProduct($namn, $kategori, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal);
			// skicka användaren bakåt
			header("Location: ./?AdminController/getProductsAdminView");
		}
	}

	// Tar bort produkten och laddar om sidan
	public function deleteProduct($id){
		if($_SESSION['loggedin'] != true){
		header("Location: ../");
		}else{
		$this->model->deleteProduct($id);
		header("Location: ./?AdminController/getProductsAdminView");
		}
	}

	// Öppnar sidan för att uppdatera en produkt
	public function updateProductView($id){
		$products = $this->model->getProductsbyID($id);
		$this->view->assign('products',$products);
		$categories = $this->model->getCategories();
		$this->view->assign('categories',$categories);
		$this->view->display('./admin/AdminUpdateProductView.php');
	}
	
	// funktionen som uppdaterar vald produkt, kollar efter ID:n.
	public function updateProduct(){
		if($_SESSION['loggedin'] != true){
		header("Location: ../");
		}else{
			$id = (int)$_POST['id'];
			$namn = $_POST['namn'];
			$kategori = (int)$_POST['kategori'];
			$bildURL = $_POST['bildURL'];
			$beskrivning = $_POST['beskrivning']; 
			$pris = (double)str_replace(',','.',$_POST['pris']); 
			$tillverkare = $_POST['tillverkare'];
			$lagerAntal = (int)$_POST['lagerantal'];
			$this->model->updateProduct($id, $namn, $kategori, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal);
			header("Location: ./?AdminController/getProductsAdminView");
		}
	}
	
	// Get funktioner för att hämta data
	public function getProductbyID($id) {
		$productVar=$this->model->getProductbyID($id);
		$this->view->assign('products',$productVar);
		$this->view->display('./admin/AdminProductView.php');
	}

	public function getProductsbyManufacturer($manufacturer){
		if($_SESSION['loggedin'] != true){
		header("Location: ../");
		}
		$productVar=$this->model->getProductsbyManufacturer($manufacturer);
		$this->view->assign('products',$productVar);
		$this->view->display('./admin/AdminProductView.php');
	}

	public function getProductsbyCategory($category) {
		$productArray=$this->model->getProductsbyCategory($category);
		$this->view->assign('products',$productArray);
		$this->view->display('./admin/AdminProductView.php');
	}
	public function getDefaultView(){
		$productArray=$this->model->getProducts();
		$this->view->assign('products',$productArray);
		$this->view->display('./admin/AdminProductView.php');
	}
	
}

?>
