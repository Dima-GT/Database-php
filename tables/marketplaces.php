<?php
include '../header/header.php';
echo '<section class="main marketings back">';
if (!isset($_SESSION['login'])) {
    header("Location: http://localhost/site/auth/login.php");;
}
echo '<h2 class="title">Marketplaces table</h2>';
require '../getData/get_data_from_database.php';
require '../addTo/addToMarketplaces.php';
$table = 'marketplaces';
$query = "SELECT * FROM marketplaces";
$arr = array('ID', 'Торгова точка');
get_data_from_database($table, $query, $arr);
include('../footer/footer.php');
?>
</section>
