<?php

namespace app\controllers;

use app\repositories\GoodRepository;

class GoodController extends Controller
{
    protected function getPageSize(): int
    {
        return 3;
    }

    public function allAction()
    {
        return parent::getAll(new GoodRepository(),'goodAll');
    }

    public function oneAction()
    {
        $id = $this->getId();
        $person = (new GoodRepository())->getOne($id);
        return $this->renderer->render('goodOne', ['good' => $person]);
    }
}
