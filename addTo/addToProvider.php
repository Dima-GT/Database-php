<script>
    function CheckData(f)
    {
        if (confirm("Ви впевнені, що хочете відправити дані?")) {
            f.submit();
        }
    }
</script>

<form method="post" enctype="multipart/form-data" onsubmit="CheckData(this); return false;" class="add-form">
    <br> <label for="form_1">Provider id:</label>
    <input id='form_1' class="add-form-input" type="number" name="provider_id" value="0" min="0" max="999" step="0.5">
    <br> <label for="form_2">Provider name:</label>
    <input id='form_2' class="add-form-input" type="text" name="provider_name" value="" min="0" max="999" step="0.5">
    <br> <label for="form_3">Provider logo:</label>
    <input id='form_3'  type="file" name="filename">
    <br> <input type="submit" class="button" value="Submit">
</form>
<?php
if (!empty($_POST['provider_name'])) {
    $provider_id = $_POST['provider_id'];
    $provider_name = $_POST['provider_name'];
    $provider_logo = './img/';
    if(is_uploaded_file($_FILES["filename"]["tmp_name"])){
        move_uploaded_file($_FILES["filename"]["tmp_name"], "./img/".$_FILES["filename"]["name"]);
        $temp = $_FILES['filename']['name'];
        $provider_logo = $provider_logo.$temp;
    } else {
        echo("Виникла помилка при завантаженні лого");
    }

    $query = "INSERT INTO provider VALUES('$provider_id', '$provider_name','$provider_logo')";
    require_once '../connection/connection.php';
    $result = mysqli_query($link, $query);
}
?>