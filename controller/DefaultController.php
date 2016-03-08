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
        // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
        //   "default_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.
        $view = new View('home');
        $view->display();
    }

    public function login()
    {
        // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
        //   "default_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.
        $view = new View('login');
        $view->display();
    }

    public function register()
    {
        // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
        //   "default_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.
        $view = new View('register');
        $view->display();
    }
}




