<?php
/**
* @var \app\models\Good[] $goods
 * @var int $page
 */
?>
<?php foreach ($goods as $good) : ?>
    <img class="good_img" src="<?= '.\img\image' . $good->id . '.jpg' ?>" alt="">
    <p><?= $good->name ?></p>
    <a class="good_detail" href= <?= "?c=good&a=one&id=" . $good->id?>> Подробнее </a>
<?php endforeach; ?>
<a class="good_nav" href= <?= "?c=good&a=all&page=" . ($page-1 > 0 ? $page-1 : 0) ?>> &lt;&lt; </a>
&nbsp;&nbsp;&nbsp;
<a class="good_nav" href= <?= "?c=good&a=all&page=" . ($page+1) ?>> &gt;&gt; </a>
