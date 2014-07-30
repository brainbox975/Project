<?php
require_once('include/bootstrap.php');
is_logged_in();

$sql = 'SELECT * FROM users WHERE id = ' . $_GET['id'];
$user = db_select($sql);
$user = $user[0];

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
 $data = array(
        'username' => $_POST['username'],
        'password' => md5($_POST['password'])
    );
    db_update('users', $data, $_GET['id']);
    redirect('users.php');
}
require_once('include/header.php');
?>

<div class="content">
    <form action="" method="POST">
        <div>
            <label for="">Потребител:</label>
            <input type="text" name="username" id="" value="<?php echo $user['username'];?>"/>
        </div>

        <div>
            <label for="">Парола:</label>
            <input type="password" name="password" id=""/>
        </div>

        <button type="submit">Редактирай</button>
    </form>
</div>

<?php
require_once('include/footer.php');