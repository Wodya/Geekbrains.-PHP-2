<?php /** @var string  $content*/?>
<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<ul>
    <li><a href="?c=user&a=all">Пользователи</a></li>
    <li><a href="?c=good&a=all">Товары</a></li>
    <li><a href="?c=user&a=one">Добавить пользователя</a></li>
</ul>
    <?= $content ?>
</body>
</html>
