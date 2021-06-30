<?php

use Application\core\Controller;
use Application\core\Message;
use Application\models\Auth;
use Application\models\User;

class Admin extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
        if (!$this->user) {
            header("location: " . url('auth'));
            return;
        }
    }

    public function index()
    {
        $data = [
            'user' => $this->user,
            'page' => 'overview',
        ];
        $this->view('index', $data, 'admin');
    }

    public function users()
    {
        $data = [
            'user' => $this->user,
            'users' => (new User())->findAll(),
            'page' => 'users',
        ];
        $this->view('users', $data, 'admin');
    }

    public function userRegister()
    {
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRIPPED);
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRIPPED);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordRepeat'];

        if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($passwordConfirm)) {
            $msg = (new Message())->warning("first name, last name, e-mail and password is required")->flash();
            header("location: " . url("admin/users/?first_name={$first_name}&last_name={$last_name}&email={$email}"));
            return;
        }

        if ($password != $passwordConfirm) {
            $msg = (new Message())->warning("passwords do not match")->flash();
            header("location: " . url("admin/users/?first_name={$first_name}&last_name={$last_name}&email={$email}"));
            return;
        }

        $user = (new User())->findByEmail($email);

        if ($user) {
            $msg = (new Message())->warning("This is email is already registered!")->flash();
            header("location: " . url("admin/users/?first_name={$first_name}&last_name={$last_name}&email={$email}"));
            return;
        }

        $user = new User();
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->password = password($password);

        $user->save();
        $msg = (new Message())->success("User: {$user->first_name} {$user->last_name}, registered successfully!")->flash();
        header("location: " . url('admin/users'));
        return;

    }

    public function userDelete($id = null)
    {
        if(is_numeric($id)) {
            $user = (new User())->findById($id);
            if($user) {
                $msg = (new Message())->success("Usuário <b>$user->first_name $user->last_name</b> excluido com sucesso!")->flash();
                $user->delete();
                header("location: ".url("admin/users"));
                return;
            }
            echo "Usuário não localizado";
        } else {
            echo "nada";
        }
    }

}
