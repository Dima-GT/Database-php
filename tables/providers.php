<?php
include '../header/header.php';
echo '<section class="main marketings back">';

if (!isset($_SESSION['login'])) {
    header("Location: http://localhost/site/auth/login.php");;
}
echo '<h2 class="title">Providers table</h2>';
require '../addTo/AddToProvider.php';
$table = 'providers';
$col = 'provider_id';
$arr = array('ID', 'Постачальник', 'Лого');
require '../connection/connection.php';
$query = "SELECT * FROM providers";
$result = mysqli_query($link, $query);
echo "<table>";
$num_col = mysqli_num_fields($result);

echo "<tr>";
for ($i = 0; $i < $num_col; $i++)
    echo "<td>$arr[$i]</td>";
echo "<td></td>";
echo "</tr>";
$val = 0;
$num_img_row = 0;
$num = 0;
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<tr>";
    foreach ($line as $col_value) {
        if ($num == 0) {
            $val = $col_value;
        }
        $num++;
        if ($num_img_row == 2) {
            echo "<td><img src=" . $col_value . "></td>";
        } else
            echo "<td>$col_value</td>";
        $num_img_row++;
    }
    $num = 0;
    $num_img_row = 0;
    echo '<td>' . $src_one = "<a class='remove' href=http://localhost/site/remove/remove.php?table=$table&val=$val&col=$col><i class='far fa-trash-alt'></i></a>" . '</td>';
    echo "</tr>";
}
echo "</table>";
mysqli_free_result($result);

include('../footer/footer.php');
?>
</section>
