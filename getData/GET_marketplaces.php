<form method="GET">
    Виберіть код торгової точки:
    <input type="text" name="marketplace_id" >
    <input type="submit" value="Підтвердити">
</form>
<?php
if ($marketplace_id = $_GET['marketplace_id'] ) {
    require 'get_data_from_database.php';
    $table = 'marketplaces';
    $query = "SELECT * FROM marketplaces WHERE marketplace_id=$marketplace_id";
    $arr = array('ID', 'Точка');
    get_data_from_database($table, $query, $arr);
}