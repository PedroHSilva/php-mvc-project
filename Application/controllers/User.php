<?php

use Application\core\Controller;
use Application\models\Auth;
use Application\models\User as ModelUser;

class User extends Controller
{
    public function __construct()
    {
       $user = Auth::user();
        if (!$user) {
            header("location: " . url('auth'));
        }
    }

    /**
     * @return void
     */
    public function index(): void
    {
        $users = (new ModelUser())->findAll();
        //carrega a view e passa os usuarios
        $this->view('user/index', ['users' => $users, 'title' => 'Listagem de Usuários']);
    }

    /**
     * @param int|null $id
     * @return void
     */
    public function show(int $id = null): void
    {
        if (is_numeric($id)) {
            $user = (new ModelUser('User'))->findById($id);
            if (!empty($user)) {
                $this->view('user/show', [
                    'user' => $user,
                    'title' => $user->first_name,
                ]);
            } else {
                $this->pageNotFound();
            }
        } else {
            $this->pageNotFound();
        }
    }

}
