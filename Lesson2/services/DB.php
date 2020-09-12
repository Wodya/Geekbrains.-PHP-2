<?php
namespace app\services;
use app\models\TCalc as TCalc;

class DB implements IDB
{
    use TCalc;

    public function find($sql)
    {
        $this->echoTest();
        return 'find ' . $sql;
    }

    public function findAll($sql)
    {
        return 'findAll ' . $sql;
    }
}