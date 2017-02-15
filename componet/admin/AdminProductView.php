<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<style>
		body{
			background: #FFFFFF;
		}
	</style>
</head>
<body>
	<ul>
			<?php
			foreach ($products as $product) {
				error_reporting(E_ALL);
				ini_set('display_errors', 1);
			echo '
			<li>
				<article class="kategori_produkter">
						<div class="produkt_img_box">
							<img src="'.$product['BildURL'].'" alt="'.$product['Namn'].'" width="50%" height="auto">
						</div>
						<div class="produkt_info">
							<h2 class="produkt_name">'.$product['Namn'].'</h2>
							<ul>
								<li><span class="short_info">Grafikkort med GDDR5-minne</span></li>	
							</ul>		
						</div>
						<div class="produkt_pris">
							<span class="price_small">'.$product['Pris'].':-</span>
						</div>
				</article>
			</li>
			';
			}
			?>
			</ul>
</body>
</html>