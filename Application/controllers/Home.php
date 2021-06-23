<?php

use Application\core\Controller;

class Home extends Controller
{

    public function index()
    {
        $title = "Página inicial";
        $this->view('index', ['title' => $title]);

    }

}
