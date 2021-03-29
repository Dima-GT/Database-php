<?php
require '../header/header.php';
echo '<section class="main marketings">';
require '../connection/connection.php';
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
    <div class="form-wrapper">
        <h2 class="title">registration</h2>
        <form method="POST">
            <br><label for="form_1">Login:</label><br><input id='form_1'
                                                             class="add-form-input"
                                                             name="login"
                                                             type="text"
                                                             required><br>
            <br><label for="form_1">Password:</label><br><input id='form_1'
                                                                class="add-form-input"
                                                                name="password"
                                                                type="password"
                                                                required><br>
            <br><a href="login.php">Login</a>
            <input name="submit" class="button" type="submit" value="Register">
        </form>
    </div>
    </section>
<?php
require '../footer/footer.php';
