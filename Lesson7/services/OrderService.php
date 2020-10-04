<?php
namespace app\services;

use app\entities\Order;

class OrderService extends BaseService
{
    public function makeOrder(array $goods)
    {
        $user = $this->container->userService->getCurrentUser();
        if(empty($user))
            throw new \Exception('Не произведён вход');
        $goodJson = json_encode($goods);
        $order = new Order();
        $order->user_id = $user->id;
        $order->date = date('Y-m-d H:i:s');
        $order->goods = $goodJson;
        $order->state = 'Новый';

        $this->container->orderRepository->save($order);
        $this->container->basketService->clearBasket();
    }
    public function getAll()
    {
        $user = $this->container->userService->getCurrentUser();
        if(empty($user))
            throw new \Exception('Не произведён вход');

        return $user->is_admin ?
            $this->container->orderRepository->getAll() :
            $this->container->orderRepository->getAllByUser($user->id);
    }
    public function close()
    {
        $user = $this->container->userService->getCurrentUser();
        if(empty($user))
            throw new \Exception('Не произведён вход');
        if($user->is_admin != 1)
            throw new \Exception('Пользователь не является администратор');
        $orderId = $this->container->request->getId();
        if(empty($orderId))
            throw new \Exception('Не выбран заказ');
        $order = $this->container->orderRepository->getOne($orderId);
        if(empty($order))
            throw new \Exception('Ошибка получения заказа');
        $order->state = "Завершен";
        $this->container->orderRepository->save($order);
    }
}