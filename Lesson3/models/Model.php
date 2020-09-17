<?php
namespace app\models;

use app\services\DB;

abstract class Model
{
    /**
     * Метод для
     *
     * @return mixed
     */
    abstract protected function getTableName():string;

    /**
     * @return DB
     */
    protected function getDB()
    {
        return DB::getInstance();
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id ";
        $params = [':id' => $id];
        return $this->getDB()->find($sql, $params);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->getDB()->findAll($sql);
    }

    protected function insert()
    {
        foreach ($this as $fieldName => $value) {
            var_dump($fieldName, $value);
        }
        // INSERT INTO `users`
        // (`login`, `password`, `name`, `is_admin`)
        // VALUES
        // ('log', 'pas', 'n/o', '0');
    }

    protected function update()
    {

    }

    public function save()
    {
        if (empty($this->id)) {
            return $this->insert();
        }
        return $this->update();
    }

    public function delete()
    {
        //$this->id
    }
}
