<?php


namespace app\models;


class Order
{
    /**
     * @var GoodOrder[] $good_orders
     */
    public $id;
    public $date;
    public $user_id;
    public $state_id;

    public $good_orders;
}