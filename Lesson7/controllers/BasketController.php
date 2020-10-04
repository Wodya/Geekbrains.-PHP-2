<?php

namespace app\controllers;

use app\services\BasketService;

class BasketController extends Controller
{
    protected $actionDefault = 'index';

    public function indexAction()
    {
        $basket = $this->container->basketService->getBasket();
        return $this->render('basketAll', ['items' => $basket]);
    }
    public function clearAction()
    {
        $this->container->basketService->clearBasket();
        $this->redirect('/basket/index');
    }
    public function addAction()
    {
        $msg = $this->container->basketService->add(
            $this->getId(),
            $this->container->goodRepository,
            $this->request
        );
        return $this->redirect('', $msg);
    }
    public function fakeAddAction()
    {
        $msg = $this->container->basketService->add(
            $this->getId(),
            $this->container->goodRepository,
            $this->request
        );

        return $this->sendJson([
            'COUNT' => count($_SESSION[BasketService::BASKET_NAME]),
            'MSG' => $msg
        ]);
    }
    public function makeOrderAction()
    {
        try {
            $basket = $this->container->basketService->getBasket();
            $this->container->orderService->makeOrder($basket);
            $this->redirect('\order\all');
        }
        catch (\Exception $exc)
        {
            $this->redirect('',$exc->getMessage());
        }

    }
}
