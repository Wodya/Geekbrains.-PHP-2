<?php

namespace app\controllers;


use app\entities\User;
use app\repositories\UserRepository;

class UserController extends Controller
{
    public function allAction()
    {
        $users = (new UserRepository())->getAll();
//        $users = [
//            ['id' => 12, 'login' => 'test'],
//            ['id' => 121, 'login' => 'test1'],
//            ['id' => 122, 'login' => 'test2'],
//        ];
        return $this->renderer
            ->render(
                'userAll',
                ['users' => $users]
            );
    }

    public function oneAction()
    {
        $id = $this->getId();
        $person = (new UserRepository())->getOne($id);
        return $this->renderer
            ->render(
                'userOne',
                [
                    'user' => $person,
                    'title' => "Пользователь: " . $person->login
                ]
            );
    }

    public function updateAction()
    {
        /** @var User $user */
        $user = User::getOne(39);
        $user->login = 'test';
        $user->save();
    }
    public function insertAction()
    {
        /** @var User $user */
        $user = new User();
        $user->password = 'Admin12';
        $user->login = 'Admin12';
        $user->name = 'Admin12';
        $user->save();
    }

    public function addAction()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return $this->renderer->render('userAdd');
        }

        $user = new User();
        $user->password = $_POST['password'];
        $user->login = $_POST['login'];
        $user->name = $_POST['name'];

        (new UserRepository())->save($user);

        header('Location: /');
        return '';
    }
}
