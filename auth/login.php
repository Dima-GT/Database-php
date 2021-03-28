
<?php
require '../header/header.php';
//session_start();
// Генерую випадкковий рядок.
function generateCode($length = 6)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0, $clen)];
    }
    return $code;
}

require '../connection/connection.php';
if (isset($_POST['submit'])) {
    $query = mysqli_query($link, "SELECT user_id, user_password FROM users WHERE user_login='" . mysqli_real_escape_string($link, $_POST['login']) . "' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    if ($data['user_password'] === md5(md5($_POST['password']))) {
// Генерируем випадкове число і хешуюю його
        $hash = md5(generateCode(10));

        if (!empty($_POST['not_attach_ip'])) {
//якщо вибрана привязка по ІР, переводжу його в строку
            $insip = ", user_ip=INET_ATON('" . $_SERVER['REMOTE_ADDR'] . "')";
        }
        mysqli_query($link, "UPDATE users SET user_hash='" . $hash . "' " . $insip . " WHERE user_id='" . $data['user_id'] . "'");
// Ставлю куки
        setcookie("id", $data['user_id'], time() + 60 * 60 * 24 * 30, "/");
        setcookie("hash", $hash, time() + 60 * 60 * 24 * 30, "/", null, null, true); // httponly !!!
        header("Location: check.php");
        $login = $_POST['login'];
        var_dump($login);
        $_SESSION['login'] = $login;
        exit();
    } else {
        print "Ви ввели не правильний логін/пароль.";
    }
}
?>
<form method="POST">
    <h3>Щоб отримати доступ до сайту, будь ласка авторизуйтесь.</h3>
    Логин <input name="login" type="text" required><br>
    Пароль <input name="password" type="password" required><br>
    Не прикріплювати до ІР (небезпечно) <input type="checkbox"
                                               name="not_attach_ip"><br>
    <a href="register.php">Зареєструватись</a>
    <input name="submit" type="submit" value="Увійти">
</form>

<?php
require '../footer/footer.php';