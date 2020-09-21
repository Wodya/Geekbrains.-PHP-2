<?php
namespace app\controllers;

use app\models\Good;

class GoodController extends BaseController
{
    public function allAction()
    {
        $goods = Good::getAll();
        return $this->render('goodAll', ['goods' => $goods]);
    }

    public function oneAction()
    {
        $id = $this->getId();
        $person = Good::getOne($id);
        return $this->render('goodOne', ['good' => $person]);
    }

}