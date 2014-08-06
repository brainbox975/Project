<?php
    require_once('include/bootstrap.php');
    $sql = 'SELECT id, title, content, price, img
            FROM products';
    $result = db_select($sql);
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
			<div id="catalog">
				<h1>Catalog</h1>
			</div>
			<form action="" method="post" id="form_contact">
				<input type="text" name="search" id="search" value="Search">
				<button type="submit" id="submit">Search</button>
				<select id="order_by">
					<option value="orderby" selected="selected">Order by</option>
					<option value="price">Price</option>
					<option value="date">Date</option>
				</select>
			</form>
            <?php foreach($result as $key => $value){ ?>
			<div id="news_1">
				<img src="storage/product/<?php echo $value['img'] ?>">
				<a href="product.php?id=<?php echo $value['id']?>"><h1><?php echo $value['title'] ?></h1></a>
				<p id="price"><?php echo '$'.$value['price'] ?></p>
				<p><?php echo $value['content'] ?></p>
			</div>
            <?php } ?>
			<div id="page">
				1|
				<a href="">2</a>|
				<a href="">3</a>|
				<a href="">4>></a>
			</div>
		</section>
		<div class="spacer"></div>
	<footer>
		&copy; Alex Holiday Agency 2014 &reg;
	</footer>
	</div>
</body>
</html>