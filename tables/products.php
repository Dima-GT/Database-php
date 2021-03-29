<?php
include '../header/header.php';
echo '<section class="main marketings">';
if (!isset($_SESSION['login'])) {
    header("Location: http://localhost/site/auth/login.php");;
}
require '../getData/get_data_from_database.php';
require '../addTo/addToProducts.php';
$table = 'products';
$query = "SELECT * FROM products";
$arr = array('Product ID', 'Product name', 'Product provider', 'price');
?>
<div class="form-wrapper marketings-wrapper">
    <h2 class="title">Products table</h2>
<?php
get_data_from_database($table, $query, $arr);
echo '</div>';
include('../footer/footer.php');
?>

</section>
