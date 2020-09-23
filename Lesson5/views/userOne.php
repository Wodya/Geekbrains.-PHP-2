<?php
/** @var  \app\models\User $user */
?>

<form method="post">
    <input type="text" name="login" placeholder="login" value="<?= $user->login?>">
    <input type="text" name="name" placeholder="name"  value="<?= $user->name?>">
    <input type="text" name="password" placeholder="password"  value="<?= $user->password?>">
    <input style="display: block" type="submit" value="Отправить">
</form>

