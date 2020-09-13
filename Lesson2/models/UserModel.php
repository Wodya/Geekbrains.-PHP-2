<?php


namespace app\models;


abstract class UserModel extends Model
{
    abstract protected function getSpcTableName():string; // Имя таблицы спецификации
    abstract protected function getSpcTableNameKey():string; // Имя ключевого поля в таблице спецификации

    public function getAllForUser(int $userId)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} where user_id=$userId";
        return $this->db->findAll($sql);
    }
    public function getSpc(int $id)
    {
        $tableName = $this->getTableName();
        $keyField = $this->getSpcTableNameKey();
        $sql = "SELECT * FROM {$tableName} where $keyField=$id";
        return $this->db->findAll($sql);
    }

}