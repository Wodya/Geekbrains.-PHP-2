<?php
namespace app\repositories;
use app\entities\Order;

class OrderRepository extends Repository
{
    protected function getTableName(): string
    {
        return 'orders';
    }
    protected function getEntityName(): string
    {
        return Order::class;
    }
    protected function getOrderField():string
    {
        return "date desc";
    }
    public function getAllByUser($userId)
    {
        $tableName = $this->getTableName();
        $orderField = $this->getOrderField();
        $sql = "SELECT * FROM {$tableName} WHERE user_id = :userId order by {$orderField}";
        $params = [':userId' => $userId];
        return $this->getDB()->getAllObjects($sql, $this->getEntityName(), $params);
    }
}