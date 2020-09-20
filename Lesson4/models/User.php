<?php
namespace app\models;
/**
 * Class User
 * @package app\models
 * @method  static getAll() self
 */
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
    protected static function getTableName():string
    {
        return 'users';
    }
}
