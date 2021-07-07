<?php


namespace app\controllers;

use app\engine\App;

class UserController extends Controller
{
    public function actionIndex(){
        echo $this->render('register',['registerStatus'=>'Введите логин и пароль']);
    }

    public function actionLogin() {
        if (isset(App::call()->request->getParams()['submit'])) { // если нажали кнопку сабмит
            $login =  App::call()->request->getParams()['login'];
            $pass = App::call()->request->getParams()['pass'];
            if (!App::call()->userRepository->auth($login, $pass)) { //если вводим неправильный пароль
                Die("Не верный пароль!");
            } else {
                $user = App::call()->userRepository->getWhere('login', App::call()->request->getParams()['login']);
                if (isset(App::call()->request->getParams()['save'])) { // если нажали кнопку сохранить
                    $hash = uniqid(rand(), true);
                    $user->hash = $hash;
                    App::call()->userRepository->save($user);
                    setcookie("hash", $hash, time() + 3600, '/');
                }
            }
        }
        header("Location: /");
        exit();
    }

    public function actionLogout() {
        session_destroy();
        setcookie("hash", null, time() - 1, '/');
        header("Location: /");
        exit();
    }

}