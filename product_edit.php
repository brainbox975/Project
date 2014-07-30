<?php
require_once('include/bootstrap.php');
$product = products_get($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (isset($_GET['action']) && $_GET['action'] == 'delete') {
		unlink('storage/'.$product['img']);
		
		$product['img'] = '';
	}
	if ($_FILES['img']['tmp_name'] != '') {

		$filename = rand(1, 10000).$_FILES['img']['name'];
		move_uploaded_file($_FILES['img']['tmp_name'], 'storage/'.$filename);
		$product['img'] = $filename;

	}
	$product = array(
		'title' => $_POST['title'],
		'content' => $_POST['content'],
		'price' => $_POST['price'],
		'img' => $_POST['img']
	);
//    $product = new Product();
//    $product->title = $_POST['title'];
//    $product->content = $_POST['content'];
//    $product->price = $_POST['price'];
//    $product->img = $_POST['img'];
//    $products->update($_GET['id'], $product);
	db_update('products', $product, $_GET['id']);

	redirect('product_edit.php');
}

	

require_once('include/header.php');

?>
<div class="content">
	<h2> Редактирай новина: <em><?php echo $product['title']?></em> </h2>
	<form action="" method="post">
		<label>
			Заглавие
			<input type="text" name="title" value="<?php echo $product['title']?>">
		</label>
		<br>
		<label>
			Съдържание
			<textarea name="content"><?php echo $product['content']?></textarea>
		</label>
		<br>
		<label>
			Цена
			<input type="text" name="price" value="<?php echo $product['price']?>">
		</label>
		<br>
        <?php if ($product['img'] != '' && $_GET['action'] != 'delete') { ?>
            <img src="storage/<?php echo $product['img']?>" width="100"><a href="product_edit.php?id=<?=$product['id'] ?>&action=delete" style="position: absolute;">[X]</a>
		<br>
		<?php } ?>
		<label>
			Качете нова картинка
			<input type="file" name="image">
		</label>
		<br>
		<button type="submit">Запази</button>
		<button type="reset">Изчисти</button>
	</form>
</div>

<?php
require_once('include/footer.php');