<?php
include('../header/header.php');
echo '<section class="main bugreport back">';
echo '<h2 class="title">Bugreport</h2>';

?>
    <script type="text/javascript">
        function checkData(f) {
            if (confirm("Ви впевнені, що хочете відправити листа?")) {
                f.submit();
            }
        }
    </script>
    <script type="text/javascript">
        function checkMail() {
            let x = document.forms["myForm"]["email"].value;
            let emailReg = new RegExp("^[\.\-_A-Za-z0-9]+?@[\.\-A-Za-z0-9]+?\.[A-Za-z0-9]{2,6}$");
            if (!(emailReg.test(x)))
                emailErr.innerHTML = 'Не правильний адрес e-mail!!!';
            else emailErr.innerHTML = '';
        }
    </script>
    <p>You can notify us of an error found on our site</p>
    <form name="myForm" method="post" onsubmit="checkData(this); return false;">
    <p>Your e-mail:<br />
        <input class="add-form-input" type=" text" name="email" size="22" maxlength="40" onBlur="checkMail()">
    </p>
        <div id="emailErr"></div>
    <p>Date:<br/>
        <input class="add-form-input" type="datetime-local" name="date">
    </p>
    <p>The page on which the error occurred:<br/>
        <input class="add-form-input" type="text" name="page" size="22" maxlength="40"/>
    </p>
    <p>Contents of the error:<br/>
        <textarea class="bug-area" name="bug" rows="6" cols="40"> </textarea>
    </p>
    <p><input type="submit" class="button" value="Send"/>
    </p>
    </form>
<?
session_start();
$name = $_SESSION['login'];
$email = trim($_POST['email']);
$date = trim($_POST['date']);
$page = trim($_POST['page']);
$bug = trim($_POST['bug']);
$toaddress = "dimon200117@gmail.com";
$subject = "Виявлена помилка";
$mailcontent = "Імя клієнта: " . $name . "\n" .
    "E-mail клієнта: " . $email . "\n" .
    "Дата виявлення: \n" . $date . "\n" .
    "Сторінка, на якій виявлено помилку: " . $page . "\n" .
    "Зміст помилки: " . $bug . "\n";
$fromaddress = "From: $email";
mail($toaddress, $subject, $mailcontent, $fromaddress);

?>
</section>
<?php
require('../footer/footer.php');

