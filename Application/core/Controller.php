<?php

namespace Application\core;

class Controller
{
    /**
     * Método responsavel por carregar o thema, a view e os dados que serão exibidos
     * @param  string  $view
     * @param  array   $data
     */
    public function view(string $view, array $data = [], string $theme = THEME): void
    {

        if (file_exists('../Application/views/theme/' . $theme . '/layout/header.php')) {
            require_once '../Application/views/theme/' . $theme . '/layout/header.php';
        } else {die("Error: Tema $theme('header) não encontrado!");}

        if (file_exists('../Application/views/theme/' . $theme . '/' . $view . '.php')) {
            require_once '../Application/views/theme/' . $theme . '/' . $view . '.php';
        } else {die("Error: View $view não econtrada!");}

        if (file_exists('../Application/views/theme/' . $theme . '/layout/footer.php')) {
            require_once '../Application/views/theme/' . $theme . '/layout/footer.php';
        } else {die("Error: Tema $thema(footer) não encontrado!");}

    }

    /**
     * Méthodo responsavel por carregar a página 404.
     * @return void
     */
    public function pageNotFound(): void
    {
        $this->view('erro404');
    }

}
