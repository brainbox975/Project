<?php 
	require_once('include/bootstrap.php');



	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];


		db_insert('cms', array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'message' => $message
			));
		

	}
?>
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
			<div id="contact">
				<h1>Contact Us</h1>
			</div>
			<div id="contact_send">Send your question</div>
			<div id="contact_send1">Fill in the fields below to answer your qustion</div>
				<div id="cont_form">
				<form action="" method="POST" id="form">
					Name <input type="text" name="name" id="name" value="">
					E-mail <input type="text" name="email" id="email" value="">
					Phone <input type="text" name="phone" id="phone" value="">
					Message <textarea name="message" id="message"></textarea>
					<button type="submit">Send</button>
				</form>
				</div>
			<div id="map">
				<img src="pics/map.png">
			</div>
		</section>
		<div class="spacer"></div>
	<footer>
		&copy; Alex Holiday Agency 2014 &reg;
	</footer>
	</div>
</body>

</html>