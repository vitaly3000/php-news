<?php

$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
$user = 'root'; //имя пользователя, по умолчанию это root
$password = 'root'; //пароль, по умолчанию root
$db_name = 'news'; //имя базы данных
// подключение к базе
$link = mysqli_connect($host, $user, $password, $db_name);
