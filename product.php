<?php
require_once('include/bootstrap.php');

$products = products_get($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Alex Travel Agency</title>
	<link rel="stylesheet" href="style.css">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
	<div class="conteiner">
	<div id="header"></div>
	<div id="nav">
		<nav>
            <a href="index.php">Home</a>
            <a href="aboutus.php">About Us</a>
            <a href="catalog.php">Catalog</a>
            <a href="blog.php">Blog</a>
            <a href="contact.php">Contacts</a>
		</nav>
	</div>	
	<div id="line"></div>
		<section class="section">
			<div id="product">
					<img id="main" src="storage/product/<?php echo $products['img'] ?>">
				<div id="product_h1">
					<h1><?= $products['title']?></h1>
				</div>
				<p id="product_price">$<?php echo $products['price']?></p>
				<button type="submit" name="buy" id="buy">Buy Now</button>
				<div id="product_title">
					<p><?php echo $products['content'] ?></p>
				</div>
				<img src="pics/vodopadi.jpg" id="galery">
				<img src="pics/vodopad1.jpg" id="galery">
				<img src="pics/vodopad2.jpg" id="galery">
			</div>
		</section>
		
	<footer>
		&copy; Alex Holiday Agency 2014 &reg;
	</footer>
	</div>
</body>

</html>