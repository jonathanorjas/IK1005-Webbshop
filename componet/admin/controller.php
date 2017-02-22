<?php
/*Error debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/
include_once ('./Model.php');
include_once ('./ViewHelper.php');

class Controller {
    
	private $model;
	private $view;

	public function __construct() {
		$this->model = new Model();
		$this->view = new View();
	}	
	
	public function getProducts() {
		$productArray=$this->model->getProducts();
		$this->view->assign('products',$productArray);
		$this->view->display('./AdminProductView.php');
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
		header("Location: ./index1.php?Controller/getProducts");
	}

	public function addProductView(){
		$categories = $this->model->getCategories();
		$this->view->assign('categories',$categories);
		$this->view->display('./AdminAddProductView.php');
	}

	public function deleteProduct($id){
		$this->model->deleteProduct($id);
		header("Location: ./index1.php?Controller/getProducts");
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
		header("Location: ./index1.php?Controller/getProducts");
	}
	public function updateProductView($id){
		$products = $this->model->getProductbyID($id);
		$this->view->assign('products',$products);
		$categories = $this->model->getCategories();
		$this->view->assign('categories',$categories);
		$this->view->display('./AdminUpdateProductView.php');
	}

	public function getProductbyID($id) {
		$productVar=$this->model->getProductbyID($id);
		$this->view->assign('products',$productVar);
		$this->view->display('./AdminProductView.php');
	}

	public function getProductsbyManufacturer($manufacturer){
		$$productVar=$this->model->getProductsbyManufacturer($manufacturer);
		$this->view->assign('products',$productVar);
		$this->view->display('./AdminProductView.php');
	}

	public function getProductsbyCategory($category) {
		$productArray=$this->model->getProductsbyCategory($category);
		$this->view->assign('products',$productArray);
		$this->view->display('./AdminProductView.php');
	}
	public function getDefaultView(){
		$productArray=$this->model->getProducts();
		$this->view->assign('products',$productArray);
		$this->view->display('./AdminProductView.php');
	}


}


/*
$mod = new Model();
$produkter = $mod->getProducts();
var_dump($produkter);
*/

?>