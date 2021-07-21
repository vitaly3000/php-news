<?php

// подключение базы данных
include_once ('./common.php');

// id по умолчанию
$id=1;
if ($_GET['id']) {
    $id = $_GET['id'];
}
//Поиск статьи по id
$queryArticle = "SELECT*FROM news WHERE id=$id";
$article = mysqli_query($link, $queryArticle) or die(mysqli_error($link));
$articleData= mysqli_fetch_assoc($article);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css">
    <title><?php
        echo $articleData['title']
        ?></title>
</head>
<body>
<div class="container">
    <header>
        <h1><?php
            echo $articleData['title']

            ?></h1>
    </header>
    <div class="content">
       <p>
           <?php
           echo $articleData['content']

           ?>
       </p>
    </div>
    <div class="link-home">
        <a href="news.php" >Все новости >></a>
    </div>

</div>
</body>
</html>