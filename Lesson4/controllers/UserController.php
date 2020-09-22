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
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = new User();
            $user->id = $this->getId();
            $user->login = $_POST['login'];
            $user->name = $_POST['name'];
            $user->password = $_POST['password'];
            $user->save();

            header("Location: /?c=user&a=all");
            exit();
        }
        $id = $this->getId();
        $person = $id>0 ? User::getOne($id) : new User();
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
