<?php

namespace app\models;

class Good extends Model
{
    public $id;
    public $name;
    public $price;
    public $info;

    /**
     * Метод для
     *
     * @return mixed
     */
    protected function getTableName():string
    {
        return 'goods';
    }
    protected function getId(): int
    {
        return (int)$this->id;
    }
}
