<script>
    function CheckData(f)
    {
        if (confirm("Ви впевнені, що хочете відправити дані?")) {
            f.submit();
        }
    }
</script>

<form method="post" onsubmit="CheckData(this); return false;" class="add-form">
    <br> <label for="form_1">Marketplace ID:</label>
    <input id='form_1' class="add-form-input" type="number" name="marketplace_id" min="0" max="999" step="0.5">
    <br> <label for="form_2">Marketplace name:</label>
    <input id='form_2' class="add-form-input" type="text" name="marketplace_name" min="0" max="999" step="0.5">
    <br> <input type="submit" class="button" value="Submit">
</form>
<?php
if (!empty($_POST['marketplace_name'])) {
    $marketplace_name = $_POST['marketplace_name'];
    $marketplace_id = $_POST['marketplace_id'];
    $query = "INSERT INTO marketplaces VALUES('$marketplace_id','$marketplace_name')";
    require_once '../connection/connection.php';
    $result = mysqli_query($link, $query);
}
?>