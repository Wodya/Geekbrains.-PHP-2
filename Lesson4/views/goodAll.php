<?php
/**
* @var \app\models\Good[] $goods
 */
?>
<?php foreach ($goods as $good) : ?>
    <img class="good_img" src="<?= '.\img\image' . $good->id . '.jpg' ?>" alt="">
    <p><?= $good->name ?></p>
    <a class="good_detail" href= <?= "?c=good&a=one&id=" . $good->id?>> Подробнее </a>
<?php endforeach; ?>
