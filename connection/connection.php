<?php
$host = 'localhost';
$database = 'zavod';
$user = 'dima';
$password = '0978191652';

$link = mysqli_connect($host, $user, $password, $database)
or die("Помилка " . mysqli_error($link));
