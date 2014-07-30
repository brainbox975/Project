<?php
require_once('include/bootstrap.php');

$newses = new Newses($db_connection);
$result = $newses->getAll();

if (isset($_GET['action'])) {

	// да се напише с switch/case

	if ($_GET['action'] == 'delete') {
		//да се добави изтриване на файлове при изтриване
		
		db_delete('news', $_GET['id']);

		redirect('news_admin.php?action=success');
	}

	if ($_GET['action'] == 'success') {
		echo 'Изтриването успешно';
	}
}
	
	// $results = news_get_all_count();

require_once('include/header.php');
?>
<div class="content">
	<a href="news_add.php">Добави Новина</a>
	<br><br>
	<table>
		<tr>
			<th width="50%">Заглавие</th>
			<th width="10%">Коментари</th>
			<th>Действие</th>
		</tr>
		<?php
		foreach ($result as $key => $value) {
		?>
		<tr>
			<td><?php echo $value['title']?></td>
			<td><a href="comments.php?id=<?=$value['id']?>"><?php echo $value['cnt']?></a></td>
			<td><a href="news_edit.php?id=<?php echo $value['id']?>">Редактирай</a> / <a href="news_admin.php?action=delete&id=<?=$value['id']?>">Изтрий</a></td>
		</tr>
		<?php
		}
		?>
	</table>
	<br>
</div>
<?php
require_once('include/footer.php');