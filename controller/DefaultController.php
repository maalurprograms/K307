<?php
class DefaultController
{
    /**
     * Die index Funktion des DefaultControllers sollte in jedem Projekt
     * existieren, da diese ausgeführt wird, falls die URI des Requests leer
     * ist. (z.B. http://mvc.local/). Weshalb das so ist, ist und wann welchr
     * Controller und welche Methode aufgerufen wird, ist im Dispatcher
     * beschrieben.
     */
    public function home()
    {
        // Render homepage
        $view = new View('home');
        $view->display();
    }

    public function login()
    {
        // Render login page
        $view = new View('login');
        $view->display();
    }

    public function register()
    {
        // Render register page
        $view = new View('register');
        $view->display();
    }
}




