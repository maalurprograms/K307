<?php

require_once 'lib/Model.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function account()
    {
        $model = new Model();

        $view = new View('home');
        $view->userData = $model->getUser();  /* should return username, articles, etc. */
        $view->display();
    }

    public function create()
    {
        if ($_POST['send']) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $model = new Model();
            $model->addUser($username, $password);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        // header('Location: /user');
    }

    public function delete()
    {
        Model::deleteUser($_GET['username']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        // header('Location: /user');
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $model = new Model();
        $user = $model->getUser($username);
        if ($user["password"] == $password)
        {
            // Start session and redirect to account
            $model = new Model();
            $view = new View('account');
            $view->userData = $model->getUser();
            $view->display();
        }
        else
        {
            // login wrong
        }
    }
}
