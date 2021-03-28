<script>
    function CheckData(f)
    {
        if (confirm("Ви впевнені, що хочете відправити дані?")) {
            f.submit();
        }
    }
</script>
<div class="form-wrapper">
    <h2 class="title">Add to marketings</h2>

    <form method="post" onsubmit="CheckData(this); return false;" class="add-form">
    <label for="form_1">Product id:</label>
    <input id='form_1' class="add-form-input" type="number" name="id_marketing" min="0" max="999" step=1>
    <br><label for="form_2">Marketplace id:</label>
    <input id='form_2' class="add-form-input" type="number" name="place" min="0" max="999" step="1">
    <br><label for="form_3">Number of pieces:</label>
    <input id='form_3' class="add-form-input" type="number" name="pieces" min="0" max="999" step="1">
    <br><label for="form_4">Mark-up:</label>
    <input id='form_4' class="add-form-input" type="text" name="markup" min="0" max="9999" step="1">
    <br><label for="form_5">Date of data entry:</label>
    <input id='form_5' class="add-form-input" type="datetime-local" name="date">
    <br> <input type="submit" value="Add" class="button">
</form>
</div>
<?php
if (!empty($_POST['place'])) {
    require_once '../connection/connection.php';
    $id_marketing = $_POST['id_marketing'];
    $place = $_POST['place'];
    $pieces = $_POST['pieces'];
    $markup = $_POST['markup'];
    $date = $_POST['date'];

    mysqli_begin_transaction($link);
    try {
        $result = mysqli_query($link, "INSERT INTO marketings VALUES('$id_marketing', '$place','$pieces','$date','$markup')");
        mysqli_commit($link);
    } catch (mysqli_sql_exception $exception) {
        mysqli_rollback($link);
        throw $exception;
    }
}
?>