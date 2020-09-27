<?php


namespace app\controllers;


use app\entities\Basket;
use app\repositories\GoodRepository;

class BasketController extends Controller
{
    protected function getPageSize(): int
    {
        return 3;
    }
    public function allAction()
    {
        $basket = $this->request->getBasket();
        return $this->renderer->render('basketAll', ['items' => $basket]);
    }
    public function addAction() : string
    {
        $id = $this->request->getId();
        $quantity = $this->request->getQuantity();

        if(empty($id) || empty($quantity)){
            return json_encode(['success' => false]);
        }
        $basket = $this->request->getBasket();

        $exist= null;
        foreach ($basket as $item)
            if($item->id == $id) {
                $exist = $item;
                break;
            }

        if(!empty($exist)) {
            $exist->quantity += $quantity;
        }
        else {
            $good = (new GoodRepository())->getOne($id);
            $good->quantity = $quantity;
            $basket[] = $good;
        }

        $this->request->setBasket($basket);
        return json_encode(['success' => true , 'quantity' => count($basket)]);
    }
    public function clearAction() : string
    {
        $this->request->setBasket([]);
        header("Location: /basket/all");
    }

}