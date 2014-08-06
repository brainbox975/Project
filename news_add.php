<?php
require_once('include/bootstrap.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($_POST['title'] != '' && $_POST['content'] != '') {

		if ($_FILES['image']['tmp_name'] != '') {//tmp_name 
			$filename = rand(1, 10000).$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], 'storage/news/'.$filename);
		} else {
			$filename = '';
		}

		db_insert('news', array(
			'title' => $_POST['title'],
			'content' => $_POST['content'],
			'date_added' => date('Y-m-d H:i:s'),
			'image' => $filename
		));

	}

	redirect('news_admin.php');
}

require_once('include/header.php');

?>
<div class="content">

	<h2> Добави новина </h2>
	<form action="" method="post" enctype="multipart/form-data">
		<label>
			Заглавие
			<input type="text" name="title">
		</label>
		<br>
		<label>
			Съдържание
			<textarea name="content"></textarea>
		</label>
		<br>
		<label>
			Качете картинка
			<input type="file" name="image">
		</label>
		<br>
		<button type="submit">Запази</button>
		<button type="reset">Изчисти</button>
	</form>
</div>

<?php
require_once('include/footer.php');