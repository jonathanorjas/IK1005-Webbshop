<?php
/*
Controllern innehåller större delen av kod och kontrollerar vad som händer på sidan genom funktion åtkallningar
*/

/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
*/

// Inkludera 
include_once('./Model.php');
include_once('./ViewHelper.php');

// Tillgång till session
session_start();

class Controller {
    
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

	
	/* Get-funktioner */
	
	// Hämta alla produkter i databasen
	public function getProducts() {
		// Laddar vår array med produkterna från databasen
		$productArray=$this->model->getProducts();
		// länkar en nyckel till vår array, vi får nu tillgång till data i arrayen från webbsidan
		$this->view->assign('products',$productArray);
		// Samma visa med kategorier
		$categories=$this->model->getCategories();
		$this->view->assign('categories',$categories);
		// Skapar en vy för vår produktsida att visa våra produkter i
		$this->view->display('./butik/productsView.php');
	}
	
	// Hämta specifik produkt med detta ID
	public function getProductsbyID($id) {
		$productVar=$this->model->getProductsbyID($id);
		
		$this->view->assign('product',$productVar);
		$this->view->display('./butik/productView.php');
	}
	
	// Hämta produkter från denna kategori
	public function getProductsbyCategory($category) {
		$productArray=$this->model->getProductsbyCategory($category);
		$this->view->assign('products',$productArray);
		$categories=$this->model->getCategories();
		$this->view->assign('categories',$categories);
		$this->view->display('./butik/productsView.php');
	}
	
	// Error meddelande
	public function getError(){
		echo 'Ett fel har uppstått';
	}
	
	
	/* Kundvagn */
	
	// Lägg till i vår kundvagn med detta ID
	public function addToCart(int $id) {
		// om vi har en öppen session
        if ($_SESSION['cart']) {
            $this->cart = $_SESSION['cart'];
            //om ingen ID existerar, skapa ny och lägg till
            if (!array_key_exists($id, $this->cart)) {
                $cartProductArray = $this->model->getProductsbyID($id);
				// vi skapar en array på samma position som ID:et skapar vi en produkt och sätter antalet till 1
                $this->cart[$id] = array($cartProductArray[0], 1);                
                // kopiera in privata arrayen till vår session array
                $_SESSION['cart'] = $this->cart;
            }

            // om ID:et redan existerar ökar vi helt enkelt antalet
            else {
				// ökar antalet med 1 i vår produkts array
                $this->cart[$id][1] ++;
               // förnya vår session
                $_SESSION['cart'] = $this->cart;
            }
        // om ingen session existerar alls
        } else {
            // skapa ny session och array
            $_SESSION['cart'] = $this->cart;
            $cartProductArray = $this->model->getProductsbyID($id);
			// vi skapar en array på samma position som ID:et skapar vi en produkt och sätter antalet till 1
            $this->cart[$id] = array($cartProductArray[0], 1);
            // förnya vår session
            $_SESSION['cart'] = $this->cart;
        }
        header("Location: ?Controller/showCart");
    }
	
	// Ta bort en produkt från kundvagn med detta ID
	public function deleteFromCart(int $id) {
        if ($_SESSION['cart']) {
            $this->cart = $_SESSION['cart'];
            // minska antalet med ett
            if (array_key_exists($id, $this->cart)) {
                $this->cart[$id][1] --;            
            }
            // ta bort hela produkten om vi understiger 1
            if ($this->cart[$id][1] <= 0) {
                unset($this->cart[$id]);
            }
            $_SESSION['cart'] = $this->cart;
			
            header("Location: ?Controller/showCart");
        }
    }
	
	// Ta bort ALLA produkter från kundvagn med detta ID
	public function deleteAllFromCart(int $id) {
        if ($_SESSION['cart']) {
            $this->cart = $_SESSION['cart'];
			
            if (array_key_exists($id, $this->cart)) {
                unset($this->cart[$id]);        
            }

            $_SESSION['cart'] = $this->cart;
			
            header("Location: ?Controller/showCart");
        }
    }
	
	// Visa kundvagnens innehåll
    public function showCart() {
        if ($_SESSION['cart']) {
            $cartProductArray = $_SESSION['cart'];
            
			$this->view->assign('cartProductArray',$cartProductArray);
			$this->view->display('./kundvagn/cartView.php');
			
        } else {
			$this->view->assign('cartProductArray',$cartProductArray);
            $this->view->display('./kundvagn/cartView.php');
        }
    }
	
	// Visa antalet varor i kundvagnen. Varuräknaren som syns på alla sidor
	public static function showCartItems() {
		// kollar om vi har en session och en existerande cart array
        if (isset($_SESSION['cart'])) {
			// Ladda över arrayens innehåll
            $cartItems = $_SESSION['cart'];
            
			// initiera variabel
			$cartTotal = 0;
			// loopa igenom varje vara och öka med antalet
            foreach($cartItems as $cartItem) {
				$cartTotal += $cartItem[1];
			}
			
			// returnera antalet varor
			return $cartTotal;
        }
		else
			// returnera noll eftersom användaren inte ens har startat en cart session d.v.s. inte börjat lägga in produkter
			return 0;
    }
	
	
	/* Login för Admin */
	
	// Kollar om aktiv admin session är igång, om inte så laddas loginsidan
	public function showAdminView() {
        if (isset($_SESSION['loggedin'])) {        	
			//om inloggad visa adminvyn 
			$productArray=$this->model->getProducts();
			$this->view->assign('products',$productArray);
			$this->view->display('./admin/AdminProductView.php');
        } else {
            //annars skickas vi till login
            header("Location: ../login/loginView.php");
        }
    }
	
}

?>
