<?php

use Application\core\Controller;

class Contato extends Controller
{
  /*
  * chama a view index.php do  /home   ou somente   /
  */
  public function index()
  {
    if(isset($_POST['name']) && $_POST['name'] == 'home') {
        header('location: ' . url('user'));
    }  
    $title = "Contato";
    $name = $_POST['name'] ?? '';
    $this->view('contato', [
        'title' => $title,
        'name'  => $name
        ]);
  }
}
