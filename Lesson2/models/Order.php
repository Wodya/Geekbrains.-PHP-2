<?php


namespace app\models;


class Order extends UserModel
{
    /**
     * @var GoodOrder[] $order_spc
     */
    public $id;
    public $date;
    public $user_id;
    public $state_id;

    public $order_spc;

    protected function getTableName():string
    {
        return 'orders';
    }
    protected function getSpcTableName():string
    {
        return 'order_spc';
    }
    protected function getSpcTableNameKey():string
    {
        return 'order_id';
    }
}