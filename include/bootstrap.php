<?php
ob_start();
session_start();
error_reporting (E_ALL ^ E_NOTICE);
ini_set('display_errors','On');

require_once('include/config.php');

$db_connection = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['name']);
if (!$db_connection) {
    die('Could not connect: ' . mysqli_error($db_connection));
}

//base librarires
require_once('functions/db.php');
require_once('functions/common.php');
require_once('functions/validate.php');
require_once('functions/products.php');

// //module functions
require_once('functions/news.php');
// require_once('../functions/pages.php');
// require_once('/functions/products.php');

require_once('classes/IItem.php');
require_once('classes/ICRUD.php');
require_once('classes/Page.php');
require_once('classes/Pages.php');
require_once('classes/news.php');
require_once('classes/newses.php');
require_once('classes/product.php');
require_once('classes/products.php');

?>
