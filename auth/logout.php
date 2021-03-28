<?php
session_start();
unset($_SESSION['login']);
session_destroy();
header("Location: http://localhost/site/auth/login.php"); exit;

?>
<form method="POST">
    Логін <input name="login" type="text" required><br>
    Пароль <input name="password" type="password" required><br>
    Не прикріплювати до ІР(небеззпечно) <input type="checkbox" name="not_attach_ip"><br>
    <input name="submit" type="submit" value="Увійти">
</form>