<script>
    function CheckData(f)
    {
        if (confirm("Are you sure you want to send data?")) {
            f.submit();
        }
    }
</script>
<div class="form-wrapper">
    <h2 class="title">Add to providers</h2>
<form method="post" enctype="multipart/form-data" onsubmit="CheckData(this); return false;" class="add-form">
    <label for="form_1">Provider id:</label>
    <input id='form_1' class="add-form-input" type="number" name="provider_id" min="0" max="9999" step="1">
    <br> <label for="form_2">Provider name:</label>
    <input id='form_2' class="add-form-input" type="text" name="provider_name">
    <br> <label for="form_3">Provider logo:</label>
    <input id='form_3'  type="file" name="filename">
    <br> <input type="submit" class="button" value="Submit">
</form>
</div>
<?php
if (!empty($_POST['provider_name'])) {
    $provider_id = $_POST['provider_id'];
    $provider_name = $_POST['provider_name'];
    $provider_logo = '/img/';
    if(is_uploaded_file($_FILES["filename"]["tmp_name"])){
        move_uploaded_file($_FILES["filename"]["tmp_name"], "../img/".$_FILES["filename"]["name"]);
        $temp = $_FILES['filename']['name'];
        $provider_logo = $provider_logo.$temp;
    } else {
        echo("An error occurred while loading the logo");
    }

    $query = "INSERT INTO providers VALUES('$provider_id', '$provider_name','$provider_logo')";
    require_once '../connection/connection.php';
    $result = mysqli_query($link, $query);
}
?>