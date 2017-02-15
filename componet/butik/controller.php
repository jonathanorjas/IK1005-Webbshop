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
		$categories=$this->model->getCategories();
		$this->view->assign('categories',$categories);
		$this->view->display('./productsView.php');
	}

	public function getProductbyID($id) {
		$productVar=$this->model->getProductbyID($id);
		
		$this->view->assign('product',$productVar);
		$this->view->display('./productView.php');
	}

	public function getProductsbyCategory($category) {
		$productArray=$this->model->getProductsbyCategory($category);
		$this->view->assign('products',$productArray);
		$categories=$this->model->getCategories();
		$this->view->assign('categories',$categories);
		$this->view->display('./productsView.php');
	}
	public function getDefaultView(){
		$productArray=$this->model->getProducts();
		$this->view->assign('products',$productArray);
		$categories=$this->model->getCategories();
		$this->view->assign('categories',$categories);
		$this->view->display('./productsView.php');
	}


}


/*
$mod = new Model();
$produkter = $mod->getProducts();
var_dump($produkter);
*/

?>