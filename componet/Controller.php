<?php
//Error debugging
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/
include_once('./Model.php');
include_once('./ViewHelper.php');

session_start();

class Controller {
    
	private $model;
	private $view;
	private $cart;
	
	public function __construct() {
		$this->model = new Model();
		$this->view = new View();
		$this->cart = array();
		
		$productArray=$this->model->getProducts();
		$this->view->assign('products',$productArray);
	}
	
	public static function doRequest(){
		$array=explode('/', $_SERVER['QUERY_STRING']);
	}
	
	public function getProducts() {
		$this->view->display('./butik/TemplateProducts.php');
	}
	
	
	/* Kundvagn */
	public function addToCart(int $id) {
        if ($_SESSION['cart']) {
            $this->cart = $_SESSION['cart'];
            //om regnummer inte finns så sök efter och lägg till bilen
            if (!array_key_exists($id, $this->cart)) {
                $cartProductArray = $this->model->getProductsbyID($id);
                //på detta regnr skapar vi en array som innehåller bil info samt sätter antal till 1
                $this->cart[$id] = array($cartProductArray[0], 1);                
                //lägg tillbaka cart arrayen i sessionen;
                $_SESSION['cart'] = $this->cart;
            }

            //regnr finns i kundvagen öka då dess antal med 1
            else {
                //ökar antalet för bilenmed detta regnr med 1 på index 1 i arrayen   $this->cart[$regnr]
                $this->cart[$regnr][1] ++;
                //lägge tilbaka det ökade
                //$this->cart[$bilarArray[0]['regnr']][1]
                //lägg tillbaka cart arrayen i sessionen;
                $_SESSION['cart'] = $this->cart;
            }
            //ingen session finns 
        } else {
            //om igen session är satt, skapa en, fyll den med en cartarray
            $_SESSION['cart'] = $this->cart;
            $cartProductArray = $this->model->getProductsbyID($id);
            //på detta regnr skapar vi en array som innehåller bil info samt antal
            $this->cart[$id] = array($cartProductArray[0], 1);

            $_SESSION['cart'] = $this->cart;
        }
        $this->showCart();
    }

    public function showCart() {
        if ($_SESSION['cart']) {
            $bilarArray = $_SESSION['cart'];
                       
            $this->showView('CartView.php', array('unikaMarken' => $this->unikaMarken,
                'bilarArray' => $cartProductArray,
                'attBetala' => $this->toPay())
            ); //end show view
        } else {
            $this->showView('ErrorView.php', array('unikaMarken' => $this->unikaMarken,
                'felmeddelande' => 'Tomt i kundvagen'));
        }
    }
}


/*
$mod = new Model();
$produkter = $mod->getProducts();
var_dump($produkter);
*/

?>