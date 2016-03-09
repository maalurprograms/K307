<?php

require_once 'lib/Model.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{

    public function register()
    {
        session_start();
        if ( $_POST['password']==$_POST['cpassword']) {
            if(!(count(Model::getUser(Model::getUserID($_POST["name"])))> 0)) {
                $username = $_POST['name'];
                $password = $_POST['password'];

                Model::addUser($username, $password);
                $_SESSION["userID"] = Model::getUserID($username);
                $view = new View("login");
                $view->display();
            } else{
                print "Diesen user gibt es schon.";
            }
        } else{
            $view = new View('error');
            $view->errorMsg = "Die Passwérter stimmen nicht èberein.";
            $view->display();
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
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = Model::getUser(Model::getUserID($username));
        if ($user["password"] == $password && $password != "")
        {
            // Start session and redirect to account
            $_SESSION["userID"] = Model::getUserID($username);
            $_SESSION["notes"] = Model::getAllNotesFromUser(Model::getUserID($username));
            header("Location: ../note/home");
        }
        else
        {
            $view = new View('error');
            $view->errorMsg = "Sie haben entweder den Usernamen oder das Passwort falsch eingegeben.";
            $view->display();
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        unset($_SESSION["userID"]);
        $view = new View('home');
        $view->display();
    }
}
