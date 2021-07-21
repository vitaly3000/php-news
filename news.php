<?php

// подключение базы данных
include_once('./common.php');

// Количество статей на странице
$articlesCount = 5;


$currentPage = 0;// первая страница по умолчанию
if ($_GET['page']) {
    $page = $_GET['page'];
    $currentPage = ($page - 1)* $articlesCount;
}

// запрос на статьи по страницам
$queryArticles = "SELECT*FROM news ORDER BY idate DESC LIMIT $currentPage,$articlesCount";

// общее количество статей
$queryTotalCountArticles = "SELECT COUNT(*) as count FROM news";
$articlesTotalCount = mysqli_query($link, $queryTotalCountArticles) or die(mysqli_error($link));
$articlesTotalCountPages = ceil(mysqli_fetch_assoc($articlesTotalCount)['count'] / $articlesCount);


$articles = mysqli_query($link, $queryArticles) or die(mysqli_error($link));
for ($ArticlesData = []; $row = mysqli_fetch_assoc($articles); $ArticlesData[] = $row) ;


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Новости</h1>
    </header>
    <div class="content">
        <?php
        foreach ($ArticlesData as $article):

            ?>
            <div class="article">
                <div class="article__top">
                    <div class="article__date">
                        <?php echo date('m/d/Y', $article['idate']) ?>
                    </div>
                    <div class="article__title">
                        <a href="view.php?id=<?php echo $article['id'] ?>"> <?php echo $article['title'] ?></a>
                    </div>
                </div>
                <div class="article__announce">
                    <p><?php echo $article['announce'] ?></p>
                </div>
            </div>

        <?php
        endforeach;
        ?>

    </div>
    <div class="pagination">
        <div class="pagination__title">
            Страницы:
        </div>
        <div class="pagination__btns">
            <?php
            for ($i = 1; $i <= $articlesTotalCountPages; $i++)
                if ($page == $i) {
                    echo "<a href=news.php?page=$i class=\"pagination__btn current \" > $i </a>";

                } else
                    echo "<a href=news.php?page=$i class=\"pagination__btn  \" > $i </a>";


            ?>

        </div>
    </div>
</div>
</body>
</html>