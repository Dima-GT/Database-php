<script>
    function CheckData(f)
    {
        if (confirm("Are you sure you want to send data?")) {
            f.submit();
        }
    }
</script>
<div class="form-wrapper">
    <h2 class="title">Add to marketplaces</h2>
<form method="post" onsubmit="CheckData(this); return false;" class="add-form">
    <label for="form_1">Marketplace ID:</label>
    <input id='form_1' class="add-form-input" type="number" name="marketplace_id" min="0" max="9999" step="1">
    <br> <label for="form_2">Marketplace name:</label>
    <input id='form_2' class="add-form-input" type="text" name="marketplace_name" min="0" max="9999" step="1">
    <br> <input type="submit" class="button" value="Add">
</form>
</div>
<?php
if (!empty($_POST['marketplace_name'])) {
    $marketplace_name = $_POST['marketplace_name'];
    $marketplace_id = $_POST['marketplace_id'];
    $query = "INSERT INTO marketplaces VALUES('$marketplace_id','$marketplace_name')";
    require_once '../connection/connection.php';
    $result = mysqli_query($link, $query);
}
?>