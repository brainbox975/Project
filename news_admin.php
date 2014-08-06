<?php
require_once('include/bootstrap.php');

$newses = new Newses($db_connection);
$result = $newses->getAll();

if (isset($_GET['action'])) {

	switch ($_GET['action']){

        case 'delete':
            $newses->delete($_GET['id']);
            redirect('news_admin.php?action=success');
        break;
        case 'success':
            $deleteMsg = 'Изтриването успешно!';
        break;
        default:
            redirect('news_admin.php');

    }

//	if ($_GET['action'] == 'delete') {
//		//да се добави изтриване на файлове при изтриване
//
//		db_delete('news', $_GET['id']);
//
//		redirect('news_admin.php?action=success');
//	}
//
//	if ($_GET['action'] == 'success') {
//        $deleteMsg = 'Изтриването успешно';
//	}
}


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
        <?php foreach ($result as $key => $value) { ?>
		<tr>
			<td><?php echo $value['title']?></td>
			<td><a href="comments.php?id=<?=$value['id']?>"><?php echo $value['cnt']?></a></td>
			<td><a href="news_edit.php?id=<?php echo $value['id']?>">Редактирай</a> / <a href="news_admin.php?action=delete&id=<?=$value['id']?>">Изтрий</a></td>
		</tr>
        <?php } ?>
        <?php if (isset($deleteMsg)) : ?>
            <tr>
                <th colspan="3"><?= $deleteMsg ?></th>
            </tr>
        <?php endif; ?>
	</table>
	<br>
</div>
<?php
require_once('include/footer.php');