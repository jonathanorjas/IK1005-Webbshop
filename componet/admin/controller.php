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

	public function addProduct($namn, $kategoriID, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal){
		$this->model->addProduct($namn, $kategoriID, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal);
	}

	public function deleteProduct($id){
		$this->model->deleteProduct($id);
	}

	public function updateProduct($id, $namn, $kategoriID, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal){
		$this->model->updateProduct($id, $namn, $kategoriID, $beskrivning, $pris, $tillverkare, $bildURL, $lagerAntal);
	}

	public function getProductbyID($id) {
		$productVar=$this->model->getProductbyID($id);
		
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