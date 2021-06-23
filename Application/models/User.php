<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class User
{
    /**
     * @return void
     */
    public function save(): void
    {
        $database = new Database('users');
        $this->id = $database->insert([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
    }

    public function update()
    {
        return (new Database('users'))->update("id={$this->id}", [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
    }

    public function delete()
    {
        return (new Database('users'))->delete("id={$this->id}");
    }

    public function findById($id)
    {
        return (new Database('users'))->select("id={$id}")->fetchObject(self::class);
    }

    public function findByEmail(string $email)
    {
        return (new Database('users'))->select("email='{$email}'")->fetchObject(self::class);
    }

    public function findAll($where = null, $order = null, $limit = null)
    {
        return (new Database('users'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
