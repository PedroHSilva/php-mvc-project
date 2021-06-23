<?php

use Application\core\Controller;
use Application\core\Message;
use Application\models\Auth as AuthUser;
use Application\models\User;

class Auth extends Controller
{
    public function index()
    {
        if ($user = AuthUser::user()) {
            header("location: " . url("admin"));
        }
        $this->view("login");
    }

    public function login()
    {

        $auth = new AuthUser();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $login = $auth::login($email, $password);

        if ($login) {
            $msg = (new Message())->success("logado com sucesso")->flash();
            header("location: " . url("user"));
        } else {
            $msg = (new Message())->error("Acesso não autorizado");
            echo $msg;
        }
    }

    public function logout()
    {
        $auth = new AuthUser();
        $auth::logout();
        header("location: " . url("auth"));
    }
}
