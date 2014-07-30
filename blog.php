<?php
    require_once('include/bootstrap.php');

    $sql = 'SELECT title, content, date_added
            FROM news';
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
			<div id="news_conteiner">
                <?php foreach($result as $key => $value){ ?>
				<div class="blog_news">
					<a href="news.php" class="news_link"><h1><?php echo $value['title'] ?></h1></a>
					<article>Posted on: <?php echo $value['date_added'] ?> <em>by Alex Djinev</ em>
					<blockquote>
                        <?php echo $value['content'] ?>
					</blockquote>
					</article>
  				</div>
                <?php } ?>

			</div>
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