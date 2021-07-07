<?php


namespace app\models\repositories;


use app\engine\App;
use app\models\entities\User;
use app\models\Repository;

class UserRepository extends Repository
{

    public function getTableName() {
        return 'users';
    }
 
    public function auth($login, $pass) {
        $user = $this->getWhere('login', $login);
       if (password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public function isAuth() {
        if (isset($_COOKIE['hash'])){ // в первую очередь смотрим куки, сравниваем с БД, если куки совпадает с юзером, то создаем сессию
            $hash = $_COOKIE['hash'];
            $user = $this->getWhere('hash', $hash);
            if($hash == $user->hash) {
                $_SESSION['login'] = $user->login;
         
            }
        }
        return isset($_SESSION['login']) ? true: false;
    }

    public function isAdmin() {
        return $_SESSION['login'] == 'admin' ? true: false;
    }


    public function getName() {
        return $this->isAuth() ? $_SESSION['login'] : "Guest";
    }

    public function allowSeeBasket($user_id, $card_user_id){
        if($user_id == $card_user_id){
            return true;
        }
        return false;
    }

    public function getUserId() {
        if (App::call()->userRepository->isAuth()){
            $user_id = App::call()->userRepository->getWhere('login',App::call()->userRepository->getName())->id;
        } else {
            $user_id = 0; //т.е. не зарегистрированный
        }
        return $user_id;
    }

    public function existLogin($login){
        $result = App::call()->userRepository->getWhere('login', $login);
        if(is_null($result->login)){
            return false;
        } else {
            return true;
        }
    }

    public function getEntityClass()
    {
        return User::class;
    }

}