<?php
if (!isset($_SESSION['login'])) {
    print "<script language='Javascript' type='text/javascript'>
		function reload(){location = \"login.php\"}; 
		setTimeout('reload()', 0);
		</script>";
}

if (!empty($_GET['table'])) {
    $link = mysqli_connect('localhost', 'dima', '0978191652', 'zavod');
    $table = $_GET['table'];

    $val = $_GET['val'];
    $rows = substr($table, 0, -1) . '_id';
    echo $rows;
    $query = "DELETE FROM $table WHERE $rows=$val";
    $result = mysqli_query($link, $query);
    print "<script language='Javascript' type='text/javascript'>
		function reload(){location = \"http://localhost/site/tables/$table.php\"}; 
		setTimeout('reload()', 0);
		</script>";
}
?>
