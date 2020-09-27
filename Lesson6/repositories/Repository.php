<?php
namespace app\repositories;

use app\entities\Entity;
use app\services\DB;

/**
 * Class Repository
 * @package app\repositories
 */
abstract class Repository
{

    abstract protected function getTableName():string;
    abstract protected function getEntityName():string;

    /**
     * @return DB
     */
    protected static function getDB()
    {
        return DB::getInstance();
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id ";
        $params = [':id' => $id];
        return static::getDB()->getObject($sql, $this->getEntityName(), $params);
    }

    public function getAll(int $page, int $pageSize)
    {
        $tableName = $this->getTableName();
        $limit = $pageSize;
        $offset = $pageSize * $page;
        $sql = "SELECT * FROM {$tableName} limit $limit offset $offset";

        return static::getDB()->getAllObjects($sql, $this->getEntityName());
    }
    public function getTotal()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT count(*) Total FROM {$tableName}";
        return static::getDB()->find($sql)['Total'];
    }
    protected function insert(Entity $entity)
    {
        $fields = [];
        $params = [];
        foreach ($entity as $fieldName => $value) {
            if ($fieldName == 'id') {
                continue;
            }
            $fields[] = $fieldName;
            $params[":{$fieldName}"] = $value;
        }

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $this->getTableName(),
            implode(',', $fields),
            implode(',', array_keys($params))
        );

        static::getDB()->execute($sql, $params);
        $entity->id = static::getDB()->getLastId();
        return $entity;
    }

    protected function update(Entity $entity)
    {
        /*
            UPDATE
                `users`
            SET
                `login` = :login,
                `password` = :password,
                `is_admin` = :is_admin
            WHERE
                `id` = :id;
        */
        $fields = [];
        $params = [];
        foreach ($entity as $fieldName => $value) {
            $params[":{$fieldName}"] = $value;
            if ($fieldName == 'id') {
                continue;
            }
            $fields[] = "{$fieldName} = :{$fieldName}";
        }

//        $sql = sprintf(
//            "UPDATE %s SET %s WHERE id = :id",
//            static::getTableName(),
//            implode(',', $fields)
//        );

        $sql = "UPDATE " . $this->getTableName() . " SET " . implode(',', $fields) . " WHERE id = :id";
        static::getDB()->execute($sql, $params);
        return $entity;
    }

    public function save(Entity $entity)
    {
        if (empty($entity->id)) {
            return $this->insert($entity);
        }
        return $this->update($entity);
    }

    public function delete($entity)
    {
        //$this->id
    }

    //
}
