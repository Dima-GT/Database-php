<?php
include '../header/header.php';
echo '<section class="main marketings">';
if (!isset($_SESSION['login'])) {
    header("Location: http://localhost/site/auth/login.php");;
}
require '../getData/get_data_from_database.php';
require '../addTo/addToMarketplaces.php';
$table = 'marketplaces';
$query = "SELECT * FROM marketplaces";
$arr = array('ID', 'Торгова точка');
?>
<div class="form-wrapper marketings-wrapper">
    <h2 class="title">Marketings table</h2>
    <?php
    get_data_from_database($table, $query, $arr);
    echo '</div>';
    include('../footer/footer.php');
    ?>
    </section>
