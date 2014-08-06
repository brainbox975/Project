<?php

function products_get_all_count() {

    $sql ='
        SELECT products.id, products.title, products.price, products.img
        FROM products
        LEFT JOIN products_images ON products.id = products_images.products_id
        GROUP BY products.id
    ';
    $result = db_select($sql);

    return $result;
}

function products_images_get_all($products_id) {
    $sql = '
        SELECT id, img, products_id
        FROM products_images
        WHERE products_id = '.$products_id;

    $result = db_select($sql);

    return $result;
}

function products_get($id) {

    global $db_connection;

    $sql = '
        SELECT id, title, content, price, img
        FROM products
        WHERE id = '.$id;

    $res = mysqli_query($db_connection, $sql);
    return mysqli_fetch_assoc($res);

}

function products_get_image($id, $products_id) {

    global $db_connection;

    $sql = '
        SELECT id, image_name
        FROM products_images
        WHERE id='.$id.' AND products_id='.$products_id;
        
    $res = mysqli_query($db_connection, $sql);
    return mysqli_fetch_assoc($res);

}