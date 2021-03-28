<?php
include '../header/header.php';
echo '<section class="main marketings back">';
if (!isset($_SESSION['login'])) {
    header("Location: http://localhost/site/auth/login.php");;
}
echo '<h2 class="title">Products table</h2>';
require '../getData/get_data_from_database.php';
require '../addTo/addToProducts.php';
$table = 'products';
$query = "SELECT * FROM products";
$arr = array('ID', 'Продукція', 'Постачальник', 'Ціна');
get_data_from_database($table, $query, $arr);
include('../footer/footer.php');
?>

</section>
