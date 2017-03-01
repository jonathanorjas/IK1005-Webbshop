<?php
	header('Content-Type: text/html; charset=utf8');
?>
<!DOCTYPE html>

<html>
 <head>
  <meta charset="UTF-8">
  <titel>Testning för produkter</title>
 </head>
  <body>
  <h1>Test Produkter Hej ja något syns</h1>
   <ul>
    <?php
	 foreach($products as $productElem) {
		  //echo '<li>',$productElem->getProductID(),'</li>';
		  echo '<li>',$productElem["Namn"],'</li>';
		  //echo '<li>',$productElem->getProductPris(),'</li>';
		  //echo '<li>',$productElem->getProductKategori(),'</li>';
		  
	 }
	?>
   </ul>
  </body>
 </head>
</html>