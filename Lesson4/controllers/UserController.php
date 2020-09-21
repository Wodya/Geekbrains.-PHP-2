<?php
namespace app\controllers;
use app\models\User;

class UserController extends BaseController
{

    public function allAction()
    {
        $users = User::getAll();
        return $this->render('userAll', ['users' => $users]);
    }

    public function oneAction()
    {
        $id = $this->getId();
        $person = User::getOne($id);
        return $this->render('userOne', ['user' => $person]);
    }

    public function updateAction()
    {
        /** @var User $user */
        $user = User::getOne(40);
        $user->login = 'Admin12';
        $user->save();
    }
}
