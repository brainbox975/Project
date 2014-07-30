<?php
	require_once('include/bootstrap.php');

	$sql = '
			SELECT title FROM page
		';

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
            <?php 
            foreach ($result as $key => $value){
            ?>
            <br>
            <a href="contact.php"><?php echo $value['title']?></a>
            <?php } ?>
		</nav>
	</div>	
	<div id="line"></div>
		<section class="section">
			<p id="offer">ОФЕРТИ НА СЕДМИЦАТА!!!</p>
			<div class="column">
					<img src="pics/vodopadi.jpg">
					<p>Plitvice waterfalls - Price: $ 200</p>	
			</div>	
			<div class="column">
					<img src="pics/piramidi.jpg">
					<p>Egyptian pyramids - Price: $ 1,150</p>
			</div>	
			<div class="column1">
					<img src="pics/bora_bora.jpeg">
					<p>Bora Bora - Price $ 2300</p>
			</div>	
			<div class="column1">
					<img src="pics/machu.jpg">
					<p>Machu Picchu - Price $ 2750</p>
			</div>	
			<div id="news">Latest News</div>
			<div id="news_post">Spent my 50th birthday in French Polynesia and the Four Seasons Bora Bora was certainly the high point. The service was first rate....from the wait staff, the spa personnel, and the front desk clerks... <a href="news.html">Read more</a>
			</div>
			<div id="news_post">Spent my 50th birthday in French Polynesia and the Four Seasons Bora Bora was certainly the high point. The service was first rate....from the wait staff, the spa personnel, and the front desk clerks... <a href="news.html">Read more</a>
			</div>
			<div id="news_post">Spent my 50th birthday in French Polynesia and the Four Seasons Bora Bora was certainly the high point. The service was first rate....from the wait staff, the spa personnel, and the front desk clerks... <a href="news.html">Read more</a>
			</div>
		</section>
		<div class="spacer"></div>
	<footer>
		&copy; Alex Holiday Agency 2014 &reg;
	</footer>
	</div>
</body>

</html>