<?php

use Application\core\Controller;

class About extends Controller
{

    public function index(): void
    {
        $this->view('about', ['title' => 'About']);
    }

}
