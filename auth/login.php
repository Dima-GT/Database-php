<?php
require '../header/header.php';
echo '<section class="main marketings">';
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
    <div class="form-wrapper">
        <h2 class="title">authorization</h2>
        <form method="POST">
            <h3>To access the website, please log in.</h3>
            <label for="form_1">Login:</label><br><input class="add-form-input"
                                                    id="form_1" name="login"
                                                    type="text" required><br>
            <br><label for="form_2">Password:</label><br><input class="add-form-input"
                                                        id="form_2"
                                                        name="password"
                                                        type="password"
                                                        required><br>
            <br><label for="form_3">Do not attach to IP (dangerous)</label>
            <input
                    id="form_3" type="checkbox"
                    name="not_attach_ip"><br><br>
            <a href="register.php">Register</a>
            <input name="submit" class="button" type="submit" value="Login">
        </form>
    </div>
    </section>
<?php
require '../footer/footer.php';