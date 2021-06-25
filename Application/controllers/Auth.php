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
        $token = $_POST['csrf'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!csrf_verify($token)) {
            $msg = (new Message())->error("Error! Please use the form")->flash();
            header("location: ".url('auth'));
            return;
        }

        if(empty($email) || empty($password)) {
            $msg = (new Message())->error("email and password is required!")->flash();
            header("location: ".url('auth'));
            return;
        }

        //LOGIN
        $auth = new AuthUser();
        $login = $auth::login($email, $password);

        if ($login) {
            header("location: " . url("admin"));
            return;
        } else {
            $msg = (new Message())->error("Invalid email or password!")->flash();
            header("location: " . url("auth/?email={$email}"));
            return;
        }
    }

    public function logout()
    {
        $auth = new AuthUser();
        $auth::logout();
        $msg = (new Message())->success("logged out")->flash();
        header("location: " . url("auth"));
        return;
    }
}
