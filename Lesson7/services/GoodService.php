<?php
namespace app\services;

use app\entities\Good;

class GoodService extends BaseService
{
    public function add()
    {
        $user = $this->container->userService->getCurrentUser();
        if(empty($user))
            throw new \Exception('Не произведён вход');
        if($user->is_admin != 1)
            throw new \Exception('Пользователь не является администратор');
        if(empty($_POST["name"]) || empty($_POST["price"]) || empty($_POST["info"]))
            throw new \Exception('Не указаны данные по товару');

        $good = new Good();
        $good->name = $_POST["name"];
        $good->price = $_POST["price"];
        $good->info = $_POST["info"];

        $this->container->goodRepository->save($good);
    }
}