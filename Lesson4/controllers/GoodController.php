<?php
namespace app\controllers;

use app\models\Good;
use app\models\User;

class GoodController extends BaseController
{
    public function allAction()
    {
        $page = $this->getPage();
        $goods = Good::getAll($page);
        $maxPage = (int) (Good::getTotal() / Good::PAGE_COUNT);
        return $this->render('goodAll', ['goods' => $goods, 'page' => $page, 'maxPage' => $maxPage]);
    }

    public function oneAction()
    {
        $id = $this->getId();
        $person = Good::getOne($id);
        return $this->render('goodOne', ['good' => $person]);
    }
    protected function getPage()
    {
        if (empty($_GET['page'])) {
            return 0;
        }
        $page = (int)$_GET['page'];
        return $page > 0 ? $page : 0;
    }
}