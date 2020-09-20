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
    abstract protected function getId():int;

    /**
     * @return DB
     */
    protected function getDB()
    {
        return DB::getInstance();
    }

    /**
     * @param [] $item
     * @return Model
     */
    private function mapToClassOne($item)
    {
        $obj = clone($this);
        foreach ($item as $key => $value){
            $obj->$key = $value;
        }
        return $obj;
    }
    private function mapToClassAll($items)
    {
        $list = [];
        foreach ($items as $item){
            $list[] = $this->mapToClassOne($item);
        }
        return $list;
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id ";
        $params = [':id' => $id];
        return $this->mapToClassOne($this->getDB()->find($sql, $params));
    }
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->mapToClassAll($this->getDB()->findAll($sql));
    }
    public function getColumnsToSave()
    {
        $fieldsInClass = (array_keys(get_object_vars($this)));
        $fildsInDb = $this->getDB()->getTableColumns($this->getTableName());
        return array_intersect($fieldsInClass,$fildsInDb);
    }

    public function insert()
    {
        $columns = $this->getColumnsToSave();
        $columnList = implode(",",$columns);
        $valueString = "";
        foreach ($columns as $column){
            $value = $this->$column;
            $valueString .= "'$value',";
        }
        $valueString = rtrim($valueString,',');
        $sql = "INSERT INTO {$this->getTableName()} ($columnList) values ($valueString)";
        $this->getDB()->execute($sql);
        var_dump($sql);
    }

    public function update()
    {
        $columns = $this->getColumnsToSave();
        $updateString = "";
        foreach ($columns as $column){
            $value = $this->$column;
            $updateString .= "$column='$value',";
        }
        $updateString = rtrim($updateString,',');
        $sql = "Update {$this->getTableName()} set $updateString where id=:id";
        $this->getDB()->execute($sql,[':id' => $this->getId()]);
    }

    public function save()
    {
        if (empty($this->getId())) {
            return $this->insert();
        }
        return $this->update();
    }

    public function delete()
    {
        //$this->id
    }
}
