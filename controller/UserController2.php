<?php

require_once 'lib/Model.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController2
{
    public function account()
    {
        $model = new Model();

        $view = new View('home');
        $view->userData = $model->userData();  /* should return username, articles, etc. */
        $view->display();
    }

    public function create()
    {
        if ($_POST['send']) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $userModel->create($username, $password);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        // header('Location: /user');
    }

    public function delete()
    {
        $userModel = new UserModel();
        $userModel->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        // header('Location: /user');
    }
}
