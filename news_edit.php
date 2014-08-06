<?php
require_once('include/bootstrap.php');

$news = news_get($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            unlink('storage/news/'.$news['image']);

            $news['image'] = '';
        }
        if ($_FILES['image']['tmp_name'] != '') {

            $filename = rand(1, 10000).$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], 'storage/news/'.$filename);
            $news['image'] = $filename;
	}
	$news = array(
		'title' => $_POST['title'],
		'content' => $_POST['content'],
		'image' => $news['image']
	);
	db_update('news', $news, $_GET['id']);

	redirect('news_admin.php');
}

	

require_once('include/header.php');

?>
<div class="content">
	<h2> Редактирай новина: <em><?php echo $news['title']?></em> </h2>
	<form action="" method="post" enctype="multipart/form-data">
		<label>
			Заглавие
			<input type="text" name="title" value="<?php echo $news['title']?>">
		</label>
		<br>
		<label>
			Съдържание
			<textarea name="content"><?php echo $news['content']?></textarea>
		</label>
		<br>
		<?php if ($news['image'] != '' && $_GET['action'] != 'delete') { ?>
		<img src="storage/news/<?php echo $news['image']?>" width="100"><a href="news_edit.php?id=<?=$news['id'] ?>&action=delete" style="position: absolute;">[X]</a>
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