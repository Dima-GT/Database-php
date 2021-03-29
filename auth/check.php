<?php
require '../connection/connection.php';
if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
    $query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE user_id = '" . intval($_COOKIE['id']) . "' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);
    if (($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])
        or (($userdata['user_ip'] == $_SERVER['REMOTE_ADDR']))) {
        setcookie("id", "", time() - 3600 * 24 * 30 * 12, "/");
        setcookie("hash", "", time() - 3600 * 24 * 30 * 12, "/", null, null, true); // httponly !!!
        print "Хмм... Щось не працює.";
    } else {
        header("Location: http://localhost/site/index.php");
        exit;
    }
} else {
    print "Включіть куки";
}
?>
