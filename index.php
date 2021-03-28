<?php
 include 'header/header.php';
?>
<section class="main back">
    <?php
    if (isset($_SESSION['login'])) {
        echo '<h1 class="title">
        Please select a section:
    </h1>';
    }else{
        echo '<h1 class="title">
        You need to sign in to view this content
    </h1>';
    }
    ?>
    <br><a class="index-link" href="http://localhost/site/tables/providers.php">Providers table</a>
    <a class="index-link" href="http://localhost/site/tables/marketings.php">Marketings table</a>
    <a class="index-link" href="http://localhost/site/tables/products.php">Products table</a>
    <a class="index-link" href="http://localhost/site/tables/marketplaces.php?marketplace_id=">Marketplaces table</a>
    <a class="index-link" href="http://localhost/site/sitemap/sitemap.xml">Bugreport</a><br>
</section>
<?php
include 'footer/footer.php';
?>