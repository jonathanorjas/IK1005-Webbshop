<?php
// Används ej
class Product {

    private $ID;
    private $Name;
    private $Category;
    private $Description;
    private $Price;
    private $Manufacturer;
    private $IMGURL;
    private $StockNumber;

    function __construct($ID, $Name, $Category, $Description, $Price, $Manufacturer, $IMGURL, $StockNumber) {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Category = $Category;
        $this->Description = $Description;

        $this->Price = $Price;
        $this->Manufacturer = $Manufacturer;
        $this->IMGURL = $IMGURL;
        $this->StockNumber = $StockNumber;
    }
    
    public function getProductID(){
        return $this->ID;
        
    }
    
    public function getProductName(){
        return $this->Name;
        
    }
    
    public function getProductCategory(){
        return $this->Category;
        
    }
    
    public function getProductDescription(){
        return $this->Description;
        
    }
    
    public function getProductPrice(){
        return $this->Price;
        
    }
    
    public function getProductManufacturer(){
        return $this->Manufacturer;
        
    }
    
    public function getProductIMGURL(){
        return $this->IMGURL;
        
    }
    
    public function getProductStockNumber(){
        return $this->StockNumber;
        
    }
    
    public function setID($ID){
        $this->ID=$ID;
        
    }
    
    public function setName($Name){
        $this->Name=$Name;
        
    }
    
    public function setCategory($Category){
        $this->Category=$Category;
        
    }
    
    public function setDesciption($Description){
        $this->Description=$Description;
        
    }
    
    public function setPrice($Price){
        $this->Price=$Price;
        
    }
    
    public function setManufacturer($Manufacturer){
        $this->Manufacturer=$Manufacturer;
        
    }
    
    public function setIMGURL($IMGURL){
        $this->IMGURL=$IMGURL;
        
    }
    
    public function setStockNumber($StockNumber){
        $this->StockNumber=$StockNumber;
        
    }
    

}
?>

