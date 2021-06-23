<?php

namespace Application\core;

class App
{
  protected $controller = CONTROLLER_DEFAULT;
  protected $method = 'index';
  protected $page404 = false;
  protected $params = [];


  public function __construct()
  {
    $uri_array = $this->uriToArray();
    $this->getController($uri_array);
    $this->getMethod($uri_array);
    $this->getParams($uri_array);

    //Chama o method do controller e passa seus parâmetros
    call_user_func_array([$this->controller, $this->method], $this->params);  
    
  }

  /**
  * transforma os dados da URI em um array para obter o nome do controller, method e params
  * Ex: http://meusite.com/controller/method/params => Saída [controller, method, param1, param2, ...]
  * @return array
  */
  private function uriToArray(): array
  {
    if(isset($_GET['url'])) {
      $uri = rtrim($_GET['url'], '/');
      $uri = filter_var($uri, FILTER_SANITIZE_URL);
      $uri = explode('/', $uri);
      return $uri;
    }
    return [];
  }


  /**
   * Método resposável por obter o controller do array
   * Se nada for passado assumirá o valor padrão (Home)
   * @param array $uri_array [controller, method, param1, param2, ...]
   * @return void
   */
  private function getController(array $uri_array): void
  {
    if ( !empty($uri_array[0]) && isset($uri_array[0]) ) {
      if ( file_exists('../Application/controllers/' . ucfirst($uri_array[0])  . '.php') ) {
        $this->controller = ucfirst($uri_array[0]);
      } else {
        $this->page404 = true;
        $this->method = 'pageNotFound';
      }
    }
    require '../Application/controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller();

  }

  /**
   * Método resposável por obter o method do array
   * Se nada for passado assumirá o valor padrão (index)
   * @param array $uri_array [controller, method, param1, param2, ...]
   * @return void
   */
  private function getMethod(array $uri_array): void
  {
    if ( !empty($uri_array[1]) && isset($uri_array[1]) ) {
      if ( method_exists($this->controller, $uri_array[1]) && !$this->page404) {
        $this->method = $uri_array[1];
      } else {
        $this->method = 'pageNotFound';
      }
    }
  }

  /**
   * Método resposável por obter parâmetros do array $uri_array
   * @param array $uri_array [controller, method, param1, param2, ...]
   * @return void
   */
  private function getParams(array $uri_array): void
  {
    if (count($uri_array) > 2) {
      $this->params = array_slice($uri_array, 2);
    }
  }
}
