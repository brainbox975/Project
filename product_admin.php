<?php
require_once('include/bootstrap.php');


$Products = new Products($db_connection);
$result = $Products->getAll();



if (isset($_GET['action'])) {

	switch ($_GET['action']) {
		case 'delete':
			$Products->delete($_GET['id']);
			redirect('product_admin.php?action=success');
		break;
		case 'success':
			$deleteMsg = 'Изтриването успешно';
			break;
		default:
			redirect('product_admin.php');
			break;
	}
}

require_once('include/header.php');
?>
<div class="content">
	<a href="product_add.php">Добави Продукт</a>
    <br/><br/>
	<table>
		<tr>
			<th width="50%">Заглавие</th>
			<th width="10%">Съдържание</th>
			<th width="20%">Цена</th>
			<th>Действие</th>
		</tr>
		<?php foreach ($result as $key => $value) :?>
		<tr>
			<td><?=$value['title']?></td>
			<td><?=$value['content']?></td>
			<td><?=$value['price']?>лв.</td>
			<td><a href="product_edit.php?id=<?=$value['id']?>">Редактирай</a> / <a href="product_admin.php?action=delete&id=<?=$value['id']?>">Изтрий</a></td>
		</tr>
		<?php endforeach; ?>
		<?php if (isset($deleteMsg)) : ?>
		<tr>
			<th colspan="4"><?= $deleteMsg ?></th>
		</tr>
		<?php endif; ?>
	</table>
	<br>
</div>
<?php
require_once('include/footer.php');