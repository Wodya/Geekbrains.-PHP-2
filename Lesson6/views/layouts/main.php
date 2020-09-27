<?php
/**
 * @var string  $content
 * @var string  $title
 */
?>
<!doctype html>
<html lang="en">
<head>
    <title><?= $title?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<ul>
    <li><a href="?c=user&a=all">Пользователи</a></li>
    <li><a href="?c=user&a=one">Пользователь</a></li>
    <li><a href="?c=user&a=add">Добавить пользователя</a></li>
</ul>
    <?= $content ?>
</body>
</html>
