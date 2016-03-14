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
            try{
                $numbUser = count(Model::getUser(Model::getUserID($_POST["username"])));
            } catch(Exception $e){
                $numbUser = 0;
            }
            if($numbUser == 0) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                Model::addUser($username, md5($password));
                $_SESSION["userID"] = Model::getUserID($username);
                $_SESSION["notes"] = Model::getAllNotesFromUser(Model::getUserID($username));
                header("Location: ../note/home");
            } else{
                $view = new View('error');
                $view->errorMsg = "Diesen user gibt es schon.";
                $view->display();
            }
        } else{
            $view = new View('error');
            $view->errorMsg = "Die Passwörter stimmen nicht überein.";
            $view->display();
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        // header('Location: /user');
    }

//    public function delete()
//    {
//        Model::deleteUser($_GET['username']);
//
//        // Anfrage an die URI /user weiterleiten (HTTP 302)
//        // header('Location: /user');
//    }

    public function login()
    {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = Model::getUser(Model::getUserID($username));
        if ($user["password"] == md5($password) && $password != "")
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
