<?php

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
        //if ($loggedin=='TRUE') {
            $_SESSION['loggedin'] = TRUE; 
			
            //GÃ¥ till admin sidan
            $this->getProductsAdminView();
        }        
        if($loggedin=='loggedout'){
			$_SESSION['loggedin']==FALSE;
			unset($_SESSION['loggedin']);
			
			// GÃ¥ till logout skripten
			header("Location: ./index.html");
				
		}
		if($loggedin=="FALSE"){
	        
	        $_SESSION['loggedin']==FALSE;
	        unset($_SESSION['loggedin']);
			
	        //Visar login sidan
	        header("Location: ./login/loginView.php");     
        }
    }
    
	// Logout
    public function logout() {
        unset($_SESSION['loggedin']);
        header("Location: ./index.html");
    }

	
	public function getProductsAdminView() {
		$productArray=$this->model->getProducts();
		$this->view->assign('products',$productArray);
		$this->view->display('./admin/AdminProductView.php');
	}

	public function addProduct(){
		$namn = $_POST['namn'];
		$kategori = (int)$_POST['kategori'];
		$bildURL = $_POST['bildURL'];
		$beskrivning = $_POST['beskrivning']; 
		$pris = (double)str_replace(',','.',$_POST['pris']); 
		$tillverkare = $_POST['tillverkare'];
		$lagerAntal = (int)$_POST['lagerantal'];
		$this->model->addProduct($namn, $kategori, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal);
		header("Location: ./index1.php?AdminController/getProductsAdminView");
	}

	public function addProductView(){
		$categories = $this->model->getCategories();
		$this->view->assign('categories',$categories);
		$this->view->display('./admin/AdminAddProductView.php');
	}

	public function deleteProduct($id){
		$this->model->deleteProduct($id);
		header("Location: ./index1.php?AdminController/getProductsAdminView");
	}
	public function updateProduct(){
		$id = (int)$_POST['id'];
		$namn = $_POST['namn'];
		$kategori = (int)$_POST['kategori'];
		$bildURL = $_POST['bildURL'];
		$beskrivning = $_POST['beskrivning']; 
		$pris = (double)str_replace(',','.',$_POST['pris']); 
		$tillverkare = $_POST['tillverkare'];
		$lagerAntal = (int)$_POST['lagerantal'];
		$this->model->updateProduct($id, $namn, $kategori, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal);
		header("Location: ./index1.php?AdminController/getProductsAdminView");
	}
	public function updateProductView($id){
		$products = $this->model->getProductsbyID($id);
		$this->view->assign('products',$products);
		$categories = $this->model->getCategories();
		$this->view->assign('categories',$categories);
		$this->view->display('./admin/AdminUpdateProductView.php');
	}
	public function getProductbyID($id) {
		$productVar=$this->model->getProductbyID($id);
		$this->view->assign('products',$productVar);
		$this->view->display('./admin/AdminProductView.php');
	}

	public function getProductsbyManufacturer($manufacturer){
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
