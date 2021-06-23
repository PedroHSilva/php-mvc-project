<?php

namespace Application\models;

use Application\core\Session;

class Auth
{
    /**Função que retorna o usuário logado caso exista
     * @return User|null
     */
    public static function user(): ?User
    {
        $session = new Session();
        if (!$session->has("authUser")) {
            return null;
        }

        return (new User())->findById($session->get('authUser'));
    }

    /**
     * @return Void
     */
    public static function logout(): Void
    {
        $session = new Session();
        $session->unset('authUser');
    }

    /**
     * @param string $email
     * @param string $password
     * 
     * @return bool
     */
    public function login(string $email, string $password): bool
    {
        if(!is_email($email)) {
            return false;
        }

         if(!is_password($password)) {
            return false;
        }

        $user = (new User())->findByEmail($email);

        if(!$user) {
            return false;
        }

        if(!password_verify($password, $user->password)) {
            return false;
        }

        if(password_rehash($user->password)) {
            $user->password = $password;
            $user->update();
        }

        //LOGIN
        (new Session())->set("authUser", $user->id);
        return true;
    }
}
