<?php
require_once('include/bootstrap.php');

$products = products_get($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        unlink('storage/product/'.$products['img']);

        $products['img'] = '';
    }
    if ($_FILES['img']['tmp_name'] != '') {

        $filename = rand(1, 10000).$_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], 'storage/product/'.$filename);
        $products['img'] = $filename;
    }
    $products = array(
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'price' => $_POST['price'],
        'img' => $products['img']
    );
    db_update('products', $products, $_GET['id']);

    redirect('product_admin.php');
}



require_once('include/header.php');

?>
    <div class="content">
        <h2> Редактирай продукт: <em><?php echo $products['title']?></em> </h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label>
                Заглавие
                <input type="text" name="title" value="<?php echo $products['title']?>">
            </label>
            <br>
            <label>
                Съдържание
                <textarea name="content"><?php echo $products['content']?></textarea>
            </label>
            <br>
            <label>
                Цена
                <input type="text" name="price" value="<?php echo $products['price']?>">
            </label>
            <br>
            <?php if ($products['img'] != '' && $_GET['action'] != 'delete') { ?>
                <img src="storage/product/<?php echo $products['img']?>" width="100"><a href="product_edit.php?id=<?=$products['id'] ?>&action=delete" style="position: absolute;">[X]</a>
                <br>
            <?php } ?>
            <label>
                Качете нова картинка
                <input type="file" name="img">
            </label>
            <br>
            <button type="submit">Запази</button>
            <button type="reset">Изчисти</button>
        </form>
    </div>

<?php
require_once('include/footer.php');