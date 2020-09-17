<?php
namespace app\models;

class User extends Model
{
    public $id;
    public $name;
    public $login;
    public $password;


    /**
     * Метод для
     *
     * @return mixed
     */
    protected function getTableName():string
    {
        return 'users';
    }
    protected function getId(): int
    {
        return (int)$this->id;
    }
}
