<?php

namespace app\controllers;

use app\models\Good;

class GoodController extends Controller
{
    public function allAction()
    {
        $users = Good::getAll();
        return 'Товары';
    }

}
