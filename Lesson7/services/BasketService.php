<?php

namespace app\services;

use app\entities\Good;
use app\repositories\GoodRepository;

class BasketService extends BaseService
{
    const BASKET_NAME = 'goods';

    public function getBasket()
    {
        return $this->container->request->getSession(self::BASKET_NAME);
    }
    public function clearBasket()
    {
        unset($_SESSION[self::BASKET_NAME]);
    }
    public function add($id, GoodRepository $goodRepository, Request $request)
    {
        if (empty($id)) {
            return 'Нет id';
        }

        /** @var Good $good */
        $good = $goodRepository->getOne($id);
        if (empty($id)) {
            return 'Нет товара';
        }

        $goods = $request->getSession(self::BASKET_NAME);

        if (empty($goods[$id])) {
            $goods[$id] = [
                'name' => $good->name,
                'count' => 1,
                'price' => $good->price,
            ];

            $request->setSession(self::BASKET_NAME, $goods);
            return 'Товар добавлен';
        }

        $goods[$id]['count']++;
        $request->setSession(self::BASKET_NAME, $goods);
        return 'Товар добавлен';
    }
}