<?php
require '../connection/connection.php';
require '../index.php';
if (isset($_POST['submit'])) {
    $err = [];

    if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])) {
        $err[] = "Логін може містити тільки англійські букви та цифри.";
    }

    if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
        $err[] = "Логін не повинен бути менше трьох символів та перевишувати 30";
    }

    $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='" . mysqli_real_escape_string($link, $_POST['login']) . "'");
    if (mysqli_num_rows($query) > 0) {
        $err[] = "Користувач з таким логіном вже зареєстрований";
    }

    // Якщо нема помилок - добавляю нового користувача
    if (count($err) == 0) {

        $login = $_POST['login'];

        //Забираю пробіли і роблю подвійне хешування
        $password = md5(md5(trim($_POST['password'])));

        mysqli_query($link, "INSERT INTO users SET user_login='" . $login . "', user_password='" . $password . "'");
        header("Location: login.php");
        exit();
    } else {
        print "<b>При спробі реєстрації виникли наступні помилки:</b><br>";
        foreach ($err as $error) {
            print $error . "<br>";
        }
    }
}
?>

    <form method="POST">
        <h3>Реєстрація:</h3>
        Логін <input name="login" type="text" required><br>
        Пароль <input name="password" type="password" required><br>
        Вже зареєстровані? <a href="login.php">Увійти</a><br>
        <input name="submit" type="submit" value="Зареєструватись">
    </form>
<?php
require '../footer/footer.php';
