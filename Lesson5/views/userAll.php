<?php
/** @var  \app\models\User[] $users */
?>

<?php foreach ($users as $user) :?>
    <h2><?= $user->login ?></h2>
    <a href="?с=user&a=one&id=<?= $user->id?>">подробнее</a>
    <hr>
<?php endforeach;?>

<!--<temp :user="--><?//= json_encode($user)?><!--"></temp>-->
