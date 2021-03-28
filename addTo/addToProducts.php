<script>
    function CheckData(f) {
        if (confirm("Are you sure you want to send data?")) {
            f.submit();
        }
    }
</script>
<div class="form-wrapper">
    <h2 class="title">Add to products</h2>
    <form method="post" onsubmit="CheckData(this); return false;"
          class="add-form">
        <label for="form_1">Product id:</label>
        <input id='form_1' class="add-form-input" type="number"
               name="product_id" min="0" max="9999" step="1">
        <br> <label for="form_2">Product name:</label>
        <input id='form_2' class="add-form-input" type="text"
               name="product_name">
        <br> <label for="form_3">Provider ID:</label>
        <input id='form_3' class="add-form-input" type="number"
               name="product_provider" min="0" max="9999" step="1">
        <br> <label for="form_4">Product price:</label>
        <input id='form_4' class="add-form-input" type="number"
               name="product_price" min="0" max="9999" step="1">
        <br> <input type="submit" class="button" value="Add">
    </form>
</div>
<?php
if (!empty($_POST['product_name'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_provider = $_POST['product_provider'];
    $product_price = $_POST['product_price'];
    $query = "INSERT INTO products VALUES('$product_id', '$product_name','$product_provider','$product_price')";
    require_once '../connection/connection.php';
    $result = mysqli_query($link, $query);
}
?>