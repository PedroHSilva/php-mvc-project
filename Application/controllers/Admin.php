<?php

use Application\models\Auth;
use Application\core\Controller;

class Admin extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
        if(!$this->user) {
            header("location: " . url('auth'));
        }
    }

    public function index()
    {
        var_dump($this->user);
    }

}
