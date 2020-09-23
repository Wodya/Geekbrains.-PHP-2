<?php

namespace app\models;
/**
 * Class Good
 * @package app\models
 * @method  static getAll() self
 */
class Good extends Model
{
    const PAGE_COUNT = 3;

    public $id;
    public $name;
    public $price;
    public $info;

    /**
     * Метод для
     *
     * @return mixed
     */
    protected static function getTableName():string
    {
        return 'goods';
    }

}
