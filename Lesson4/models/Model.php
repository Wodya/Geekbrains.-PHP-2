<?php
namespace app\models;

use app\services\DB;

/**
 * Class Model
 * @package app\models
 * @property int id
 */
abstract class Model
{
    /**
     * Метод для
     *
     * @return mixed
     */
    abstract protected static function getTableName():string;
    /**
     * @return DB
     */
    protected static function getDB()
    {
        return DB::getInstance();
    }

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id ";
        $params = [':id' => $id];
        return static::getDB()->getObject($sql, static::class, $params);
    }
    public static function getTotal()
    {
        $tableName = static::getTableName();
        $sql = "SELECT count(*) Total FROM {$tableName}";
        return static::getDB()->find($sql)['Total'];
    }

    public static function getAll(int $page = null)
    {
        $tableName = static::getTableName();
        $limit = static::PAGE_COUNT;
        $offset = static::PAGE_COUNT * $page;
        $sql = $page === null ? "SELECT * FROM {$tableName}" : "SELECT * FROM {$tableName} limit $limit offset $offset";
        return static::getDB()->getAllObjects($sql, static::class);
    }
    protected function insert()
    {
        $fields = [];
        $params = [];
        foreach ($this as $fieldName => $value) {
            if ($fieldName == 'id') {
                continue;
            }
            $fields[] = $fieldName;
            $params[":{$fieldName}"] = $value;
        }

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            static::getTableName(),
            implode(',', $fields),
            implode(',', array_keys($params))
        );

        static::getDB()->execute($sql, $params);
        $this->id = static::getDB()->getLastId();
    }
    protected function update()
    {
        $fields = [];
        $params = [];
        foreach ($this as $fieldName => $value) {
            if ($fieldName == 'id') {
                continue;
            }
            $fields[] = "$fieldName = :$fieldName";
            $params[":{$fieldName}"] = $value;
        }
        $params['id'] = $this->id;
        $sql = sprintf("Update %s set %s where id=:id", static::getTableName(), implode(',', $fields));
        static::getDB()->execute($sql, $params);
        $this->id = static::getDB()->getLastId();
    }
    public function save()
    {
        if (empty($this->id)) {
            $this->insert();
            return;
        }
        $this->update();
    }
    public function delete()
    {
        $params['id'] = $this->id;
        $sql = sprintf("Delete %s where id=:id", static::getTableName());
        static::getDB()->execute($sql, $params);
    }
}
