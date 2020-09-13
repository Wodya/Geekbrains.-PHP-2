<?php


namespace app\models;


class Basket extends UserModel
{
    /**
     * @var GoodOrder[] $basket_spc
     */
    public $user_id;
    public $last_access_date;

    public $basket_spc;

    protected function getTableName():string
    {
        return 'basket';
    }
    protected function getSpcTableName():string
    {
        return 'basket_spc';
    }
    protected function getSpcTableNameKey():string
    {
        return 'basket_id';
    }
}